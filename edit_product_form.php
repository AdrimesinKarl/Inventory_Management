<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #f8f9fa;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }
        .edit_product-container {
            width: 100%;
            max-width: 500px;
            background: #ffffff;
            padding: 2rem;
            border-radius: 12px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>

<?php

$name = '';
$quantity = '';
$status = '';


?>
<div class="edit_product-container">
    <form method="POST" action="edit_product.php">
        <h3 class="text-center mb-4">Edit Product</h3>

        <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">

        <div class="mb-3">
            <label for="product_name" class="form-label">Product Name:</label>
            <input type="text" name="product_name" id="product_name" class="form-control" value="<?php echo htmlspecialchars($name); ?>" required>
        </div>

        <div class="mb-3">
            <label for="quantity" class="form-label">Quantity:</label>
            <input type="number" name="quantity" id="quantity" class="form-control" value="<?php echo htmlspecialchars($quantity); ?>" min="1" required>
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status:</label>
            <input type="text" name="status" id="status" class="form-control" value="<?php echo htmlspecialchars($status); ?>" required>
        </div>

        <button type="submit" class="btn btn-warning w-100">Update Product</button>
    </form>
</div>

</body>
</html>
