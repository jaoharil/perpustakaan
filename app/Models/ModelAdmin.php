<?php 
namespace App\Models;

use CodeIgniter\Model;

class ModelAdmin extends Model
{
  public function TotalBuku()
  {
    
  }
  public function TotalAnnggota()
  {
    return $this->db->table('tbl_anggota')->countAll();
  }

}


