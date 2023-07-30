<?= $this->extend("layout/template"); ?>
<?= $this->section("content"); ?>

<div class="container-fluid px-4">
    <div>
        <h3 class="mt-2"> <i class="fas fa-user-graduate me-3 fa-2x"></i>Siswa
            <h6 class=" text-primary">Master Data / Input Tagihan </h6>
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
                        title: "Tagihan",
                        text: "<?= session()->getflashdata('pesan'); ?> ditambahkan",
                        icon: 'success'
                    });
                </script>
            <?php endif; ?>
            <div class="card-body">
                <table id="example" class="display mt-2" style="width:100%">
                    <thead>
                        <th>No</th>
                        <th>NIS</th>
                        <th>Nama Siswa</th>
                        <th>Kelas</th>
                        <th>Jurusan</th>
                        <th>Opsi</th>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php
                        foreach ($bebas as $row) :
                        ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $row['nis']; ?></td>
                                <td><?= $row['nm_siswa']; ?></td>
                                <td><?= $row['kelas']; ?></td>
                                <td><?= $row['jurusan']; ?></td>
                                <td>
                                    <a href="/bebas_bayar/input/<?= $row['id_siswa']; ?>" class="btn btn-sm btn-primary"><i class="fas fa-plus" title="Tambah"></i></a>
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
function tanggal_indonesia($tanggal)
{
    $bulan = array(
        1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );

    $pecahkan = explode('-', $tanggal);

    // variabel pecahkan 0 = tanggal
    // variabel pecahkan 1 = bulan
    // variabel pecahkan 2 = tahun

    return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
} ?>