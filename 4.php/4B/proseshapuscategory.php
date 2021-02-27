<?php
include "koneksi.php";
$id = $_GET['id']; 
$sql = $pdo->prepare("DELETE FROM categories WHERE id=:id");
$sql->bindParam(':id', $id);
$execute = $sql->execute(); 
header('location:category.php');
?>