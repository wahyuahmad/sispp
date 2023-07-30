<?php

namespace App\Models;

use CodeIgniter\Model;

class Home_Model extends Model
{

    protected $table = 'siswa';

    public function tot_siswa()
    {
        return $this->db('sispp')->table('siswa')->countAll();
    }

    public function tot_kelas()
    {
        return $this->db('sispp')->table('kelas')->countAll();
    }
    public function tot_pendapatan()
    {
        $builder = $this->db->table('bayar_bebas');
        $builder->selectSum('jumlah_bayar');
        $query = $builder->get();
        return $query->getRow()->jumlah_bayar;
    }
    public function tot_tunggakan()
    {
        $builder = $this->db->table('tunggakan');
        $builder->selectSum('jumlah');
        $query = $builder->get();
        return $query->getRow()->jumlah;
    }
    public function gettransaksi($tahun)
    {
        return $this->db->table('bayar_bebas as b')->select("MONTH(tgl_bayar) bulan,(jumlah_bayar) total")
            ->where('YEAR(tgl_bayar)', $tahun)->orderBy('jumlah_bayar')
            ->get()->getResultArray();
    }
    public function get_jumlah_transaksi($tahun)
    {
        return $this->db->table('bayar_bebas')->select("MONTH(tgl_bayar) bulan, count(tgl_bayar) total")
            ->where('YEAR(tgl_bayar)', $tahun)->orderBy('MONTH(tgl_bayar)')
            ->get()->getResultArray();
    }
}
