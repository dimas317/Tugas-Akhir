<?php 

require 'config.php';


?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resep</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
    /* Gaya Umum */
    body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f7fa;
            color: #333;
            transition: background-color 0.3s ease, color 0.3s ease;
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
        h1 {
            text-align: center;
            color:rgb(255, 255, 255);
            margin-top: 20px;
        }
        .dark-mode h1{
            color:rgb(252, 252, 252);
        }
        .container {
            max-width: 1200px;
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
        .navbar .login {
            position: absolute;
            right: 20px;
            top: 10px;
        }
        .dark-mode .navbar {
            background: linear-gradient(135deg, #1b2b38, #1b2b38);
        }

        .search-bar {
            display: flex;
            justify-content: center;
            margin-bottom: 30px;
        }
        .search-bar input {
            width: 80%;
            max-width: 500px;
            padding: 15px;
            font-size: 16px;
            border: 1px solid #ddd;
            border-radius: 8px;
        }

        /* Kartu Resep */
        .recipe-list {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 20px;
        }
        .recipe-card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            width: 18.8rem;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .recipe-card:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.15);
        }
        .recipe-card img {
            width: 100%;
            height: auto;
        }
        .recipe-card h3 {
            padding: 20px;
            font-size: 1.5em;
            margin: 0;
            background: #ecf0f1;
            text-align: center;
            transition: background-color 0.3s ease, color 0.3s ease;
        }
        .recipe-card h3 a {
            text-decoration: none;
            color: inherit;
        }
        .recipe-card h3 a:hover {
            text-decoration: underline;
        }
        .recipe-card p {
            padding: 20px;
            font-size: 14px;
            line-height: 1.5;
            transition: color 0.3s ease;
        }
        .recipe-card .favorite-button {
            display: block;
            margin: 10px auto;
            padding: 10px 20px;
            font-size: 14px;
            background-color: #f39c12;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .recipe-card .favorite-button:hover {
            background-color: #e67e22;
        }

        .dark-mode .recipe-card {
            background: #34495e;
            color: #ecf0f1;
        }
        .dark-mode .recipe-card h3 {
            background: #2c3e50;
            color: #ecf0f1;
        }
        .dark-mode .recipe-card p {
            color: #bdc3c7;
        }
        .dark-mode .recipe-card .favorite-button {
            background-color: #d35400;
        }

        /* Footer */
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
        <a href="login.php" class="login">Login</a>
    </div>
    <div class="container">
        <h1>Cari Resep Anda</h1>
        <div class="search-bar">
            <input id="searchInput" type="text" placeholder="Cari resep...">
        </div>
        <div id="recipeList" class="recipe-list">


            <?php 
            
            $sql = "SELECT * FROM resep";
            $result = mysqli_query($conn, $sql);

            if ($result -> num_rows > 0) {
                while ($row = $result -> fetch_assoc()) {
                    
                
            
            ?>
            <div class="recipe-card">
                <img src="<?= $row['gambar_resep'] ?>" style="width:300px;height:200px" alt="Resep 1">
                <h3><a href="detail-resep.php?id_resep=<?= $row['id_resep'] ?>"><?= $row['judul_resep'] ?></a></h3>
                <p><?= $row['deskripsi_resep'] ?></p>
                <button class="favorite-button" onclick="toggleFavorite('Nasi Goreng')">Tambah ke Favorit</button>
            </div>

            <?php 
            
        }
    }
            
            ?>
            <!-- <div class="recipe-card">
                <img src="066100900_1644554867-shutterstock_1984582070.jpg" style="width:300px;height:200px" alt="Resep 2">
                <h3><a href="mie goreng jawa.php">Mie Goreng Jawa</a></h3>
                <p>Mie goreng Jawa adalah mie goreng khas Indonesia dengan bumbu rempah seperti bawang, kemiri, dan kecap manis, disajikan dengan telur, sayuran, dan ayam atau udang.</p>
                <button class="favorite-button" onclick="toggleFavorite('Mie Goreng Jawa')">Tambah ke Favorit</button>
            </div>
            <div class="recipe-card">
                <img src="shutterstock_1927030937.jpg" style="width:300px;height:200px" alt="Resep 3">
                <h3><a href="bubur ayam.php">Bubur Ayam </a></h3>
                <p>Bubur ayam adalah bubur nasi khas Indonesia yang disajikan dengan ayam suwir, kerupuk, kacang, daun bawang, dan kuah kuning gurih.</p>
                <button class="favorite-button" onclick="toggleFavorite('Bubur Ayam')">Tambah ke Favorit</button>
            </div>
            <div class="recipe-card">
                <img src="Nasi-Pecel-Madiun.jpg" style="width:300px;height:200px" alt="Resep 4">
                <h3><a href="nasi pecel.php">Nasi Pecel</a></h3>
                <p>Nasi pecel adalah hidangan khas Indonesia berupa nasi dengan sayuran rebus, disiram bumbu kacang, dan dilengkapi lauk seperti tempe, rempeyek, atau tahu.</p>
                <button class="favorite-button" onclick="toggleFavorite('Nasi Pecel')">Tambah ke Favorit</button>
            </div>
            <div class="recipe-card">
                <img src="https://via.placeholder.com/300x200" alt="Resep 5">
                <h3><a href="detail-resep5.php">Resep Lezat 5</a></h3>
                <p>Deskripsi singkat tentang resep ini yang membuatnya terlihat menarik.</p>
                <button class="favorite-button" onclick="toggleFavorite('Resep Lezat 5')">Tambah ke Favorit</button>
            </div>
            <div class="recipe-card">
                <img src="https://via.placeholder.com/300x200" alt="Resep 6">
                <h3><a href="detail-resep6.php">Resep Lezat 6</a></h3>
                <p>Deskripsi singkat tentang resep ini yang membuatnya terlihat menarik.</p>
                <button class="favorite-button" onclick="toggleFavorite('Resep Lezat 6')">Tambah ke Favorit</button>
            </div>
            <div class="recipe-card">
                <img src="https://via.placeholder.com/300x200" alt="Resep 7">
                <h3><a href="detail-resep7.php">Resep Lezat 7</a></h3>
                <p>Deskripsi singkat tentang resep ini yang membuatnya terlihat menarik.</p>
                <button class="favorite-button" onclick="toggleFavorite('Resep Lezat 7')">Tambah ke Favorit</button>
            </div><div class="recipe-card">
                <img src="https://via.placeholder.com/300x200" alt="Resep 8">
                <h3><a href="detail-resep8.php">Resep Lezat 8</a></h3>
                <p>Deskripsi singkat tentang resep ini yang membuatnya terlihat menarik.</p>
                <button class="favorite-button" onclick="toggleFavorite('Resep Lezat 8')">Tambah ke Favorit</button>
            </div> -->
        </div>
    </div>
    <footer>
        <p>Bagikan Resep Anda &copy; 2024</p>
    </footer>
    <button class="dark-mode-toggle" onclick="toggleDarkMode()">Mode Gelap</button>

    <script>
        // Pencarian
        document.getElementById('searchInput').addEventListener('input', function() {
            const filter = this.value.toLowerCase();
            const recipeCards = document.querySelectorAll('.recipe-card');

            recipeCards.forEach(card => {
                const title = card.querySelector('h3').textContent.toLowerCase();
                if (title.includes(filter)) {
                    card.style.display = '';
                } else {
                    card.style.display = 'none';
                }
            });
        });

        // Mode Gelap
        function toggleDarkMode() {
            document.body.classList.toggle('dark-mode');
        }

        // Tambah ke Favorit
        function toggleFavorite(recipeName) {
        const favorites = JSON.parse(localStorage.getItem('favorites')) || [];

        if (!favorites.includes(recipeName)) {
        // Tambah ke favorit jika belum ada
        favorites.push(recipeName);
        alert(`${recipeName} ditambahkan ke favorit.`);
        } else {
        alert(`${recipeName} ditambahkan ke favorit.`);
        }

        localStorage.setItem('favorites', JSON.stringify(favorites));
        }
        // Muat daftar favorit saat halaman dibuka
        window.onload = function() {
            const favorites = JSON.parse(localStorage.getItem('favorites')) || [];
            console.log("Daftar Favorit:", favorites);
        };
    </script>
</body>
</html>
