<?php
require('upload.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $file = "book.txt";

    $kodeBuku = $_POST["kodeBuku"];
    $judulBuku = $_POST["judulBuku"];
    $pengarang = $_POST["pengarang"];
    $tahunTerbit = $_POST["tahunTerbit"];
    $jumlahHalaman = $_POST["jumlahHalaman"];
    $penerbit = $_POST["penerbit"];
    $kategori = $_POST["kategori"];

    // upload gambar cover
    $cover = upload();
    // jika bukan gambar yang di unggah, return false
    if (!$cover) {
        return false;
    }

    $book =  $kodeBuku . "-" . $judulBuku . "-" . $pengarang . "-" . $tahunTerbit . "-" . $jumlahHalaman . "-" . $penerbit . "-" . $kategori . "-" . $cover . "\n";

    $file = "book.txt";
    if (file_put_contents($file, $book, FILE_APPEND) > 0) {
        $status = "ok";
    } else {
        $status = "err";
    }

    header('Location: addBook.php?status=' . $status);
} ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add book</title>

    </head>

<body>
    <div class="book-container">
        <h1>Tambah Data Buku</h1>
        <a class="btn btn-primary" href="read.php">lihat data</a>

        <!-- Alert -->
        <div class="alert-box">
            <?php
            if (@$_GET["status"] !== NULL) {
                $status = $_GET["status"];
                if ($status == "ok") {
                    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
              <strong>Berhasil!</strong> Menambahkan data.
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
                } elseif ($status == "err") {
                    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
              <strong>Gagal!</strong> Menambahkan data.
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
                }
            }
            ?>
        </div>
        <!-- Akhir alert -->

        <!-- Form -->
        <form class="form-box" action="addBook.php" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="kodeBuku" class="form-label">Kode Buku</label>
                <input type="text" class="form-control" id="kodeBuku" name="kodeBuku">
            </div>
            <div class="mb-3">
                <label for="judulBuku" class="form-label">Judul Buku</label>
                <input type="text" class="form-control" id="judulBuku" name="judulBuku">
            </div>
            <div class="mb-3">
                <label for="pengarang" class="form-label">Pengarang</label>
                <input type="text" class="form-control" id="pengarang" name="pengarang" >
            </div>
            <div class="mb-3">
                <label for="tahunTerbit" class=" form-label">Tahun Terbit</label>
                <input type="text" class="form-control" id="tahunTerbit" name="tahunTerbit" >
            </div>
            <div class="mb-3">
                <label for="jumlahHalaman" class="form-label">Jumlah Halaman</label>
                <input type="text" class="form-control" id="jumlahHalaman" name="jumlahHalaman" >
            </div>
            <div class="mb-3">
                <label for="penerbit" class="form-label">Penerbit</label>
                <input type="text" class="form-control" id="penerbit" name="penerbit" >
            </div>
            <div class="mb-3">
                <label for="kategori" class="form-label">Kategori</label>
                <input type="text" class="form-control" id="kategori" name="kategori" >
            </div>
            <div class="mb-3">
                <label for="cover" class="form-label">Cover</label>
                <input type="file" class="form-control" id="cover" name="cover" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        <!-- Akhir form -->
    </div>
</body>

</html>