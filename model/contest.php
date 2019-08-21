<?php
    function sortByScore($a, $b) {
            return $b['total_score'] - $a['total_score'];
    }
    class contest_model {

        private $db;

        function __construct() {
            $this->db = db_connect();
        }

		function banner() {
            mysqli_autocommit($this->db, FALSE);
			// $sql = "SELECT * FROM (banner b JOIN contest c ON b.c_id=c.c_id)";
            $sql = "SELECT * FROM banner";
            $result = query($this->db,$sql);
            mysqli_commit($this->db);
            db_close($this->db);
            return $result;
		}

        function fetch($data) {
            mysqli_autocommit($this->db, FALSE);
            $sql = "SELECT * FROM contest";
			if (isset($data) && isset($data['c_id']) && !empty($data['c_id'])) $sql .= " WHERE `c_id`=".$data['c_id'];
			$sql .= " ORDER BY end_time ASC, start_time ASC";
            $result = query($this->db,$sql);
            mysqli_commit($this->db);
            db_close($this->db);
            return $result;
        }

        
    }
?>