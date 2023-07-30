<?php

namespace App\Controllers;

use App\Models\BebasBayar_Model;
use App\Models\Bebas_Model;
use App\Models\Siswa_Model;
use App\Models\Kelas_Model;
use App\Models\Tunggakan_Model;
use Dompdf\Dompdf;

class laporan extends BaseController
{
    protected $BebasBayar_Model;
    public function __construct()
    {
        $this->BebasBayar_Model = new BebasBayar_Model();
        $this->Bebas_Model = new Bebas_Model();
        $this->Siswa_Model = new Siswa_Model();
        $this->Kelas_Model = new Kelas_Model();
    }

    public function spp()
    {
        $data = [
            'bayar' => $this->BebasBayar_Model->bayar(),
            'bebas' => $this->Bebas_Model->findall(),
            'kelas' => $this->Kelas_Model->findall(),
        ];
        return view('content/laporan_spp', $data);
    }

    public function laporan_siswa()
    {
        $data = ['siswa' => $this->Siswa_Model->getsiswa()];
        return view("/content/laporan_siswa", $data);
    }

    public function siswa_spp($nis)
    {
        $laporan = new Tunggakan_Model();
        $tunggakan = $laporan->laporan_siswa($nis);
        $data = [
            'result' => $tunggakan, 'nis' => $nis,

        ];
        $view = view('content/export_siswa', $data);
        $dompdf = new Dompdf();

        // instantiate and use the dompdf class
        $dompdf->loadHtml($view);

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'potrait');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream(" laporan SPP", array('Attachment' => false));
    }
    public function siswa_bebas($nis)
    {
        $laporan = new BebasBayar_Model();
        $tunggakan = $laporan->cetak_siswa($nis);
        $data = [
            'result' => $tunggakan, 'nis' => $nis,

        ];
        $view = view('content/export_siswa_bebas', $data);
        $dompdf = new Dompdf();

        // instantiate and use the dompdf class
        $dompdf->loadHtml($view);

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'portrait');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream(" laporan SPP Bebas", array('Attachment' => false));
    }
    public function cetak_laporan()
    {
        $bebas = $this->request->getPost('bebas');
        $kelas = $this->request->getPost('kelas');
        $laporan = new BebasBayar_Model();
        $tunggakan = $laporan->laporan_bebas($bebas, $kelas);
        $data = [
            'result' => $tunggakan,
            'kelas' => $bebas

        ];
        $view = view('content/export_spp_bebas', $data);
        $dompdf = new Dompdf();

        // instantiate and use the dompdf class
        $dompdf->loadHtml($view);

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'landscape');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream(" laporan SPP", array('Attachment' => false));
    }
}
