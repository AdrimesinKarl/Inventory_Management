<?php
require_once 'db.php';

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
            header("Location: product_table.php");
            exit;
        } else {
            $error = "Failed to add product.";
        }
    } else {
        $error = "All fields are required.";
    }
}
?>

<!-- HTML form -->
<form method="POST" action="add_product.php">
    <h2>Add Product</h2>
    <?php if (!empty($error)) echo "<p class='text-danger'>$error</p>"; ?>
    <div class="mb-3">
        <label for="product_name" class="form-label">Product name:</label>
        <input type="text" name="product_name" class="form-control" id="product_name">
    </div>
    <div class="mb-3">
        <label for="quantity" class="form-label">Quantity:</label>
        <input type="number" name="quantity" class="form-control" id="quantity" min="1">
    </div>
    <div class="mb-3">
        <label for="status" class="form-label">Status:</label>
        <input type="text" name="status" class="form-control" id="status">
    </div>
    <button type="submit" class="btn btn-primary">Add Product</button>
</form>
