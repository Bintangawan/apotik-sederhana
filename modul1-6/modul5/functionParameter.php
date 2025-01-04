<?php
    function perkenalan ($nama, $salam) {
        echo "$salam";
        echo "Perkenalkan, nama saya $nama" ."<br>";
    }

    perkenalan("Bintang Kurniawan Herman", "Halo");
    echo "<hr>";

    $saya = "Bintang Kurniawan Herman";
    $ucapanSalam = "Halo";
    perkenalan($saya, $ucapanSalam);
?>