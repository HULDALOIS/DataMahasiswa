CREATE DATABASE IF NOT EXISTS pdo_crud;
USE pdo_crud;

CREATE TABLE mahasiswa (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100),
    jurusan VARCHAR(100)
);
