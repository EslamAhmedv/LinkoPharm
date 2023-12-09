<?php

require_once '../includes/Dbh.php';
class MedicalModel {
    private $dbh;

    public function __construct() {
        $this->connect();
    }

    private function connect() {
        require_once '../includes/Dbh.php';
        $this->dbh = new Dbh();
        $this->dbh->connect(); 
    }

    public function filterItems($category, $price) {
       // Sample SQL query (modify as per your database structure)
       $sql = "SELECT * FROM products WHERE category = ? AND price <= ?";

       // Prepare the statement
       $stmt = $this->dbh->getconn()->prepare($sql);

       // Bind parameters
       $stmt->bind_param('ss', $category, $price);

       // Execute the query
       $stmt->execute();

       // Get the result set
       $result = $stmt->get_result();

       // Fetch the results
       $filteredItems = $result->fetch_all(MYSQLI_ASSOC);

       return $filteredItems;
    }

    public function getAllProducts()
    {
        $this->connect();

        // Sample SQL query to fetch all products
        $sql = "SELECT * FROM items";

        // Prepare the statement
        $stmt = $this->dbh->getConnection()->prepare($sql);

        // Execute the query
        $stmt->execute();

        // Get the result set
        $result = $stmt->get_result();

        // Fetch the results
        $products = $result->fetch_all(MYSQLI_ASSOC);

        return $products;
    }



}