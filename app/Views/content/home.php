<?php if (has_permission('beranda')) : ?>
    <?= $this->extend("layout/template"); ?>
    <?= $this->section("content"); ?>
    <div class="container-fluid px-4 ">
        <h1 class="mt-3"> <i class="fas fa-home me-2"></i>Dashboard</h1>
        <hr class="bg-secondary">
        <div class="row">
            <div class="col-xl-3 col-md-6">
                <div class="card bg-warning text-white mb-4">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xl font-weight-bold text-white  mb-1">
                                    Jumlah Siswa</div>
                                <div class="h1 mb-0 font-weight-bold text-gray-800"><?= $tot_siswa; ?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-user-graduate fa-3x text-gray-300"></i>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer d-flex align-items-center justify-content-between">
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-success text-white mb-4">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col">
                                <div class=" font-weight-bold text-white  mb-1">
                                    Jumlah Kelas</div>
                                <div class="h1 mb-0 font-weight-bold text-gray-800"><?= $tot_kelas; ?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-school fa-3x text-gray-300"></i>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer d-flex align-items-center justify-content-between">
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-danger text-white mb-4">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-sm font-weight-bold text-white  mb-1">
                                    Pendapatan</div>
                                <div class="h4 mb-3 font-weight-bold text-gray-100"><?= rupiah($total); ?></div>
                            </div>

                        </div>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-info text-white mb-4">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-sm font-weight-bold text-white  mb-1">
                                    Total Tagihan</div>
                                <div class="h4 mb-3 font-weight-bold text-gray-100"><?= rupiah($tot_tagihan); ?></div>
                            </div>

                        </div>
                    </div>

                    <div class="card-footer d-flex align-items-center justify-content-between">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-chart-area me-1"></i>
                        Grafik Transaksi Pendapatan
                    </div>
                    <div class="card-body"><canvas id="chartTransaksi" width="100%" height="40"></canvas></div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-chart-bar me-1"></i>
                        Grafik Jumlah Pembayaran
                    </div>
                    <div class="card-body bg-light"><canvas id="JumlahTransaksi" width="100%" height="40">

                        </canvas></div>
                </div>
            </div>
        </div>


    </div>
    <script>
        $(document).ready(function() {
            getTransaksi()
            getJumlahTransaksi()
        })

        function chartTransaksi(dataset) {
            var ctx = document.getElementById("chartTransaksi");
            var myLineChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mey', 'Jun', 'Jul', 'Ags', 'Sep', 'Okt', 'Nov', 'Des'],
                    datasets: [{
                        label: "Total",
                        lineTension: 0.3,
                        backgroundColor: "rgba(2,117,216,0.2)",
                        borderColor: "rgba(2,117,216,1)",
                        pointRadius: 5,
                        pointBackgroundColor: "rgba(2,117,216,1)",
                        pointBorderColor: "rgba(255,255,255,0.8)",
                        pointHoverRadius: 5,
                        pointHoverBackgroundColor: "rgba(2,117,216,1)",
                        pointHitRadius: 50,
                        pointBorderWidth: 2,
                        data: dataset,
                    }],
                },
                options: {
                    scales: {
                        xAxes: [{
                            time: {
                                unit: 'date'
                            },
                            gridLines: {
                                display: false
                            },
                            ticks: {
                                maxTicksLimit: 12
                            }
                        }],
                        yAxes: [{
                            ticks: {
                                maxTicksLimit: 10
                            },
                            gridLines: {
                                color: "rgba(0, 0, 0, .125)",
                            }
                        }],
                    },
                    legend: {
                        display: false
                    }
                }
            });
        }

        function getTransaksi() {
            $.ajax({
                url: "/chart-transaksi",
                method: "post",
                success: function(response) {
                    var result = JSON.parse(response);
                    var dataset = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0]
                    $.each(result.data, function(i, item) {
                        dataset[item.bulan - 1] = item.total
                    });
                    chartTransaksi(dataset)
                }
            });
        }

        function JumlahTransaksi(dataset) {
            var ctx = document.getElementById("JumlahTransaksi");
            var myLineChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mey', 'Jun', 'Jul', 'Ags', 'Sep', 'Okt', 'Nov', 'Des'],
                    datasets: [{
                        label: "Jumlah Bayar",
                        backgroundColor: "rgba(2,117,216,1)",
                        borderColor: "rgba(2,117,216,1)",
                        data: dataset,
                    }],
                },
                options: {
                    scales: {
                        xAxes: [{
                            time: {
                                unit: 'month'
                            },
                            gridLines: {
                                display: false
                            },
                            ticks: {
                                maxTicksLimit: 12
                            }
                        }],
                        yAxes: [{
                            ticks: {
                                maxTicksLimit: 5
                            },
                            gridLines: {
                                display: true
                            }
                        }],
                    },
                    legend: {
                        display: false
                    }
                }
            });
        }

        function getJumlahTransaksi() {
            $.ajax({
                url: "/chart-siswa",
                method: "post",
                success: function(response) {
                    var result = JSON.parse(response);
                    var dataset = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0]
                    $.each(result.data, function(i, item) {
                        console.log(item)
                        dataset[item.bulan - 1] = item.total
                    });
                    JumlahTransaksi(dataset)
                }
            });
        }
    </script>

    <?= $this->endsection(); ?>
