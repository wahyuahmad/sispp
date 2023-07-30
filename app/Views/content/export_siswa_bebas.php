<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Pembayaran SPP Bebas</title>

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
    <table style="border: 1px solid ;">
        <table class="caption" style="  width:100%;">

            <tr>
                <td> <img src="lib/res/logosmk.png" style=" width: 80px; height:auto; ">
                </td>
                <td align="center">
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
                Data Pembayaran <br>
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
                    <td><?= $row['nama_siswa']; ?></td>
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
                <th>Jenis Bayar </th>
                <th>Tahun </th>
                <th>Nominal </th>
                <th>Kekurangan </th>
                <th>Jumlah Bayar </th>
                <th>Keterangan </th>
            </thead>
            <tbody>

                <?php $no = 1;
                $total = 0;
                $total1 = 0;
                $total3 = 0;
                ?>
                <?php foreach ($result as $row) :
                    $kekurangan = $row['nominal'] - $row['jumlah_bayar'];
                ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $row['jenis']; ?></td>
                        <td><?= $row['tahun']; ?></td>
                        <td><?= rupiah($row['nominal']); ?></td>
                        <td><?= rupiah($kekurangan); ?></td>
                        <td><?= rupiah($row['jumlah_bayar']); ?></td>
                        <td>
                            <?php
                            if ($kekurangan < 0) {
                                echo "<span class= bagde text-bg-success>Lunas</span>";
                            } else {
                                echo "<span class= bagde text-bg-success>Belum Lunas</span>";
                            ?>
                            <?php } ?>
                        </td>
                        <?php $total += $row['nominal'];
                        ?>
                        <?php $total1 += $kekurangan;
                        ?>
                        <?php $total3 += $row['jumlah_bayar'];
                        ?>

                    </tr>
                <?php endforeach; ?>
                <tr>
                    <td colspan="3" style="font-weight: bold;">Total </td>
                    <td colspan="" style="font-weight: bold;"><?= rupiah($total); ?></td>
                    <td colspan="" style="font-weight: bold;"><?= rupiah($total1); ?></td>
                    <td colspan="" style="font-weight: bold;"><?= rupiah($total3); ?></td>
                    <td></td>
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