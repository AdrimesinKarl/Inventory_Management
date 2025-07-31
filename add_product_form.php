<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="add_product-container">
<form action="add_product.php" method="POST">
    <h3 class="text-center mb-4">Add product</h3>
    
    <?php if (!empty($error)) echo "<p class='text-danger'>$error</p>"; ?>
    
    <div class="mb-3">
        <label for="product_name" class="form-label">Product name:</label>
        <input type="text" name="product_name" class="form-control" id="product_name" required>
    </div>
    
    <div class="mb-3">
        <label for="quantity" class="form-label">Quantity:</label>
        <input type="number" name="quantity" class="form-control" id="quantity" min="1" required>
    </div>
    
    <div class="mb-3">
        <label for="status" class="form-label">Status:</label>
        <input type="text" name="status" class="form-control" id="status" required>
    </div>
    
    <button type="submit" class="btn btn-success w-100">Add Product</button>
</form>
</div>
</body>
</html>

<style>
        body {
            background: #f8f9fa;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }
        .add_product-container {
            width: 100%;
            max-width: 500px;
            background: #ffffff;
            padding: 2rem;
            border-radius: 12px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
        }
    </style>