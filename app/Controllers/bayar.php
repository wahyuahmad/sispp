<?php

namespace App\Controllers;

use App\Models\Bayar_Model;
use App\Models\Kelas_Model;
use App\Models\Tunggakan_Model;
use App\Models\Spp_Model;
use App\Models\Beasiswa_Model;

class bayar extends BaseController
{
    public function __construct()
    {
        $this->Bayar_Model = new Bayar_Model();
        $this->Spp_Model = new Spp_Model();
        $this->Bayar_Model = new Bayar_Model();
        $this->Beasiswa_Model = new Beasiswa_Model();
        $this->Kelas_Model = new Kelas_Model();
        $this->Tunggakan_Model = new Tunggakan_Model();
    }

    public function index()
    {


        return view("content/bayar");
    }

    public function save($id_siswa)
    {
        $this->Bayar_Model->save([
            'nisn' => $this->request->getvar('nis'),
            'nm_siswa' => $this->request->getvar('siswa'),
            'id_kelas' => $this->request->getVar('kelas'),
            'id_spp' => $this->request->getvar('spp'),
            'id_beasiswa' => $this->request->getvar('beasiswa'),
            'jumlah' => $this->request->getvar('jumlah'),
            'bulan' => $this->request->getvar('bulan'),
            'tgl_bayar' => date('y-m-d'),
            'jumlah_bayar' => $this->request->getvar('jumlahbayar'),
        ]);
        $data = [
            'siswa' => $this->Tunggakan_Model->getsiswa($id_siswa),
            'kelas' => $this->Kelas_Model->findall(),
            'spp' => $this->Spp_Model->findall(),
            'Beasiswa' => $this->Beasiswa_Model->findall(),
            'data' => $this->Bayar_Model->getisi()
        ];
        return view('/form/bayar_spp', $data);
    }
}
