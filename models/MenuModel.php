<?php
require_once("Model.php");

class MenuModel extends Model {
    
    public function fetchMenuItems() {
        $sql = "SELECT * FROM menu_items";
        $result = $this->conn->query($sql);
        $menuItems = [];

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $menuItems[] = [
                    'id' => $row['id'],
                    'label' => $row['label'],
                    'url' => $row['url'],
                    'parent_id' => $row['parent_id'],
                ];
            }
        }

        return $menuItems;
    }
}
