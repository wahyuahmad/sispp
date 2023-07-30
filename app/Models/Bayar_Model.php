<?php

namespace App\Models;

use CodeIgniter\Model;

class Bayar_Model extends Model
{


    protected $table = 'bayar';
    protected $primaryKey = 'id_bayar';
    protected $allowedFields = ['nisn', 'nm_siswa', 'id_kelas', 'id_spp', 'id_beasiswa', 'jumlah', 'bulan', 'tgl_bayar', 'jumlah_bayar'];
    protected $useAutoIncrement = true;
    protected $returntype = 'array';

    public function getisi()
    {
        $builder = $this->db->table('bayar');
        $builder->join('spp', 'spp.id_spp=bayar.id_spp')->join('beasiswa', 'beasiswa.id_beasiswa=bayar.id_beasiswa')->join('kelas', 'kelas.id_kelas=bayar.id_kelas')->orderBy('tgl_bayar', 'DESC');
        $query = $builder->get();
        return $query->getResultArray();
    }
    public function getsiswa($nis)
    {
        return $this->where(['nis' => $nis])->first();
    }
}
