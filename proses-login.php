<?php
session_start();
include 'koneksi.php';

$username = $_POST['username'];
$password = $_POST['password'];

$result = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username' AND role='user'");
$user = mysqli_fetch_assoc($result);

if ($user && password_verify($password, $user['password'])) {
  $_SESSION['user_id'] = $user['id'];
  $_SESSION['role'] = $user['role'];
  header("Location: tambah-review.php");
} else {
  echo "Login gagal!";
}
?>
