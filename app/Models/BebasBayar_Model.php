<?php

namespace App\Models;

use CodeIgniter\Model;

class BebasBayar_Model extends Model
{


    protected $table = 'bayar_bebas';
    protected $primaryKey = 'id_bayar';
    protected $allowedFields = ['nis', 'nama_siswa', 'id_kelas', 'id_bebas', 'tgl_bayar', 'jumlah_bayar'];
    protected $useAutoIncrement = true;
    protected $returntype = 'array';

    // fungsi join table
    public function bayar()
    {
        $builder = $this->db->table('bayar_bebas');
        $builder->join('kelas', 'kelas.id_kelas=bayar_bebas.id_kelas')->join('bebas', 'bebas.id_bebas=bayar_bebas.id_bebas');
        $query = $builder->get();
        return $query->getResultArray();
    }
    public function getbayar($id_bayar)
    {
        return $this->join('bebas', 'bebas.id_bebas=bayar_bebas.id_bebas')->where(['id_bayar' => $id_bayar])->first();
    }
    public function laporan_bebas($bebas, $kelas)
    {
        $builder = $this->db->table('bayar_bebas');
        $builder->join('kelas', 'kelas.id_kelas=bayar_bebas.id_kelas')->join('bebas', 'bebas.id_bebas=bayar_bebas.id_bebas')
            ->where('jenis', $bebas)->where('kelas', $kelas)->orderBy('nama_siswa', 'ASC');
        $query = $builder->get();
        return $query->getResultArray();
    }

    public function getsiswa($keyword)
    {
        $builder = $this->db->table('bayar_bebas');
        $builder->join('kelas', 'kelas.id_kelas=bayar_bebas.id_kelas')->join('bebas', 'bebas.id_bebas=bayar_bebas.id_bebas')
            ->where('nis', $keyword);
        $query = $builder->get();
        return $query->getResultArray();
    }
    public function filter($keyword)
    {
        $builder = $this->db->table('bayar_bebas');
        $builder->join('kelas', 'kelas.id_kelas=bayar_bebas.id_kelas')->join('bebas', 'bebas.id_bebas=bayar_bebas.id_bebas')
            ->where('jenis', $keyword);
        $query = $builder->get();
        return $query->getResultArray();
    }
    function cetak_siswa($nis)
    {
        $builder = $this->db->table('bayar_bebas');
        $builder->join('bebas', 'bebas.id_bebas=bayar_bebas.id_bebas')->join('kelas', 'kelas.id_kelas=bayar_bebas.id_kelas')
            ->where('nis', $nis);
        $query = $builder->get();
        return $query->getResultArray();
    }
}
