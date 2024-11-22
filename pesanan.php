<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

function tambahPesanan($namaMenu)
{
    $hargaMenu = [
        'Samgyetang (삼계탕)' =>['harga' => 50000, 'gambar' => 'images/samgyetang.jpg'],
        'Kimchi Jigae (김치찌개)' => ['harga' => 30000, 'gambar' => 'images/kimchi_jigae.jpg'],
        'Bibimbap (비빔밥)' => ['harga' => 40000, 'gambar' => 'images/bibimbap.png'],
        'Gopchang (곱창)' => ['harga' => 70000, 'gambar' => 'images/gopchang.jpg'],
        'Naengmyeon (냉면)' => ['harga' => 35000, 'gambar' => 'images/naengmyeon.jpg'],
        'Jjajangmyeon (짜장면)' => ['harga' => 35000, 'gambar' => 'images/jjajangmyeon.jpg'],
        'Dalgona Coffee (달고나커피)' => ['harga' => 18000, 'gambar' => 'images/dalgona_coffee.jpg'],
        'Sikhye (식혜)' => ['harga' => 15000, 'gambar' => 'images/sikhye.jpg'],
        'Banana Uyu (바나나 우유)' => ['harga' => 20000, 'gambar' => 'images/banana_milk.jpg'],
        'Baram Tteok (바람떡)' => ['harga' => 15000, 'gambar' => 'images/baram_tteok.jpg'],
        'Bingsu (빙수)' => ['harga' => 20000, 'gambar' => 'images/bingsu.jpg']
    ];

    if (array_key_exists($namaMenu, $hargaMenu)) {
        $harga = $hargaMenu[$namaMenu]['harga'];
        $gambar = $hargaMenu[$namaMenu]['gambar'];

        //pengkondisian if untuk mengecheck keranjang
        if (!isset($_SESSION['keranjang'])) {
            $_SESSION['keranjang'] = [];
        }

        // perulangan 
        $itemExists = false;
        foreach ($_SESSION['keranjang'] as &$item) {
            if ($item['nama'] === $namaMenu) {
                $item['jumlah']++;
                $itemExists = true;
                break;
            }
        }

        if (!$itemExists) {
            $_SESSION['keranjang'][] = [
                'nama' => $namaMenu,
                'harga' => $harga,
                'jumlah' => 1,
                'gambar' =>$gambar
            ];
        }
    }
}

function updatePesanan($index, $action)
{
    if (isset($_SESSION['keranjang'][$index])) {
        if ($action === 'increase') {
            $_SESSION['keranjang'][$index]['jumlah']++;
        } elseif ($action === 'decrease') {
            $_SESSION['keranjang'][$index]['jumlah']--;
            if ($_SESSION['keranjang'][$index]['jumlah'] <= 0) {
                unset($_SESSION['keranjang'][$index]);
            }
        }
    }
}

if (isset($_POST['action']) && isset($_POST['index'])) {
    $index = intval($_POST['index']);
    $action = $_POST['action'];
    updatePesanan($index, $action);
    header('Location: index.php?action=pesanan'); 
    exit;
}
?>