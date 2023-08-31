<?php 

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelAnggota;

class Peminjaman extends BaseController{
  protected $ModelAnggota;
  public function __construct()
    {
        helper('form');
        $this->ModelAnggota = new ModelAnggota;
    }
  public function index()
  {

  }

  public function Pengajuan()
  {
    $id_anggota = session()->get('id_anggota');
    $data = [
      'menu' => 'peminjaman',
      'submenu' => 'pengajuan',
      'judul' => 'Pengajuan Buku',
      'page' => 'peminjaman/v_pengajuan',
      'anggota' => $this->ModelAnggota->AllData(),
    ];
    return view('v_template_anggota');
  }

}