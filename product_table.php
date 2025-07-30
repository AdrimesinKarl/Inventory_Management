<?php require_once 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Table</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">

<div class="container">
    <h2 class="mb-4">Inventory Table</h2>

    <div class="d-flex justify-content-end mb-3 gap">
        <button onclick="location.href='add_product.php'" class="btn btn-success">Add Product</button>
    
    </div>

    <div class="table-responsive-md">
        <table class="table table-bordered table-striped table-hover table-sm border-primary">
            <thead class="table-primary">
                <tr>
                    <th scope="col">Product Name</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Status</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $stmt = $conn->query("SELECT * FROM inventory");
                while ($row = $stmt->fetch()) {
                    echo "<tr>
                            <td>{$row['product_name']}</td>
                            <td>{$row['quantity']}</td>
                            <td>{$row['status']}</td>
                            <td>
                                <a href='edit_product.php?id={$row['id']}' class='btn btn-sm btn-warning me-1'>Edit</a>
                                <a href='delete_product.php?id={$row['id']}' class='btn btn-sm btn-danger' onclick=\"return confirm('Are you sure you want to delete this product?')\">Delete</a>
                            </td>
                        </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>
