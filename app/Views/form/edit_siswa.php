<?= $this->extend("layout/template"); ?>
<?= $this->section("content"); ?>
<div class="container-fluid px-4">
    <div>
        <h3 class="mt-2"> <i class="fas fa-user-graduate me-3 fa-2x"></i>Siswa
            <h6 class="text-primary">Master Data / Data Siswa / Edit Siswa</h6>
        </h3>
    </div>
    <hr class="bg-secondary">
</div>


<div class="container-fluid px-4">
    <!-- DataTales Example -->


    <div class="card mb-5">
        <div class="card-header bg-warning align-text-center">
            <a href="<?php base_url() ?>/siswa" style="text-decoration: none;">
                <h4 class="text-white "><i class="fas fa-arrow-left"></i> Form Edit Siswa</h4>
            </a>
        </div>
        <form action="<?php base_url() ?>/siswa/update/<?= $siswa['id_siswa']; ?>" method="POST">
            <?php csrf_field(); ?>
            <div class="card-body">
                <div class="border-top-primary ">
                    <div class="row mb-3 mt-3">
                        <label for="nis" class="col-sm-2 col-form-label">NIS</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" readonly id="nis" name="nis" maxlength="4" autocomplete="off" value="<?= $siswa['nis']; ?>">
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="nama" class="col-sm-2 col-form-label">Nama Siswa</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" id="nama" name="nama" required value="<?= $siswa['nm_siswa']; ?>" autofocus>
                    </div>
                </div>

                <div class=" row mb-3">
                    <label for="kelas" class="col-sm-2 col-form-label"> Kelas</label>
                    <div class="col-sm-5">
                        <div class="form-group">
                            <select class="form-select" name="kelas" id="kelas" required>
                                <option value="" hidden></option>
                                <?php foreach ($kelas as $row) : ?>
                                    <option value="<?= $row['id_kelas']; ?>" <?= $siswa['id_kelas'] == $row['id_kelas'] ? 'selected' : ''; ?>>
                                        <?= $row['kelas']; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn  btn-primary  ">Simpan</button>

            </div>

        </form>
    </div>
</div>




<?= $this->endsection(); ?>