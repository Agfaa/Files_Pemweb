<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Read</title>

</head>

<body>
    <div class="book-container">
        <h1>Data Buku</h1>
        <a class="btn btn-primary" href="addBook.php">Tambah Data</a>

        <!-- Alert delete -->
        <div class="alert-box-delete">
            <?php
            if (@$_GET["status"] !== NULL) {
                $status = $_GET["status"];
                if ($status == "ok") {
                    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
              <strong>Berhasil!</strong> Menghapus data.
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
                } elseif ($status == "err") {
                    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
              <strong>Gagal!</strong> Menghapus data.
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
                }
            }
            // Akhir alert delete

            // Alert update
            if (@$_GET["statusUpdate"] !== NULL) {
                $status = $_GET["statusUpdate"];
                if ($status == "ok") {
                    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
              <strong>Berhasil!</strong> Mengubah data.
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
                } elseif ($status == "err") {
                    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
              <strong>Gagal!</strong> Mengubah data.
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
                }
            }
            ?>
        </div>
        <!-- Akhir alert update -->

        <!-- Table -->
        <div class="table-box">
            <table class="table" border="1">
                <thead>
                    <tr>
                        <th scope="col">Kode Buku</th>
                        <th scope="col">Judul Buku</th>
                        <th scope="col">Pengarang</th>
                        <th scope="col">Tahun Terbit</th>
                        <th scope="col">Jumlah Halaman</th>
                        <th scope="col">Penerbit</th>
                        <th scope="col">Kategori</th>
                        <th scope="col">Cover</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody id="table-body">
                    <?php
                    $file = "book.txt";
                    $reads = file($file);
                    foreach ($reads as $read) {
                        $data = explode("-", $read);
                        echo "<tr>";
                        echo "<td>$data[0]</td>";
                        echo "<td>$data[1]</td>";
                        echo "<td>$data[2]</td>";
                        echo "<td>$data[3]</td>";
                        echo "<td>$data[4]</td>";
                        echo "<td>$data[5]</td>";
                        echo "<td>$data[6]</td>";
                        echo "<td><img src='cover/$data[7]' style='width: 100px;'></td>";
                    ?>
                        <td class='aksi'>
                            <a style="color: navy;" href="update.php?kodeBuku=<?php echo $data[0]; ?>"><i class='fa-solid fa-pen'></i>Update</a>
                            <a style="color: red;" href="delete.php?kodeBuku=<?php echo $data[0]; ?>" onclick="return confirm('Apakah anda yakin?');"><i class='fa-solid fa-trash'></i>Delete</a>
                            </td>
                        <?php
                        echo "</tr>";
                    }
                    echo "</tbody>
            </table>";
                        ?>
        </div>
        <!-- Akhir table -->
    </div>

     </body>

</html>