<?php

namespace App\Controllers;
use App\Models\ModelAdmin;

class Admin extends BaseController
{
    protected $ModelAdmin;
    public function __construct() {
        $this->ModelAdmin = new ModelAdmin;
    }
    public function index()
    {
        $data = [
            'menu' => 'dashboard',
            'submenu' => '',
            'judul' => 'Admin',
            'page' => 'v_admin',
            'totalanggota' => $this->ModelAdmin->TotalAnnggota(),
        ];
        return view('v_template_admin', $data);
    }
}
