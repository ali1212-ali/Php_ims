<!DOCTYPE html>
<html>
<head>
    <title>Add Product</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Add New Product</h1>
    <form action="process_add.php" method="POST">
        <label>Name:</label>
        <input type="text" name="name" required><br>
        
        <label>Description:</label>
        <textarea name="description"></textarea><br>
        
        <label>Quantity:</label>
        <input type="number" name="quantity" required><br>
        
        <label>Price:</label>
        <input type="number" step="0.01" name="price" required><br>
        
        <input type="submit" value="Add Product">
    </form>
    <a href="index.php">Back to Inventory</a>
</body>
</html>