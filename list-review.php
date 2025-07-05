<?php
include 'koneksi.php';
$review = mysqli_query($koneksi, "SELECT * FROM review ORDER BY tanggal DESC");
while ($r = mysqli_fetch_assoc($review)) {
  echo "<h3>{$r['tempat']}</h3><p>{$r['deskripsi']}</p><p>Rating: {$r['rating']} ⭐</p>";

  $id = $r['id'];
  $komentar = mysqli_query($koneksi, "SELECT * FROM komentar WHERE review_id=$id AND status='approved'");
  while ($k = mysqli_fetch_assoc($komentar)) {
    echo "<blockquote>{$k['isi']}</blockquote>";
  }

  echo "<form action='komentar.php' method='POST'>
    <input type='hidden' name='review_id' value='$id'>
    <textarea name='isi'></textarea>
    <button type='submit'>Kirim Komentar</button>
  </form>";
}
?>
