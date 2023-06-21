<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Update Club</title>

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
                <div class="p-5">
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Update Club</h1>
                    </div>
                    <?php
                    include "../koneksi.php";
                    $id = $_GET['id'];
                    $query_mysql = mysqli_query($conn, "SELECT * FROM tb_club WHERE id_club='$id'");
                    $nomor = 1;
                    while ($data = mysqli_fetch_array($query_mysql)) {
                    ?>
                        <form class="user" action="../aksi/aksi-update.php?update=club" method="POST">
                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <input type="text" hidden class="form-control form-control-user" id="id" name="id_club" placeholder="id" value="<?php echo $data['id_club']; ?>">
                                    <input type="text" class="form-control form-control-user" id="nama" name="nama" placeholder="nama" value="<?php echo $data['nama_club']; ?>">
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" class="form-control form-control-user" id="kota" name="kota" placeholder="kota" value="<?php echo $data['kota']; ?>">
                                </div>
                            </div>
                            <hr>
                            <input type="submit" class="btn btn-info btn-user btn-block" value="Update" name="update">
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