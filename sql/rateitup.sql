CREATE DATABASE rateitup;
USE rateitup;

-- Tabel user
CREATE TABLE user (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(50),
  password VARCHAR(100),
  role ENUM('user', 'admin') DEFAULT 'user'
);

-- Tabel review
CREATE TABLE review (
  id INT AUTO_INCREMENT PRIMARY KEY,
  user_id INT,
  tempat VARCHAR(100),
  deskripsi TEXT,
  rating INT,
  tanggal DATETIME DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (user_id) REFERENCES user(id)
);

-- Tabel komentar
CREATE TABLE komentar (
  id INT AUTO_INCREMENT PRIMARY KEY,
  review_id INT,
  user_id INT,
  isi TEXT,
  status ENUM('pending','approved','rejected') DEFAULT 'pending',
  tanggal DATETIME DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (review_id) REFERENCES review(id),
  FOREIGN KEY (user_id) REFERENCES user(id)
);

-- Tabel check-in
CREATE TABLE checkin (
  id INT AUTO_INCREMENT PRIMARY KEY,
  user_id INT,
  tempat VARCHAR(100),
  waktu DATETIME DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (user_id) REFERENCES user(id)
);
