<?php
include "koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barang Masuk</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <style>
        body {
            background-color: #f8f9fa;
        }
        .table-container {
            margin-top: 50px;
            background: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .table th {
            background-color: #1e90ff;
            color: white;
            text-align: center;
        }
        .table td {
            text-align: center;
            vertical-align: middle;
        }
    </style>
      <link rel="stylesheet" href="css/app.css">
</head>
<body>
<nav class="navtop">
        <div>
            <h1>Apotek Bintang</h1>
            <a href="index"><i class="fa-solid fa-house-circle-check"></i>Home</a>
            <a href="barangMasuk"><i class="fa-solid fa-truck-fast"></i>Barang Masuk</a>
        </div>
    </nav>
    <div class="container">
        <div class="table-container">
            <h2 class="text-center mb-4">Data Barang Masuk</h2>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Barang</th>
                        <th>Stok</th>
                        <th>Harga Barang</th>
                        <th>Tanggal Masuk</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM barangMasuk";
                    $row = $koneksi->prepare($sql);
                    $row->execute();
                    $hasil = $row->fetchAll();
                    $a = 1;
                    foreach ($hasil as $data) {
                    ?>
                    <tr>
                        <td><?php echo $a; ?></td>
                        <td><?php echo $data['namabarang']; ?></td>
                        <td><?php echo $data['stok']; ?></td>
                        <td>Rp <?php echo number_format($data['harga'], 0, ',', '.'); ?></td>
                        <td><?php echo date("d-m-Y", strtotime($data['tanggal'])); ?></td>
                    </tr>
                    <?php
                        $a++;
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
