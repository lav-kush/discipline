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
            $data_completed_todos= loadModel("todo", "fetch_today_complete_todos");
            $shivamCompletedTaskList = array();
            $lavKushCompletedTaskList = array();
            $i = 0;
            while($i < count($data_completed_todos)) {
                if($data_completed_todos[$i]['user'] == 'shivam'){
                    array_push($shivamCompletedTaskList, $data_completed_todos[$i]);
                }else{
                    array_push($lavKushCompletedTaskList, $data_completed_todos[$i]);
                }
                $i = $i + 1;
            }
            $data_todo= loadModel("todo", "fetch_todo");
            $shivamTaskList = array();
            $lavKushTaskList = array();
            $i = 0;
            while($i < count($data_todo)) {
                if($data_todo[$i]['user'] == 'shivam'){
                    array_push($shivamTaskList, $data_todo[$i]);
                }else{
                    array_push($lavKushTaskList, $data_todo[$i]);
                }
                $i = $i + 1;
            }
            $data_uploaded_assignment= loadModel("todo", "fetch_uploaded_assignment");
           loadView('todos_header', array_merge($this->data, ['todoLen' => count($data_todo), 'title' => 'Todo - Discipline']));
            loadView('todo', array_merge($shivamCompletedTaskList, $shivamTaskList, $lavKushCompletedTaskList, $lavKushTaskList, $data_uploaded_assignment, ['shivamCompletedTodosLen' => count($shivamCompletedTaskList), 'lavCompletedTodosLen' => count($lavKushCompletedTaskList), 'shivamTodoLen' => count($shivamTaskList), 'lavTodoLen' => count($lavKushTaskList), 'uploadedAssignmentLen' => count($data_uploaded_assignment) ]));
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
         function disable_todo($arguments) {
            $result = loadModel('todo', 'disable_todo', $arguments);
            if ($result === false) {
                print('Some Error Occured<br/>Please Try Again');
                loadView('error', ['msg' => 'Some Error Occured']);
                exit();
            }
            redirect('todo', 'home');
            exit();
        }

         function upload_assignment($arguments) {
            $result = loadModel('todo', 'save_file', $arguments);
            
            if ($result == false) {
                print('Some Error Occured<br/>Please Try Again');
                redirect_sleep('todo', 'home', 4);
               exit();
            }
            $result = loadModel('todo', 'upload_assignment', $arguments);
            redirect('todo', 'home');
            exit();
        }


    }
?>
