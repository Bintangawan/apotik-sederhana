<?php
    $books = [
        "Programmer Zaman Now",
        "Belajar PHP Dasar",
        "Belajar PHP OOP",
        "Belajar PHP MySQL"
    ];

    echo "<h5>Judul Buku Yang Tersedia:</h5>";
    echo "<ul>";
    foreach ($books as $book) {
        echo "<li>$book</li>";
    }
    echo "</ul>";
?>