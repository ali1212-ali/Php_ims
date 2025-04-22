<?php include 'db_connect.php'; ?>
<!DOCTYPE html>
<html>
<head>


    <title>Inventory System</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <h1 style="color:red" >Product Inventory </h1>
    <a href="add_product.php">Add New Product</a>
    
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Actions</th>
        </tr>
        <?php
        $stmt = $pdo->query("SELECT * FROM products");
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['name']}</td>
                <td>{$row['description']}</td>
                <td>{$row['quantity']}</td>
                <td>{$row['price']}</td>
                <td>
                    <a href='edit_product.php?id={$row['id']}'>Edit</a> | 
                    <a href='delete_product.php?id={$row['id']}' onclick='return confirm(\"Are you sure?\")'>Delete</a>
                </td>
            </tr>";
        }
        ?>
    </table>
</body>
</html>