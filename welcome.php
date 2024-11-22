<?php
session_start();
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link rel="stylesheet" href="style.css">
</head>

<body class="welcome-background">
    <!-- Navbar -->
    <div class="navbar sticky-top">
        <div class="navbar-item"><a href="welcome.php">Home</a></div>
        <div class="navbar-item"><a href="index.php">Menu</a></div>
    </div>

    <!-- Bagian Selamat Datang -->
    <div class="welcome-container">
        <h1>Selamat Datang! 안녕하세요! </h1>
        <p>Neo Dream Seoul adalah restoran Korea yang menyajikan masakan Korea autentik dengan sentuhan modern. Tempat ini menawarkan pengalaman kuliner yang inovatif, cocok bagi pengunjung yang ingin menikmati cita rasa Korea dengan cara baru dan segar.</p>
        <p>Senang melihat Anda di sini...</p>
        <p>Silakan jelajahi menu makanan dan minuman kami yang lezat dan segar.</p>
    </div>

    <div class="welcome-buttons">
        <a href="index.php" class="button">Lihat Menu</a>
    </div>

    <div class="chef-section">
        <h2>Tim Chef Kami</h2>
        <p>Kami memiliki chef berpengalaman dengan spesialisasi dalam masakan Korea...</p>
        <div class="chef-grid">
            <div class="chef-card">
                <img src="images/chenle.jpg">
                <h3>Chef Chenle Lee</h3>
                <p>Chef Chenle Lee adalah seorang ahli kuliner berbakat asal Korea Selatan yang merupakan lulusan dari Le Cordon Bleu Seoul, salah satu akademi seni kuliner terbaik di dunia yang dikenal sebagai pencetak chef-chef ternama. Dengan latar belakang pendidikan yang kuat di seni makanan Korea, Chef Chenle Lee telah menguasai teknik memasak tradisional dan modern, menciptakan hidangan yang menggabungkan cita rasa autentik dengan sentuhan inovatif. </p> </a>
            </div>
            <div class="chef-card">
                <img src="images/jimmy_chef.jpeg">
                <h3>Chef Jimmy Seo</h3>
                <p>Chef Jimmy Seo adalah seorang ahli kuliner dengan pengalaman luas di dunia masakan Korea. Dengan dedikasi bertahun-tahun dalam mengeksplorasi keanekaragaman rasa dan teknik memasak tradisional serta modern, Chef Jimmy Seo telah mengasah keahliannya menjadi seorang maestro yang dihormati di bidang kuliner. Berkat pemahamannya yang mendalam tentang bahan-bahan lokal dan cita rasa autentik, Chef Jimmy Seo mampu menciptakan hidangan yang tidak hanya lezat tetapi juga menyampaikan cerita dan warisan budaya Korea.</p>
                </a>
            </div>
        </div>
    </div>

</body>

</html>