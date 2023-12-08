<?php

class MedicalModel
{
    private static $dbh;

    private static function connect()
    {
        if (!isset(self::$dbh)) {
            require_once 'Dbh.php';
            self::$dbh = Dbh::getInstance();
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

        $stmt = self::$dbh->prepare($sql);

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
