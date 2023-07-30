<?php

namespace App\Controllers;

use App\Models\BebasBayar_Model;
use App\Models\Siswa_Model;
use App\Models\Kelas_Model;
use App\Models\Bebas_Model;
use Dompdf\Dompdf;

class bebas_bayar extends BaseController
{
    public function __construct()
    {

        $this->BebasBayar_Model = new BebasBayar_Model();
        $this->Siswa_Model = new Siswa_Model();
        $this->Kelas_Model = new Kelas_Model();
        $this->Bebas_Model = new Bebas_Model();
    }
    public function index()
    {
        $data = ['bebas' => $this->Siswa_Model->getsiswa()];
        return view("/content/tagihan_bebas", $data);
    }
    public function input($id_siswa)
    {
        $data =
            [
                'siswa' => $this->Siswa_Model->getedit($id_siswa),
                'spp' => $this->Bebas_Model->findall(),
                'kelas' => $this->Kelas_Model->findall()
            ];

        return view('/form/input_tunggakan', $data);
    }

    public function simpan_tagihan()
    {
        $this->BebasBayar_Model->save([
            'nis' => $this->request->getPost('nis'),
            'nama_siswa' => $this->request->getPost('nama'),
            'id_kelas' => $this->request->getPost('kelas'),
            'id_bebas' => $this->request->getPost('bebas'),
        ]);
        session()->setFlashdata('pesan', 'Berhasil');
        return redirect()->to('/bebas_bayar');
    }
    public function data_bayar()
    {
        $data = ['bebas' => $this->BebasBayar_Model->bayar()];
        return view("/content/bayar_bebas", $data);
    }
    public function bayar($id_bayar)
    {
        $data = [
            'bayar' => $this->BebasBayar_Model->getbayar($id_bayar),
            'siswa' => $this->Siswa_Model->findall(),
            'kelas' => $this->Kelas_Model->findall(),
            'bebas' => $this->Bebas_Model->findall(),
        ];
        return view('form/bayar_bebas', $data);
    }
    public function simpan($id_bayar)
    {
        $this->BebasBayar_Model->update($id_bayar, [
            'nm_siswa' => $this->request->getPost('nama'),
            'id_kelas' => $this->request->getPost('kelas'),
            'id_bebas' => $this->request->getPost('bebas'),
            'tgl_bayar' => date('y-m-d'),
            'jumlah_bayar' => $this->request->getPost('jumlahbayar'),
        ]);
        session()->setFlashdata('pesan', 'Berhasil');
        return redirect()->to('/bebas_bayar/data_bayar');
    }

    public function cetak_kuitansi($id_bayar)
    {
        //reference the Dompdf namespace

        // instantiate and use the dompdf class
        $data = [
            'bayar' => $this->BebasBayar_Model->getbayar($id_bayar),
            'siswa' => $this->Siswa_Model->findall(),
            'kelas' => $this->Kelas_Model->findall(),
            'bebas' => $this->Bebas_Model->findall($id_bayar),
        ];
        $view = view('/content/kuitansi', $data);
        $dompdf = new Dompdf();
        $dompdf->loadHtml($view);

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'landscape');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream("Kuitansi Pembayaran", array('Attachment' => false));
    }
}
