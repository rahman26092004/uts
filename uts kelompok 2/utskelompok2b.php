<?php
$produk = [
    ['id' => 1, 'nama' => 'Pepsodent', 'stok' => 30, 'harga' => 11980],
    ['id' => 2, 'nama' => 'Sunlight', 'stok' => 15, 'harga' => 12880],
    ['id' => 3, 'nama' => 'Baygon', 'stok' => 10, 'harga' => 16779],
    ['id' => 4, 'nama' => 'Dove', 'stok' => 20, 'harga' => 22688],
    ['id' => 5, 'nama' => 'Rinso', 'stok' => 20, 'harga' => 20769],
    ['id' => 6, 'nama' => 'Downy', 'stok' => 12, 'harga' => 15789],
    ['id' => 7, 'nama' => 'Le Mineral', 'stok' => 25, 'harga' => 5650]
];

$pembelian = [
    ['nama' => 'Pepsodent', 'jumlah' => 27],
    ['nama' => 'Rinso', 'jumlah' => 15],
    ['nama' => 'Downy', 'jumlah' => 5],
    ['nama' => 'Dove', 'jumlah' => 20],
    ['nama' => 'Le Mineral', 'jumlah' => 22]
];

function hitungTotal($produk, $pembelian) {
    $total = 0;
    foreach ($pembelian as $item) {
        foreach ($produk as $barang) {
            if ($barang['nama'] === $item['nama']) {
                $total += $barang['harga'] * $item['jumlah'];
            }
        }
    }
    return $total;
}

function hitungDiskon($total) {
    if ($total >= 350000) {
        return 0.25 * $total;
    } elseif ($total >= 250000) {
        return 0.20 * $total;
    }
    return 0;
}

$total = hitungTotal($produk, $pembelian);
$diskon = hitungDiskon($total);
$totalPembayaran = $total - $diskon;


echo "<div style='width: 45%; font-family: Arial, sans-serif; border: 1px solid #000; padding: 15px; border-radius: 5px;'>"; 
echo "<h2 style='display: flex; justify-content: space-between;'>
        <span>Tanggal Transaksi</span>
        <span>: 30 Oktober 2024</span>
      </h2>";

foreach ($pembelian as $item) {
    foreach ($produk as $barang) {
        if ($barang['nama'] === $item['nama']) {
            $subtotal = $barang['harga'] * $item['jumlah'];
            echo "<div style='display: flex; justify-content: space-between;'>";
            echo "<span style='width: 60%;'>{$item['nama']}</span>";
            echo "<span style='width: 50%; text-align: left;'>{$item['jumlah']} x Rp " . number_format($barang['harga'], 0, ',', '.') . "</span>";
            echo "<span style='width: 50%; text-align: center;'>:</span>";
            echo "<span style='width: 30%; text-align: right;'>Rp " . number_format($subtotal, 0, ',', '.') . "</span>";
            echo "</div>";
        }
    }
}


echo "<div style='display: flex; justify-content: space-between;'>";
echo "<span style='width: 60%;'>Total</span>";
echo "<span style='width: 15%; text-align: right;'>:</span>";
echo "<span style='width: 30%; text-align: right;'>Rp " . number_format($total, 0, ',', '.') . "</span>";
echo "</div>";

echo "<div style='display: flex; justify-content: space-between;'>";
echo "<span style='width: 60%;'>Diskon</span>";
echo "<span style='width: 15%; text-align: right;'>:</span>";
echo "<span style='width: 30%; text-align: right;'>Rp " . number_format($diskon, 0, ',', '.') . "</span>";
echo "</div>";

echo "<div style='display: flex; justify-content: space-between; font-weight: bold;'>";
echo "<span style='width: 60%;'>Total Pembayaran</span>";
echo "<span style='width: 15%; text-align: right;'>:</span>";
echo "<span style='width: 30%; text-align: right;'>Rp " . number_format($totalPembayaran, 0, ',', '.') . "</span>";
echo "</div>";

echo "</div>";

?>