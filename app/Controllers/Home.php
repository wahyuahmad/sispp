<?php

namespace App\Controllers;

use App\Models\Home_Model;
use App\Models\Siswa_Model;


class Home extends BaseController
{
    public function __construct()
    {
        $this->Home_Model = new Home_Model();
        $this->Siswa_Model = new Siswa_Model();
    }

    public function index()
    {

        $data = array(

            'tot_siswa' => $this->Home_Model->tot_siswa(),
            'tot_kelas' => $this->Home_Model->tot_kelas(),
            'total' => $this->Home_Model->tot_pendapatan(),
            'tot_tagihan' => $this->Home_Model->tot_tunggakan(),
            'spp' => $this->Siswa_Model->histori(),
            'bebas' => $this->Siswa_Model->histori_bayar(),
        );
        return view("content/home", $data);
    }
    public function showChartTransaksi()
    {
        $tahun = date('Y');
        $data_transaksi = $this->Home_Model->gettransaksi($tahun);
        $response = [
            'status' > true,
            'data' => $data_transaksi
        ];
        echo json_encode($response);
    }
    public function showJumlahTransaksi()
    {
        $tahun = date('Y');
        $data_siswa = $this->Home_Model->get_jumlah_transaksi($tahun);
        $response = [
            'status' > true,
            'data' => $data_siswa
        ];
        echo json_encode($response);
    }
    public function histori_bayar()
    {
        $data = ['spp' => $this->Siswa_Model->histori()];
        return view('/form/histori', $data);
    }
}
