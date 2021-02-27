<?php
include "koneksi.php";
    $id = $_GET['id'];
    $name = $_POST['name'];
    $stok = $_POST['stok'];
    $fileName = $_FILES['image']['name'];
    $deskripsi = $_POST['deskripsi'];

    if(empty($fileName)){ 
            $sql = $pdo->prepare("UPDATE books SET name='$name', stok='$stok',  deskripsi='$deskripsi' WHERE id='$id'");
            $execute = $sql->execute();
            header('location:books.php');
    } else if (!empty($fileName)) {
            $sql = $pdo->prepare("UPDATE books SET image=:image, name='$name', stok='$stok',  deskripsi='$deskripsi' WHERE id='$id'");
            $sql->bindParam(':image', $fileName);
            $data = $sql->fetch();
            $execute = $sql->execute();
            move_uploaded_file($_FILES['image']['tmp_name'], "image/".$_FILES['image']['name']);
            header('location:books.php');

    }    

?>