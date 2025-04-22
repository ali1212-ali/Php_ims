<?php
include 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];
    
    try {
        $stmt = $pdo->prepare("UPDATE products SET name = ?, description = ?, quantity = ?, price = ? WHERE id = ?");
        $stmt->execute([$name, $description, $quantity, $price, $id]);
        
        header("Location: index.php?message=Product+updated+successfully");
        exit();
    } catch (PDOException $e) {
        die("Error updating product: " . $e->getMessage());
    }
} else {
    header("Location: index.php");
    exit();
}
?>