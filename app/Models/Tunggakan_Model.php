<?php

namespace App\Models;

use CodeIgniter\Model;

class Tunggakan_Model extends Model
{


    protected $table = 'tunggakan';
    protected $primaryKey = 'id_bayar';
    protected $allowedFields = ['id_bayar', 'id_siswa', 'nis', 'nm_siswa', 'id_kelas', 'id_spp', 'jumlah', 'bulan', 'tgl_bayar', 'keterangan', 'beasiswa'];
    protected $useAutoIncrement = true;
    protected $returntype = 'array';

    // fungsi join table
    public function getdata($tgl_awal, $tgl_akhir)
    {
        $builder = $this->db->table('tunggakan');
        $builder->join('spp', 'spp.id_spp=tunggakan.id_spp')->join('kelas', 'kelas.id_kelas=tunggakan.id_kelas')
            ->where('tgl_bayar >=', $tgl_awal)
            ->where('tgl_bayar <=', $tgl_akhir);
        $query = $builder->get();
        return $query->getResultArray();
    }
    public function getkelas($kelas)
    {
        $builder = $this->db->table('tunggakan');
        $builder->join('spp', 'spp.id_spp=tunggakan.id_spp')->join('kelas', 'kelas.id_kelas=tunggakan.id_kelas')
            ->where('kelas', $kelas);
        $query = $builder->get();
        return $query->getResultArray();
    }
    public function getsiswa($keyword)
    {
        $builder = $this->db->table('tunggakan');
        $builder->join('spp', 'spp.id_spp=tunggakan.id_spp')
            ->join('kelas', 'kelas.id_kelas=tunggakan.id_kelas')->where('nis', $keyword);
        $query = $builder->get();
        return $query->getResultArray();
    }


    public function laporan_siswa($nis)
    {
        $builder = $this->db->table('tunggakan');
        $builder->join('spp', 'spp.id_spp=tunggakan.id_spp')->join('kelas', 'kelas.id_kelas=tunggakan.id_kelas')
            ->where('id_siswa', $nis);
        $query = $builder->get();
        return $query->getResultArray();
    }
}
