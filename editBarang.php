<?php
    include 'koneksi.php';
    $message = ""; // Variabel untuk SweetAlert

    if(!empty($_POST['namabarang'])) {
        $namabarang = $_POST['namabarang'];
        $stok = $_POST['stok'];
        $harga = $_POST['harga'];
        $tanggal = date('d-m-Y', strtotime($_POST['tanggal'])); // Format tanggal ke d-m-y
        $id = $_POST['id_barang'];
           
        $data[] = $namabarang;
        $data[] = $stok;
        $data[] = $harga;
        $data[] = $tanggal;
        $data[] = $id;


        $sql = 'UPDATE barangmasuk SET namabarang = ?, stok = ?, harga = ?, tanggal = ? WHERE id_barang = ?';
        $row = $koneksi ->prepare($sql);
        $row ->execute($data);
        
        $message = "success"; // SweetAlert berhasil
    }

    $id = $_GET['id_barang'];
    $sql = "SELECT * FROM barangMasuk WHERE id_barang = '$id'";
    $row = $koneksi->prepare($sql);
    $row->execute();
    $hasil = $row->fetch();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modul 7-8 Bintang</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/app.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <nav class="navtop">
        <div>
            <h1>Apotek Bintang</h1>
            <a href="index"><i class="fa-solid fa-house-circle-check"></i>Home</a>
            <a href="barangMasuk"><i class="fa-solid fa-truck-fast"></i>Barang Masuk</a>
        </div>
    </nav>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header bg-primary text-white">
            <h3>Edit Barang - <?= $hasil['namabarang'];?></h3>
            </div>
            <div class="card-body">
                <form action="" method="POST">
                    <div class="mb-3">
                        <label for="namabarang" class="form-label">Nama Barang</label>
                        <input type="text" value="<?= $hasil['namabarang'];?>" class="form-control" name="namabarang" id="namabarang" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="stok" class="form-label">Stok</label>
                        <input type="number" value="<?= $hasil['stok'];?>" class="form-control" name="stok" id="stok" required>
                    </div>

                    <div class="mb-3">
                        <label for="harga" class="form-label">Harga Barang</label>
                        <input type="number" value="<?= $hasil['harga'];?>" class="form-control" name="harga" id="harga" required>
                    </div>

                    <div class="mb-3">
                        <label for="tanggal" class="form-label">Tanggal Masuk</label>
                        <input type="date" value="<?= $hasil['tanggal'];?>" class="form-control" name="tanggal" id="tanggal" required>
                    </div>
                    <input type="hidden" value="<?= $hasil['id_barang'];?>" name="id_barang">
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary btn-md">
                            <i class="fa fa-plus"></i> Update
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php if ($message == "success") : ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: 'Data berhasil diupdate!',
                showConfirmButton: true,
                confirmButtonText: 'OK'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location = 'readBarang.php'; // Redirect setelah OK
                }
            });
        </script>
    <?php endif; ?>
</body>
</html>