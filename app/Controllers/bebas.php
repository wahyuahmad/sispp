<?php

namespace App\Controllers;

use App\Models\Bebas_Model;

class bebas extends BaseController
{

  protected $Bebas_Model;
  public function __construct()
  {
    $this->Bebas_Model = new Bebas_Model();
  }

  public function index()
  {
    $data = ['bebas' => $this->Bebas_Model->findall()];
    return view('/content/bebas', $data);
  }

  public function input_bebas()
  {
    $data = [
      'validation' => \Config\Services::validation(),
    ];
    return view('/form/input_bebas', $data);
  }
  public function save()
  {
    if (!$this->validate([
      'tahun' => [
        'rules' => 'required',
        'errors' => [
          'required' => 'inputan tidak valid !'
        ]
      ]
    ]));
    if (!$this->validate([
      'nominal' => [
        'rules' => 'numeric',
        'errors' => [
          'numeric' => '{field}  harus berupa  angka !',
        ]
      ]
    ]));
    if (!$this->validate([
      'jenis' => [
        'rules' => 'alpha_space',
        'errors' => [
          'alpha_space' => '{field}  harus berupa  huruf !',
        ]
      ]
    ])) {
      $validation = \Config\Services::validation();
      return redirect()->to('/bebas/input_bebas')->withInput()->with('validation', $validation);
    }
    $this->Bebas_Model->save([
      'jenis' => $this->request->getvar('jenis'),
      'tahun' => $this->request->getvar('tahun'),
      'nominal' => $this->request->getvar('nominal'),
    ]);
    session()->setFlashdata('pesan', ' ditambahkan !');
    return redirect()->to('/bebas/input_bebas');
  }
  public function hapus($id_bebas)
  {
    $spp = new Bebas_Model();
    $spp->delete($id_bebas);
    session()->setFlashdata('pesan', ' dihapus !');
    return redirect()->to('/bebas');
  }
  public function edit($id_bebas)
  {
    $data = [
      'bebas' => $this->Bebas_Model->getedit($id_bebas),
    ];
    return view('/form/edit_bebas', $data);
  }
  public function update($id_bebas)
  {
    
    $this->Bebas_Model->update($id_bebas, [
      'jenis' => $this->request->getvar('jenis'),
      'tahun' => $this->request->getvar('tahun'),
      'nominal' => $this->request->getvar('nominal'),
    ]);
    session()->setFlashdata('pesan', ' diupdate');
    return redirect()->to('/bebas');
  }
}
