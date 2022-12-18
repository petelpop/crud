<?php
include"function.php";  //menjalan kan dulu tetapi tetap melanjutkan input
// require"functions.php";
$pinjams = mysqli_query($con,"SELECT * FROM pinjam");



?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Peminjaman Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
  


    <div class="container">  
        <h1 class="mb-5 mt-5">Peminjaman Buku</h1>
        <!-- modal tanbah data -->
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-dark mb-2" data-bs-toggle="modal" data-bs-target="#tambahData">
            Pinjam Buku
        </button>

        <!-- Modal -->
        <div class="modal fade" id="tambahData" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Pinjam Buku</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="" method="POST">
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" name="nama" class="form-control" id="nama"
                                    aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="judul" class="form-label">Judul Buku</label>
                                <input type="text" name="judul" class="form-control" id="judul"
                                    aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="date" class="form-label">Waktu Peminjaman</label>
                                <input type="date" name="date" class=" form-control" id="date"
                                    aria-describedby="emailHelp">
                            </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="btnTambahBarang" class="btn btn-success">Simpan</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
<!-- akhir modal tanbah data -->
        <table class="table table-striped">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Judul Buku</th>
                    <th>Waktu Peminjaman</th>
                    <th>settings</th>
                </tr>
            </thead>

            <tbody class="table-group-divider">
                <?php foreach ($pinjams as $pinjam){ ?>
                <tr>
                    <td><?= $pinjam["id"] ?></td>
                    <td><?= $pinjam["nama"] ?></td>
                    <td><?= $pinjam["judul"] ?></td>
                    <td><?=  date('d-M-Y', strtotime($pinjam["date"])); ?></td>
                    <td>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                            data-bs-target="#btnHapus<?= $pinjam["id"] ?>">Hapus</button>
                        <button type="button" class="btn btn-success" data-bs-toggle="modal"
                            data-bs-target="#btnUbah<?= $pinjam["id"] ?>">Ubah</button>
                    </td>

                </tr>
<!-- awal modal hapus -->
                <!-- Button trigger modal -->

                <!-- Modal -->
                <div class="modal fade" id="btnHapus<?= $pinjam["id"] ?>" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus!</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                yakin ?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <form action="" method="post">
                                    <input name="id" type="hidden" value="<?= $pinjam["id"] ?>">
                                    <button class="btn btn-danger" name="btnHapus" type="submit">Hapus</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- akhir mudal -->

                <!-- modal ubah -->
                <div class="modal fade" id="btnUbah<?= $pinjam["id"] ?>" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Ubah Data Peminjaman!</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="" method="POST">
                                    <div class="mb-3">
                                        <label for="nama" class="form-label">Nama</label>
                                        <input type="text" name="nama" class="form-control" id="nama"
                                            aria-describedby="emailHelp" value="<?= $pinjam["nama"] ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="judul" class="form-label">Judul Buku</label>
                                        <input type="text" name="judul" class="form-control" id="judul"
                                            aria-describedby="emailHelp" value="<?= $pinjam["judul"] ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="date" class="form-label">Waktu Peminjaman</label>
                                        <input type="text" name="date" class=" form-control" id="date"
                                            aria-describedby="emailHelp" value="<?= $pinjam["date"] ?>">
                                    </div>
</div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <form action="" method="post">
                                    <input name="id" type="hidden" value="<?= $pinjam["id"] ?>">
                                    <button class="btn btn-success" name="btnUbah" type="submit">ubah</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <?php }; ?>
            </tbody>
        </table>

    </div>









    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>
<?php 
    if(isset($_POST["btnHapus"])){
        $id = $_POST["id"];
        mysqli_query($con,"DELETE FROM pinjam WHERE id = $id");
        echo "<script>
            document.location.href='index.php';
            </script>";
    }

    if(isset($_POST["btnTambahBarang"])){
            $nama = $_POST["nama"];
            $judul = $_POST["judul"];
            $date = $_POST["date"];
            
            mysqli_query($con,"INSERT INTO `pinjam`(`id`, `nama`, `judul`, `date`) VALUES (NULL,'$nama','$judul','$date')");
            echo "<script>
            document.location.href='index.php';
            </script>";
    }
    
    if(isset($_POST["btnUbah"])){
        $id = $_POST["id"];
            $nama = $_POST["nama"];
            $judul = $_POST["judul"];
            $date = $_POST["date"];
            
            mysqli_query($con,"UPDATE `pinjam` SET `nama` = '$nama', `judul` = '$judul', `date` = '$date' WHERE `pinjam`.`id` = $id;
            ");
            echo "<script>
            document.location.href='index.php';
            </script>";
    }

   
    ?>
