<?php

if ($_GET) {
    $file = "book.txt";

    $kodeBuku = $_GET["kodeBuku"];
    $judulBuku = $_GET["judulBuku"];
    $pengarang = $_GET["pengarang"];
    $tahunTerbit = $_GET["tahunTerbit"];
    $jumlahHalaman = $_GET["jumlahHalaman"];
    $penerbit = $_GET["penerbit"];
    $kategori = $_GET["kategori"];
    $book = $kodeBuku . "-" . $judulBuku . "-" . $pengarang . "-" . $tahunTerbit . "-" . $jumlahHalaman . "-" . $penerbit . "-" . $kategori . "\n";

    $file = "book.txt";
    if (file_put_contents($file, $book, FILE_APPEND) > 0) {
        $status = "ok";
    } else {
        $status = "err";
    }

    header('Location: addBook.php?status=' . $status);
}
