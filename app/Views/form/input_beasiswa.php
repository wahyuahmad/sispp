<?= $this->extend("layout/template"); ?>
<?= $this->section("content"); ?>
<div class="container-fluid px-4">
    <div>
        <h3 class="mt-2"> <i class="fas fa-user-graduate me-3 fa-2x"></i>Siswa
            <h6 class="text-primary">Master Data / Data Beasiswa / Input Beasiswa</h6>
        </h3>
    </div>
    <hr class="bg-secondary">
</div>

<div>
    <div class="container-fluid px-4">
        <!-- DataTales Example -->


        <div class="card mb-5">
            <div class="card-header bg-secondary align-text-center">
                <a class="link-website" href="<?php base_url() ?>/beasiswa">
                    <h4 class="text-white "><i class="fas fa-arrow-left me-2"></i>Form Input Beasiswa </h4>
                </a>
            </div>
            <form action="<?php base_url() ?>/beasiswa/save" method="POST">
                <?php csrf_field(); ?>

                <div class="card-body ">
                    <?php if (session()->getflashdata('pesan')) : ?>
                        <div class="alert alert-success d-flex align-items-center" role="alert">
                            <h6> <i class="fas fa-user-check me-2 fa-1x"></i>
                            </h6>
                            <div class="h6">
                                <?= session()->getflashdata('pesan'); ?>
                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="border-top-primary ">
                        <div class="row mb-3 mt-3">
                            <label for="nis" class="col-sm-2 col-form-label">Jenis Beasiwa</label>
                            <div class="col-sm-5">
                                <input type="text" value="<?= old('jenis'); ?>" class="form-control <?= ($validation->hasError('jenis')) ? 'is-invalid' : ''; ?>" id="jenis" name="jenis" autofocus autocomplete="off">
                                <div class="invalid-feedback">
                                    <?= $validation->geterror('jenis'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="tahun" class="col-sm-2 col-form-label">Tahun</label>
                        <div class="col-sm-5">
                            <input type="text" value="<?= old('tahun'); ?>" class="form-control <?= ($validation->hasError('tahun')) ? 'is-invalid' : ''; ?>" id="tahun" name="tahun" autofocus>
                            <div class="invalid-feedback">
                                <?= $validation->geterror('tahun'); ?>
                            </div>
                        </div>
                    </div>



                    <button type="submit" class="btn btn-sm btn-primary  ">Simpan</button>

                </div>

            </form>
        </div>
    </div>
</div>



<?= $this->endsection(); ?>