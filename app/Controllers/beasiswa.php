<?php

namespace App\Controllers;

use App\Models\Beasiswa_Model;


class beasiswa extends BaseController
{
  protected $Beasiswa_Model;
  public function __construct()
  {
    $this->Beasiswa_Model = new Beasiswa_Model();
  }
  public function index()
  {
    $data = [
      'beasiswa' => $this->Beasiswa_Model->findAll()
    ];
    return view('/content/beasiswa', $data);
  }

  public function input_beasiswa()
  {
    $data = [
      'validation' => \Config\Services::validation()
    ];
    return view('/form/input_beasiswa', $data);
  }
  public function save()
  {
    if (!$this->validate([
      'jenis' => [
        'rules' => 'alpha_space',
        'errors' => [
          'alpha_space' => 'inputan  tidak valid!',
        ]
      ]
    ]));
    if (!$this->validate([
      'tahun' => [
        'rules' => 'numeric',
        'errors' => [
          'numeric' => 'inputan tidak valid !',
        ]
      ]
    ])); {
      $validation = \Config\Services::validation();
      return redirect()->to('/beasiswa/input_beasiswa')->withInput()->with('validation', $validation);
    }
    $this->Beasiswa_Model->save([
      'jenis' => $this->request->getvar('jenis'),
      'tahun' => $this->request->getvar('tahun'),
    ]);
    session()->setFlashdata('pesan', 'data berhasil ditambahkan !');
    return redirect()->to('/beasiswa/input_beasiswa');
  }
  public function hapus($id_beasiswa)
  {
    $beasiswa = new Beasiswa_Model();
    $beasiswa->delete($id_beasiswa);
    session()->setFlashdata('pesan', 'data berhasil dihapus !');
    return redirect()->to('/beasiswa');
  }
  public function edit($id_beasiswa)
  {
    $data = [
      'beasiswa' => $this->Beasiswa_Model->getedit($id_beasiswa),
    ];
    return view('/form/edit_beasiswa', $data);
  }
  public function update($id_beasiswa)
  {
    $this->Beasiswa_Model->update($id_beasiswa, [
      'jenis' => $this->request->getvar('jenis'),
      'tahun' => $this->request->getvar('tahun'),
    ]);
    session()->setFlashdata('pesan', 'data berhasil diupdate');
    return redirect()->to('/beasiswa');
  }
}
