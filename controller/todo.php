<?php
    class todo {
        private $data = array();
        function __construct() {
            session_start();
            if(isset($_SESSION) && !empty($_SESSION) && isset($_SESSION['user_id']) && !empty($_SESSION['user_id']))
            {
                $this->data = $_SESSION;
            }
        }
        function home() {
           $data_todo= loadModel("todo", "fetch_todo");
           $data_completed_todos= loadModel("todo", "fetch_today_complete_todos");
           loadView('header', array_merge($this->data, ['todoLen' => count($data_todo), 'title' => 'Todo - Discipline']));
            loadView('todo', array_merge($data_completed_todos, $data_todo, ['completedTodosLen' => count($data_completed_todos), 'todoLen' => count($data_todo)]));
            loadView('footer');
        }
        function uploader() {
            loadView('uploader');
            redirect_sleep('todo','home', 1);
        }
        function add_todo($arguments) {
            $result = loadModel('todo', 'add_todo', $arguments);
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
