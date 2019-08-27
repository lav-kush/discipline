<?php

    class user_model {

        private $db;

        function __construct() {
            $this->db = db_connect();
        }

        function validate($data = []) {
            extract($data);
            // $i_patt = '/2[0-9]{3}[a-zA-Z]{3}[0-9]{4}/';
            $e_patt = '/.+@.+\..+/';
            $c_patt = '/^[1-9]\d{1}\d{8}$/';
            $msg = "";
            $sql = "SELECT * FROM `user` WHERE username='$username'";
            $result1 = query($this->db, $sql);
            // $sql = "SELECT * FROM `user` WHERE institute_id='$institute_id'";
            // $result2 = query($this->db, $sql);
            $sql = "SELECT * FROM `user` WHERE email='$email'";
            $result3 = query($this->db, $sql);
            // if (isset($batch) && !empty($batch)) {
            //     $sql = "SELECT * FROM `batch` WHERE batch_id='$batch'";
            //     $result4 = query($this->db, $sql);
            //     if (!count($result4)) {
            //         $msg = "Invalid Batch<br/>";
            //     }
            // }
            if (count($result1)) {
                $msg = "Username Already exist";
            } else if (count($result3)) {
                $msg = "Email-ID Already exist";
            } else if (!isset($name) || empty($name) || !ctype_alpha($name) || strlen($name) > 20) {
                $msg = "Invalid Full Name";
            } else if (!isset($username) || empty($username) || !ctype_alnum($username) || strlen($username) > 20) {
                $msg = "Invalid User Name";
            } else if (!isset($email) || empty($email) || !preg_match($e_patt, $email)) {
                $msg = "Invalid Email";
            } else if (!isset($contact) || empty($contact) || !preg_match($c_patt, $contact)) {
                $msg = "Invalid Contact No.";
            } else if (!isset($fname) || empty($fname) || !ctype_alpha($fname) || strlen($fname) > 20) {
                $msg = "Invalid Father's Name";
            } else if (!isset($fcontact) || empty($fcontact) || !preg_match($c_patt, $fcontact)) {
                $msg = "Invalid Father's Contact No.";
            } else if (!isset($password) || empty($password) || strlen($password) < 8) {
                $msg = "Invalid Password";
            } else if (!isset($confirm) || empty($confirm) || $password !== $confirm) {
                $msg = "Passwords do not match";
            } else if (!isset($dob) || empty($dob) || $dob >= date("Y-m-d")) {
                $msg = "Invalid Date of Birth";
            } else if (!isset($type) || empty($type) || ($type != 1 && $type != 2)) {
                $msg = "Invalid Data";
            } else if (!isset($qualification) || empty($qualification)) {
                $msg = "Invalid Qualification Data";
            // } else if (!isset($otp) || empty($otp)) {
            //     $msg = "Invalid OTP";
            }
            return $msg;
        }

        function login($data = []) {
            extract($data);
            mysqli_autocommit($this->db, FALSE);
            $sql = "SELECT * FROM `user` WHERE `email`='$email'";
            $result = query($this->db, $sql);
            if ($result == false) {
                mysqli_rollback($this->db);
                db_close($this->db);
                return $result;
            }
            $hash = $result[0]['password'];
            $res = password_verify($password, $hash);
            if ($res != false) $result = $result[0];
            else $result = false;
            if ($result && $result['type'] == 1) {
                $sql = "SELECT * FROM `student` NATURAL JOIN `user` WHERE `user_id`=".$result['user_id'];
                $result = query($this->db, $sql);
            } else if ($result && $result['type'] == 2) {
                $sql = "SELECT * FROM `teacher` NATURAL JOIN `user` WHERE `user_id`=".$result['user_id'];
                $result = query($this->db, $sql);
            }
            if ($result) mysqli_commit($this->db);
            else mysqli_rollback($this->db);
            db_close($this->db);
            return $result[0];
        }

        function register($data = []) {
            mysqli_autocommit($this->db, FALSE);
            $msg = $this->validate($data);
            if ($msg) {
                print($msg);
                loadView('error', ['msg' => $msg]);
                mysqli_rollback($this->db);
                db_close($this->db);
                exit();
            }
            extract($data);
            echo('inserting into database');
            $sql = "INSERT INTO `user` (`name`, `username`, `email`, `contact_no`, `fname`, `fcontact_no`, `password`,
            `dob`, `type`, `about_me` , `address`) VALUES('$name', '$username', '$email', '$contact', '$fname', '$fcontact',
            '".password_hash($password, PASSWORD_BCRYPT)."', '$dob', '$type', '$about_me', '$address')";
            $result = query($this->db, $sql);
            echo(result);
            if ($result === true) {
                $last_id = mysqli_insert_id($this->db);
                $result = db_last_id($this->db, 'user', 'user_id');
                if ($type == 1) {
                    $sql = "INSERT INTO `student` VALUES('".$result['user_id']."', '$batch', '$qualification')";
                    $result2 = query($this->db, $sql);
                    if ($result2 === true) {
                        $result = array_merge($result, db_last_id($this->db, 'student', 'user_id', $last_id));
                    } else {
                        mysqli_rollback($this->db);
                        db_close($this->db);
                        return false;
                    }
                } else {
                    $sql = "INSERT INTO `teacher` VALUES('".$result['user_id']."', '$qualification')";
                    $result2 = query($this->db, $sql);
                    if ($result2 === true) {
                        $result = array_merge($result, db_last_id($this->db, 'teacher', 'user_id', $last_id));
                    } else {
                        mysqli_rollback($this->db);
                        db_close($this->db);
                        return false;
                    }
                }
            }
            mysqli_commit($this->db);
            db_close($this->db);
            session_start();
            return $result;
        }

        function forgot_password($data = []) {
            mysqli_autocommit($this->db, FALSE);
            $sql = "SELECT * FROM `user` WHERE `email`='".$data['f_email']."'";
            $result = query($this->db,$sql);
            if(empty($result)) {
                mysqli_rollback($this->db);
                db_close($this->db);
                return false;
            }
            mysqli_commit($this->db);
            db_close($this->db);
            return $result[0];
        }

        function forgot_verify($data = []) {
            mysqli_autocommit($this->db, FALSE);
            $sql = "SELECT * FROM `user` WHERE username='".$data['username']."' AND password='".$data['forgot_token']."'";
            $result = query($this->db,$sql);
            if(empty($result)) {
                mysqli_rollback($this->db);
                db_close($this->db);
                return false;
            }
            mysqli_commit($this->db);
            db_close($this->db);
            return true;
        }

        function forgot_change($data = []) {
            if (!isset($data) || empty($data)
            || !isset($data['f_password']) || empty($data['f_password'])
            || !isset($data['f_confirm_password']) || empty($data['f_confirm_password'])
            || $data['f_password'] != $data['f_confirm_password'])
                return false;
            mysqli_autocommit($this->db, FALSE);
            $sql = "UPDATE `user` SET `password`='".password_hash($data['f_password'], PASSWORD_BCRYPT)."' WHERE username='".$data['f_username']."'";
            $result = query($this->db,$sql);
            if(empty($result)) {
                mysqli_rollback($this->db);
                db_close($this->db);
                return false;
            }
            $sql = "SELECT * FROM `user` WHERE username='".$data['f_username']."'";
            $result = query($this->db,$sql);
            if(empty($result)) {
                mysqli_rollback($this->db);
                db_close($this->db);
                return false;
            }
            $result = $result[0];
            if ($result['type'] == 1) {
                $sql = "SELECT * FROM `student` NATURAL JOIN `user` WHERE `user_id`=".$result['user_id'];
                $result = query($this->db, $sql);
            } else if ($result[0]['type'] == 2) {
                $sql = "SELECT * FROM `teacher` NATURAL JOIN `user` WHERE `user_id`=".$result['user_id'];
                $result = query($this->db, $sql);
            }
            mysqli_commit($this->db);
            db_close($this->db);
            return $result[0];
        }

        function subscribe($arguments) {
            mysqli_autocommit($this->db, FALSE);
            $sql = "INSERT INTO `subscription`(`name`, `email`) VALUES('".$arguments['s_name']."', '".$arguments['s_email']."')";
            $result = query($this->db,$sql);
            db_close($this->db);
            if($result === false) {
                mysqli_rollback($this->db);
                db_close($this->db);
                return false;
            }
            mysqli_commit($this->db);
            db_close($this->db);
            return $result;
        }

        function fetchNotice(){
            mysqli_autocommit($this->db, TRUE);
            $sql = "SELECT * FROM `notice`";
            $result = query($this->db, $sql);
            mysqli_commit($this->db);
            db_close($this->db);
            return $result;
        }

        function notice($arguments) {
            mysqli_autocommit($this->db, TRUE);
            $sql = "DELETE FROM `notice`";
            $result = query($this->db,$sql);
            $sql = "INSERT INTO `notice`(`info`, `user`) VALUES('".$arguments['latest_notice_info']."', '".$arguments['user']."')";
            $result = query($this->db,$sql);
            db_close($this->db);
            // echo($result);
            if($result === false) {
                mysqli_rollback($this->db);
                db_close($this->db);
                return false;
            }
            mysqli_commit($this->db);
            db_close($this->db);
            return $result;
        }

        function add_banner($arguments) {
            mysqli_autocommit($this->db, TRUE);
            $sql = "INSERT INTO `banner`(`image`, `message`, `link`) VALUES('".$arguments['image']."', '".$arguments['message']."', '".$arguments['link']."')";
            $result = query($this->db,$sql);
            db_close($this->db);
            echo($result);
            if($result === false) {
                mysqli_rollback($this->db);
                db_close($this->db);
                return false;
            }
            mysqli_commit($this->db);
            db_close($this->db);
            return $result;
        }

        function delete_banner($arguments) {
            mysqli_autocommit($this->db, TRUE);
            $sql = "DELETE * FROM `banner` WHERE banner.image = ('".$arguments['image']."')";
            $result = query($this->db,$sql);
            db_close($this->db);
            echo($result);
            if($result === false) {
                mysqli_rollback($this->db);
                db_close($this->db);
                return false;
            }
            mysqli_commit($this->db);
            db_close($this->db);
            return $result;
        }

        function add_notification($arguments) {
            mysqli_autocommit($this->db, TRUE);
            $sql = "INSERT INTO `notification`(`info`, `start_time`, `end_time`, `link`) VALUES('".$arguments['info']."', '".$arguments['start_time']."', '".$arguments['end_time']."', '".$arguments['link']."')";
            $result = query($this->db,$sql);
            db_close($this->db);
            echo($result);
            if($result === false) {
                mysqli_rollback($this->db);
                db_close($this->db);
                return false;
            }
            mysqli_commit($this->db);
            db_close($this->db);
            return $result;
        }

        function delete_notification($arguments) {
            mysqli_autocommit($this->db, TRUE);
            $sql = "DELETE * FROM `notification`(`n_id`) WHERE banner.n_id = ('".$arguments['n_id']."')";
            $result = query($this->db,$sql);
            db_close($this->db);
            echo($result);
            if($result === false) {
                mysqli_rollback($this->db);
                db_close($this->db);
                return false;
            }
            mysqli_commit($this->db);
            db_close($this->db);
            return $result;
        }

        function fetch_user($data)
        {
            if (!isset($data['name']) || empty($data['name'])) {
                redirect_sleep('main', 'home', 0);
                exit();
            }
            if($data['type']=='1')
            {
                $sql = "SELECT * FROM `user` natural join `student` WHERE user.user_id=student.user_id and  `user_id`= ".$data['user_id'] ."";
                

            }
            else
            {
                 $sql = "SELECT * FROM `user` natural join `teacher` WHERE user.user_id=teacher.user_id and  `user_id`=".$data['user_id'] ."";
            }
            $result = query($this->db, $sql);
            return $result;
        }

    }
?>