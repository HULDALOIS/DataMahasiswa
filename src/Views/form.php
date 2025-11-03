<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Form Mahasiswa</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body class="p-4">
<div class="container">
    <h3><?= isset($mhs) ? 'Edit' : 'Tambah' ?> Mahasiswa</h3>
    <form method="post" action="index.php">
        <input type="hidden" name="id" value="<?= $mhs['id'] ?? '' ?>">
        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" value="<?= $mhs['nama'] ?? '' ?>" required>
        </div>
        <div class="mb-3">
            <label>Jurusan</label>
            <input type="text" name="jurusan" class="form-control" value="<?= $mhs['jurusan'] ?? '' ?>" required>
        </div>
        <button class="btn btn-primary" name="save">Simpan</button>
        <a href="index.php" class="btn btn-secondary">Kembali</a>
    </form>
</div>
</body>
</html>
