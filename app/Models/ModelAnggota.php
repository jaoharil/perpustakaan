<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelAnggota extends Model
{
  protected $table = 'tbl_anggota';
  protected $allowedFields = ['nama_siswa','id_anggota', 'no_hp', 'jenis_kelamin', 'foto'];

  public function ProfileAnggota($id_anggota)
  {
   return $this->db->table('tbl_anggota')
   ->join('tbl_kelas', 'tbl_kelas.id_kelas = tbl_anggota.id_kelas', 'left')
   ->where('id_anggota', $id_anggota)
   ->get()->getResultArray();
  }
  public function AllData(){
    
    return $this->db->table('tbl_anggota')
    ->join('tbl_kelas', 'tbl_kelas.id_kelas = tbl_anggota.id_kelas', 'left')
    ->orderBy('id_anggota', 'DESC')
    ->get()->getResultArray();

}
public function EditData($data){
  $this->db->table('tbl_anggota')
  ->where('id_anggota', $data['id_anggota'])
  ->update($data);


}
public function AddData($data)
{
  $this->db->table('tbl_anggota')->insert($data);

}

public function DetailData($id_anggota){
  return $this->db->table('tbl_anggota')
  ->where('id_anggota', $id_anggota)
  ->get()->getRowArray();

}
  public function DeleteData($data)
  {
    $this->db->table('tbl_anggota')
    ->where('id_anggota', $data['id_anggota'])
    ->delete($data);
  }
}