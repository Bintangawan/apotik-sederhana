<?php error_reporting(0);?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modul 6 - Bintang</title>
</head>
<body>
    <form action="" method="POST">
    <label for="bilangan1">Bilangan 1 : </label>
    <input type="text" name="bil1"> <br>
    <label for="bilangan2">Bilangan 2 : </label>
    <input type="text" name="bil2"> <br>
    <label for="operator">Operator : </label>
    <select name="operator">
        <option value="tambah">+</option>
        <option value="kurang">-</option>
        <option value="kali">*</option>
        <option value="bagi">/</option>
    </select>
    <input type="submit" value="Submit" name="submit">
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $bilangan1 = $_POST['bil1'];
        $bilangan2 = $_POST['bil2'];
        $operator = $_POST['operator'];
        $hasil = 0;

        switch ($operator) {
            case 'tambah':
                $hasil = $bilangan1 + $bilangan2;
                echo "Hasil Penjumlahan Adalah : $hasil <br>";
                break;
            case 'kurang':
                $hasil = $bilangan1 - $bilangan2;
                echo "Hasil Pengurangan Adalah : $hasil <br>";
                break;
            case 'kali':
                $hasil = $bilangan1 * $bilangan2;
                echo "Hasil Perkalian Adalah : $hasil <br>";
                break;
            case 'bagi':
                if ($bilangan2 != 0) {
                    $hasil = $bilangan1 / $bilangan2;
                    echo "Hasil Pembagian Adalah : $hasil <br>";
                } else {
                    echo "Pembagian dengan nol tidak diizinkan <br>";
                }
                break;
            default:
                echo "Operator tidak valid <br>";
        }
    }
    ?>
</body>
</html>