<?php
require __DIR__ . '/../vendor/autoload.php';

use Src\Models\Mahasiswa;

header('Content-Type: application/json');

$config = require __DIR__ . '/../config.php';
$mhs = new Mahasiswa($config);

$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'GET':
        // jika ada ?id=... maka ambil 1 data
        if (isset($_GET['id'])) {
            $data = $mhs->find($_GET['id']);
            echo json_encode($data ?: ["message" => "Data tidak ditemukan"]);
        } else {
            echo json_encode($mhs->all());
        }
        break;

    case 'POST':
        $input = json_decode(file_get_contents('php://input'), true);
        if ($input && isset($input['nama'], $input['jurusan'])) {
            $mhs->insert($input['nama'], $input['jurusan']);
            echo json_encode(["message" => "Data berhasil ditambahkan"]);
        } else {
            http_response_code(400);
            echo json_encode(["error" => "Data tidak valid"]);
        }
        break;

    case 'PUT':
        parse_str(file_get_contents('php://input'), $input);
        if (isset($_GET['id']) && isset($input['nama'], $input['jurusan'])) {
            $mhs->update($_GET['id'], $input['nama'], $input['jurusan']);
            echo json_encode(["message" => "Data berhasil diubah"]);
        } else {
            http_response_code(400);
            echo json_encode(["error" => "Parameter tidak valid"]);
        }
        break;

    case 'DELETE':
        if (isset($_GET['id'])) {
            $mhs->delete($_GET['id']);
            echo json_encode(["message" => "Data berhasil dihapus"]);
        } else {
            http_response_code(400);
            echo json_encode(["error" => "ID tidak diberikan"]);
        }
        break;

    default:
        http_response_code(405);
        echo json_encode(["error" => "Metode tidak diizinkan"]);
}
