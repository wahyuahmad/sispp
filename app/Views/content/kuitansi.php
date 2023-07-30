<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CETAK KUITANSI </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

</head>


<body>

    <table class="border">
        <img src="lib/res/logosmk.png" style="position:absolute; width: 80px; height:auto; margin:2px;">

        <table style="width: 100%;" class="caption">
            <tr>
                <td class="header">
                    <span style="line-height: 1.6; font-weight:bold;">
                        SMK MA'ARIF NU BAWANG
                        <br> Akutansi Keuangan Lembaga - Teknik Kendaraan Ringan Otomotif <br>
                        Jl.Sunan Bonang No.57 Desa Bawang Kecamatan Bawang Kabupaten Batang KP:51274
                    </span>
                </td>
            </tr>

        </table>

        <hr>
        <p style="text-align: center; font-weight:bold;">KUITANSI</p>
        <hr>
        <table class="content" width="100%">
            <tbody>
                <tr>
                    <td width="200px" style="font-weight:bold;">Telah Diterima Dari</td>
                    <td width="10px">:</td>
                    <td><?= $bayar['nama_siswa']; ?></td>
                </tr>
                <tr>
                    <td width="200px" style="font-weight:bold;">Uang Sejumlah</td>
                    <td width="10px">:</td>
                    <td style=" font:italic;"><?= Terbilang($bayar['jumlah_bayar']) . 'Rupiah'; ?></td>

                <tr>
                    <td width="200px" style="font-weight:bold;">Untuk Pembayaran</td>
                    <td width="10px">:</td>
                    <td><?= $bayar['jenis']; ?></td>
                </tr>
            </tbody>
        </table>
        <table width="100%" class="footer">
            <tr>
                <td align="bottom" width="100%" style="font-weight: bold;"><br /><br /><br /><?= rupiah($bayar['jumlah_bayar']) ?></td>
                <td width="200%" align="right">
                    <p>Bawang,<?= tanggal_indonesia(date('Y-m-d')); ?><br>
                        Staf bendahara</p> <br />
                    <p>wahyu</p>
                </td>
            </tr>

        </table>
    </table>

</body>
<style>
    .border {
        width: 85%;
        border: 1 solid #000;
        font-family: 'Times New Roman', Times, serif;
    }

    .border .header {
        text-align: center;
        font-size: 16px;
    }

    .border .content {
        font-size: 15px;

    }

    .border .content tr {
        margin-right: 2pt;
    }

    .border .footer {
        font-size: 15px;
    }
</style>

</html>
<?php
//thanks to miswanphp10.blogspot.co.id   

function Terbilang($x)
{
    $bilangan = array("", "Satu", "Dua", "Tiga", "Empat", "Lima", "Enam", "Tujuh", "Delapan", "Sembilan", "Sepuluh", "Sebelas");
    if ($x < 12)
        return " " . $bilangan[$x];
    elseif ($x < 20)
        return Terbilang($x - 10) . "belas";
    elseif ($x < 100)
        return Terbilang($x / 10) . " Puluh" . Terbilang($x % 10);
    elseif ($x < 200)
        return " Seratus" . Terbilang($x - 100);
    elseif ($x < 1000)
        return Terbilang($x / 100) . " Ratus" . Terbilang($x % 100);
    elseif ($x < 2000)
        return " Seribu" . Terbilang($x - 1000);
    elseif ($x < 1000000)
        return Terbilang($x / 1000) . " Ribu" . Terbilang($x % 1000);
    elseif ($x < 1000000000)
        return Terbilang($x / 1000000) . " Juta" . Terbilang($x % 1000000);
}
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
?>