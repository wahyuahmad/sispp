<?php

namespace App\Models;

use CodeIgniter\HTTP\Request;
use CodeIgniter\Model;

class Siswa_Model extends Model
{


    protected $table = 'siswa';
    protected $primaryKey = 'id_siswa';
    protected $allowedFields = ['nis', 'nm_siswa', 'id_kelas'];
    protected $useAutoIncrement = true;
    protected $returntype = 'array';

    // fungsi join table
    public function getsiswa()
    {
        $builder = $this->db->table('siswa');
        $builder->join('kelas', 'kelas.id_kelas=siswa.id_kelas');
        $query = $builder->get();
        return $query->getResultArray();
    }
    public function detail_kelas($kelas)
    {
        $builder = $this->db->table('siswa');
        $builder->join('kelas', 'kelas.id_kelas=siswa.id_kelas')->where('kelas', $kelas);
        $query = $builder->get();
        return $query->getResultArray();
    }
    // fungsi edit
    public function getedit($id_siswa)
    {
        return $this->where(['id_siswa' => $id_siswa])->first();
    }
    public function histori()
    {
        $builder = $this->db->table('tunggakan');
        $builder->join('spp', 'spp.id_spp=tunggakan.id_spp')
            ->join('kelas', 'kelas.id_kelas=tunggakan.id_kelas')->where('nm_siswa', user()->username);
        $query = $builder->get();
        return $query->getResultArray();
    }
    public function histori_bayar()
    {
        $builder = $this->db->table('bayar_bebas');
        $builder->join('kelas', 'kelas.id_kelas=bayar_bebas.id_kelas')->join('bebas', 'bebas.id_bebas=bayar_bebas.id_bebas')
            ->where('nama_siswa', user()->username);
        $query = $builder->get();
        return $query->getResultArray();
    }
}
