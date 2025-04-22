<?php
include 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];
    
    try {
        $stmt = $pdo->prepare("INSERT INTO products (name, description, quantity, price) VALUES (?, ?, ?, ?)");
        $stmt->execute([$name, $description, $quantity, $price]);
        
        header("Location: index.php?message=Product+added+successfully");
        exit();
    } catch (PDOException $e) {
        die("Error adding product: " . $e->getMessage());
    }
} else {
    header("Location: add_product.php");
    exit();
}
?>