<?php
include "koneksi.php";
    $id = $_GET['id'];
    $name = $_POST['nama'];
    $sql = $pdo->prepare("UPDATE categories SET name='$name' WHERE id='$id'");
    $execute = $sql->execute();
    header('location:category.php');
?>