<?php if (in_groups('siswa')) : ?>
    <?= $this->extend("layout/template"); ?>
    <?= $this->section("content"); ?>
    <div class="alert alert-primary" role="alert">
        SISTEM INFORMASI SUMBANGAN PEMBINAAN PENDIDIKAN (SISPP)</div>
    <div class="container-fluid px-4">
        <div class="container">
            <center>
                <h1>SELAMAT DATANG</h1>
                <h4> Di Sistem Informasi Sumbangan Pembinaan Pendidikan (SISPP)
                </h4>
                <img src="<?= base_url(); ?>/img/logosmk.png" style="height: 200px;">
                <h4>SMK MA'ARIF NU BAWANG</h4>
            </center>
        </div>
        <hr>
        <div>
            Silahkan masukkan nomor induk siswa (NIS) untuk mencari riwayat pembayaran
        </div>
        <hr class="bg-secondary">
        <!-- Navbar Search-->
        <div class="row">
            <label for="" class="col-sm-2">NIS</label>
            <div class="col-sm-5">
                <form action="<?= base_url(); ?>/siswa/histori_bayar" method="get">
                    <div class="input-group mb-4 col-sm-4">
                        <input class="form-control" autofocus name="nis" type="text" placeholder="Masukkan NIS !" aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                        <button class="btn btn-primary mr-4" id="btnNavbarSearch" type="submit"><i class="fas fa-search"></i></button>
                    </div>
                </form>
            </div>
        </div>
        <!-- Navbar-->
    </div>
    <?= $this->endsection(); ?>
<?php endif; ?>