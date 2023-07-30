<?php

namespace App\Controllers;

use App\Models\Siswa_Model;
use App\Models\Kelas_Model;
use App\Models\Spp_Model;
use App\Models\Tunggakan_Model;
use App\Models\BebasBayar_Model;
use App\Models\Bebas_Model;
use App\Models\Bulan_Model;

class siswa extends BaseController
{
    protected $Siswa_Model;
    public function __construct()
    {
        $this->Siswa_Model = new Siswa_Model();
        $this->Kelas_Model = new Kelas_Model();
        $this->Spp_Model = new Spp_Model();
        $this->Tunggakan_Model = new Tunggakan_Model();
        $this->BebasBayar_Model = new BebasBayar_Model();
        $this->Bebas_Model = new Bebas_Model();
        $this->Bulan_Model = new Bulan_Model();
    }
    public function index()
    {
        $data = ['kelas' => $this->Kelas_Model->findall()];
        return view('/content/kelas_detail', $data);
    }
    public function detail($kelas)
    {

        $data = ['siswa' => $this->Siswa_Model->detail_kelas($kelas)];
        return view('/content/siswa', $data);
    }
    public function input_siswa()
    {
        $data = [
            'validation' => \Config\Services::validation(),
            'kelas' => $this->Kelas_Model->findall(),
            'spp' => $this->Spp_Model->findall(),
            'bebas' => $this->Bebas_Model->findall()
        ];
        return view('/form/input_siswa', $data);
    }
    public function save()
    {
        if (!$this->validate([
            'nis' => [
                'rules' => 'numeric|is_unique[siswa.nis]',
                'errors' => [
                    'numeric' => '{field}  harus berupa  angka!',
                    'is_unique' => '{field}  sudah ada!',
                ]
            ]
        ]));
        if (!$this->validate([
            'nama' => [
                'rules' => 'alpha_space',
                'errors' => [
                    'alpha_space' => '{field}  harus berupa  huruf !',
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/siswa/input_siswa')->withInput()->with('validation', $validation);
        }
        $this->Siswa_Model->save([
            'nis' => $this->request->getvar('nis'),
            'nm_siswa' => $this->request->getvar('nama'),
            'id_kelas' => $this->request->getvar('kelas'),
        ]);
        // $bulan = array(
        //     '01' => 'Januari',
        //     '02' => 'Februari',
        //     '03' => 'Mare',
        //     '04' => 'April',
        //     '05' => 'Mei',
        //     '06' => 'Juni',
        //     '07' => 'Juli',
        //     '08' => 'Agustus',
        //     '09' => 'September',
        //     '10' => 'Oktober',
        //     '11' => 'November',
        //     '11' => 'Desember',
        // );
        for ($i = 0; $i < 12; $i++) {
            $this->Tunggakan_Model->save([
                'id_siswa' => $this->Siswa_Model->getInsertID(),
                'nis' => $this->request->getvar('nis'),
                'nm_siswa' => $this->request->getvar('nama'),
                'id_kelas' => $this->request->getvar('kelas'),
                'id_spp' => $this->request->getvar('spp'),
                'jumlah' => $this->request->getvar('nominal'),
                'bulan' => date('m', strtotime("+$i month")),
            ]);
        };
        session()->setFlashdata('pesan', ' ditambahkan ');
        return redirect()->to('/siswa/input_siswa');
    }
    public function hapus($id_siswa)
    {
        $siswa = new Siswa_Model();
        $siswa->delete($id_siswa);
        session()->setFlashdata('pesan', 'dihapus');
        return redirect()->to('/siswa/detail/' . $this->request->uri->getSegment(4));
    }
    public function edit($id_siswa)
    {

        $data = [

            'siswa' => $this->Siswa_Model->getedit($id_siswa),
            'kelas' => $this->Kelas_Model->findall()
        ];
        return view('/form/edit_siswa', $data);
    }
    public function update($id_siswa)
    {

        $this->Siswa_Model->update($id_siswa, [
            'nis' => $this->request->getPost('nis'),
            'nm_siswa' => $this->request->getPost('nama'),
            'id_kelas' => $this->request->getPost('kelas'),
        ]);
        session()->setFlashdata('pesan', 'Diupdate');
        return redirect()->to('/siswa');
    }

    





   
}
