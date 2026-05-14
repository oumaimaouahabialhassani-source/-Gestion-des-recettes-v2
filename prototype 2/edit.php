<?php
require 'db.php';

$id = $_GET['id'];

$sql = "SELECT * FROM products WHERE id=?";

$stmt = $pdo->prepare($sql);

$stmt->execute([$id]);

$product = $stmt->fetch();

if(isset($_POST['update'])) {

    $name = $_POST['name'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];

    $sql = "UPDATE products
            SET name=?, price=?, quantity=?
            WHERE id=?";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([$name, $price, $quantity, $id]);

    header("Location: index.php");
}
?>

<h2>Modifier Plat</h2>

<form method="POST">

Nom :
<input type="text" name="name"
value="<?= $product['name'] ?>"><br><br>

Prix :
<input type="text" name="price"
value="<?= $product['price'] ?>"><br><br>

Quantité :
<input type="text" name="quantity"
value="<?= $product['quantity'] ?>"><br><br>

<button type="submit" name="update">
Modifier
</button>

</form>