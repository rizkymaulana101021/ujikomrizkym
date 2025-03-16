<?php
// bagian ini menghitung diskon berdasarkan total belanja
function hitungDiskon($totalBelanja) {
    if ($totalBelanja >= 100000) {
        return $totalBelanja * 0.10; // diskon 10%
    } elseif ($totalBelanja >= 50000) {
        return $totalBelanja * 0.05; // diskon 5%
    } else {
        return 0; // tidak ada diskon
    }
}

// bagian ini mengitung total belanja setelah dikurangi diskon
function tampilkanTotal($totalBelanja) {
    $diskon = hitungDiskon($totalBelanja);
    $totalBayar = $totalBelanja - $diskon;

    echo "Total Belanja: Rp. " . number_format($totalBelanja, 0, ',', '.') . "\n";
    echo "Diskon: Rp. " . number_format($diskon, 0, ',', '.') . "\n";
    echo "Total yang Harus Dibayar: Rp. " . number_format($totalBayar, 0, ',', '.') . "\n";
}

$totalBelanja = 120000; 
tampilkanTotal($totalBelanja);
?>