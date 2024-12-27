<?php
session_start();
session_destroy(); //Hapus semua data

echo '<script>
            alert("Login berhasil");
            </script>';
            header('Location: login.php');
            exit();
?>

