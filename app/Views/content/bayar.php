<?= $this->extend("layout/template"); ?>
<?= $this->section("content"); ?>

<div class="container-fluid px-4">
    <div>
        <h3 class="mt-2"> <i class="fas fa-cash-register me-3 fa-2x"></i>Transaksi
            <h6 class=" text-primary">Transaksi Bayar SPP</h6>
        </h3>
    </div>
    <hr class="bg-secondary">
    <!-- Navbar Search-->

    <form action="<?php base_url() ?>/tunggakan/cari" method='GET'>
        <?php csrf_hash() ?>
        <div class="input-group mb-4">
            <input class="form-control" autofocus name="nis" type="text" placeholder="Masukkan NIS !" aria-label="Search for..." aria-describedby="btnNavbarSearch" />
            <button class="btn btn-primary" id="btnNavbarSearch" type="submit"><i class="fas fa-search"></i></button>
        </div>
    </form>
    <!-- Navbar-->






</div>
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>
<?= $this->endsection(); ?>
<?php
function rupiah($angka)
{

    $hasil_rupiah = "Rp " . number_format($angka, 2, ',', '.');
    return $hasil_rupiah;
} ?>