<?php

class MedicalModel
{
    public static function filterItems($category, $price)
    {
        // Replace this with your actual database connection code
        $pdo = new PDO("mysql:host=localhost;dbname=your_database", "your_username", "your_password");

        $sql = "SELECT * FROM medical_items WHERE 1";

        if ($category != 'all') {
            $sql .= " AND category = '$category'";
        }

        if (!empty($price)) {
            $sql .= " AND price <= $price";
        }

        $stmt = $pdo->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
