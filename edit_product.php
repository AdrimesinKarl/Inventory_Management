<?php
require_once 'db.php';
require_once 'edit_product_form.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $name = $_POST['product_name'];
    $quantity = $_POST['quantity'];
    $status = $_POST['status'];

    try {
        $sql = "UPDATE inventory SET product_name = :name, quantity = :quantity, status = :status WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':quantity', $quantity);
        $stmt->bindParam(':status', $status);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        header("Location: product_table.php");
        exit();
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

} elseif (isset($_GET['id'])) {
    
    $id = $_GET['id'];
    $stmt = $conn->prepare("SELECT * FROM inventory WHERE id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $product = $stmt->fetch();

    if (!$product) {
        echo "Product not found.";
        exit();
    }

    $name = $product['product_name'];
    $quantity = $product['quantity'];
    $status = $product['status'];
} else {
    echo "No ID provided.";
    exit();
}
?>

