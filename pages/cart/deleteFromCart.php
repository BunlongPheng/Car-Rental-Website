<?php
// Delete car from cart
$id = $_POST["id"];
session_start();
unset($_SESSION["cart"][$id]);

header("Location: cart.php");
?>