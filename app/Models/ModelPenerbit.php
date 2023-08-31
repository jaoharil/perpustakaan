<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPenerbit extends Model
{
    protected $table = 'tbl_penerbit';
    public function AllData(){
        return $this->db->table('tbl_penerbit')
        ->orderBy('id_penerbit', 'DESC')
        ->get()->getResultArray();

    }
    
    public function Add($data){
        $this->db->table('tbl_penerbit')->insert($data);
    }

    public function DeleteData($data){
        $this->db->table('tbl_penerbit')
        ->where('id_penerbit', $data['id_penerbit'])
        ->delete($data);

    }

    public function EditData($data){
        $this->db->table('tbl_penerbit')
        ->where('id_penerbit', $data['id_penerbit'])
        ->update($data);


    }
}
