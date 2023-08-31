<?php

namespace App\Controllers;
use App\Models\ModelBuku;
use App\Models\ModelRak;
use App\Models\ModelPenerbit;
use App\Models\ModelPengarang;
use App\Models\ModelKategori;


class Buku extends BaseController
{
  protected $ModelBuku;
  protected $ModelKategori;
  protected $ModelPenerbit;
  protected $ModelRak;
  protected $ModelPengarang;
  
  public function __construct() {
    helper('form');
    $this->ModelBuku = new ModelBuku;
    $this->ModelKategori = new ModelKategori;
    $this->ModelRak = new ModelRak;
    $this->ModelPenerbit = new ModelPenerbit;
    $this->ModelPengarang = new ModelPengarang;
  }
  public function index()
  {
    $data = [
      'menu' => 'masterbuku',
      'submenu' => 'buku',
      'judul' => 'Buku',
      'page' => 'buku/v_index',
      'buku' => $this->ModelBuku->AllData(),
  ];
  return view('v_template_admin', $data);
  }
  public function AddData(){
    $data = [
      'menu' => 'masterbuku',
      'submenu' => 'verifikasi',
      'judul' => 'Tambah Data buku',
      'page' => 'buku/v_adddata',
      'kategori' => $this->ModelKategori->AllData(),
      'pengarang' => $this->ModelPengarang->AllData(),
      'penerbit' => $this->ModelPenerbit->AllData(),
      'rak' => $this->ModelRak->AllData(),
      
  ];
  return view('v_template_admin', $data);

   }

