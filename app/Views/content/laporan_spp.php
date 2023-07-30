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
                <div class="col-md-8">
                    <div class="card mb-4">
                        <div class="card-header bg-primary">
                            <h6 class="text-white">Cetak Laporan</h6>
                        </div>
                        <div class="card-body">
                            <form action="/laporan/cetak_laporan" target="_blank" method="post">
                                <div class="row">
                                    <div class="col-md-4">
                                        <select name="bebas" id="" required class="form-select">
                                            <option value="">---Pilih Jenis Bayar---</option>
                                            <?php foreach ($bebas as $row) : ?>
                                                <option value="<?= $row['jenis']; ?>"><?= $row['jenis']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <select name="kelas" id="" required class="form-select">
                                            <option value="">---Pilih Kelas---</option>
                                            <?php foreach ($kelas as $row) : ?>
                                                <option value="<?= $row['kelas']; ?>"><?= $row['kelas']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <button class="btn  btn-primary" type="submit">Cetak</button>
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

                    <table id="example" class="display mt-2" style="width:100%">
                        <thead>
                            <th>No</th>
                            <th>NIS</th>
                            <th>Nama Siswa</th>
                            <th>Kelas</th>
                            <th>Jenis Bayar </th>
                            <th>Nominal</th>
                            <th>Jumlah Bayar</th>
                            <th>Kekurangan</th>
                            <th>Keterangan</th>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            ?>
                            <?php foreach ($bayar as $row) : $kekurangan = $row['nominal'] - $row['jumlah_bayar']
                            ?>

                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $row['nis']; ?></td>
                                    <td><?= $row['nama_siswa']; ?></td>
                                    <td><?= $row['kelas']; ?></td>
                                    <td><?= $row['jenis']; ?></td>
                                    <td><?= rupiah($row['nominal']); ?></td>
                                    <td><?= rupiah($kekurangan); ?></td>
                                    <td><?= rupiah($row['jumlah_bayar']); ?></td>
                                    <td>
                                        <?php
                                        if ($kekurangan == 0) {
                                            echo "<span class= bagde text-bg-success>Lunas</span>";
                                        } else {
                                            echo "<span class= bagde text-bg-success>Belum Lunas</span>";
                                        ?>
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
    };
    ?>