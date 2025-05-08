<?php
include 'db_connect.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    try {
        $stmt = $pdo->prepare("DELETE FROM products WHERE id = ?");
        $stmt->execute([$id]);
        
        header("Location: index.php?message=Product+deleted+successfully");
        exit();
    } catch (PDOException $e) {
        die("Error deleting product: " . $e->getMessage());
    }
} else {
    header("Location: index.php");
    exit();
}
?>