<?php
    session_start(); // Start the session to access session variables
    require_once 'db.php';
    require_once 'product_table.php';



?>

<button onclick="location.href='logout.php'" class="btn btn-danger">Logout</button>
<button onclick="location.href='add_product.php'" class="btn btn-success">Add Product</button>
