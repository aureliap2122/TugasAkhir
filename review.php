<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Review Menu</title>
</head>

<body>

    <?php
    session_start();

    if (isset($_GET['menu'])) {
        $menu = $_GET['menu'];

        function tampilkanReview($namaMenu)
        {
            $review = [
                'Samgyetang (삼계탕)' => [
                    'deskripsi' => 'Samgyetang merupakan sup ayam ginseng yang terbuat dari ayam muda utuh yang direbus dengan api kecil selama 2-3 jam. Makanan ini memiliki cita rasa yang sehat dan memberi kehangatan untuk badan.',
                    'gambar' => 'images/samgyetang.jpg',
                    'rating' => 4
                ],
                'Kimchi Jigae (김치찌개)' => [
                    'deskripsi' => 'Kimchi Jigae merupakan makanan khas Korea yang sangat mudah kita temukan. Pasalnya, makanan ini menjadi comfort food bagi sebagian masyarakat Korea. Kimchi Jigae disajikan menggunakan panci berukuran besar dan ditemani dengan berbagai side dish.',
                    'gambar' => 'images/kimchi_jigae.jpg',
                    'rating' => 5
                ],
                'Bibimbap (비빔밥)' => [
                    'deskripsi' => 'Bibimbap adalah hidangan nasi campur khas Korea yang terdiri dari nasi putih hangat, sayuran, daging, telur, dan saus gochujang. Makanan ini terdapat banyak versi namun memiliki rasa yang khas yaitu manis sedikit pedas, dan gurih.',
                    'gambar' => 'images/bibimbap.png',
                    'rating'=> 4
                ],
                'Gopchang (곱창)' => [
                    'deskripsi' => 'Gopchang adalah hidangan khas Korea yang terbuat dari usus sapi yang dipanggang atau dimasak. Selain populer di Korea, hidangan ini juga terkenal di Indonesia karena citra rasa yang kaya dan tekstur yang unik.',
                    'gambar' => 'images/gopchang.jpg',
                    'rating'=> 5
                ],
                'Naengmyeon (냉면)' => [
                    'deskripsi' => 'Naengmyeon adalah hidangan mie dingin khas Korea yang sangat populer, terutama saat cuaca panas. Hidangan ini terdiri dari mie tipis yang terbuat dari tepung buckwheat (memil), kentang, ubi jalar, atau campuran semuanya dan disajikan dalam kuah dingin yang menyegarkan atau dengan bumbu pedas.',
                    'gambar' => 'images/naengmyeon.jpg',
                    'rating'=> 4
                ],
                'Jjajangmyeon (짜장면)' => [
                    'deskripsi' => 'Jjajangmyeon adalah hidangan mie khas Korea yang sangat populer, terutama di kalangan anak muda. Hidangan ini biasanya menyajikan mie gandum diberi saus chunjang dan disajikan dengan daging cincang, bombay, wortel, dan zucchini. Hidangan ini memiliki rasa yang lezat dan tekstur yang unik berasal dari bahan bahan pelengkapnya.',
                    'gambar' => 'images/jjajangmyeon.jpg',
                    'rating'=> 3
                ],
                'Dalgona Coffee (달고나커피)' => [
                    'deskripsi' => 'Dalgona Coffee yang sempat viral pada tahun 2020 lalu merupakan minuman yang terinspirasi dari permen khas Korea yang bernama dalgona. Minuman ini memiliki cita rasa yang unik dengan perpaduan krim kopi dan susu.',
                    'gambar' => 'images/dalgona_coffee.jpg',
                    'rating' => 4
                ],
                'Sikhye (식혜)' => [
                    'deskripsi' => 'Sikhye adalah minuman tradisional Korea yang sangat populer, terutama saat musim panas. Minuman ini memiliki rasa manis yang menyegarkan dan sering disajikan sebagai pencuci mulut atau minuman setelah makan. Sikhye terbuat dari beras yang difermentasi dengan malt, sehingga menghasilkan rasa manis alami yang khas.',
                    'gambar' => 'images/sikhye.jpg',
                    'rating'=> 3
                ],
                'Banana Uyu (바나나 우유)' => [
                    'deskripsi' => 'anana Uyu adalah minuman susu pisang yang sangat populer di Korea Selatan. Minuman ini memiliki rasa manis, lembut, dan aroma pisang yang khas.',
                    'gambar' => 'images/banana_milk.jpg',
                    'rating' => 5
                ],
                'Baram Tteok (바람떡)' => [
                    'deskripsi' => 'Baram tteok (바람떡) adalah jenis kue tradisional Korea yang berbentuk setengah bulan, terbuat dari tepung beras yang dikukus dan diisi dengan pasta kacang merah atau kacang hijau.Baram tteok memiliki tekstur yang lembut dan kenyal, dengan rasa manis dari pasta kacang yang mengisi bagian dalamnya. ',
                    'gambar' => 'images/baram_tteok.jpg',
                    'rating' => 3
                ],
                'Bingsu (빙수)' => [
                    'deskripsi' => 'Bingsu merupakan hidangan penutup yang terbuat dari es serut khas Korea. Hidangan ini memiliki cita rasa yang menyegarkan dengan tekstur yang super lembut.',
                    'gambar' => 'images/bingsu.jpg',
                    'rating' => 5
                ]
            ];

            echo "<div class='review'>";
            if (isset($review[$namaMenu])) {
                echo "<h3>Review untuk " . htmlspecialchars($namaMenu) . "</h3>";
                echo "<div class='ulasan'><p>" . $review[$namaMenu]['deskripsi'] . "</p></div>";
                echo "<div class='review-image-container'>";
                echo "<img src='" . $review[$namaMenu]['gambar'] . "' alt='Gambar " . htmlspecialchars($namaMenu) . "' class='review-image'>";
                echo "</div>";

                echo "<div class='rating'>";
                $rating = $review[$namaMenu]['rating'];
                for ($i = 1; $i <= 5; $i++) {
                    if ($i <= $rating) {
                        echo "<span class='filled'>&#9733;</span>"; 
                    } else {
                        echo "<span>&#9734;</span>"; 
                    }
                }
                echo "</div>";
            }
            echo "<a href='index.php' class='button-tutup-review'>Tutup Review</a>";
            echo "</div>";
        }
        tampilkanReview($menu);
    } else {
        echo "<p>Menu tidak ditemukan.</p>";
        echo "<a href='index.php' class='button-tutup-review'>Kembali ke Menu</a>";
    }
    ?>
</body>

</html>