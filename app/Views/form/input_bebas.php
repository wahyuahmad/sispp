<?= $this->extend("layout/template"); ?>
<?= $this->section("content"); ?>
<div class="container-fluid px-4">
    <div>
        <h3 class="mt-2"> <i class="fas fa-money-bill me-3 fa-2x"></i>Keuangan
            <h6 class="text-primary">Master Data / Data SPP / Input SPP</h6>
        </h3>
    </div>
    <hr class="bg-secondary">
</div>

<div>
    <div class="container-fluid px-4">
        <!-- DataTales Example -->


        <div class="card mb-5">
            <div class="card-header bg-secondary align-text-center">
                <a class="link-website" href="<?php base_url() ?>/bebas" style="text-decoration: none;">
                    <h4 class="text-white "><i class="fas fa-arrow-left me-2"></i>Form Input SPP </h4>
                </a>
            </div>
            <form action="<?php base_url() ?>/bebas/save" method="POST">
                <?php csrf_field(); ?>

                <div class="card-body ">
                    <?php if (session()->getflashdata('pesan')) : ?>
                        <script>
                            Swal.fire({
                                title: 'Data SPP',
                                text: 'Berhasil <?= session()->getFlashdata('pesan'); ?>',
                                icon: 'success',
                            })
                        </script>
                    <?php endif; ?>
                    <div class="row mb-3">
                        <label for="tahun" class="col-sm-2 col-form-label">Jenis Bayar</label>
                        <div class="col-sm-5">
                            <input type="text" value="<?= old('jenis'); ?>" class="form-control <?= ($validation->hasError('jenis')) ? 'is-invalid' : ''; ?>" id="jenis" name="jenis" autofocus>
                            <div class="invalid-feedback">
                                <?= $validation->geterror('jenis'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="tahun" class="col-sm-2 col-form-label">Tahun Pelajaran</label>
                        <div class="col-sm-5">
                            <input type="text" value="<?= old('tahun'); ?>" class="form-control <?= ($validation->hasError('tahun')) ? 'is-invalid' : ''; ?>" id="tahun" name="tahun" autofocus>
                            <div class="invalid-feedback">
                                <?= $validation->geterror('tahun'); ?>
                            </div>
                        </div>
                    </div>
                    <div class=" row mb-3">
                        <label for="nominal" class="col-sm-2 col-form-label">Nominal</label>
                        <div class="col-sm-5">
                            <input type="text" value="<?= old('nominal'); ?>" class="form-control <?= ($validation->hasError('nominal')) ? 'is-invalid' : ''; ?>" id="nominal" name="nominal" autofocus>
                            <div class="invalid-feedback">
                                <?= $validation->geterror('nominal'); ?>
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