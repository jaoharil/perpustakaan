<?php 

namespace App\Models;

use CodeIgniter\Model;

class ModelAuth extends Model{

 
  public function LoginUser($email, $pasword){
    return $this->db->table('tbl_user')
    ->where([
      'email' => $email,
      'pasword' => $pasword,
    ])->get()->getRowArray();

  }

  public function Daftar($data)
  {
    $this->db->table('tbl_anggota')->insert($data);

  }
  public function LoginAnggota($nis, $pasword){
    return $this->db->table('tbl_anggota')
    ->where([
      'nis' => $nis,
      'pasword' => $pasword,
    ])->get()->getRowArray();

  }

}


