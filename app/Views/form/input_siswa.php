<?= $this->extend("layout/template"); ?>
<?= $this->section("content"); ?>
<div class="container-fluid px-4">
    <div>
        <h3 class="mt-2"> <i class="fas fa-user-graduate me-3 fa-2x"></i>Siswa
            <h6 class="text-primary">Master Data / Data Siswa / Input Siswa</h6>
        </h3>
    </div>
    <hr class="bg-secondary">
</div>
<div>
    <div class="container-fluid px-4">
        <!-- DataTales Example -->
        <div class="card mb-5">
            <div class="card-header bg-secondary align-text-center">
                <a class="link-website" href="<?php base_url() ?>/siswa" style="text-decoration: none;">
                    <h4 class="text-white "><i class="fas fa-arrow-left me-2"></i>Form Input Siswa </h4>
                </a>
            </div>
            <div class="card-body ">
                <?php if (session()->getFlashdata('pesan')) : ?>
                    <script>
                        Swal.fire({
                            title: "Data  Siswa",
                            text: "Berhasil <?= session()->getflashdata('pesan'); ?>",
                            icon: 'success'
                        });
                    </script>
                <?php endif; ?>
                <form action="<?php base_url() ?>/siswa/save" method="POST">
                    <?php csrf_field(); ?>
                    <div class="border-top-primary ">
                        <div class="row mb-3 mt-3">
                            <label for="nis" class="col-sm-2 col-form-label">NIS</label>
                            <div class="col-sm-5">
                                <input type="text" value="<?= old('nis'); ?>" class="form-control <?= ($validation->hasError('nis')) ? 'is-invalid' : ''; ?>" id="nis" name="nis" autofocus autocomplete="off">
                                <div class="invalid-feedback">
                                    <?= $validation->geterror('nis'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="nama" class="col-sm-2 col-form-label">Nama Siswa</label>
                        <div class="col-sm-5">
                            <input type="text" value="<?= old('nama'); ?>" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" id="nis" name="nama" autofocus>
                            <div class="invalid-feedback">
                                <?= $validation->geterror('nama'); ?>
                            </div>
                        </div>
                    </div>
                    <div class=" row mb-3">
                        <label for="kelas" class="col-sm-2 col-form-label"> Kelas</label>
                        <div class="col-sm-5">
                            <div class="form-group">
                                <select class="form-select" name="kelas" id="kelas" required>
                                    <option value="">--- Pilih Kelas ---</option>
                                    <?php foreach ($kelas as $row) : ?>
                                        <option value="<?= $row['id_kelas']; ?>">
                                            <?= $row['kelas']; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class=" row mb-3">
                        <label for="kelas" class="col-sm-2 col-form-label">Tahun Pelajaran</label>
                        <div class="col-sm-5">
                            <div class="form-group">
                                <select class="form-select" name="spp" id="kelas" required>
                                    <option value="">--- Pilih Tahun Pelajaran ---</option>
                                    <?php foreach ($spp as $row) : ?>
                                        <option value="<?= $row['id_spp']; ?>">
                                            <?= $row['tahun']; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class=" row mb-3">
                        <label for="kelas" class="col-sm-2 col-form-label">Jumlah SPP </label>
                        <div class="col-sm-5">
                            <div class="form-group">
                                <select class="form-select" name="nominal" id="kelas" required>
                                    <option value="">--- Nominal ---</option>
                                    <?php foreach ($spp as $row) : ?>
                                        <option value="<?= $row['nominal']; ?>"> <?= $row['tahun']; ?> |
                                            <?= rupiah($row['nominal']); ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <button type=" submit" class="btn btn-sm btn-primary  ">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endsection(); ?>
<?php
function rupiah($angka)
{

    $hasil_rupiah = "Rp " . number_format($angka, 2, ',', '.');
    return $hasil_rupiah;
} ?>?>