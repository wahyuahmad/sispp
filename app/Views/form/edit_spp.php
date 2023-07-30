<?= $this->extend("layout/template"); ?>
<?= $this->section("content"); ?>
<div class="container-fluid px-4">
    <div>
        <h3 class="mt-2"> <i class="fas fa-money-bill me-3 fa-2x"></i>Keuangan
            <h6 class="text-primary">Master Data / Data SPP / Edit SPP</h6>
        </h3>
    </div>
    <hr class="bg-secondary">
</div>

<div>
    <div class="container-fluid px-4">
        <!-- DataTales Example -->
        <div class="card mb-5">
            <div class="card-header bg-warning align-text-center">
                <a class="link-website" href="<?php base_url() ?>/spp" style="text-decoration: none;">
                    <h4 class="text-white "><i class="fas fa-arrow-left me-2"></i>Form Edit SPP </h4>
                </a>
            </div>
            <form action="<?php base_url() ?>/spp/update/<?= $spp['id_spp']; ?>" method="POST">
                <?php csrf_field(); ?>
                <div class="card-body ">
                    <div class="row mb-3">
                        <label for="tahun" class="col-sm-2 col-form-label">Tahun</label>
                        <div class="col-sm-5">
                            <input type="text" value="<?= $spp['tahun']; ?>" class="form-control" id="tahun" name="tahun" autofocus>
                        </div>
                    </div>
                    <div class=" row mb-3">
                        <label for="nominal" class="col-sm-2 col-form-label">Nominal</label>
                        <div class="col-sm-5">
                            <input type="text" value="<?= $spp['nominal'] ?>" class="form-control" id="nominal" name="nominal" autofocus>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-sm btn-primary  ">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endsection(); ?>