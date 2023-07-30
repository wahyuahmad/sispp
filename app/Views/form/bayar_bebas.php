<?= $this->extend("layout/template"); ?>
<?= $this->section("content"); ?>
<div class="container-fluid px-4">
    <div>
        <h3 class="mt-2"> <i class="fas fa-cash-register me-3 fa-2x"></i>Transaksi
            <h6 class=" text-primary">Pembayaran SPP</h6>
        </h3>
    </div>
    <hr class="bg-secondary">
    <div class="card">
        <div class="card-header bg-success align-text-center">
            <a class="link-website" style="text-decoration: none;" href="<?php base_url() ?>/bebas_bayar/data_bayar ">
                <h4 class="text-white "><i class="fas fa-arrow-left me-2"></i>Pembayaran SPP</h4>
            </a>
        </div>
        <div class="card-body">
            <form action="/bebas_bayar/simpan/<?= $bayar['id_bayar']; ?>" method="post">
                <div class="border-top-primary ">
                    <div class="row mb-3 mt-3">
                        <label for="nis" class="col-sm-2 col-form-label">Nama Siswa</label>
                        <div class="col-sm-5">
                            <div class="form-group">
                                <div class="form-group">
                                    <input type="text" name="nama" readonly value="<?= $bayar['nama_siswa']; ?>" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3 mt-3">
                        <label for="kelas" class="col-sm-2 col-form-label"> Kelas</label>
                        <div class="col-sm-5">
                            <div class="form-group">
                                <select class="form-control" name="kelas" type="hidden" readonly>
                                    <?php foreach ($kelas as $row) : ?>
                                        <option value="<?= $row['id_kelas']; ?>" hidden <?= $bayar['id_kelas'] == $row['id_kelas'] ? 'selected' : ''; ?>>
                                            <?= $row['kelas']; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3 mt-3">
                        <label for="kelas" class="col-sm-2 col-form-label"> Jenis Bayar</label>
                        <div class="col-sm-5">
                            <div class="form-group">
                                <select class="form-control" name="bebas" type="hidden" readonly>
                                    <?php foreach ($bebas as $row) : ?>
                                        <option value="<?= $row['id_bebas']; ?>" hidden <?= $bayar['id_bebas'] == $row['id_bebas'] ? 'selected' : ''; ?>>
                                            <?= $row['jenis']; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3 mt-3">
                        <label for="kelas" class="col-sm-2 col-form-label">Jumlah Bayar</label>
                        <div class="col-sm-5">

                            <div class="form-group">
                                <label for="">Total yang sudah dibayar adalah <?= rupiah($bayar['jumlah_bayar']); ?>)</label>
                                <input type="number" required name="jumlahbayar" max="<?= $bayar['nominal']; ?>" class="form-control" placeholder="masukkan jumlah bayar ditambah total bayar" autofocus>
                            </div>
                        </div>
                    </div>

                    <button class="btn btn-sm btn-primary " type="submit">Bayar</button>
                </div>
            </form>
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
} ?>