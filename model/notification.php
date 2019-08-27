<?php
    class notification_model {

        private $db;

        function __construct() {
            $this->db = db_connect();
        }

        function fetch($data) {
            mysqli_autocommit($this->db, FALSE);
            $sql = "SELECT * FROM notification";
			if (isset($data) && isset($data['n_id']) && !empty($data['n_id'])) $sql .= " WHERE `n_id`=".$data['n_id'];
			$sql .= " ORDER BY end_time ASC, start_time ASC";
            $result = query($this->db,$sql);
            mysqli_commit($this->db);
            db_close($this->db);
            return $result;
        }

        function notice() {
            mysqli_autocommit($this->db, FALSE);
            $sql = "SELECT * FROM notice";
            $result = query($this->db,$sql);
            mysqli_commit($this->db);
            db_close($this->db);
            return $result;
        }
    }
?>