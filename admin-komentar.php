<?php
session_start();
include 'koneksi.php';
if ($_SESSION['role'] != 'admin') die("Akses admin saja");

$komentar = mysqli_query($koneksi, "SELECT * FROM komentar WHERE status='pending'");
while ($k = mysqli_fetch_assoc($komentar)) {
  echo "<p>{$k['isi']}</p>";
  echo "<a href='setujui.php?id={$k['id']}'>Setujui</a> | <a href='tolak.php?id={$k['id']}'>Tolak</a><hr>";
}
