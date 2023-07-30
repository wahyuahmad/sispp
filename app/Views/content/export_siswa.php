<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Pembayaran SPP</title>

    <style>
        .border-table {
            font-family: Arial, Helvetica, sans-serif;
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
            font-family: Arial, Helvetica, sans-serif;
        }
    </style>
</head>

<body>
    <table style="border: 1px solid ; width:100%;">
        <table class="caption" style="  width:100%;">

            <tr>
                <td> <img src="lib/res/logosmk.png" style=" width: 80px; height:auto; ">
                </td>
                <td >
                    <span style="line-height: 1.6; font-weight:bold; ">
                        SMK MA'ARIF NU BAWANG
                        <br> Akutansi Keuangan Lembaga - Teknik Kendaraan Ringan Otomotif
                    </span>
                </td>

            </tr>
            <tr>
                <td style="font-size:10px;" colspan="2">Jl.Sunan Bonang Nomor 57 Desa Bawang - Kecamatan Bawang - Kabupaten Batang Kode Pos 51274 email:smkmaarifnubawang@gmail.com</td>
            </tr>

        </table>
        <hr>
        <table width="100%">
            <caption class="caption">
                Data Pembayaran SPP <br>
            </caption>
            <?php $i = 0; ?>
            <?php foreach ($result as $row) :

                if ($i == 1) break;
                $i++ ?>
                <td>NIS</td>
                <td>:</td>
                <td><?= $row['nis']     ?></td>
                <td align="right" width="2%">Kelas</td>
                <td>:</td>
                <td><?= $row['kelas']; ?></td>
                <tr>
                    <td>Nama Siswa</td>
                    <td>:</td>
                    <td><?= $row['nm_siswa']; ?></td>
                    <td align="right">Jurusan</td>
                    <td>:</td>
                    <td><?= $row['jurusan']; ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
        <br>
        <table class="border-table">
            <thead>
                <th>No</th>
                <th>Bulan </th>
                <th>Tahun Pelajaran</th>
                <th>Tagihan SPP </th>
                <th>Tanggal Bayar </th>
                <th>Keterangan </th>
            </thead>
            <tbody>

                <?php $no = 1;
                $total = 0;
                ?>
                <?php foreach ($result as $row) :
                    $keterangan = $row['tgl_bayar'];

                ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= getbulan($row['bulan']); ?></td>
                        <td><?= $row['tahun']; ?></td>
                        <td><?= rupiah($row['nominal']); ?></td>
                        <td><?= tgl_indo($row['tgl_bayar']); ?></td>
                        <td>
                            <?php
                            if ($keterangan > 0) {
                                echo "<span class= bagde text-bg-success>Lunas</span>";
                            } else {
                                echo "<span class= bagde text-bg-success>Belum Lunas</span>";
                            ?>
                            <?php } ?>
                        </td>
                        <?php $total += $row['nominal'];
                        ?>

                    </tr>
                <?php endforeach; ?>
                <tr>
                    <td colspan="3" style="font-weight: bold;">Total Tagihan</td>
                    <td colspan="" style="font-weight: bold;"><?= rupiah($total); ?></td>
                    <td></td>
                    <td></td>
                </tr>
            </tbody>
        </table>
        <table width="100%">
            <tr>
                <td></td>
                <td width="200%" align="right">
                    <p>Bawang,<?= tgl_indo(date('Y-m-d')); ?><br>
                        Staf bendahara</p> <br /><br />

                    <p>wahyu</p>
                </td>
            </tr>
        </table>
    </table>
</body>
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

</html>