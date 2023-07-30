<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Pembayaran SPP</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .border-table {
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            border-collapse: collapse;
            text-align: center;
            font-size: 12;
            width: 100%;
        }

        .border-table th {
            border: 1 solid #000;
            font-weight: bold;
            background-color: #e1e1e1;

        }

        .border-table td {
            border: 1 solid #000;
        }

        .caption {
            font-weight: bold;
            font-size: 14;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            margin-bottom: 20px;

        }
    </style>

</head>

<body>
    <img src="lib/res/logosmk.png" style="position:absolute; width: 110px; height:auto; ">

    <table style="width: 100%;" class="caption">
        <tr>
            <td align="center">
                <span style="line-height: 1.6; font-weight:bold;">
                    SMK MA'ARIF NU BAWANG
                    <br> Akutansi Keuangan Lembaga - Teknik Kendaraan Ringan Otomotif <br>
                    Jl.Sunan Bonang No.57 Desa Bawang Kecamatan Bawang Kabupaten Batang KP:51274
                </span>
            </td>
        </tr>

    </table>
    <hr>
    <caption class="caption">
        Laporan Pembayaran SPP <br>
        Per periode <?= tanggal_indonesia($tglawal); ?> s/d <?= tanggal_indonesia($tglakhir); ?>
    </caption>
    <br>
    <table class="border-table">
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
            $total = 0;

            ?>
            <?php foreach ($result as $row) :
                $keterangan = $row['tgl_bayar']
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
                        <?php } ?> <?php $total += $row['nominal'];
                                    ?>
                </tr>
            <?php endforeach; ?>
            <tr>
                <td colspan="5" style="font-weight: bold;">Total Bayar</td>
                <td colspan="4" style="font-weight:bold ;"><?= rupiah($total); ?></td>
            </tr>
        </tbody>
    </table>
    <table width="100%">
        <tr>
            <td></td>
            <td width="200%" align="right">
                <p>Bawang,<?= tanggal_indonesia(date('Y-m-d')); ?><br>
                    Staf bendahara</p> <br /><br />

                <p>wahyu</p>
            </td>
        </tr>
    </table>
</body>

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

</html>