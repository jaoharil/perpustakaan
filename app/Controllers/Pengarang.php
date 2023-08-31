<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\ModelPengarang;

class Pengarang extends BaseController
{
    protected $ModelPengarang;
    public function __construct()
    {
      helper('form');
      $this->ModelPengarang = new ModelPengarang;
    }
    public function index()
    {
        $data = [
            'menu' => 'masterdata',
              'submenu' => 'pengarang',
              'judul' => 'pengarang',
              'page' => 'v_pengarang',
              'pengarang' => $this->ModelPengarang->AllData(),
          ];
          return view('v_template_admin', $data);
    }
    public function Add(){
        $data = ['nama_pengarang' => $this->request->getPost('nama_pengarang')];
        $this->ModelPengarang->Add($data);
        session()->setFlashdata('pesan', 'Data Berhasil Di Tambah');
        return redirect()->to(base_url('pengarang'));
  
      }
  
      public function EditData($id_pengarang)
      {
        $data = [
          'id_pengarang' => $id_pengarang,
          'nama_pengarang' => $this->request->getPost('nama_pengarang')
        ];
        $this->ModelPengarang->EditData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Di Ubah');
        return redirect()->to(base_url('pengarang'));
  
      }
       
      public function DeleteData($id_pengarang)
      {
        $data = [
          'id_pengarang' => $id_pengarang
          
        ];
        $this->ModelPengarang->DeleteData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Di Hapus');
        return redirect()->to(base_url('pengarang'));
  
      }
  
}
