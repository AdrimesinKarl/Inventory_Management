<?php

    namespace InventoryManagement;
    class Product {
        public $id;
        public $name;
        public $quantity;
        public $status;
    
    public function __construct( $id, $name, $quantity, $status) {
        $this->id =$id;
        $this->name = $name;
        $this->quantity = $quantity;
        $this->status= $status;
    }
    public function displayInfo() {
        echo "Product ID:" . $this->id;
        echo "Product Name:" . $this->name;
        echo "Quantity:" . $this->quantity;
        echo "Status:" . $this->status;
    }
}
    class Inventory{
        public $product;
        public function addProduct($product) {
            $this->product=$product;
        }
        public function removeProduct($product) {
            if ($this->product->id === $product) {
                unset($this->product);
            }

        }
    }
    
    $addedProduct = new Product(1, "Laptop", 10, "In Stock");
    $inventory = new Inventory();
    $inventory->addProduct($addedProduct);
    $addedProduct->displayInfo();
    $inventory->removeProduct(1);

?>