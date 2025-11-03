<?php
namespace Src\Models;
use PDO;
use Src\Config\Database;

class Mahasiswa {
    private PDO $db;

    public function __construct($config) {
        $this->db = Database::conn($config);
    }

    public function all() {
        return $this->db->query("SELECT * FROM mahasiswa ORDER BY id DESC")->fetchAll();
    }

    public function find($id) {
        $stmt = $this->db->prepare("SELECT * FROM mahasiswa WHERE id=?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function insert($nama, $jurusan) {
        $stmt = $this->db->prepare("INSERT INTO mahasiswa (nama, jurusan) VALUES (?, ?)");
        return $stmt->execute([$nama, $jurusan]);
    }

    public function update($id, $nama, $jurusan) {
        $stmt = $this->db->prepare("UPDATE mahasiswa SET nama=?, jurusan=? WHERE id=?");
        return $stmt->execute([$nama, $jurusan, $id]);
    }

    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM mahasiswa WHERE id=?");
        return $stmt->execute([$id]);
    }
}
