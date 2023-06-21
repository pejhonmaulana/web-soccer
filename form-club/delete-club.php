<?php 
include '../koneksi.php';
$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM tb_club WHERE id_club='$id'");
 
header("location:../club.php?pesan=hapus");
?>