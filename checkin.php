<?php
session_start();
include 'koneksi.php';
if (!isset($_SESSION['user_id'])) die("Login dulu!");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $user_id = $_SESSION['user_id'];
  $tempat = $_POST['tempat'];
  mysqli_query($koneksi, "INSERT INTO checkin (user_id, tempat) VALUES ('$user_id', '$tempat')");
  echo "Check-in berhasil!";
}
?>

<form method="POST">
  <input name="tempat" placeholder="Nama Tempat">
  <button type="submit">Check-in</button>
</form>
