<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelKelas extends Model
{
    protected $table = 'tbl_kelas';
    public function AllData(){
        return $this->db->table('tbl_kelas')
        ->orderBy('id_kelas', 'DESC')
        ->get()->getResultArray();

    }
    
    public function Add($data){
        $this->db->table('tbl_kelas')->insert($data);
    }

    public function DeleteData($data){
        $this->db->table('tbl_kelas')
        ->where('id_kelas', $data['id_kelas'])
        ->delete($data);

    }

    public function EditData($data){
        $this->db->table('tbl_kelas')
        ->where('id_kelas', $data['id_kelas'])
        ->update($data);


    }
}
