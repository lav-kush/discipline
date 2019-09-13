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
            $todayDate = date("Y-m-d");
            $current_time = date("H:i:s");
            mysqli_autocommit($this->db, TRUE);
            $sql = "SELECT * FROM `mcq_q` AS ques INNER JOIN `mcq` as test ON test.mcq_id=ques.mcq_id WHERE  test.status = 0 and test.start_time <= '".$current_time."' and test.end_time >= '".$current_time."' and test.date = '".$todayDate."' ORDER BY ques.mcq_question, ques.option1";
            $results = query($this->db, $sql);
            mysqli_commit($this->db);
            $marks = -1;
            $mcq_id = 0;

            mysqli_autocommit($this->db, TRUE);
            foreach ($results as $result){
                $ans = "q_".$result['mcq_q_id'];
                $mcq_id = $result['mcq_id'];
                if(array_key_exists($ans, $arguments)){
                    $sql = "UPDATE `mcq_q` SET `ans_submitted` = '".(array_search($arguments[$ans],$result))[-1]."' WHERE mcq_q_id = '".$result['mcq_q_id']."' " ;
                    query($this->db, $sql);
                    if($arguments[$ans] === $result['option'.$result['correct_option']]){
                        $marks += 1;
                    }
                }
            }
            if($marks > 0 ){
                $sql = "UPDATE `mcq` SET `status` = 1, last_test_marks = '".$marks."' WHERE mcq_id = '".$mcq_id."' " ;
                query($this->db, $sql);
            }
            mysqli_commit($this->db);
            return $marks;
        }

    }
?>
