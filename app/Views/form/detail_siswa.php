<?= $this->extend("layout/template"); ?>
<?= $this->section("content"); ?>
<div class="container-fluid px-4">
    <div>
        <h3 class="mt-2"> <i class="fas fa-money-bill me-3 fa-2x"></i>Keuangan
            <h6 class="text-primary">Master Data / Data SPP / Input Tunggakan</h6>
        </h3>
    </div>
    <hr class="bg-secondary">
</div>

<div>
    <div class="container-fluid px-4">
        <!-- DataTales Example -->
        <div class="card mb-5">
            <div class="card-header bg-secondary align-text-center">
                <div class="row">
                    <div class="col-md-6">
                        <a class="link-website" href="<?php base_url() ?>/tunggakan">
                            <h4 class="text-white "><i class="fas fa-arrow-left me-2"></i>
                        </a>Form Input Tunggakan </h4>
                    </div>
                    <input type="text">
                </div>
            </div>
        </div>
    </div>
</div>



<?= $this->endsection(); ?>
<?php function rupiah($angka)
{
    $hasil_rupiah = "Rp " . number_format($angka, 2, ',', '.');
    return $hasil_rupiah;
} ?>?>