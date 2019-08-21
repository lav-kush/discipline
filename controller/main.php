<?php

    class main {
        private $data = array();
        function __construct() {
            session_start();
            if(isset($_SESSION) && !empty($_SESSION) && isset($_SESSION['user_id']) && !empty($_SESSION['user_id']))
            {
                $this->data = $_SESSION;
            }
        }

        function home() {
			$data = loadModel('contest', 'banner');
            $dataNotice = loadModel('user', 'fetchNotice');
            loadView('header', array_merge($this->data, ['title' => 'Home - Discipline']));
            loadView('home', array_merge($this->data, $data, $dataNotice, ['len' => count($data)]));
            loadView('footer');
        }

        function notification() {
            $data = loadModel("notification", "fetch");
            loadView('header', array_merge($this->data, ['title' => 'Notification - Discipline']));
            loadView('notification', array_merge($data, ['len' => count($data), 'curr_time' => date("Y-m-d G:i:s")]));
            loadView('footer');
        }

        function admin() {
            $data_notice = loadModel("notification", "notice");
            $data_notification = loadModel("notification", "fetch");
            $data_banner = loadModel('contest', 'banner');
            loadView('header', array_merge($this->data,  ['title' => 'Admin Panel - Discipline']));
            loadView('admin', array_merge($data_notice, $data_banner, $data_notification, ['bannerLen' => count($data_banner), 'notificationLen' => count($data_notification), 'username' => $this->data['name'] ] ));
            loadView('footer');
        }

        function contact() {
            loadView('header', array_merge($this->data, ['title' => 'Contact Us - Shekhawati Science Classes']));
            loadView('contact');
            loadView('footer');
        }

    }
?>