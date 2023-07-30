<?php

namespace App\Controllers;

use App\Models\Spp_Model;

class spp extends BaseController
{

  protected $Spp_Model;
  public function __construct()
  {
    $this->Spp_Model = new Spp_Model();
  }

  public function index()
  {
    $data = ['spp' => $this->Spp_Model->findall()];
    return view('/content/spp', $data);
  }

  public function input_spp()
  {
    $data = [
      'validation' => \Config\Services::validation(),
    ];
    return view('/form/input_spp', $data);
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
    ])) {
      $validation = \Config\Services::validation();
      return redirect()->to('/spp/input_spp')->withInput()->with('validation', $validation);
    }
    $this->Spp_Model->save([
      'tahun' => $this->request->getvar('tahun'),
      'nominal' => $this->request->getvar('nominal'),
    ]);
    session()->setFlashdata('pesan', ' ditambahkan !');
    return redirect()->to('/spp/input_spp');
  }
  public function hapus($id_spp)
  {
    $spp = new Spp_Model();
    $spp->delete($id_spp);
    session()->setFlashdata('pesan',  'dihapus !');
    return redirect()->to('/spp');
  }
  public function edit($id_spp)
  {
    $data = [
      'spp' => $this->Spp_Model->getedit($id_spp),
    ];
    return view('/form/edit_spp', $data);
  }
  public function update($id_spp)
  {

    $this->Spp_Model->update($id_spp, [
      'tahun' => $this->request->getvar('tahun'),
      'nominal' => $this->request->getvar('nominal'),
    ]);
    session()->setFlashdata('pesan', 'diupdate');
    return redirect()->to('/spp');
  }
}
