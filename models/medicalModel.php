<?php
class medicalModel
{
    private static $pdo;

    // Database connection
    private static function connect()
    {
        if (!isset(self::$pdo)) {
            try {
                self::$pdo = new PDO("mysql:host=localhost;dbname=your_database", "root", ""); // Assuming the default XAMPP credentials
                self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die("Connection failed: " . $e->getMessage());
            }
        }
    }

    public static function filterItems($category, $price)
    {
        self::connect();

        $sql = "SELECT * FROM medical_items WHERE 1";

        if ($category != 'all') {
            $sql .= " AND category = :category";
        }

        if (!empty($price)) {
            $sql .= " AND price <= :price";
        }

        $stmt = self::$pdo->prepare($sql);

        if ($category != 'all') {
            $stmt->bindParam(':category', $category);
        }

        if (!empty($price)) {
            $stmt->bindParam(':price', $price);
        }

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
