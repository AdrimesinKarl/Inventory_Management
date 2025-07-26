<?php
require_once 'db.php';

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

<form method="POST" action="edit.php">
    <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">
    <h2>Edit Product</h2>

    <div class="mb-3">
        <label for="product_name">Product Name:</label>
        <input type="text" name="product_name" class="form-control" value="<?php echo htmlspecialchars($name); ?>">
    </div>
    <div class="mb-3">
        <label for="quantity">Quantity:</label>
        <input type="number" name="quantity" class="form-control" value="<?php echo htmlspecialchars($quantity); ?>">
    </div>
    <div class="mb-3">
        <label for="status">Status:</label>
        <input type="text" name="status" class="form-control" value="<?php echo htmlspecialchars($status); ?>">
    </div>
    <button type="submit" class="btn btn-primary">Update
