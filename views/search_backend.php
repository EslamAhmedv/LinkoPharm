<?php
// Connect to your database
// Assuming $conn is your database connection
require_once("../includes/Dbh.php");
  
if (isset($_GET['search'])) {
    $searchTerm = $_GET['search'];
global $conn;
    // Perform a database query based on the search term
    $query = "SELECT * FROM products WHERE ID LIKE '%$searchTerm%'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                // Display search results (You can modify this according to your HTML structure)
                echo '<p>' . $row['productName'] . '</p>';
            }
        } else {
            echo '<p>No results found</p>';
        }
    } else {
        echo '<p>Error executing the search</p>';
    }
} else {
    echo '<p>No search term provided</p>';
}



?>

