<?php

    class todo_model {

        private $db;

        function __construct() {
            $this->db = db_connect();
        }

        function add_todo($arguments) {
            mysqli_autocommit($this->db, TRUE);
           echo($arguments);
            $sql = "INSERT INTO `todo`(`user`, `task`, `date`, `fromTime`, `toTime`, `status`) VALUES('".$arguments['user']."', '".$arguments['task']."', '".$arguments['taskDate']."', '".$arguments['fromTime']."', '".$arguments['toTime']."', '0')";
            echo($arguments['taskDate']);
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

        function fetch_today_complete_todos(){
            $todayDate = date("Y-m-d");
            mysqli_autocommit($this->db, TRUE);
            $sql = "SELECT * FROM `todo` WHERE status='1' AND date = '".$todayDate."'  ORDER BY `user`"  ;
            $result = query($this->db, $sql);
            mysqli_commit($this->db);
            db_close($this->db);
            return $result;
        }

        function fetch_todo(){
            mysqli_autocommit($this->db, TRUE);
            $sql = "SELECT * FROM `todo` WHERE status='0' ORDER BY `user`" ;
            $result = query($this->db, $sql); 
            mysqli_commit($this->db);
            db_close($this->db);
            return $result;
        }
        function fetch_uploaded_assignment(){
            mysqli_autocommit($this->db, TRUE);
            $sql = "SELECT * FROM `uploaded`" ;
            $result = query($this->db, $sql); 
            mysqli_commit($this->db);
            db_close($this->db);
            return $result;
        }
        function disable_todo($arguments){
            mysqli_autocommit($this->db, TRUE);
            $sql = "UPDATE `todo` SET status = '1' WHERE taskId = '".$arguments['taskIdDisable']."' " ;
            $result = query($this->db, $sql); 
            mysqli_commit($this->db);
            db_close($this->db);
            return $result;
        }
        
        function upload_assignment($arguments){
            $fileName =  explode("~", implode("~", $arguments['fileToUpload']))[0];
            mysqli_autocommit($this->db, TRUE);
            $sql = "INSERT INTO `uploaded`(`taskId`, `fileName`, `todayDate`, `anyNotes`) VALUES('".$arguments['taskId']."', '".$fileName."', '".$arguments['todayDate']."',  '".$arguments['anyNotes']."')";
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

        function alert($msg) {
            echo "<script type='text/javascript'>alert('$msg');</script>";
        }

        function save_file($arguments){
            $target_dir = UPLOAD_IMG_PATH;
            $target_file = $target_dir.basename($_FILES["fileToUpload"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            // Check if image file is a actual image or fake image
            if(isset($_POST["submit"])) {
                $check = false;
                try{
                    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                }catch(Exception $e){
                    $this->alert( "File is not an image(Not Correct Format).");
                    $uploadOk =0;
                    return false;
                }
                if($check !== false) {
                    $uploadOk = 1;
                } else {
                    $this->alert( "File is not an image.");
                    $uploadOk =0;
                    return false;
                }
            }
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                && $imageFileType != "gif" ) {
                    $uploadOk =0;
                    $this->alert( "Sorry, only JPG, JPEG, PNG & GIF files are allowed.");
                    return false;
            }
            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                $this->alert( "Sorry, your file was not uploaded.");
                return false;
            } else {
                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                    $this->alert( "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.");
                    // return true;
                } else {
                    alert( "Sorry, there was an error uploading your file.");
                }
            }
            return true;
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
        function fetch_today_mcq(){
            $todayDate = date("Y-m-d");
            mysqli_autocommit($this->db, TRUE);
            $sql = "SELECT * FROM `mcq_q` AS ques inner join `mcq` as test WHERE  test.status = 0 and test.date = '".$todayDate."'";
            $result = query($this->db, $sql);
            mysqli_commit($this->db);
            db_close($this->db);
            return $result;
        }

    }
?>