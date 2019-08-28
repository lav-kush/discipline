<?php

    class todo_model {

        private $db;

        function __construct() {
            $this->db = db_connect();
        }

        function add_todo($arguments) {
            mysqli_autocommit($this->db, TRUE);
            $sql = "INSERT INTO `todo`(`user`, `task`, `date`, `fromTime`, `toTime`, `status`) VALUES('".$arguments['user']."', '".$arguments['task']."', '".$arguments['date']."', '".$arguments['fromTime']."', '".$arguments['toTime']."', '0')";
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
            $date = date("Y/m/d");
            mysqli_autocommit($this->db, TRUE);
            $sql = "SELECT * FROM `todo` WHERE status='1' AND date >= $date"  ;
            $result = query($this->db, $sql); 
            mysqli_commit($this->db);
            db_close($this->db);
            return $result;
        }        

        function fetch_todo(){
            mysqli_autocommit($this->db, TRUE);
            $sql = "SELECT * FROM `todo` WHERE status='0'" ;
            $result = query($this->db, $sql); 
            mysqli_commit($this->db);
            db_close($this->db);
            return $result;
        }
        function disable_todo($arguments){
            mysqli_autocommit($this->db, TRUE);
            $sql = "UPDATE `todo` SET status = '1' WHERE taskId = '".$arguments['taskId']."' " ;
            $result = query($this->db, $sql); 
            mysqli_commit($this->db);
            db_close($this->db);
            return $result;
        }
        
        function upload_assignment($arguments){
            mysqli_autocommit($this->db, TRUE);
            $sql = "INSERT INTO `todo`(`user`, `task`, `date`, `fromTime`, `toTime`, `status`) VALUES('".$arguments['user']."', '".$arguments['task']."', '".$arguments['date']."', '".$arguments['fromTime']."', '".$arguments['toTime']."', '0')";
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

        function save_file(){
            echo($_FILES);
            alert();
            $target_dir = UPLOAD_IMG_PATH;
            $target_file = $target_dir.basename($_FILES["fileToUpload"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            // Check if image file is a actual image or fake image
            if(isset($_POST["submit"])) {
                $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                if($check !== false) {
                    // alert( "File is an image - " . $check["mime"] . ".");
                    $uploadOk = 1;
                } else {
                    alert( "File is not an image.");
                    $uploadOk = 0;
                }
            }
            // Check if file already exists
            /*if (file_exists($target_file)) {
                alert( "Sorry, file already exists.");
                $uploadOk = 0;
            }*/
            // Check file size
            /*if ($_FILES["fileToUpload"]["size"] > 500000) {
                alert( "Sorry, your file is too large.");
                $uploadOk = 0;
            }*/
            // Allow certain file formats
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
                alert( "Sorry, only JPG, JPEG, PNG & GIF files are allowed.");
                $uploadOk = 0;
            }
            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                alert( "Sorry, your file was not uploaded.");
            // if everything is ok, try to upload file
            } else {
                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                    alert( "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.");
                } else {
                    alert( "Sorry, there was an error uploading your file.");
                }
            }
        }

        function alert($msg) {
            echo "<script type='text/javascript'>alert('$msg');</script>";
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
    }
?>