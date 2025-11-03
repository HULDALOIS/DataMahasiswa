<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Data Mahasiswa</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body class="p-4">
<div class="container">
    <h3>Data Mahasiswa</h3>
    <a href="index.php?action=form" class="btn btn-success mb-3">+ Tambah</a>
    <table class="table table-bordered">
        <tr><th>ID</th><th>Nama</th><th>Jurusan</th><th>Aksi</th></tr>
        <?php foreach ($data as $m): ?>
        <tr>
            <td><?= $m['id'] ?></td>
            <td><?= $m['nama'] ?></td>
            <td><?= $m['jurusan'] ?></td>
            <td>
                <a href="index.php?action=edit&id=<?= $m['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                <a href="index.php?action=delete&id=<?= $m['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus data ini?')">Hapus</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>
</body>
</html>
