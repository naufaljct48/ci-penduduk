<?php

namespace App\Controllers;

use App\Models\PendudukModel;
use Irsyadulibad\DataTables\DataTables;

class Penduduk extends BaseController
{
    protected $pendudukModel;
    private $rules = ['penduduk' => ['rules' => 'required']];

    public function __construct()
    {
        $this->pendudukModel = new PendudukModel();
        helper('form');
    }
    public function index()
    {
        echo view('penduduk', ['title' => 'Daftar Jumlah Penduduk']);
    }
    public function ajax()
    {
        if ($this->request->isAJAX()) {
            return DataTables::use('penduduk')
			->select('id, penduduk, bulan, tahun')
			->make();
        }
    }
    public function tambah()
    {
        if ($this->request->isAJAX()) {
            if (!$this->validate($this->rules)) {
                $respon = [
                    'validasi' => false,
                    'error'   => $this->validator->getErrors(),
                ];
            } else {
                // validation form sukses 
                $data = [
                    'penduduk'   => $this->request->getPost('penduduk', FILTER_SANITIZE_STRING),
                    'bulan'   => $this->request->getPost('bulan', FILTER_SANITIZE_STRING),
                    'tahun'   => $this->request->getPost('tahun', FILTER_SANITIZE_STRING)
                ];
                $this->pendudukModel->save($data);
                
                $respon = "<div class=\"alert alert-dismissible alert-success\">
                <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button>
                <strong>Sukses!</strong> Berhasil Input Data.</div>";
            }
            return $this->response->setJSON($respon);
        }
    }

    public function ubah()
    {
        if ($this->request->isAJAX()) {
            if (!$this->validate($this->rules)) {
                $respon = [
                    'validasi' => false,
                    'error'   => $this->validator->getErrors(),
                ];
            } else {
                // validation form sukses 
                $data = [
                    'id'   => $this->request->getPost('id', FILTER_SANITIZE_NUMBER_INT),
                    'penduduk'   => $this->request->getPost('penduduk', FILTER_SANITIZE_STRING),
                    'bulan'   => $this->request->getPost('bulan', FILTER_SANITIZE_STRING),
                    'tahun'   => $this->request->getPost('tahun', FILTER_SANITIZE_STRING)
                ];
                $this->pendudukModel->save($data);
                $respon = "<div class=\"alert alert-dismissible alert-success\">
                <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\"></button>
                <strong>Sukses!</strong> Berhasil Input Data.</div>";
            }
            return $this->response->setJSON($respon);
        }
    }

    public function hapus()
    {
        if ($this->request->isAJAX()) {
            $id = $this->request->getGet('id', FILTER_SANITIZE_NUMBER_INT);
            if(!(empty($this->pendudukModel->find($id)))){
                $this->pendudukModel->delete($id);
                $respon = [
                    'status' => true,
                    'pesan' => 'Data berhasil dihapus :)'
                ];
            } else {
                $respon = [
                    'status' => false,
                    'pesan' => 'Maaf data tidak ditemukan :('
                ];
            }
            return $this->response->setJSON($respon);
        }
    }
}