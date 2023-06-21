<?php 
include '../koneksi.php';
$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM tb_skor WHERE id_skor='$id'");
 
header("location:../skor.php?pesan=hapus");
?>