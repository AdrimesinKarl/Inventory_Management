<?php

require_once 'db.php';
?>

<table class="table">
<thead>
    <tr>
        <th scope="col">Product_name</th>
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
                <a href='edit_product.php?id={$row['id']}'>Edit</a>
                <a href='delete_product.php?id={$row['id']}'>Delete</a>
            </td>
        </tr>";
}
?>
</tbody>
</table>

