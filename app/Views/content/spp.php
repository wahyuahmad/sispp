<?= $this->extend("layout/template"); ?>
<?= $this->section("content"); ?>

<div class="container-fluid px-4">
    <div>
        <h3 class="mt-2"> <i class="fas fa-money-bill me-3 fa-2x"></i>Keuangan
            <h6 class=" text-primary">Master Data / Data SPP</h6>
        </h3>
    </div>

    <hr class="bg-secondary">
    <div class="card mb-4">
        <div class="card-header bg-secondary text-white">
            <div class="row">
                <div class="col-md-10 mt-1"> <i class="fas fa-table me-1"></i>
                    Data SPP</div>
                <div class="col-md-2">
                    <a href="<?php base_url() ?>/spp/input_spp"> <button class="btn btn-sm btn-primary btn-sm "><i class="fas fa-plus me-2"></i>Input Data SPP</button>
                    </a>
                </div>
            </div>
        </div>

        <div class="card-body border-bordered">
            <?php if (session()->getflashdata('pesan')) : ?>
                <script>
                    Swal.fire({
                        title: 'Data SPP',
                        text: "Berhasil  <?= session()->getflashdata('pesan'); ?>",
                        icon: 'success'
                    });
                </script>
            <?php endif; ?>
            <div class="card-body">
                <table id="example" class="display mt-2" style="width:100%">
                    <thead>
                        <th>No</th>
                        <th>Tahun Pelajaran</th>
                        <th>Nominal</th>
                        <th>Option</th>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($spp as $row) : ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $row['tahun']; ?></td>
                                <td><?= rupiah($row['nominal']); ?></td>
                                <td>
                                    <a href="<?= base_url(); ?>/spp/edit/<?= $row['id_spp']; ?>"><button class="btn btn-warning btn-sm" title="Edit"><i class="fas fa-edit"></i></button></a>
                                    <a href="<?= base_url(); ?>/spp/hapus/<?= $row['id_spp']; ?>" class="btn btn-danger btn-sm hapus" title="Hapus"><i class="fas fa-trash"></i>
                                    </a>
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

        $(document).on('click', '.hapus', function(e) {
            e.preventDefault();
            const href = $(this).attr('href');
            Swal.fire({
                title: 'Apakah yakin  ',
                text: "Data akan dihapus!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Hapus Data!'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.location.href = href;
                }
            })
        })
    </script>
    <?= $this->endsection(); ?>




    <?php
    function rupiah($angka)
    {
        $hasil_rupiah = "Rp " . number_format($angka, 2, ',', '.');
        return $hasil_rupiah;
    } ?>