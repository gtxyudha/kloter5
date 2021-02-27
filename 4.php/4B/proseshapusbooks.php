<?php
include "koneksi.php";
$id = $_GET['id'];
$sql = $pdo->prepare("SELECT image FROM books WHERE id=:id");
$sql->bindParam(':id', $id);
$sql->execute(); 
$data = $sql->fetch(); 
if(is_file("image/".$data['image'])) 
  unlink("image/".$data['image']); 
$sql = $pdo->prepare("DELETE FROM books WHERE id=:id");
$sql->bindParam(':id', $id);
$execute = $sql->execute(); 
if($execute){ 
  header("location: books.php"); 
}else{
  echo "Data gagal dihapus. <a href='books.php'>Kembali</a>";
}

?>