<?php

namespace App\Controllers;

use App\Models\ModelAuth;
use App\Models\ModelKelas;


class Auth extends BaseController
{
  protected $ModelAuth;
  
  public function __construct() {
    helper('form');
    $this-> ModelAuth = new ModelAuth;
    $this-> ModelKelas = new ModelKelas;
  }
    public function index()
    {
        $data = [
            'judul' => 'Login',
            'page' => 'v_login'
            
        ];
        return view('v_template_login', $data);
    }

    public function LoginUser()
    {
      $data = [
        'judul' => 'Login User',
        'page' => 'v_login_user'
        
    ];
    return view('v_template_login', $data);
    }
    public function  CekLoginUser (){
      if ($this->validate([
        'email' => [
          'label' => 'E-Mail',
          'rules' => 'required|valid_email',
          'errors' => [
            'required' => '{field} Masih kosong !',
            'valid_email' => '{field} Harus Format email !'
          ]
          ],
          'pasword' => [
            'label' => 'Pasword',
            'rules' => 'required',
            'errors' => [
              'required' => '{field} Masih kosong !',
              
             
            ]
            ],
          ])){
           
            $email = $this->request->getPost('email');
            $pasword = $this->request->getPost('pasword');
            $cek_login = $this->ModelAuth->LoginUser($email, $pasword);
            if ($cek_login) {
              session()->set('id_user', $cek_login['id_user']);
              session()->set('nama_user', $cek_login['nama_user']);
              session()->set('email', $cek_login['email']);
              session()->set('level', $cek_login['level']);
              return redirect()->to(base_url('Admin'));
            }else{
              
            // Jika login gagal, tampilkan pesan error atau kembali ke halaman login
           session()->setFlashdata('pesan', 'E-mail atau password salah !');
           return redirect()->to(base_url('Auth/LoginUser'));
        }
    } else {
        // Jika validasi gagal, kembali ke halaman login dengan pesan error
        session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
        return redirect()->to(base_url('Auth/LoginUser'));
    }
        

    }

    
    public function LoginAnggota()
    {
      $data = [
        'judul' => 'Login Anggota',
        'page' => 'v_login_anggota'
        
    ];
    return view('v_template_login', $data);
    }

    public function LogOut(){
      session()->remove('id_user');
      session()->remove('nama_user');
      session()->remove('email');
      session()->remove('level');
      session()->setFlashdata('pesan', 'logout sukses !');
      return redirect()->to(base_url('Auth/LoginUser'));
      
    }

    public function LogOutAnggota(){
      session()->remove('id_anggota');
      session()->remove('nama_anggota');
      session()->remove('level');
      session()->setFlashdata('pesan', 'logout sukses !');
      return redirect()->to(base_url('Auth/LoginAnggota'));
      
    }
    protected $ModelKelas;
    public function Register(){
      
      $data = [
        'judul' => 'Daftar Anggota',
        'page' => 'v_daftar_anggota',
        'kelas' => $this->ModelKelas->AllData(),
        
    ];
    return view('v_template_login', $data);

    }

    public function Daftar(){
      if ($this->validate([
        'id_kelas' => [
          'label' => 'Kelas',
          'rules' => 'required',
          'errors' => [
            'required' => '{field} Belum Dipilih !',
           
          ]
          ],
          'nis' => [
            'label' => 'NIS',
            'rules' => 'required|is_unique[tbl_anggota.nis]',
            'errors' => [
              'required' => '{field} Masih kosong !',
              'is_unique' => '{field} Sudah Terdaftar !',
             
            ]
            ],
            'nama_siswa' => [
              'label' => 'nama_siswa',
              'rules' => 'required',
              'errors' => [
                'required' => '{field} Masih kosong !',
                
               
              ]
              ],
              'no_hp' => [
                'label' => 'No Handpone',
                'rules' => 'required',
                'errors' => [
                  'required' => '{field} Masih kosong !',
                  
                 
                ]
                ],
          'pasword' => [
            'label' => 'Pasword',
            'rules' => 'required',
            'errors' => [
              'required' => '{field} Masih kosong !',
              
             
            ]
            ],
            'ulangi_pasword' => [
              'label' => 'Ulangi Pasword',
              'rules' => 'required|matches[pasword]',
              'errors' => [
                'required' => '{field} Masih kosong !',
                'matches' => '{field} Tidak sama dengan pasword sebelumnya !',
               
              ]
              ],
          ])){
            //jika lolos validasi
            $data = [
              'id_kelas' => $this->request->getPost('id_kelas'),
              'nis' => $this->request->getPost('nis'),
              'nama_siswa' => $this->request->getPost('nama_siswa'),
              'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
              'no_hp' => $this->request->getPost('no_hp'),
              'pasword' => $this->request->getPost('pasword'),
              'verifikasi' => '0',
            ];
            $this->ModelAuth->Daftar($data);
            session()->setFlashdata('pesan', 'Pendaftaran Berhasil !!! Silahkan Login');
            return redirect()->to(base_url('Auth/Register'));

          //jika tidak lolos validasi
          }else{
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('Auth/Register'))->withInput('valitadion', \Config\Services::validation());

          }
        
           

    }
    public function  CekLoginAnggota (){
      if ($this->validate([
        'nis' => [
          'label' => 'nis',
          'rules' => 'required',
          'errors' => [
            'required' => '{field} Masih kosong !',
           
          ]
          ],
          'pasword' => [
            'label' => 'Pasword',
            'rules' => 'required',
            'errors' => [
              'required' => '{field} Masih kosong !',
              
             
            ]
            ],
          ])){
           
            $nis = $this->request->getPost('nis');
            $pasword = $this->request->getPost('pasword');
            $cek_login = $this->ModelAuth->LoginAnggota($nis, $pasword);
            if ($cek_login) {
              session()->set('id_anggota', $cek_login['id_anggota']);
              session()->set('nama_siswa', $cek_login['nama_siswa']);
              
              session()->set('level', 'Anggota');
              return redirect()->to(base_url('Anggota'));
            }else{
              
            // Jika login gagal, tampilkan pesan error atau kembali ke halaman login
           session()->setFlashdata('pesan', 'Nis atau password salah !');
           return redirect()->to(base_url('Auth/LoginAnggota'));
        }
    } else {
        // Jika validasi gagal, kembali ke halaman login dengan pesan error
        session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
        return redirect()->to(base_url('Auth/LoginAnggota'));
    }
  }
        
}