<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelAnggota;
use App\Models\ModelKelas;


class Verifikasi extends BaseController
{
  protected $ModelAnggota;
  protected $ModelKelas;
  public function __construct()
  {
      helper('form');
      $this->ModelAnggota = new ModelAnggota;
      $this->ModelKelas = new ModelKelas;
  }

  public function index(){
    
    $data = [
        'menu' => 'masteranggota',
        'submenu' => 'verifikasi',
        'judul' => 'Anggota',
        'page' => 'anggota/v_index',
        'anggota' => $this->ModelAnggota->AllData(),
    ];
    return view('v_template_admin', $data);
  }
  public function Verifikasi($id_anggota)
  {
    $data = [
      'id_anggota' => $id_anggota,
      'verifikasi' => '1',
    ];
    $this->ModelAnggota->EditData($data);
    session()->setFlashdata('pesan', 'Anggota Berhasil Di Verifikasi');
    return redirect()->to(base_url('Verifikasi'));

  }
  public function AddData(){
    $data = [
      'menu' => 'masteranggota',
      'submenu' => 'verifikasi',
      'judul' => 'Tambah Data Anggota',
      'page' => 'anggota/v_adddata',
      'kelas' => $this->ModelKelas->AllData(),
      
  ];
  return view('v_template_admin', $data);

   }

    public function  SaveData()
    {
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
            'foto' => [
              'label' => 'foto siswa',
              'rules' => 'uploaded[foto]|max_size[foto,1024]|mime_in[foto,image/png,image/jpg,image/jpeg]',
              'errors' => [
                'aploaded' => '{field} wajib di isi',
                'max_size' => '{field} Max 1024 kb',
                'mime_in' => ' format {field}  harus PNG,JPG DAN JPEG '

              ]
            ]
            
          ])){
            //jika lolos validasi
            $foto = $this->request->getFile('foto');
            $nama_file = $foto->getRandomName();
            $data = [
              'id_kelas' => $this->request->getPost('id_kelas'),
              'nis' => $this->request->getPost('nis'),
              'nama_siswa' => $this->request->getPost('nama_siswa'),
              'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
              'no_hp' => $this->request->getPost('no_hp'),
              'pasword' => $this->request->getPost('pasword'),
              'verifikasi' => '1',
              'foto' => $nama_file
            ];
            $foto->move('foto', $nama_file);
            $this->ModelAnggota->AddData($data);
            session()->setFlashdata('pesan', 'Tambah Anggota  Berhasil  di simpan!!!');
            return redirect()->to(base_url('Verifikasi/AddData'));

          //jika tidak lolos validasi
          }else{
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('Verifikasi/AddData'))->withInput('valitadion', \Config\Services::validation());

          }

    }
    public function EditData($id_anggota){
      $data = [
        'menu' => 'masteranggota',
        'submenu' => 'verifikasi',
        'judul' => 'Edit Data Anggota',
        'page' => 'anggota/v_editdata',
        'kelas' => $this->ModelKelas->AllData(),
        'verifikasi' => $this->ModelAnggota->DetailData($id_anggota),
        
    ];
    return view('v_template_admin', $data);
  
     }

     public function UpdateData($id_anggota)
     {
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
            'rules' => 'required',
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
            'foto' => [
              'label' => 'foto siswa',
              'rules' => 'max_size[foto,1024]|mime_in[foto,image/png,image/jpg,image/jpeg]',
              'errors' => [
                'aploaded' => '{field} wajib di isi',
                'max_size' => '{field} Max 1024 kb',
                'mime_in' => ' format {field}  harus PNG,JPG DAN JPEG '

              ]
            ]
            
          ])){
            //jika lolos validasi
            $foto = $this->request->getFile('foto');
            // jika tidak mengganti foto
            if ($foto->getError() == 4) {
              $data = [
                'id_anggota' => $id_anggota,
                'id_kelas' => $this->request->getPost('id_kelas'),
                'nis' => $this->request->getPost('nis'),
                'nama_siswa' => $this->request->getPost('nama_siswa'),
                'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
                'no_hp' => $this->request->getPost('no_hp'),
                'pasword' => $this->request->getPost('pasword'),
                'verifikasi' => '1',
                
              ];
             
              $this->ModelAnggota->EditData($data);

            }else{
              //hapus foto lama
              $verifikasi  = $this->ModelAnggota->DetailData($id_anggota);
              if ($verifikasi['foto']<> '' or $verifikasi['foto'] <> null ){
                unlink('foto/'. $verifikasi['foto']);
              }
              // jika mengganti foto
              $nama_file = $foto->getRandomName();
              $data = [
                'id_anggota' => $id_anggota,
                'id_kelas' => $this->request->getPost('id_kelas'),
                'nis' => $this->request->getPost('nis'),
                'nama_siswa' => $this->request->getPost('nama_siswa'),
                'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
                'no_hp' => $this->request->getPost('no_hp'),
                'pasword' => $this->request->getPost('pasword'),
                'verifikasi' => '1',
                'foto' => $nama_file
              ];
              $foto->move('foto', $nama_file);
              $this->ModelAnggota->EditData($data);

            }
           
            session()->setFlashdata('pesan', 'Ubah Anggota  Berhasil  di update!!!');
            return redirect()->to(base_url('Verifikasi'));

          //jika tidak lolos validasi
          }else{
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('Verifikasi/EditData/'.$id_anggota));

          }
     }

     public function DeleteData($id_anggota)
     {
      //  hapus foto
      $verifikasi  = $this->ModelAnggota->DetailData($id_anggota);
              if ($verifikasi['foto']<> '' or $verifikasi['foto'] <> null ){
                unlink('foto/'. $verifikasi['foto']);
              }
              $data = ['id_anggota' => $id_anggota];
              $this->ModelAnggota->DeleteData($data);
              session()->setFlashdata('pesan', 'Data Berhasil Di Hapus');
              return redirect()->to(base_url('Verifikasi'));
     }



}