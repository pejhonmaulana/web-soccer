<?php
$update = $_GET['update'];

if ($update == 'club') {
    // filter data yang diinputkan
    $id = $_POST['id_club'];
    $nama = $_POST['nama'];
    $kota = $_POST['kota'];

    include "../koneksi.php";
    $sql = "UPDATE tb_club SET nama_club='$nama', kota='$kota' WHERE id_club='$id'";
    if ($conn->query($sql) === TRUE) {
        header("Location:../club.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Tutup conn
    $conn->close();
}elseif ($update == 'skor') {
    include '../koneksi.php';
    $id_skor = $_POST['id_skor'];
    $timA = $_POST['timA'];
    $timB = $_POST['timB'];
    $skorA = $_POST['skorA'];
    $skorB = $_POST['skorB'];


    if (empty($timA) || empty($timB) || empty($skorA) || empty($skorB)) {
        echo "Silakan lengkapi semua field!";
    } else {
        
            if ($skorA > $skorB) {
                $pemenang = $timA;
                $kalah = $timB;
                $skorPemenang = $skorA;
                $skorKalah = $skorB;
                $poinPemenang = "3";
                $poinKalah = "0";
            } elseif ($skorB > $skorA) {
                $pemenang = $timB;
                $kalah = $timA;
                $skorPemenang = $skorB;
                $skorKalah = $skorA;
                $poinPemenang = "3";
                $poinKalah = "0";
            } else {
                $pemenang = $timA;
                $kalah = $timB;
                $skorPemenang = $skorA;
                $skorKalah = $skorB;
                $poinPemenang = "1";
                $poinKalah = "1";
            }

            // Menyimpan skor pertandingan ke dalam tabel database
                $sql = "UPDATE tb_skor SET id_clubA='$timA', id_clubB='$timB', skorA='$skorA', skorB='$skorB',
                pemenang_id= '$pemenang', skor_pemenang='$skorPemenang', poin_pemenang='$poinPemenang', 
                kalah_id='$kalah', skor_kalah='$skorKalah', poin_kalah='$poinKalah' WHERE id_skor = '$id_skor'";

                if ($conn->query($sql) === true) {
                    header('location:../skor.php');
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            
        }
    $conn->close();
}
