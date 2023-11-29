<?php


class dbcon{


	public function __construct() {
        $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
		if ($conn->connect_error) {
			die("<h3>wronggggggggggggg</h3>");
		}
        echo"connected successsssssssssssssssssssss";
		return $this->conn = $conn;
	}
}
?>