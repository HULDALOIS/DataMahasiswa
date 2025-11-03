<?php
namespace Src\Controllers;
use Src\Models\Mahasiswa;

class MahasiswaController {
    private Mahasiswa $model;

    public function __construct($config) {
        $this->model = new Mahasiswa($config);
    }

    public function index() {
        $data = $this->model->all();
        include __DIR__ . '/../Views/list.php';
    }

    public function store($nama, $jurusan) {
        $this->model->insert($nama, $jurusan);
        header('Location: index.php');
    }

    public function edit($id) {
        $mhs = $this->model->find($id);
        include __DIR__ . '/../Views/form.php';
    }

    public function update($id, $nama, $jurusan) {
        $this->model->update($id, $nama, $jurusan);
        header('Location: index.php');
    }

    public function destroy($id) {
        $this->model->delete($id);
        header('Location: index.php');
    }
}
