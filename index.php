<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NEO DREAM SEOUL</title>
    <link rel="stylesheet" href="style.css">
</head>

<body class="index-background">

    <?php
    session_start();

    // Navbar
    echo "
<div class='navbar'>
    <div class='navbar-item'><a href='welcome.php'>Home</a></div>
    <div class='navbar-item'><a href='index.php'>Menu</a></div>
    <div class='navbar-item'><a href='?action=pesanan'>Pesanan</a></div>
    <div class='navbar-item'><a href='?action=pembayaran'>Pembayaran</a></div>
</div>
";
    // Kelas Keranjang
    class Keranjang
    {
        public $items = [];

        // Menambahkan item ke dalam keranjang
        public function tambahItem($menu, $harga)
        {
            if (isset($this->items[$menu])) {
                $this->items[$menu]['jumlah']++;
            } else {
                $this->items[$menu] = ['nama' => $menu, 'jumlah' => 1, 'harga' => $harga];
            }
        }

        // Mendapatkan semua item dalam keranjang
        public function getItems()
        {
            return $this->items;
        }

        // Menghitung total harga
        public function hitungTotal()
        {
            $total = 0;
            foreach ($this->items as $item) {
                $total += $item['harga'] * $item['jumlah'];
            }
            return $total;
        }

        // Menghapus semua item dari keranjang
        public function kosongkan()
        {
            $this->items = [];
        }
    }

    $hargaMenu = [
        'Samgyetang (삼계탕)' => 50000,
        'Kimchi Jigae (김치찌개)' => 30000,
        'Bibimbap (비빔밥)' => 40000,
        'Gopchang (곱창)' => 70000,
        'Naengmyeon (냉면)' => 35000,
        'Jjajangmyeon (짜장면)' => 35000,
        'Dalgona Coffee (달고나커피)' => 18000,
        'Sikhye (식혜)' => 15000,
        'Banana Uyu (바나나 우유)' => 20000,
        'Baram Tteok (바람떡)' => 15000,
        'Bingsu (빙수)' => 20000
    ];
    // Inisialisasi keranjang jika belum ada
    if (!isset($_SESSION['keranjang'])) {
        $_SESSION['keranjang'] = new Keranjang();
    }
    $keranjang = $_SESSION['keranjang'];

    // Fungsi menampilkan menu
    function tampilkanMenu()
    {
        echo '<div style="float: right; text-align: center; margin-top: 20px;">';
    echo '<a href="index.php?action=pesanan" style="text-decoration: none; background-color: #4CAF50; color: white; padding: 10px 20px; border-radius: 5px; font-size: 16px;">Ke Halaman Pesanan</a>';
    echo "</div>";
        // Define the menu with categories (makanan, minuman, snack)
        $menu = [
            'makanan' => [
                ['nama' => 'Samgyetang (삼계탕)', 'harga' => 50000, 'gambar' => 'images/samgyetang.jpg'],
                ['nama' => 'Kimchi Jigae (김치찌개)', 'harga' => 30000, 'gambar' => 'images/kimchi_jigae.jpg'],
                ['nama' => 'Bibimbap (비빔밥)', 'harga' => 40000, 'gambar' => 'images/bibimbap.png'],
                ['nama' => 'Gopchang (곱창)', 'harga' => 70000, 'gambar' => 'images/gopchang.jpg'],
                ['nama' => 'Naengmyeon (냉면)', 'harga' => 35000, 'gambar' => 'images/naengmyeon.jpg'],
                ['nama' => 'Jjajangmyeon (짜장면)', 'harga' => 35000, 'gambar' => 'images/jjajangmyeon.jpg']
            ],
            'minuman' => [
                ['nama' => 'Dalgona Coffee (달고나커피)', 'harga' => 18000, 'gambar' => 'images/dalgona_coffee.jpg'],
                ['nama' => 'Sikhye (식혜)', 'harga' => 15000, 'gambar' => 'images/sikhye.jpg'],
                ['nama' => 'Banana Uyu (바나나 우유)', 'harga' => 20000, 'gambar' => 'images/banana_milk.jpg']
            ],
            'snack' => [
                ['nama' => 'Baram Tteok (바람떡)', 'harga' => 15000, 'gambar' => 'images/baram_tteok.jpg'],
                ['nama' => 'Bingsu (빙수)', 'harga' => 20000, 'gambar' => 'images/bingsu.jpg']
            ]
        ];

        // Check for category filter
        $selectedCategory = isset($_GET['category']) ? $_GET['category'] : 'semua';

        // Display the dropdown filter
        echo "
    <div class='category-filter'>
        <form method='GET' action=''>
            <label for='category'>Pilih Kategori:</label>
            <select name='category' id='category' onchange='this.form.submit()'>
                <option value='semua'" . ($selectedCategory == 'semua' ? ' selected' : '') . ">Semua</option>
                <option value='makanan'" . ($selectedCategory == 'makanan' ? ' selected' : '') . ">Makanan</option>
                <option value='minuman'" . ($selectedCategory == 'minuman' ? ' selected' : '') . ">Minuman</option>
                <option value='snack'" . ($selectedCategory == 'snack' ? ' selected' : '') . ">Snack</option>
            </select>
        </form>
    </div>
    ";

        // Display the menu items
        echo "<div class='menu'>";
        if ($selectedCategory == 'semua') {
            // Display all items if 'semua' is selected
            foreach ($menu as $category => $items) {
                foreach ($items as $item) {
                    displayMenuItem($item);
                }
            }
        } else {
            // Display items from the selected category
            foreach ($menu[$selectedCategory] as $item) {
                displayMenuItem($item);
            }
        }
        echo "</div>";
    }

    // Function to display a menu item
    function displayMenuItem($item)
    {
        echo "
    <div class='menu-item'>
        <h2>{$item['nama']}</h2>
        <img src='{$item['gambar']}' alt='{$item['nama']}' class='menu-image'>
        <p>Harga: Rp{$item['harga']}</p>
        <a href='?action=tambah&menu=" . urlencode($item['nama']) . "' class='button'>Tambah ke Keranjang</a>
        <a href='review.php?menu=" . urlencode($item['nama']) . "' class='button'>Lihat Review</a>
    </div>
    ";
    }

    // Aksi berdasarkan permintaan
    include 'pesanan.php';
    include 'pembayaran.php';

    if (isset($_GET['action'])) {
        $action = $_GET['action'];
        $menu = isset($_GET['menu']) ? $_GET['menu'] : null;
        echo "<div class='keranjang'>";
        if ($action == 'tambah' && $menu) {
            // Panggil fungsi tambahPesanan() dari pesanan.php
            tambahPesanan($menu);
            echo "<p>" . htmlspecialchars($menu) . " telah ditambahkan ke keranjang.</p>";
        } elseif ($action == 'review' && $menu) {
            tampilkanReview($menu);
        } elseif ($action == 'pesanan') {
            // Panggil fungsi yang terkait keranjang (misalnya, tampilkanKeranjang() jika Anda membuat fungsi untuk itu)
            echo "<div class='isi-keranjang'>";
            echo "<h2>Keranjang Belanja</h2><div id='keranjang'>";
            if (empty($_SESSION['keranjang'])) {
                echo "<p>Keranjang belanja kosong.</p>";
            } else {
                echo "<ul>";
                foreach ($_SESSION['keranjang'] as $index => $item) {
                    echo "<div class='item'>";
                    echo "<img src='" . htmlspecialchars($item['gambar']) . "' alt='" . htmlspecialchars($item['nama']) . "' style='width:100px;height:auto;margin-right:20px;margin-left:20px'>";
                    echo "<p>". htmlspecialchars($item ['nama']). "</p>";
                    echo "<p>Rp " . number_format($item['harga'], 0, ',', '.') . "</p>";
                    echo "<form action='pesanan.php' method='POST' style='display: flex; align-items: center; gap: 10px; padding: 3px 5px;'>";
                    echo "<button type='submit' name='action' value='decrease'>-</button>";
                    echo "<input type='hidden' name='index' value='$index'>";
                    echo "<span>" . intval($item['jumlah']) . "</span>";
                    echo "<button type='submit' name='action' value='increase'>+</button>";
                    echo "</form>";
                    echo "</div>";
                    echo "<li>" . htmlspecialchars($item['nama']) . " - Jumlah: " . intval($item['jumlah']) . " - Total Harga: Rp" . number_format($item['harga'] * $item['jumlah'], 0, ',', '.') . "</li>";
                }
                echo "</ul>";
            }
            echo '<div style="text-align: center; margin-top: 20px;">';
            echo '<a href="http://localhost/TugasAkhir/index.php?action=pembayaran" style="text-decoration: none; background-color: #4CAF50 ; color: white; padding: 10px 20px; border-radius: 5px; font-size: 16px;">Lanjut ke Pembayaran</a>';
            echo "<a href='index.php' class='button'>Kembali ke Menu</a></div>";
            echo "</div>";
        } elseif ($action == 'pembayaran') {
            // Panggil fungsi tampilkanPembayaran() dari pembayaran.php
            tampilkanPembayaran();
        } elseif ($action == 'proses_pembayaran') {
            // Panggil fungsi prosesPembayaran() dari pembayaran.php
            prosesPembayaran();
        }
        echo "</div>";
    }

    // Tampilkan menu jika tidak ada aksi yang sedang berlangsung
    if (!isset($_GET['action']) || ($_GET['action'] !== 'review' && $_GET['action'] !== 'pesanan' && $_GET['action'] !== 'pembayaran' && $_GET['action'] !== 'proses_pembayaran')) {
        tampilkanMenu();
    }

    ?>

</body>

</html>