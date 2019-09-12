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
            loadView('todos_header', array_merge($this->data, ['header' => 'Test','title' => 'Test - Discipline']));
            loadView('test', array_merge($data_mcq, ['mcqLen' => count($data_mcq) ]));
            loadView('footer');
        }

        function save_ans($arguments) {
            $result= loadModel("test", "save_ans", $arguments);
            if ($result === false) {
                print('Some Error Occured<br/>Please Try Again');
                loadView('error', ['msg' => 'Some Error Occured']);
                exit();
            }
            redirect('todo', 'home');
            exit();
        }
    }
?>
