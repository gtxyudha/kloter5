<?php
include "koneksi.php";
$name = $_POST['namebooks'];
$stok = $_POST['stok'];
$fileName = $_FILES['image']['name'];
$deskripsi = $_POST['deskripsi'];
$categoryid = $_POST['categoryid'];


$sql = $pdo->prepare("INSERT INTO books(name, stok, image, deskripsi, category_id) VALUES(:name,:stok,:image,:deskripsi,:category)");
$sql->bindParam(':name', $name);
$sql->bindParam(':stok', $stok);
$sql->bindParam(':image', $fileName);
$sql->bindParam(':deskripsi', $deskripsi);
$sql->bindParam(':category', $categoryid);
$sql->execute();
move_uploaded_file($_FILES['image']['tmp_name'], "image/".$_FILES['image']['name']); 
if($sql){ 
  header("location: books.php"); 
}else{
  echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
  echo "<br><a href='tambahbooks.php'>Kembali Ke Form</a>";
}
?>