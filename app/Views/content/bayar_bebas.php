<?= $this->extend("layout/template"); ?>
<?= $this->section("content"); ?>

<div class="container-fluid px-4">
    <div>
        <h3 class="mt-2"> <i class="fas fa-cash-register me-3 fa-2x"></i>Transaksi
            <h6 class=" text-primary">Transaksi Bayar Bebas</h6>
        </h3>
    </div>
    <hr class="bg-secondary">
    <div class="card mb-4">
        <div class="card-header bg-secondary text-white">
            <div class="row">
                <div class="col-md-10 mt-1"> <i class="fas fa-table me-1"></i>
                    Data Siswa</div>
            </div>
        </div>
        <div class="card-body border-bordered">
            <?php if (session()->getFlashdata('pesan')) : ?>
                <script>
                    Swal.fire({
                        title: "Pembayaran",
                        text: "<?= session()->getflashdata('pesan'); ?> dilakukan",
                        icon: 'success'
                    });
                </script>
            <?php endif; ?>
            <div class="card-body">
                <table  id="example" class="display mt-2" style="width:100%"  style="width:100%">
                    <thead>
                        <th>No</th>
                        <th>NIS</th>
                        <th>Nama Siswa</th>
                        <th>Jurusan</th>
                        <th>Nominal</th>
                        <th>kekurangan</th>
                        <th>Jumlah Bayar</th>
                        <th>Tanggal Bayar</th>
                        <th>Keterangan</th>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php
                        foreach ($bebas as $row) :
                            $kekurangan = $row['nominal'] - $row['jumlah_bayar'];
                            $jumlah_bayar = $row['jumlah_bayar']
                        ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $row['nis']; ?></td>
                                <td><?= $row['nama_siswa']; ?></td>
                                <td><?= $row['jenis']; ?></td>
                                <td><?= rupiah($row['nominal']); ?></td>
                                <td><?= rupiah($kekurangan); ?></td>
                                <td><?= rupiah($jumlah_bayar); ?></td>
                                <td><?= tgl_indo($row['tgl_bayar']); ?></td>
                                <td>
                                    <?php
                                    if ($kekurangan == 0) {
                                        echo "<span class= bagde text-bg-success>Lunas</span>";
                                    } else {
                                    ?>

                                        <a href="/bebas_bayar/bayar/<?= $row['id_bayar']; ?>" class="btn btn-primary btn-sm"><i class="fas fa-cash-register"></i></a>
                                    <?php } ?>
                                    <?php
                                    if ($jumlah_bayar > 0) {
                                    ?>
                                        <a href="/bebas_bayar/cetak_kuitansi/<?= $row['id_bayar']; ?>" target="_blank" class="btn btn-success btn-sm"><i class="fas fa-print"></i></a>
                                    <?php } ?>

                                </td>

                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>





</div>
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>
<?= $this->endsection(); ?>
<?php
function rupiah($angka)
{

    $hasil_rupiah = "Rp " . number_format($angka, 2, ',', '.');
    return $hasil_rupiah;
}
function tgl_indo($tgl)
{
    $tanggal = substr($tgl, 8, 2);
    $bulan = getBulan(substr($tgl, 5, 2));
    $tahun = substr($tgl, 0, 4);

    return $tanggal . ' ' . $bulan . ' ' . $tahun;
}

function getBulan($bln)
{
    switch ($bln) {
        case 1:
            return "Januari";
            break;
        case 2:
            return "Februari";
            break;
        case 3:
            return "Maret";
            break;
        case 4:
            return "April";
            break;
        case 5:
            return "Mei";
            break;
        case 6:
            return "Juni";
            break;
        case 7:
            return "Juli";
            break;
        case 8:
            return "Agustus";
            break;
        case 9:
            return "September";
            break;
        case 10:
            return "Oktober";
            break;
        case 11:
            return "November";
            break;
        case 12:
            return "Desember";
            break;
    }
}
?>