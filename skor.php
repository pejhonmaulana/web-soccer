<?php
include "header.php"
?>

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Data Skor</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Skor</h6>
        </div>
        <div class="card-body">
            <a href="form-skor/tambah-skor.php" class="btn btn-info btn-icon-split">
                <span class="icon text-white-50">
                    <i class="fas fa-solid fa-plus"></i>
                </span>
                <span class="text">Tambah Skor</span>
            </a>
            <div class="my-2"></div>
            <div class="table-responsive">
                <table class="table table-bordered" id="myTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Club A</th>
                            <th>Nama Club B</th>
                            <th>Skor Club A</th>
                            <th>Skor Club B</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include "koneksi.php";
                        $no = 1;
                        $sql = "SELECT * FROM tb_skor";
                        $stmt = $conn->query($sql);
                        while ($data = $stmt->fetch_assoc()) {
                            $id_A = $data['id_clubA'];
                            $id_B = $data['id_clubB'];
                        ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <?php
                                $sql_club_A = mysqli_query($conn, "SELECT * FROM tb_club where id_club = $id_A");
                                while ($a = mysqli_fetch_assoc($sql_club_A)) { ?>
                                    <td><?php echo $a['nama_club']; ?></td>
                                <?php
                                }
                                ?>
                                <?php
                                $sql_club_B = mysqli_query($conn, "SELECT * FROM tb_club where id_club = $id_B");
                                while ($b = mysqli_fetch_assoc($sql_club_B)) { ?>
                                    <td><?php echo $b['nama_club']; ?></td>
                                <?php
                                }
                                ?>
                                <td><?php echo $data['skorA']; ?></td>
                                <td><?php echo $data['skorB']; ?></td>
                                <td>
                                    <a href="form-skor/update-skor.php?id=<?php echo $data['id_skor']; ?>" class="btn btn-warning btn-circle btn-sm">
                                        <i class="fas fa-exclamation-triangle"></i>
                                    </a>
                                    <a href="form-skor/aksi-delete-skor.php?id=<?php echo $data['id_skor']; ?>" class="btn btn-danger btn-circle btn-sm">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            <?php
                        }
                            ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
<?php
include "footer.php";
?>