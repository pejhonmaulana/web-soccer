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
            <div class="card-body p-0">

                <div class="p-5">
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Update Skor</h1>
                    </div>
                    <?php
                    include "../koneksi.php";
                    $id = $_GET['id'];
                    $query_mysql = mysqli_query($conn, "SELECT * FROM tb_skor WHERE id_skor='$id'");
                    $nomor = 1;
                    while ($data = mysqli_fetch_array($query_mysql)) {
                        $id_clubA = $data['id_clubA'];
                        $id_clubB = $data['id_clubB'];
                        $skorA = $data['skorA'];
                        $skorB = $data['skorB'];
                    ?>
                        <form class="user" action="../aksi/aksi-update.php?update=skor" method="POST">
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="text" hidden class="form-control form-control-user" id="id_skor" name="id_skor" placeholder="id_skor" value="<?php echo $data['id_skor']; ?>">
                                    <select class="form-select form-control" name="timA" aria-label="Default select example">
                                        <?php
                                        include '../koneksi.php';
                                        $query_club = mysqli_query($conn, "SELECT * FROM tb_club where id_club=$id_clubA");
                                        while ($data = mysqli_fetch_array($query_club)) {
                                            $club = $data['nama_club'];
                                        ?>
                                            <option selected value=""><?php echo $club; ?></option>
                                        <?php
                                        }
                                        ?>
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
                                    </select>
                                </div>
                                <div class="col-sm-6">
                                <select class="form-select form-control" name="timB" aria-label="Default select example">
                                        <?php
                                        include '../koneksi.php';
                                        $query_club = mysqli_query($conn, "SELECT * FROM tb_club where id_club=$id_clubB");
                                        while ($data = mysqli_fetch_array($query_club)) {
                                            $club = $data['nama_club'];
                                        ?>
                                            <option selected value=""><?php echo $club; ?></option>
                                        <?php
                                        }
                                        ?>
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
                                    </select></div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="text" class="form-control form-control-user" id="skorA" name="skorA" placeholder="skorA" value="<?php echo $skorA; ?>">
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control form-control-user" id="skorB" name="skorB" placeholder="skorB" value="<?php echo $skorB; ?>">
                                </div>
                            </div>
                            <hr>
                            <input type="submit" class="btn btn-info btn-user btn-block" value="Update" name="update-rute">
                            <hr>
                        </form>
                    <?php
                    }
                    ?>
                </div>
            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>