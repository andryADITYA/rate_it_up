<?php
session_start();
include 'koneksi.php';
if (!isset($_SESSION['user_id'])) die("Harus login!");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $user_id = $_SESSION['user_id'];
  $tempat = $_POST['tempat'];
  $deskripsi = $_POST['deskripsi'];
  $rating = $_POST['rating'];

  mysqli_query($koneksi, "INSERT INTO review (user_id, tempat, deskripsi, rating) VALUES ('$user_id', '$tempat', '$deskripsi', '$rating')");
  echo "Review berhasil dikirim!";
}
?>

<form method="POST">
  <input name="tempat" placeholder="Nama Tempat">
  <textarea name="deskripsi"></textarea>
  <select name="rating">
    <option value="1">1 ⭐</option>
    <option value="2">2 ⭐</option>
    <option value="3">3 ⭐</option>
    <option value="4">4 ⭐</option>
    <option value="5">5 ⭐</option>
  </select>
  <button type="submit">Kirim</button>
</form>
