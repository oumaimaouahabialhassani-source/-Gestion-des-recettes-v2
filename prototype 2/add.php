<?php
require 'db.php';

if(isset($_POST['add'])) {

    $name = $_POST['name'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];

    $sql = "INSERT INTO products(name, price, quantity)
            VALUES(?, ?, ?)";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([$name, $price, $quantity]);

    header("Location: index.php");
}
?>

<h2>Ajouter Plat</h2>

<form method="POST">

Nom :
<input type="text" name="name"><br><br>

Prix :
<input type="text" name="price"><br><br>

Quantité :
<input type="text" name="quantity"><br><br>

<button type="submit" name="add">
Ajouter
</button>

</form>