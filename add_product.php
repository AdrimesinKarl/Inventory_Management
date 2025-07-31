<?php
require_once 'db.php';
require_once 'add_product_form.php';

function add_product($conn, $name, $quantity, $status) {
    try {
        $sql = "INSERT INTO inventory (product_name, quantity, status) VALUES (:name, :quantity, :status)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':quantity', $quantity);
        $stmt->bindParam(':status', $status);
        return $stmt->execute();
    } catch (PDOException $e) {
        return false;
    }
}

$error = "";
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = htmlspecialchars(trim($_POST['product_name'] ?? ''));
    $quantity = intval($_POST['quantity'] ?? 0);
    $status = htmlspecialchars(trim($_POST['status'] ?? ''));

    if (!empty($name) && $quantity > 0 && !empty($status)) {
        if (add_product($conn, $name, $quantity, $status)) {
            header("Location: dashboard.php");
            exit;
        } else {
            $error = "Failed to add product.";
        }
    } else {
        $error = "All fields are required.";
    }
}
?>


