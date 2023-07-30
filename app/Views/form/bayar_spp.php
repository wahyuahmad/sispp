<?= $this->extend("layout/template"); ?>
<?= $this->section("content"); ?>

<div class="container-fluid px-4">
    <div>
        <h3 class="mt-2"> <i class="fas fa-cash-register me-3 fa-2x"></i>Transaksi
            <h6 class=" text-primary">Pembayaran Bulanan</h6>
        </h3>
    </div>
    <hr class="bg-secondary">
    <div class="card mb-4">
        <div class="card-header bg-success align-text-center">
            <a class="link-website" href="<?= base_url(); ?>/bayar" style="text-decoration: none;">
                <h4 class="text-white "><i class="fas fa-arrow-left me-2"></i>Pembayaran Bulanan</h4>
            </a>
        </div>
        <div class="card-body">
            <div class="border-top-primary ">
                <div class="row">
                    <div class="col-md-5">
                        <div class="card">
                            <div class="card-header bg-secondary text-white">
                                <h5>Biodata Siswa</h5>
                            </div>
                            <div class="card-body mb-4">
                                <?php $i = 0; ?>
                                <?php foreach ($siswa as $row) : if ($i == 1) break;
                                    $i++;
                                ?>
                                    <table width="100%" class="table table-striped">
                                        <tr>
                                            <td>NIS</td>
                                            <td>:</td>
                                            <td width="50%"><?= $row['nis']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Nama Siswa</td>
                                            <td>:</td>
                                            <td width="50%"><?= $row['nm_siswa']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Kelas</td>
                                            <td>:</td>
                                            <td width="50%"><?= $row['kelas']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Tahun Pelajaran</td>
                                            <td>:</td>
                                            <td width="50%"><?= $row['tahun']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Total Tagihan</td>
                                            <td>:</td>
                                            <td width="50%"><?= rupiah($row['jumlah'] * 12); ?></td>
                                        </tr>

                                    </table>



                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="card">
                            <div class="flash-data">
                                <?php if (session()->getflashdata('pesan')) : ?>
                                    <script>
                                        Swal.fire({
                                            position: 'top-end',
                                            icon: 'success',
                                            title: 'Pembayaran Berhasil <?= session()->getFlashdata('pesan'); ?>',
                                            showConfirmButton: false,
                                            timer: 1700
                                        })
                                    </script>
                                <?php endif; ?>
                            </div>
                            <div class="card-header bg-secondary text-white align-center">
                                <h5>Pembayaran Tagihan Bulanan</h5>
                            </div>
                            <div class="card-body">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                        <th>No</th>
                                        <th>Bulan</th>
                                        <th>Nominal</th>
                                        <th>Tanggal Bayar</th>
                                        <th>Keterangan</th>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;

                                        ?>
                                        <?php foreach ($siswa as $row) :
                                            $keterangan = $row['tgl_bayar'];

                                        ?>
                                            <tr>
                                                <td><?= $no++; ?></td>
                                                <td><?= bulan($row['bulan']); ?></td>
                                                <td><?= rupiah($row['jumlah']); ?></td>
                                                <td><?= tgl_indo($keterangan) ?></td>
                                                <td>

                                                    <?php
                                                    if ($keterangan > 0) {
                                                        echo "<span>Lunas</span>";
                                                    } else {
                                                    ?><a href="/tunggakan/bayar/<?= $row['id_bayar']; ?>/<?= $row['nis']; ?>"> <button type="button" class="btn btn-sm btn-success">Bayar</button>
                                                        </a>
                                                    <?php } ?>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
    <script>

    </script>
    <?= $this->endsection(); ?>
    <?php
    function rupiah($angka)
    {
        $hasil_rupiah = "Rp " . number_format($angka, 2, ',', '.');
        return $hasil_rupiah;
    }
    function bulan($bulan)
    {
        switch ($bulan) {
            case 1:
                $bulan = "Januari";
                break;
            case 2:
                $bulan = "Februari";
                break;
            case 3:
                $bulan = "Maret";
                break;
            case 4:
                $bulan = "April";
                break;
            case 5:
                $bulan = "Mei";
                break;
            case 6:
                $bulan = "Juni";
                break;
            case 7:
                $bulan = "Juli";
                break;
            case 8:
                $bulan = "Agustus";
                break;
            case 9:
                $bulan = "September";
                break;
            case 10:
                $bulan = "Oktober";
                break;
            case 11:
                $bulan = "November";
                break;
            case 12:
                $bulan = "Desember";
                break;
        }
        return $bulan;
    } ?>
    <?php
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