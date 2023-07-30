<?php

namespace App\Controllers;




use App\Models\Tunggakan_Model;
use App\Models\Spp_Model;
use App\Models\Bayar_Model;
use App\Models\Kelas_Model;
use App\Models\Bulan_Model;
use Dompdf\Dompdf;
use Dompdf\Options;
use TCPDF;

class tunggakan extends BaseController
{
  protected $Tunggakan_Model;
  public function __construct()
  {
    $this->Tunggakan_Model = new Tunggakan_Model();
    $this->Spp_Model = new Spp_Model();
    $this->Bayar_Model = new Bayar_Model();
    $this->Kelas_Model = new Kelas_Model();
    $this->Bulan_Model = new Bulan_Model();
  }
  public function index($tgl_awal = null, $tgl_akhir = Null)
  {
    $tgl_1 = $tgl_awal == null ? date('Y-m-01') : $tgl_awal;
    $tgl_2 = $tgl_akhir == null ? date('Y-m-t') : $tgl_akhir;
    $data = [
      'tunggakan' => $this->Tunggakan_Model->getdata($tgl_1, $tgl_2),
      'tanggal' => [
        'tgl_awal' => $tgl_1,
        'tgl_akhir' => $tgl_2
      ],
      'kelas' => $this->Kelas_Model->findall()
    ];
    return view('/content/tunggakan', $data);
  }
  public function filter()
  {
    $tgl_awal = $this->request->getVar('tgl_awal');
    $tgl_akhir = $this->request->getVar('tgl_akhir');
    return $this->index($tgl_awal, $tgl_akhir);
  }
  public function export_pdf($tgl_awal = null, $tgl_akhir = null)
  {
    $tgl_awal = $this->request->getPost('tgl_awal');
    $tgl_akhir = $this->request->getPost('tgl_akhir');
    $laporan = new Tunggakan_Model();
    $tunggakan = $laporan->getdata($tgl_awal, $tgl_akhir);
    $data = [
      'result' => $tunggakan,
      'tglawal' => $tgl_awal,
      'tglakhir' => $tgl_akhir
    ];
    $view =  view('/content/export_laporan', $data);






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
  public function export_kelas($kelas = null)
  {
    $kelas = $this->request->getPost('kelas');
    $laporan = new Tunggakan_Model();
    $tunggakan = $laporan->getkelas($kelas);
    $data = [
      'result' => $tunggakan,
      'kelas' => $kelas,
    ];
    $view = view('content/export_kelas', $data);


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
  //cari siswa
  public function cari($keyword = null)

  {
    //redirect()->to('tunggakan/cari?nis=' . base64_encode($parameter));


    $keyword = $this->request->getVar('nis');
    $data = [
      'siswa' => $this->Tunggakan_Model->getsiswa($keyword),
    ];

    return view('/form/bayar_spp', $data);
  }


  public function bayar($id_Siswa = null)
  {
    $parameter = $this->request->uri->getSegment(4);

    $this->Tunggakan_Model->update($id_Siswa, [
      'tgl_bayar' => date('Y-m-d')
    ]);
    session()->setFlashdata('pesan', 'disimpan');
    return redirect()->to('tunggakan/cari?nis=' . $parameter);
  }
}
