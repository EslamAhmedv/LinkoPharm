<?php

class MedicalController
{
    public function index()
    {
        require_once '../views/index.php';
    }

    public function filter()
    {
        require_once '../models/medicalModel.php';

        $category = $_GET['category'];
        $price = $_GET['price'];

        $filteredItems = MedicalModel::filterItems($category, $price);

        // Render the filtered items directly here
        foreach ($filteredItems as $item) {
            echo "<div>{$item['name']} - {$item['category']} - {$item['price']}</div>";
        }
    }
}
