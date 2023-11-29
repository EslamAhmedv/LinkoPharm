<?php


class dbcon{
	// private $servername;
	// private $username;
	// private $password;
	// private $dbname;

	// private $conn;
	// private $result;
	// public $sql;

	public function __construct() {
		// $this->servername = DB_SERVER;
		// $this->username = DB_USER;
		// $this->password = DB_PASS;
		// $this->dbname = DB_DATABASE;
		// $this->connect();
        $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
		if ($conn->connect_error) {
			die("<h3>wronggggggggggggg</h3>");
		}
        echo"connected successsssssssssssssssssssss";
		return $this->conn = $conn;
	}
}
?>