<?= $this->extend("layout/template"); ?>
<?= $this->section("content"); ?>

<div class="container-fluid px-4">
    <div>
        <h3 class="mt-2"> <i class="fas fa-chart-bar me-3 fa-2x"></i>Keuangan
            <h6 class=" text-primary">Laporan / Tagihan SPP</h6>
        </h3>
    </div>
    <hr class="bg-secondary">
    <div class="card mb-4">
        <div class="card-header bg-secondary text-white">
            <div class="row">
                <div class="col-md-10 mt-1"> <i class="fas fa-table me-1"></i>
                    Data Tagihan SPP</div>
            </div>
        </div>

        <div class="card-body border-bordered">
            <div class="row">
                <div class="col-md-6">
                    <div class="card mb-4">
                        <div class="card-header bg-primary">
                            <h6 class="text-white">Cetak Laporan Per Periode</h6>
                        </div>
                        <div class="card-body">
                            <form action="/tunggakan/export_pdf" method="post" target="_blank">
                                <div class="row">
                                    <div class="col-sm-5">
                                        <input type="date" class="form-control" id="tgl_awal" name="tgl_awal" value="<?= date('Y-m-01'); ?>" title="Tanggal Awal">
                                    </div>
                                    <div class="col-sm-5">
                                        <input type="date" class="form-control" id="tgl_akhir" name="tgl_akhir" value="<?= date('Y-m-t'); ?>" title="Tanggal Akhir">
                                    </div>
                                    <div class="col-sm-2">
                                        <button class="btn btn-sm btn-success">Cetak</button>
                                    </div>
                                </div>

                            </form>

                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card  mb-4">
                        <div class="card-header bg-primary">
                            <h6 class="text-white">Cetak Laporan Perkelas</h6>
                        </div>
                        <div class="card-body">
                            <form action="/tunggakan/export_kelas" method="post" target="_blank">
                                <div class="row">
                                    <div class="col-sm-5">
                                        <div class="form-group">
                                            <select class="form-select" name="kelas" id="kelas" required>
                                                <option value="">--- Pilih Kelas ---</option>
                                                <?php foreach ($kelas as $row) : ?>
                                                    <option value="<?= $row['kelas']; ?>">
                                                        <?= $row['kelas']; ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <button class="btn btn-sm btn-success">Cetak</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header bg-warning">
                    <h6>Filter Laporan</h6>
                </div>
                <div class="card-body">
                    <form action="/tunggakan/filter" method="post">
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-4">
                                    <input type="date" class="form-control" id="tgl_awal" name="tgl_awal" value="<?= $tanggal['tgl_awal'] ?>" title="Tanggal Awal">
                                </div>
                                <div class="col-sm-4">
                                    <input type="date" class="form-control" id="tgl_akhir" name="tgl_akhir" value="<?= $tanggal['tgl_akhir'] ?>" title="Tanggal Akhir">
                                </div>
                                <div class="col-sm-4">
                                    <button class="btn btn-sm btn-primary">Filter</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="card-body">
                        <table id="example" class="display mt-2" style="width:100%">
                            <thead>
                                <th>No</th>
                                <th>NIS</th>
                                <th>Nama Siswa</th>
                                <th>Kelas</th>
                                <th>Tahun Pelajaran</th>
                                <th>Tagihan SPP </th>
                                <th>Bulan </th>
                                <th>Tanggal Bayar </th>
                                <th>Keterangan </th>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                ?>
                                <?php foreach ($tunggakan as $row) :
                                    $keterangan = $row['tgl_bayar'];
                                ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $row['nis']; ?></td>
                                        <td><?= $row['nm_siswa']; ?></td>
                                        <td><?= $row['kelas']; ?></td>
                                        <td><?= $row['tahun']; ?></td>
                                        <td><?= rupiah($row['nominal']); ?></td>
                                        <td><?= bulan($row['bulan']); ?></td>
                                        <td><?= tanggal_indonesia($row['tgl_bayar']); ?></td>
                                        <td>
                                            <?php
                                            if ($keterangan > 0) {
                                                echo "<span class= bagde text-bg-success>Lunas</span>";
                                            } else {
                                                echo "<span class= bagde text-bg-success>Belum Lunas</span>";
                                            ?>
                                            <?php } ?>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
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