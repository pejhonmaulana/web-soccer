<?php
include "header.php"
?>

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Klasemen Sementara</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Klasemen Sementara</h6>
        </div>
        <div class="card-body">
            <!-- <a href="form-rute/tambah-rute.php" class="btn btn-info btn-icon-split">
                <span class="icon text-white-50">
                    <i class="fas fa-solid fa-plus"></i>
                </span>
                <span class="text">Tambah Rute</span>
            </a> -->
            <div class="my-2"></div>
            <div class="table-responsive">
                <table class="table table-bordered" id="myTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Klub</th>
                            <th>Main</th>
                            <th>Menang</th>
                            <th>Seri</th>
                            <th>Kalah</th>
                            <th>Gol Menang</th>
                            <th>Gol Kalah</th>
                            <th>Poin</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include "koneksi.php";
                        $no = 1;
                        $sql = "SELECT c.nama_club AS klub, COUNT(*) AS Ma, 
                                SUM(CASE WHEN s.pemenang_id = c.id_club THEN 1 ELSE 0 END) AS Me,
                                SUM(CASE WHEN s.pemenang_id IS NULL THEN 1 ELSE 0 END) AS S,
                                SUM(CASE WHEN s.kalah_id = c.id_club THEN 1 ELSE 0 END) AS K,
                                SUM(CASE WHEN s.pemenang_id = c.id_club THEN s.skorA ELSE 0 END) AS GM,
                                SUM(CASE WHEN s.kalah_id = c.id_club THEN s.skorB ELSE 0 END) AS GK,
                                SUM(CASE WHEN s.pemenang_id = c.id_club THEN 3 WHEN s.pemenang_id IS NULL THEN 1 ELSE 0 END) AS Point
                                FROM tb_club c
                                LEFT JOIN tb_skor s ON c.id_club IN (s.id_clubA, s.id_clubB)
                                GROUP BY c.id_club
                                ORDER BY Point DESC, GM DESC";
                        $result = $conn->query($sql);
                        while ($data = $result->fetch_assoc()) { ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $data['klub']; ?></td>
                                <td><?php echo $data['Ma']; ?></td>
                                <td><?php echo $data['Me']; ?></td>
                                <td><?php echo $data['S']; ?></td>
                                <td><?php echo $data['K']; ?></td>
                                <td><?php echo $data['GM']; ?></td>
                                <td><?php echo $data['GK']; ?></td>
                                <td><?php echo $data['Point']; ?></td>
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