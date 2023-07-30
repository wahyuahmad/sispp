<?= $this->extend("layout/template"); ?>
<?= $this->section("content"); ?>

<div class="container-fluid px-4">
    <div>
        <h3 class="mt-2"> <i class="fas fa-school me-3 fa-2x"></i>Kelas <h6 class=" text-primary">Master Data / Data Kelas / Input Data Kelas</h6>
        </h3>
    </div>
    <hr class="bg-secondary">
</div>
<div class="container-fluid px-4">
    <!-- DataTales Example -->
    <div>
        <div class="card shadow mb-5">
            <?php csrf_field(); ?>
            <form action="<?php base_url() ?>/kelas/save" method="POST">
                <div class="card-header bg-secondary align-text-center">
                    <a href="<?php base_url(); ?>/kelas" style="text-decoration: none;">

                        <h4 class="text-white "> <i class="fas fa-arrow-left me-2"></i> Form Input Kelas</h4>
                    </a>
                </div>
                <div class="card-body">
                    <?php if (session()->getFlashdata('pesan')) : ?>
                        <script>
                            Swal.fire({
                                title: "Data  Kelas",
                                text: "Berhasil <?= session()->getflashdata('pesan'); ?>",
                                icon: 'success'
                            });
                        </script>
                    <?php endif; ?>
                    <div class="border-top-primary ">
                        <div class="row mb-3 mt-3">
                            <label for="kelas" class="col-sm-2 col-form-label">Kelas</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control <?= ($validation->hasError('kelas')) ? 'is-invalid' : ''; ?>" id="kelas" name="kelas" autofocus value="<?= old('kelas'); ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->geterror('kelas'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class=" row mb-3">
                        <label for="kelas" class="col-sm-2 col-form-label">Jurusan</label>
                        <div class="col-sm-5">
                            <select name="jurusan" id="kelas" class="form-control" required>
                                <option value="">--- Pilih Jurusan ---</option>
                                <option value="Akuntansi Keuangan Lembaga">Akuntansi Keuangan Lembaga</option>
                                <option value="Perbankan">Perbankan</option>
                                <option value="Teknik Kendaraan Ringan Otomotif">Teknik Kendaraan Ringan Otomotif</option>
                                <option value="Teknik Bisnis Sepeda Motor">Teknik Bisnis Sepeda Motor</option>
                                <option value="Teknik Bodi Otomotif">Teknik Bodi Otomotif</option>
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-sm btn-primary ">Simpan</button>
                </div>


            </form>
        </div>
    </div>

</div>




<?= $this->endsection(); ?>