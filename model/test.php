<?php

    class test_model {

        private $db;

        function __construct() {
            $this->db = db_connect();
        }

        function alert($msg) {
            echo "<script type='text/javascript'>alert('$msg');</script>";
        }


        function fetch_today_mcq(){
            $todayDate = date("Y-m-d");
            $current_time = date("H:i:s");
            mysqli_autocommit($this->db, TRUE);
            $sql = "SELECT * FROM `mcq_q` AS ques INNER JOIN `mcq` as test ON test.mcq_id=ques.mcq_id WHERE  test.status = 0 and test.start_time <= '".$current_time."' and test.end_time >= '".$current_time."' and test.date = '".$todayDate."' ORDER BY ques.mcq_question, ques.option1";
            $result = query($this->db, $sql);
            mysqli_commit($this->db);
            db_close($this->db);
            return $result;
        }

        function save_ans($arguments){
            $mcq_data = fetch_today_mcq();
            print_r($mcq_data);
            // mysqli_autocommit($this->db, TRUE);
            // $sql = "UPDATE `todo` SET status = '1' WHERE taskId = '".$arguments['taskIdDisable']."' " ;
            // $result = query($this->db, $sql); 
            // mysqli_commit($this->db);
            // db_close($this->db);
            // return $result;
        }

    }
?>