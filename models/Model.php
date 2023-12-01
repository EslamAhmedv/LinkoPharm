<?php
session_start();
require_once("../includes/Dbh.php");
abstract class Model{ 
    protected $db;
    protected $conn;

    public function __construct() {
        $this->db = new Dbh();
        $this->conn = $this->db->getConn();
    }

}
?>