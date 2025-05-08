<?php
include 'db_connect.php';

if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit();
}

$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM products WHERE id = ?");
$stmt->execute([$id]);
$product = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$product) {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Product</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Edit Product</h1>
    <form action="process_edit.php" method="POST">
        <input type="hidden" name="id" value="<?= $product['id'] ?>">
        
        <label>Name:</label>
        <input type="text" name="name" value="<?= htmlspecialchars($product['name']) ?>" required><br>
        
        <label>Description:</label>
        <textarea name="description"><?= htmlspecialchars($product['description']) ?></textarea><br>
        
        <label>Quantity:</label>
        <input type="number" name="quantity" value="<?= $product['quantity'] ?>" required><br>
        
        <label>Price:</label>
        <input type="number" step="0.01" name="price" value="<?= $product['price'] ?>" required><br>
        
        <input type="submit" value="Update Product">
    </form>
    <a href="index.php">Back to Inventory</a>
</body>
</html>