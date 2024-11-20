<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
// Fungsi untuk menampilkan halaman pembayaran
function tampilkanPembayaran() {
    echo "<h2>Halaman Pembayaran</h2>";

    // Cek apakah keranjang belanja kosong
    if (empty($_SESSION['keranjang'])) {
        echo "<p>Keranjang belanja kosong. Silakan tambahkan item ke keranjang sebelum melakukan pembayaran.</p>";
        echo "<a href='index.php' class='button'>Kembali ke Menu</a>";
        return;
    }

    $totalHarga = 0;

    echo "<div id='pembayaran'>";
    echo "<ul>";
    foreach ($_SESSION['keranjang'] as $item) {
        $subtotal = $item['harga'] * $item['jumlah'];
        $totalHarga += $subtotal;
        echo "<li>" . htmlspecialchars($item['nama']) . " - Jumlah: " . intval($item['jumlah']) . " - Harga: Rp" . number_format($subtotal, 0, ',', '.') . "</li>";
    }
    echo "</ul>";
    echo "<p>Total yang harus dibayar: <strong>Rp" . number_format($totalHarga, 0, ',', '.') . "</strong></p>";
    echo "<form method='post' action='?action=proses_pembayaran'>";
    echo "<button type='submit' class='button2'>Bayar Sekarang</button>";
    echo "</form>";
    echo "<a href='index.php' class='button'>Kembali ke Menu</a>";
    echo "</div>";
}

// Fungsi untuk memproses pembayaran
function prosesPembayaran() {
    // Kosongkan keranjang setelah pembayaran
    $_SESSION['keranjang'] = [];
    echo "<p>Pembayaran berhasil! Terima kasih telah memesan di Korean Restro.</p>";
    echo "<a href='index.php' class='button'>Kembali ke Menu</a>";
}

?>


