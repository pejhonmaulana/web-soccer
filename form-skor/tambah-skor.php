<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Register</title>

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body">
                <!-- Nested Row within Card Body -->

                <!-- <div class="col-lg-5 d-none d-lg-block">
                        <img src="" alt="">
                    </div> -->
                <div class="col-lg-0">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Tambah Clubs</h1>
                        </div>
                        <form action="../aksi/aksi-tambah.php?tambah=skor" method="POST">
                            <table class="table table-bordered" id="idtabel">
                                <thead>
                                    <tr>
                                        <th>Tim A</th>
                                        <th>Tim B</th>
                                        <th>Skor Tim A</th>
                                        <th>Skor Tim B</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><select class="form-select form-control" name="timA[]" aria-label="Default select example">
                                                <option selected>Pilih Tim A</option>
                                                <?php
                                                include '../koneksi.php';
                                                $query_club = mysqli_query($conn, "SELECT * FROM tb_club");
                                                while ($data = mysqli_fetch_array($query_club)) {
                                                    $id_club = $data['id_club'];
                                                    $club = $data['nama_club'];
                                                ?>
                                                    <option value="<?php echo $id_club; ?>"><?php echo $club; ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select></td>
                                        <td><select class="form-select form-control" name="timB[]" aria-label="Default select example">
                                                <option selected>Pilih Tim B</option>
                                                <?php
                                                include '../koneksi.php';
                                                $query_club = mysqli_query($conn, "SELECT * FROM tb_club");
                                                while ($data = mysqli_fetch_array($query_club)) {
                                                    $id_club = $data['id_club'];
                                                    $club = $data['nama_club'];
                                                ?>
                                                    <option value="<?php echo $id_club; ?>"><?php echo $club; ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select></td>
                                        <td><input type="text" class="col-sm-12 form-control form-control-user" id="skor" name="skorA[]" placeholder="Skor Tim A"></td>
                                        <td><input type="text" class="col-sm-12 form-control form-control-user" id="skor" name="skorB[]" placeholder="Skor Tim B"></td>
                                        <td><input type="button" class="btn btn-primary btn-block" name="tambah" value="Tambah" id="tambah"></td>
                                    </tr>
                            </table>
                            <hr>
                            <input type="submit" class="btn btn-info btn-user btn-block" value="Simpan" name="tambah-mobil">
                            <hr>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {

            var html = `<tr>
    <td><select class="form-select form-control" name="timA[]" aria-label="Default select example">
            <option selected>Pilih Tim A</option>
            <?php
            include '../koneksi.php';
            $query_club = mysqli_query($conn, "SELECT * FROM tb_club");
            while ($data = mysqli_fetch_array($query_club)) {
                $id_club = $data['id_club'];
                $club = $data['nama_club'];
            ?>
                <option value="<?php echo $id_club; ?>"><?php echo $club; ?></option>
            <?php
            }
            ?>
        </select></td>
    <td><select class="form-select form-control" name="timB[]" aria-label="Default select example">
            <option selected>Pilih Tim B</option>
            <?php
            include '../koneksi.php';
            $query_club = mysqli_query($conn, "SELECT * FROM tb_club");
            while ($data = mysqli_fetch_array($query_club)) {
                $id_club = $data['id_club'];
                $club = $data['nama_club'];
            ?>
                <option value="<?php echo $id_club; ?>"><?php echo $club; ?></option>
            <?php
            }
            ?>
        </select></td>
    <td><input type="text" class="col-sm-12 form-control form-control-user" id="skor" name="skorA[]" placeholder="Skor Tim A"></td>
    <td><input type="text" class="col-sm-12 form-control form-control-user" id="skor" name="skorB[]" placeholder="Skor Tim B"></td>
    <td><input type="button" class="btn btn-danger btn-block" name="hapus" value="hapus" id="hapus"></td>
</tr>`;

            var y = 1;
            var maks = 5;
            $("#tambah").click(function() {
                if (y <= maks) {
                    $("#idtabel").append(html);
                    y++;
                }
            });
            $("#idtabel").on('click', '#hapus', function() {
                $(this).closest('tr').remove();
                y--;
            });

        });
    </script>

</body>

</html>