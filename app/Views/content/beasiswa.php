<?= $this->extend("layout/template"); ?>
<?= $this->section("content"); ?>

<div class="container-fluid px-4">
    <div>
        <h3 class="mt-2"> <i class="fas fa-user-graduate me-3 fa-2x"></i>Siswa
            <h6 class=" text-primary">Master Data / Data Beasiswa</h6>
        </h3>
    </div>

    <hr class="bg-secondary">
    <div class="card mb-4">
        <div class="card-header bg-secondary text-white">
            <div class="row">
                <div class="col-md-10 mt-1"> <i class="fas fa-table me-1"></i>
                    Data Beasiswa</div>
                <div class="col-md-2">
                    <a href="<?php base_url() ?>/beasiswa/input_beasiswa"> <button class="btn btn-sm btn-primary btn-sm "><i class="fas fa-plus me-2"></i>Input Beasiswa</button>
                    </a>
                </div>
            </div>
        </div>

        <div class="card-body border-bordered">
            <?php if (session()->getflashdata('pesan')) : ?>
                <div class="alert alert-primary d-flex align-items-center" role="alert">
                    <h6> <i class="fas fa-check me-2 fa-1x"></i>
                    </h6>
                    <div class="h6">
                        <?= session()->getflashdata('pesan'); ?>
                    </div>
                </div>
            <?php endif; ?>
            <div class="card-body">
                <table id="example" class="display mt-2" style="width:100%">
                    <thead>
                        <th>No</th>
                        <th>Jenis Beasiswa</th>
                        <th>Tahun</th>
                        <th>Option</th>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($beasiswa as $row) : ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $row['jenis']; ?></td>
                                <td><?= $row['tahun']; ?></td>
                                <td>
                                    <a href="<?php base_url() ?>/beasiswa/edit/<?= $row['id_beasiswa']; ?>"><button class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</button></a>
                                    <form action="/beasiswa/hapus/<?= $row['id_beasiswa']; ?>" method="POST" class="d-inline">
                                        <?= csrf_field(); ?>
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('apakah data akan dihapus');"><i class="fas fa-times me-2"></i><span class="ml-2">Hapus</span></button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
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