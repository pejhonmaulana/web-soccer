<?php

$tambah = $_GET['tambah'];
if ($tambah == 'club') {
    // filter data yang diinputkan
    $nama = $_POST['nama'];
    $kota = $_POST['kota'];

    include "../koneksi.php";
    foreach ($nama as $key => $value) {
        $sql = "INSERT INTO tb_club (nama_club, kota) VALUES ('$value', '$kota[$key]')";
        if ($conn->query($sql) === TRUE) {
            header("Location:../club.php");
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    // Tutup conn
    $conn->close();
} elseif ($tambah == 'skor') {
    // Filter data yang diinputkan
    $timA = $_POST['timA'];
    $timB = $_POST['timB'];
    $skorA = $_POST['skorA'];
    $skorB = $_POST['skorB'];

    include '../koneksi.php';
    // Validasi input
    if (empty($timA) || empty($timB) || empty($skorA) || empty($skorB)) {
        echo "Silakan lengkapi semua field!";
    } else {
        // Cek apakah skor pertandingan sudah ada dalam database
        $sql = "SELECT * FROM tb_skor WHERE id_clubA IN (" . implode(",", $timA) . ") AND id_clubB='$timB' AND skorA='$skorA' AND skorB='$skorB'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "Skor pertandingan sudah ada dalam database!";
        } else {
            // Menentukan pemenang dan poin
            // Menentukan pemenang dan poin
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
            foreach ($timA as $key => $idClubA) {
                $sql = "INSERT INTO tb_skor (id_clubA, id_clubB, skorA, skorB, pemenang_id, skor_pemenang, poin_pemenang, kalah_id, skor_kalah, poin_kalah)
            VALUES ('$idClubA', '$timB[$key]', '$skorA[$key]', '$skorB[$key]', '$pemenang[$key]', '$skorPemenang[$key]', '$poinPemenang[$key]', '$kalah[$key]', '$skorKalah[$key]', '$poinKalah[$key]')";

                if ($conn->query($sql) === true) {
                    header('location:../skor.php');
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            }
        }
    }
    // Tutup conn
    $conn->close();
}