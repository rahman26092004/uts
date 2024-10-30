<?php
$produk = [
    ['nama' => 'Pepsodent', 'stok' => 30, 'harga' => 11980],
    ['nama' => 'Sunlight', 'stok' => 15, 'harga' => 12880],
    ['nama' => 'Baygon', 'stok' => 10, 'harga' => 16779],
    ['nama' => 'Dove', 'stok' => 20, 'harga' => 22688],
    ['nama' => 'Rinso', 'stok' => 20, 'harga' => 20769],
    ['nama' => 'Downy', 'stok' => 12, 'harga' => 15789],
    ['nama' => 'Le Mineral', 'stok' => 25, 'harga' => 5650]
];

usort($produk, function($a, $b) {
    return strcmp($a['nama'], $b['nama']);
});

echo "<div style='width: 50%; font-family: Arial, sans-serif; border: 1px solid #000; padding: 15px; border-radius: 5px;'>";
echo "<h2>Daftar Produk Terurut</h2>";
echo "<table style='width: 100%; border-collapse: collapse;'>
        <tr style='border-bottom: 1px solid #000;'>
            <th style='text-align: left; padding: 5px;'>Nama Produk</th>
            <th style='text-align: right; padding: 5px;'>Stok</th>
            <th style='text-align: right; padding: 5px;'>Harga (Rp)</th>
        </tr>";

foreach ($produk as $barang) {
    echo "<tr>";
    echo "<td style='padding: 5px;'>{$barang['nama']}</td>";
    echo "<td style='text-align: right; padding: 5px;'>{$barang['stok']}</td>";
    echo "<td style='text-align: right; padding: 5px;'>Rp " . number_format($barang['harga'], 0, ',', '.') . "</td>";
    echo "</tr>";
}

echo "</table>";
echo "</div>";
?>
