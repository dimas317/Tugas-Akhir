<?php

require 'config.php';

session_start();

if (isset($_SESSION['login'])) {
    header('Location: web user.php');
    exit();
}

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM user";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    if ($username === $row['username']){
        if ($password === $row['password']) {
            $_SESSION['login'] = true;

            echo '<script>
            alert("Login berhasil");
            </script>';
            header('Location: web user.php');
            exit();
        } else {
            echo '<script>
            alert("Password salah");
            window.href("login.php");
            </script>';
            exit();
        }
    } else {
        echo '<script>
        alert("Username tidak ditemukan");
        window.href("login.php");
        </script>';
        exit();
    }
}
?>



<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login dan Register</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: #f3f4f6;
        }
        .container {
            width: 100%;
            max-width: 400px;
            background: white;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        label {
            margin-bottom: 5px;
            color: #555;
        }
        input {
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 16px;
        }
        button {
            padding: 10px;
            background-color: #3498db;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
        }
        button:hover {
            background-color: #2980b9;
        }
        .toggle {
            text-align: center;
            margin-top: 10px;
        }
        .toggle a {
            color: #3498db;
            text-decoration: none;
        }
        .toggle a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container" id="login-container">
        <h2>Login</h2>
        <form id="login-form" method="post" action="">
            <label for="login-username">Username</label>
            <input type="text" id="login-username" name="username" placeholder="Masukkan username" required>

            <label for="login-password">Password</label>
            <input type="password" id="login-password" name="password" placeholder="Masukkan password" required>

            <button type="submit" name="login">Login</button>
        </form>
        <div class="toggle">
            <p>Belum punya akun? <a href="register.php" onclick="toggleForms()">Daftar</a></p>
        </div>
    </div>

    <div class="container" id="register-container" style="display: none;">
        <h2>Register</h2>
        <form id="register-form">
            <label for="register-username">Username</label>
            <input type="text" id="register-username" placeholder="Masukkan usernama" required>

            <label for="register-password">Password</label>
            <input type="password" id="register-password" placeholder="Masukkan password" required>

            <label for="register-confirm-password">Konfirmasi Password</label>
            <input type="password" id="register-confirm-password" placeholder="Masukkan kembali password" required>

            <button type="submit">Daftar</button>
        </form>
        <div class="toggle">
            <p>Sudah punya akun? <a href="register.php" onclick="">Login</a></p>
        </div>
    </div>
</body>
</html>
