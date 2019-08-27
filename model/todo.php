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