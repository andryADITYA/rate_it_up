<?php
include 'koneksi.php';
$username = $_POST['username'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

mysqli_query($koneksi, "INSERT INTO user (username, password) VALUES ('$username', '$password')");
header("Location: login.html");
?>
