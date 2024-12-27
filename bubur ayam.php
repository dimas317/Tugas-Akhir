<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Resep</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f7fa;
            color: #333;
        }
        .background-image {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url('1d8a347c89f303015942f3e2c3628dbf.jpg'); /* Ganti dengan URL gambar Anda */
            background-size: cover;
            background-position: center;
            filter: blur(8px); /* Efek blur */
            z-index: -1;
        }
        .dark-mode {
            background-color: #2c3e50;
            color: #ecf0f1;
        }
        h1, h2, h3, h4 {
            color: #2c3e50;
        }
        .dark-mode h1{
            color:rgb(252, 252, 252);
        }
        .container {
            max-width: 1100px;
            margin: 0 auto;
            padding: 20px;
        }
        /* Navigasi */
        .navbar {
            background: linear-gradient(135deg, rgb(24, 113, 247), rgb(24, 113, 247));
            padding: 10px 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .navbar a {
            color: white;
            text-decoration: none;
            margin: 0 15px;
            font-weight: bold;
            font-size: 16px;
            padding: 10px 15px;
            border-radius: 5px;
            transition: background-color 0.3s ease, color 0.3s ease;
        }
        .navbar a:hover {
            background-color: white;
            color: rgb(61, 158, 250);
        }
        .dark-mode .navbar {
            background: linear-gradient(135deg, #1b2b38, #1b2b38);
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .recipe-image {
            width: 100%;
            border-radius: 12px;
        }
        .recipe-title {
            color: #2c3e50;
            text-align: center;
            font-size: 2em;
            margin: 20px 0;
        }
        .dark-mode .recipe-title {
        color: #2c3e50; /* Warna terang agar terlihat di dark mode */
        }   
        .ingredients, .instructions {
            margin-bottom: 20px;
        }
        .ingredients h3, .instructions h3 {
            color: #2c3e50;
            border-bottom: 2px solid #f5f7fa;
            padding-bottom: 5px;
        }
        .ingredients ul, .instructions ol {
            color: #2c3e50;
            margin: 0;
            padding-left: 20px;
        }
        footer {
            background: #34495e;
            color: white;
            padding: 20px;
            text-align: center;
        }
        .dark-mode footer {
            background: #1b2b38;
        }
        .dark-mode-toggle {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background: #ecf0f1;
            color: #333;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s ease, color 0.3s ease;
        }
        .dark-mode .dark-mode-toggle {
            background: #34495e;
            color: #ecf0f1;
        }
    </style>
</head>
<body>
    <div class="background-image"></div>
    <div class="navbar">
        <a href="web user.php">Beranda</a>
        <a href="resep.php">Resep</a>
        <a href="tambahkan resep.php">Resep Baru</a>
        <a href="favorit.php">Favorit</a>
        <a href="#">Tentang Kami</a>
    </div>
    <div class="container">
        <img class="recipe-image" src="shutterstock_1927030937.jpg" style="width:800px;height:400px" alt="Gambar Resep">
        <h1 class="recipe-title">Bubur Ayam</h1>

        <div class="ingredients">
            <h3>Bahan-bahan</h3>
            <ul>
                <li>Beras - 200 gram (1 gelas)</li>
                <li>Air - 1,5 liter (atau sesuai kekentalan yang diinginkan)</li>
                <li>Daun salam - 2 lembar</li>
                <li>Garam - 1 sendok teh</li>
                <li>Kaldu ayam - secukupnya (opsional, untuk rasa lebih gurih)</li>
                <li>Daging ayam - 300 gram (paha atau dada)</li>
                <li>Bawang putih - 3 siung (haluskan)</li>
                <li>Bawang merah - 3 butir (haluskan)</li>
                <li>Kunyit - 1 ruas (haluskan)</li>
                <li>Jahe - 1 ruas (haluskan)</li>
                <li>Lengkuas - 1 ruas (geprek)</li>
                <li>Serai - 1 batang (geprek)</li>
                <li>Kecap manis - 2 sendok makan</li>
                <li>Garam dan gula - secukupnya</li>
                <li>Kaldu bubuk - secukupnya</li>
                <li>Kerupuk - secukupnya</li>
                <li>Irisan daun bawang - 2 batang</li>
                <li>Irisan seledri - 1 batang</li>
                <li>Bawang goreng - secukupnya</li>
                <li>Sambal - sesuai seleraKecap manis dan kecap asin - secukupnya</li>
            </ul>
        </div>

        <div class="instructions">
            <h3>Langkah-langkah</h3>
            <ol>
                <li>Cuci beras hingga bersih, lalu masukkan ke dalam panci.</li>
                <li>Masak beras dengan air, tambahkan daun salam dan garam. Aduk sesekali agar tidak lengket di dasar panci.</li>
                <li>Masak hingga tekstur beras menjadi bubur. Jika air berkurang, tambahkan sedikit demi sedikit. Sesuaikan kekentalan bubur sesuai selera.</li>
                <li>Tumis bumbu halus (bawang putih, bawang merah, kunyit, jahe) bersama lengkuas, serai, daun salam, dan daun jeruk hingga harum.</li>
                <li>Masukkan ayam ke dalam tumisan bumbu. Tambahkan air, kecap manis, garam, gula, dan kaldu bubuk. Masak hingga ayam matang dan kuah meresap.</li>
                <li>Angkat ayam, lalu suwir-suwir. Sisihkan kuah untuk disiram ke bubur.</li>
                <li>Ambil bubur panas ke dalam mangkuk.</li>
                <li>Tambahkan suwiran ayam di atasnya.</li>
                <li>Siram dengan kuah ayam.</li>
                <li>Taburkan daun bawang, seledri, dan bawang goreng.</li>
                <li>Tambahkan kerupuk, sambal, kecap manis, dan kecap asin sesuai selera.</li>
            </ol>
        </div>
    </div>
    <footer>
        <p>Bagikan Resep Anda &copy; 2024</p>
    </footer>
    <button class="dark-mode-toggle" onclick="toggleDarkMode()">Mode Gelap</button>
    <script>
            // Toggle Mode Gelap
            function toggleDarkMode() {
            document.body.classList.toggle('dark-mode');
        }
    </script>
</body>
</html>
