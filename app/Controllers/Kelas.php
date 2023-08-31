<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\ModelKelas;

class Kelas extends BaseController
{
    protected $ModelKelas;
  public function __construct()
  {
    helper('form');
    $this->ModelKelas = new ModelKelas;
  }
  public function index()
  {
      $data = [
        'menu' => 'masterdata',
          'submenu' => 'kelas',
          'judul' => 'kelas',
          'page' => 'v_kelas',
          'kelas' => $this->ModelKelas->AllData(),
      ];
      return view('v_template_admin', $data);
  }
  
  public function Add(){
    $data = ['nama_kelas' => $this->request->getPost('nama_kelas')];
    $this->ModelKelas->Add($data);
    session()->setFlashdata('pesan', 'Data Berhasil Di Tambah');
    return redirect()->to(base_url('kelas'));

  }

  public function EditData($id_kelas)
  {
    $data = [
      'id_kelas' => $id_kelas,
      'nama_kelas' => $this->request->getPost('nama_kelas')
    ];
    $this->ModelKelas->EditData($data);
    session()->setFlashdata('pesan', 'Data Berhasil Di Ubah');
    return redirect()->to(base_url('kelas'));

  }
   
  public function DeleteData($id_kelas)
  {
    $data = [
      'id_kelas' => $id_kelas
      
    ];
    $this->ModelKelas->DeleteData($data);
    session()->setFlashdata('pesan', 'Data Berhasil Di Hapus');
    return redirect()->to(base_url('kelas'));

  }

}
