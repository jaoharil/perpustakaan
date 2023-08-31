<?php 

namespace App\Models;

use CodeIgniter\Model;

class ModelBuku extends Model
{
  protected $table = 'tbl_buku';
  protected $primaryKey = 'id_buku';
  protected $allowedFields = ['judul_buku','id_buku','kode_buku', 'jumlah', 'bahasa', 'cover', 'isbn', 'tahun', 'halaman','id_pengarang', 'id_penerbit', 'id_rak', 'id_kategori'];

  public function AllData(){
    
    return $this->db->table('tbl_buku')
    ->join('tbl_kategori', 'tbl_kategori.id_kategori = tbl_buku.id_kategori', 'left')
    ->join('tbl_penerbit', 'tbl_penerbit.id_penerbit = tbl_buku.id_penerbit', 'left')
    ->join('tbl_pengarang', 'tbl_pengarang.id_pengarang = tbl_buku.id_pengarang', 'left')
    ->join('tbl_rak', 'tbl_rak.id_rak = tbl_buku.id_rak', 'left')
    ->orderBy('id_buku', 'DESC')
    ->get()->getResultArray();

}
public function EditData($data){
  $this->db->table('tbl_buku')
  ->where('id_buku', $data['id_buku'])
  ->update($data);





}
public function AddData($data)
{
  $this->db->table('tbl_buku')->insert($data);

}

public function DetailData($id_buku){
  return $this->db->table('tbl_buku')
  ->where('id_buku', $id_buku)
  ->get()->getRowArray();

}
  public function DeleteData($data)
  {
    $this->db->table('tbl_buku')
    ->where('id_buku', $data['id_buku'])
    ->delete($data);
  }

}