<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['product_name'], $_POST['quantity'], $_POST['status'])) {
    $name = htmlspecialchars(trim($_POST['product_name']));
    $quantity = intval($_POST['quantity']);
    $status = htmlspecialchars(trim($_POST['status'])); // or default to 'Available'

    try {
        if (addProduct($conn, $name, $quantity, $status)) {
            header("");
            exit();
        } else {
            echo "Failed to add product.";
        }
    } catch (PDOException $e) {
        echo "Database Error: " . $e->getMessage();
    }
}
?>
