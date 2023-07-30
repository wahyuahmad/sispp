<?php

namespace App\Controllers;

use App\Models\Kelas_Model;

class kelas extends BaseController
{
    protected $Kelas_Model;
    public function __construct()
    {
        $this->Kelas_Model = new Kelas_Model();
    }

    public function index()
    {
        $data = [
            'kelas' => $this->Kelas_Model->findAll()
        ];
        return view('content/kelas', $data);
    }
    public function input_kelas()
    {
        $data = [
            'validation' => \Config\Services::validation()
        ];
        return view('form/input_kelas', $data);
    }
    public function save()
    {
        if (!$this->validate([
            'kelas' => [
                'rules' => 'is_unique[kelas.kelas]',
                'errors' => [
                    'is_unique' => '{field} sudah ada!',
                ]
            ]
        ]));
        if (!$this->validate([
            'kelas' => [
                'rules' => 'alpha_numeric_punct',
                'errors' => [
                    'alpha_numeric_punct' => 'inputan tidak valid!',
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/kelas/input_kelas')->withInput()->with('validation', $validation);
        }
        $this->Kelas_Model->save(
            [
                'kelas' => $this->request->getVar('kelas'),
                'jurusan' => $this->request->getVar('jurusan')
            ]
        );
        session()->setFlashdata('pesan', ' disimpan !');
        return redirect()->to('/kelas/input_kelas');
    }
    public function hapus($id_kelas)
    {
        $kelas = new Kelas_Model();
        $kelas->delete($id_kelas);
        session()->setFlashdata('pesan', ' dihapus !');
        return redirect()->to('/kelas');
    }

    public function edit($id_kelas)
    {
        $data = ['kelas' => $this->Kelas_Model->getedit($id_kelas)];
        return view('/form/edit_kelas', $data);
    }
    public function update($id_kelas)
    {
        $this->Kelas_Model->update($id_kelas, [
            'kelas' => $this->request->getPost('kelas'),
            'jurusan' => $this->request->getPost('jurusan'),
        ]);
        session()->setFlashdata('pesan', ' diupdate');
        return redirect()->to('/kelas');
    }
}
