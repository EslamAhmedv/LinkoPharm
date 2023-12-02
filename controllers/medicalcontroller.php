<?php

class MedicalController
{
    public function index()
    {
        
        require_once 'views/index.php';
    }

    public function filter()
    {
        
        require_once 'models/MedicalModel.php';

        
        $category = $_GET['category'];
        $price = $_GET['price'];

       
        $filteredItems = MedicalModel::filterItems($category, $price);

      
        require_once 'views/filteredItems.php';
    }
}