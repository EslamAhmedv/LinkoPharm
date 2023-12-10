<?php
require_once '../includes/Dbh.php';
class MedicalController
{
    public function index()
    {
        require_once '../views/index.php';
    }

    public function filter()
    {
        require_once '../models/medicalModel.php';

        // Get parameters from the GET request
        $category = $_GET['category'] ?? '';
        $price = $_GET['price'] ?? '';

        // Fetch filtered items from the model
        $filteredItems = MedicalModel::filterItems($category, $price);

        // Render the filtered items
        $this->renderFilteredItems($filteredItems);
    }

    // Separate function for rendering filtered items
    private function renderFilteredItems($filteredItems)
    {
        // You might want to use a separate view file for rendering
        // For simplicity, echoing directly here
        foreach ($filteredItems as $item) {
            echo "<div>{$item['name']} - {$item['category']} - {$item['price']}</div>";
        }
    }

    public function getAllProducts()
    {
        require_once '../models/medicalModel.php';
        return MedicalModel::getAllProducts();
    }

    public function filterProducts($category)
    {
        require_once '../models/medicalModel.php';
        return MedicalModel::filterItems($category);
}
}