<?php endif; ?>
<?php if (has_permission('histori bayar')) : ?>




    <?= $this->include("layout/template user"); ?>

    <div class="container-fluid px-4">
        <div>
            <h3 class="mt-2"></i>History Pembayaran Siswa
            </h3>
        </div>
        <hr class="bg-secondary">
        <div class="card mb-4">
            
            <div class="card-body">
                <div class="border-top-primary ">
                    <div class="row">
                        <div>
                            <div class="card mb-4">
                                <div class="card-header bg-success text-white">
                                    <h5>Biodata Siswa</h5>
                                </div>
                                <div class="card-body mb-4">
                                    <?php $i = 0; ?>
                                    <?php foreach ($spp as $row) : if ($i == 1) break;
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
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-header bg-warning">
                                    <h5>Pembayaran SPP </h5>
                                </div>
                                <div class="card-body">
                                    <table class="table table-striped table-bordered mb-5">
                                        <thead>
                                            <th>No</th>
                                            <th>Bulan</th>
                                            <th>Nominal</th>
                                            <th>Keterangan</th>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1;

                                            ?>
                                            <?php foreach ($spp as $row) :
                                                $keterangan = $row['tgl_bayar'] ?>
                                                <tr>
                                                    <td><?= $no++; ?></td>
                                                    <td><?= bulan($row['bulan']); ?></td>
                                                    <td><?= rupiah($row['jumlah']); ?></td>
                                                    <td>
                                                        <?php
                                                        if ($keterangan > 0) {
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
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header bg-warning">
                                    <h5>Pembayaran Lain</h5>
                                </div>
                                <div class="card-body">
                                    <table class="table table-striped table-bordered">
                                        <thead>
                                            <th>No</th>
                                            <th>Jurusan</th>
                                            <th>Nominal</th>
                                            <th>Kekurangan</th>
                                            <th>Jumlah Bayar</th>
                                            <th>Tanggal Bayar</th>
                                            <th>Keterangan</th>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1; ?>
                                            <?php
                                            foreach ($bebas as $row) :
                                                $kekurangan = $row['nominal'] - $row['jumlah_bayar'];
                                            ?>
                                                <tr>
                                                    <td><?= $no++; ?></td>
                                                    <td><?= $row['jenis']; ?></td>
                                                    <td><?= rupiah($row['nominal']); ?></td>
                                                    <td><?= rupiah($kekurangan); ?></td>
                                                    <td><?= rupiah($row['jumlah_bayar']); ?></td>
                                                    <td><?= $row['tgl_bayar']; ?></td>
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
                                            <?php endforeach ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
    <footer class="py-4 bg-white mt-auto fixed-bottom text-center">
        <div class="container-fluid px-4">
            <div class="d-flex align-items-center justify-content-between small">
                <div class="text-muted">Copyright &copy; SISPP 2023 AWK COORPORATION</div>

            </div>
        </div>
    </footer>

    <footer class="py-4 bg-white mt-auto fixed-bottom text-center">
        <div class="container-fluid px-4">
            <div class="d-flex align-items-center justify-content-between small">
                <div class="text-muted">Copyright &copy; SISPP 2023 AWK COORPORATION</div>

            </div>
        </div>
    </footer>
<?php endif; ?>
<?php
function rupiah($angka)
{

    $hasil_rupiah = "Rp " . number_format($angka, 2, ',', '.');
    return $hasil_rupiah;
} ?>
<?php

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