<?php
    $user = 'root';
    $pass = '';
    try {
        $koneksi = new PDO('mysql:host=localhost;dbname=apotek', $user, $pass);
        $koneksi->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }catch (PDOException $e) {
        print "koneksi gagal: " . $e->getMessage();
        die();
    }
?>