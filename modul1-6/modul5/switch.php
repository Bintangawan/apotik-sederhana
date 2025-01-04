<?php
    $tujuan = "Medan";
    echo "Biaya perjalanan menuju $tujuan adalah ";
    switch ($tujuan) {
        case "Jakarta":
            echo "Rp. 100.000";
            break;
        case "Bandung": 
            echo "Rp. 80.000";
            break;
        case "Medan":
            echo "Rp. 50.000";
            break;
        default:
            echo "Tujuan tidak ada";
    }
?>