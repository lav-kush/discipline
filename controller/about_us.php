<?php

    class about_us {
        private $data = array();
        function __construct() {
            session_start();
            if(isset($_SESSION) && !empty($_SESSION) && isset($_SESSION['user_id']) && !empty($_SESSION['user_id']))
            {
                $this->data = $_SESSION;
            }
        }

        function main() {
            loadView('header', array_merge($this->data, ['title' => 'About_us - Discipline']));
            loadView('about_us_sidebar');
            loadView('about_us');
            loadView('footer');
        }

        function staff_members() {
            loadView('header', array_merge($this->data, ['title' => 'About_us - Discipline']));
            loadView('about_us_sidebar');
            loadView('about_us_staff_members');
            loadView('footer');
        }

        function toppers_view_jet() {
            loadView('header', array_merge($this->data, ['title' => 'About_us - Discipline']));
            loadView('about_us_sidebar');
            loadView('about_us_jet_result_2018');
            loadView('footer');
        }

        function toppers_view_icar() {
            loadView('header', array_merge($this->data, ['title' => 'About_us - Discipline']));
            loadView('about_us_sidebar');
            loadView('about_us_icar_result_2018');
            loadView('footer');
        }

    }
?>