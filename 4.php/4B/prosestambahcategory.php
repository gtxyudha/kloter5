<?php
include "koneksi.php";
$name = $_POST['name'];
$sql = $pdo->prepare("INSERT INTO categories(name) VALUES(:name)");
$sql->bindParam(':name', $name);
$sql->execute();
if($sql){ 
  header("location: category.php"); 
}else{
  echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
  echo "<br><a href='form_simpan.php'>Kembali Ke Form</a>";
}
?>