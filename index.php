<?php
require __DIR__ . '/vendor/autoload.php';

use Src\Controllers\MahasiswaController;

$config = require 'config.php';
$controller = new MahasiswaController($config);

$action = $_GET['action'] ?? null;

if (isset($_POST['save'])) {
    if (!empty($_POST['id'])) {
        $controller->update($_POST['id'], $_POST['nama'], $_POST['jurusan']);
    } else {
        $controller->store($_POST['nama'], $_POST['jurusan']);
    }
} elseif ($action === 'form') {
    include 'src/Views/form.php';
} elseif ($action === 'edit' && isset($_GET['id'])) {
    $controller->edit($_GET['id']);
} elseif ($action === 'delete' && isset($_GET['id'])) {
    $controller->destroy($_GET['id']);
} else {
    $controller->index();
}
