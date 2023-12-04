<?php 

include '../models/ProductsModel.php';

class ProductController {

    private $productsModel;

    public function __construct() {
        $this->productsModel = new ProductsModel();
    }

    public function addProduct() {
        $name = $_POST['name'];
        $price = $_POST['price'];
        $description = $_POST['description'];
        $category = $_POST['category'];
        $availability = $_POST['availability'];
        $file = $_FILES["image"];
        $uploaddirectory = "../public/uploads/";

        if (move_uploaded_file($file["tmp_name"], $uploaddirectory . $file["name"])) {
            $uploadedfileName = $file["name"];
            $fileurl = $uploaddirectory . $uploadedfileName;
            return $this->productsModel->addProduct($fileurl, $name, $availability, $price, $description, $category);
        } else {
            return false;
        }
    }

    public function updateProduct() {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $price = $_POST['price'];
        $description = $_POST['description'];
        $category = $_POST['category'];
        $availability = $_POST['availability'];
        $file = $_FILES["image"];
        $uploaddirectory = "../public/uploads/";

        if (move_uploaded_file($file["tmp_name"], $uploaddirectory . $file["name"])) {
            $uploadedfileName = $file["name"];
            $fileurl = $uploaddirectory . $uploadedfileName;
            return $this->productsModel->updateProduct($id, $fileurl, $name, $availability, $price, $description, $category);
        } else {
            return false;
        }
    }

    public function deleteProduct() {
        $productId = $_POST['productId'];
        if ($this->productsModel->deleteProduct($productId)) {
            header("Location: displayproducts.php?message=Product deleted successfully");
            exit;
        } else {
            echo "Error: Unable to delete product";
        }
    }

    public function getAllProducts() {
        return $this->productsModel->getAllProducts();
    }

    public function getProductById($id) {
        return $this->productsModel->getProductById($id);
    }
    public function searchProducts($searchTerm) {
        return $this->productsModel->searchProducts($searchTerm);
    }
    

}

?>
