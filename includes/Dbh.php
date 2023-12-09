<?php

require_once("config.php");
class DBh{
	private $servername;
	private $username;
	private $password;
	private $dbname;

	private $conn;
	private $result;
	public $sql;

	function __construct() {
		$this->servername = DB_SERVER;
		$this->username = DB_USER;
		$this->password = DB_PASS;
		$this->dbname = DB_DATABASE;
		try {
            $this->connection = new PDO("mysql:host=localhost;dbname=$this->dbname", "$this->username", "$this->password");
            // Other database connection setup goes here
        } catch (PDOException $e) {
            die("Database connection failed: " . $e->getMessage());
        }
    }


	
	public static function getInstance() {
        if (!isset(self::$instance) || self::$instance === null) {
            echo "Creating a new instance of DBh\n"; // Debug output
            self::$instance = new static();
            self::$instanceCreated = true;  // Set the flag to true
        } else {
            echo "Using existing instance of DBh\n"; // Debug output
        }
        return self::$instance;
    }
	public function connect(){
		$this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
		if ($this->conn->connect_error) {
			die("Connection failed: " . $this->conn->connect_error);
		}
		return $this->conn;
	}

	public function getConn(){
		return $this->conn;
	}

	function query($sql){
		if (!empty($sql)){
			$this->sql = $sql;
			$this->result = $this->conn->query($sql);
			return $this->result;
		}
		else{
			return false;
		}
	}

	function fetchRow($result=""){
		if (empty($result)){ 
			$result = $this->result; 
		}
		return $result->fetch_assoc();
	}

	
    public function __destruct() {
        // Close the database connection when the object is destroyed
        $this->connection = null;
    }
}
?>