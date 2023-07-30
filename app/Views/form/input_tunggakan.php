<?= $this->extend("layout/template"); ?>
<?= $this->section("content"); ?>
<div class="container-fluid px-4">
    <div>
        <h3 class="mt-2"> <i class="fas fa-user-graduate me-3 fa-2x"></i>Siswa
            <h6 class="text-primary">Master Data / Input Tagihan</h6>
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
                        <a class="link-website" href="<?php base_url() ?>/bebas_bayar" style="text-decoration:none">
                            <h4 class="text-white "><i class="fas fa-arrow-left me-2"></i>
                                Form Input Tagihan </h4>
                        </a>
                    </div>
                </div>
            </div>
            <form action="<?php base_url() ?>/bebas_bayar/simpan_tagihan" method="POST" class="form-user">
                <?php csrf_field(); ?>
                <div class="card-body ">
                    <div class=" row mb-3">
                        <label for="nama" class="col-sm-2 col-form-label">NIS</label>
                        <div class="col-sm-5">

                            <input type="text" class="form-control" readonly name="nis" id="nama" value="<?= $siswa['nis']; ?>">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="nama" class="col-sm-2 col-form-label">Nama Siswa</label>
                        <div class="col-sm-5">

                            <input type="text" class="form-control" readonly name="nama" id="nama" value="<?= $siswa['nm_siswa']; ?>">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="jenis " class="col-sm-2  col-form-label">Kelas </label>
                        <div class="col-sm-5">

                            <select class="form-control" name="kelas" id="kelas" readonly required>
                                <?php foreach ($kelas as $row) : ?>
                                    <option value="<?= $row['id_kelas']; ?>" hidden <?= $siswa['id_kelas'] == $row['id_kelas'] ? 'selected' : ''; ?>>
                                        <?= $row['kelas']; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="jenis " class=" col-sm-2 col-form-label">Jenis Tagihan </label>
                        <div class="col-sm-5">
                            <select name="bebas" id="spp" class="form-select" required>
                                <option value="">--- Pilih SPP ---</option>
                                <?php foreach ($spp as $row) : ?>
                                    <option value="<?= $row['id_bebas']; ?>">
                                        <?= $row['jenis']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
            </form>
        </div>
    </div>
    <div>
        <table>
            <tr>
                <td></td>
            </tr>
        </table>
    </div>
</div>

<!-- <script>
    $('#spp').on('change', (event) => {
        getBarang(event.target.value).then(spp => {
            $('#rupiah').val(spp.nominal);
        });
    });

    async function getBarang(id_spp) {
        let response = await fetch('Api/input_tunggakan/' + id_spp)
        let data = await response.json();

        return data;
    };
</script> -->
<script>



</script>
<?= $this->endsection(); ?>
<?php function rupiah($angka)
{

    $hasil_rupiah = "Rp " . number_format($angka, 2, ',', '.');
    return $hasil_rupiah;
} ?>