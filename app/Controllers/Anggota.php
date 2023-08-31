<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelAnggota;


class Anggota extends BaseController
{
    protected $ModelAnggota;
    public function __construct()
    {
        helper('form');
        $this->ModelAnggota = new ModelAnggota;
    }

    public function index()
    {
        $id_anggota = session()->get('id_anggota');
        $data = [
            'menu' => 'anggota',
            'submenu' => '',
            'judul' => 'Profile Anggota',
            'page' => 'v_dashboard_anggota',
            'anggota' => $this->ModelAnggota->ProfileAnggota($id_anggota),
        ];
        return view('v_template_anggota', $data);
    }
}