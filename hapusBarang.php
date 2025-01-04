<?php
    include "koneksi.php";
    $id = $_GET['id_barang'];
    $sql = "DELETE FROM barangMasuk WHERE id_barang = '$id'";
    $row = $koneksi->prepare($sql);
    $row->execute();
    $message = "";
    $message = "success"; // SweetAlert berhasil
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    
    <?php if ($message == "success") : ?>
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: 'Data berhasil dihapus!',
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