<?php
    class test {
        private $data = array();
        function __construct() {
            session_start();
            if(isset($_SESSION) && !empty($_SESSION) && isset($_SESSION['user_id']) && !empty($_SESSION['user_id']))
            {
                $this->data = $_SESSION;
            }
        }
        function home() {
            $data_mcq= loadModel("test", "fetch_today_mcq");
            $marks = $end_time = -1;
            if (!empty ($data_mcq)){
                $marks =  $data_mcq[0]['last_test_marks'];
                $end_time = $data_mcq[0]['end_time'];
            }
            loadView('todos_header', array_merge($this->data, ['header' => 'Test','title' => 'Test - Discipline', 'marks'=>$marks]));
            loadView('test', array_merge($data_mcq, ['mcqLen' => count($data_mcq), 'end_time'=>$end_time ]));
            loadView('footer');
        }

        function save_ans($arguments) {
            $marks= loadModel("test", "save_ans", $arguments);
            if ($marks==-1) {
                print("You haven't attempted any question<br/>Please Try Again");
                redirect_sleep('test', 'home', 2);
                exit();
            }
           if ($marks==0) {
                print("You have scored 0 Marks<br/>Please Try Again");
                redirect_sleep('test', 'home', 2);
                exit();
            }
            echo ('Test Completed <br/> Total Marks '.$marks);
            redirect_sleep('todo', 'home', 8);
            exit();
        }
    }
?>
