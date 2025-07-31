<?php
require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $id = $_GET['id'];

    if (!is_numeric($id)) {
        echo "Invalid ID.";
        exit();
    }

    try {
        // Prepare and bind
        $stmt = $conn->prepare("DELETE FROM inventory WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        echo "<h1>Record deleted successfully.<h1>";
        
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "No ID provided.";
    exit();
}
?>