    public function  SaveData()
    {
      if ($this->validate([
        'id_kategori' => [
          'label' => 'Kategori',
          'rules' => 'required',
          'errors' => [
            'required' => '{field} Belum Dipilih !',
           
          ]
          ],
          'id_rak' => [
            'label' => 'rak',
            'rules' => 'required',
            'errors' => [
              'required' => '{field} Belum Dipilih !',
             
            ]
            ],
            'id_pengarang' => [
              'label' => 'pengarang',
              'rules' => 'required',
              'errors' => [
                'required' => '{field} Belum Dipilih !',
               
              ]
              ],
              'id_penerbit' => [
                'label' => 'penerbit',
                'rules' => 'required',
                'errors' => [
                  'required' => '{field} Belum Dipilih !',
                 
                ]
                ],
          'kode_buku' => [
            'label' => 'kode_buku',
            'rules' => 'required|is_unique[tbl_buku.kode_buku]',
            'errors' => [
              'required' => '{field} Masih kosong !',
              'is_unique' => '{field} Sudah Terdaftar !',
             
            ]
            ],
            'judul_buku' => [
              'label' => 'judul_buku',
              'rules' => 'required',
              'errors' => [
                'required' => '{field} Masih kosong !',
                
               
              ]
              ],
              'isbn' => [
                'label' => 'isbn',
                'rules' => 'required',
                'errors' => [
                  'required' => '{field} Masih kosong !',
                  
                 
                ]
                ],
          'tahun' => [
            'label' => 'tahun',
            'rules' => 'required',
            'errors' => [
              'required' => '{field} Masih kosong !',
              
             
            ]
            ],
            'bahasa' => [
              'label' => 'bahasa',
              'rules' => 'required',
              'errors' => [
                'required' => '{field} Masih kosong !',
                
               
              ]
              ],
              'halaman' => [
                'label' => 'halaman',
                'rules' => 'required',
                'errors' => [
                  'required' => '{field} Masih kosong !',
                  
                 
                ]
                ],
                'jumlah' => [
                  'label' => 'jumlah',
                  'rules' => 'required',
                  'errors' => [
                    'required' => '{field} Masih kosong !',
                    
                   
                  ]
                  ],
            'cover' => [
              'label' => 'cover',
              'rules' => 'uploaded[cover]|max_size[cover,1024]|mime_in[cover,image/png,image/jpg,image/jpeg]',
              'errors' => [
                'aploaded' => '{field} wajib di isi',
                'max_size' => '{field} Max 1024 kb',
                'mime_in' => ' format {field}  harus PNG,JPG DAN JPEG '

              ]
            ]
            
          ])){
            //jika lolos validasi
            $cover = $this->request->getFile('cover');
            $nama_file = $cover->getRandomName();
            $data = [
              'id_penerbit' => $this->request->getPost('id_penerbit'),
              'id_pengarang' => $this->request->getPost('id_pengarang'),
              'id_rak' => $this->request->getPost('id_rak'),
              'id_kategori' => $this->request->getPost('id_kategori'),
              'kode_buku' => $this->request->getPost('kode_buku'),
              'judul_buku' => $this->request->getPost('judul_buku'),
              'isbn' => $this->request->getPost('isbn'),
              'tahun' => $this->request->getPost('tahun'),
              'bahasa' => $this->request->getPost('bahasa'),
              'halaman' => $this->request->getPost('halaman'),
              'jumlah' => $this->request->getPost('jumlah'),
              'cover' => $nama_file
            ];
            $cover->move('cover', $nama_file);
            $this->ModelBuku->AddData($data);
            session()->setFlashdata('pesan', 'Tambah Buku  Berhasil  di simpan!!!');
            return redirect()->to(base_url('Buku/AddData'));

          //jika tidak lolos validasi
          }else{
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('Buku/AddData'))->withInput('valitadion', \Config\Services::validation());

          }

    }
    public function EditData($id_buku){
      $data = [
        'menu' => 'masterbuku',
        'submenu' => 'buku',
        'judul' => 'Edit Data Buku',
        'page' => 'buku/v_editdata',
        'kategori' => $this->ModelKategori->AllData(),
      'pengarang' => $this->ModelPengarang->AllData(),
      'penerbit' => $this->ModelPenerbit->AllData(),
      'rak' => $this->ModelRak->AllData(),
        'buku' => $this->ModelBuku->DetailData($id_buku),
        
    ];
    return view('v_template_admin', $data);
  
     }

     public function UpdateData($id_buku)
     {
      if ($this->validate([
        'id_kategori' => [
          'label' => 'Kategori',
          'rules' => 'required',
          'errors' => [
            'required' => '{field} Belum Dipilih !',
           
          ]
          ],
          'id_rak' => [
            'label' => 'rak',
            'rules' => 'required',
            'errors' => [
              'required' => '{field} Belum Dipilih !',
             
            ]
            ],
            'id_pengarang' => [
              'label' => 'pengarang',
              'rules' => 'required',
              'errors' => [
                'required' => '{field} Belum Dipilih !',
               
              ]
              ],
              'id_penerbit' => [
                'label' => 'penerbit',
                'rules' => 'required',
                'errors' => [
                  'required' => '{field} Belum Dipilih !',
                 
                ]
                ],
          'kode_buku' => [
            'label' => 'kode_buku',
            'rules' => 'required|is_unique[tbl_buku.kode_buku]',
            'errors' => [
              'required' => '{field} Masih kosong !',
              'is_unique' => '{field} Sudah Terdaftar !',
             
            ]
            ],
            'judul_buku' => [
              'label' => 'judul_buku',
              'rules' => 'required',
              'errors' => [
                'required' => '{field} Masih kosong !',
                
               
              ]
              ],
              'isbn' => [
                'label' => 'isbn',
                'rules' => 'required',
                'errors' => [
                  'required' => '{field} Masih kosong !',
                  
                 
                ]
                ],
          'tahun' => [
            'label' => 'tahun',
            'rules' => 'required',
            'errors' => [
              'required' => '{field} Masih kosong !',
              
             
            ]
            ],
            'bahasa' => [
              'label' => 'bahasa',
              'rules' => 'required',
              'errors' => [
                'required' => '{field} Masih kosong !',
                
               
              ]
              ],
              'halaman' => [
                'label' => 'halaman',
                'rules' => 'required',
                'errors' => [
                  'required' => '{field} Masih kosong !',
                  
                 
                ]
                ],
                'jumlah' => [
                  'label' => 'jumlah',
                  'rules' => 'required',
                  'errors' => [
                    'required' => '{field} Masih kosong !',
                    
                   
                  ]
                  ],
            'cover' => [
              'label' => 'cover',
              'rules' => 'uploaded[cover]|max_size[cover,1024]|mime_in[cover,image/png,image/jpg,image/jpeg]',
              'errors' => [
                'aploaded' => '{field} wajib di isi',
                'max_size' => '{field} Max 1024 kb',
                'mime_in' => ' format {field}  harus PNG,JPG DAN JPEG '

              ]
            ]
       
          ])){
            //jika lolos validasi
            $cover = $this->request->getFile('cover');
            // jika tidak mengganti foto
            if ($cover->getError() == 4) {
              $data = [
                'id_buku' => $id_buku,
                'id_penerbit' => $this->request->getPost('id_penerbit'),
                'id_pengarang' => $this->request->getPost('id_pengarang'),
                'id_rak' => $this->request->getPost('id_rak'),
                'id_kategori' => $this->request->getPost('id_kategori'),
                'kode_buku' => $this->request->getPost('kode_buku'),
                'judul_buku' => $this->request->getPost('judul_buku'),
                'isbn' => $this->request->getPost('isbn'),
                'tahun' => $this->request->getPost('tahun'),
                'bahasa' => $this->request->getPost('bahasa'),
                'halaman' => $this->request->getPost('halaman'),
                'jumlah' => $this->request->getPost('jumlah'),
                
                
              ];
             
              $this->ModelBuku->EditData($data);

            }else{
              //hapus foto lama
              $buku  = $this->ModelBuku->DetailData($id_buku);
              if ($buku['cover']<> '' or $buku['cover'] <> null ){
                unlink('cover/'. $buku['cover']);
              }
              // jika mengganti cover
              $nama_file = $cover->getRandomName();
              $data = [
                'id_buku' => $id_buku,
                'id_penerbit' => $this->request->getPost('id_penerbit'),
                'id_pengarang' => $this->request->getPost('id_pengarang'),
                'id_rak' => $this->request->getPost('id_rak'),
                'id_kategori' => $this->request->getPost('id_kategori'),
                'kode_buku' => $this->request->getPost('kode_buku'),
                'judul_buku' => $this->request->getPost('judul_buku'),
                'isbn' => $this->request->getPost('isbn'),
                'tahun' => $this->request->getPost('tahun'),
                'bahasa' => $this->request->getPost('bahasa'),
                'halaman' => $this->request->getPost('halaman'),
                'jumlah' => $this->request->getPost('jumlah'),
                'cover' => $nama_file
              ];
              $cover->move('cover', $nama_file);
              $this->ModelBuku->EditData($data);

            }
           
            session()->setFlashdata('pesan', 'Ubah buku  Berhasil  di update!!!');
            return redirect()->to(base_url('Buku'));

          //jika tidak lolos validasi
          }else{
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('Buku/EditData/'.$id_buku));

          }
     }

     public function DeleteData($id_buku)
     {
      //  hapus foto
      $buku  = $this->ModelBuku->DetailData($id_buku);
              if ($buku['cover']<> '' or $buku['cover'] <> null ){
                unlink('cover/'. $buku['cover']);
              }
              $data = ['id_buku' => $id_buku];
              $this->ModelBuku->DeleteData($data);
              session()->setFlashdata('pesan', 'Data Berhasil Di Hapus');
              return redirect()->to(base_url('Buku'));
     }

}
