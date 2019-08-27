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
           loadView('header', array_merge($this->data, ['title' => 'About_us - Discipline']));
            loadView('todo');
            loadView('footer');
        }
        function uploader() {
            loadView('uploader');
            redirect_sleep('todo','home', 1);
        }
    }
?>
