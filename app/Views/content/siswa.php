<?= $this->extend("layout/template"); ?>
<?= $this->section("content"); ?>

<div class="container-fluid px-4">
    <div>
        <h3 class="mt-2"> <i class="fas fa-user-graduate me-3 fa-2x"></i>Siswa
            <h6 class=" text-primary">Master Data / Data Siswa</h6>
        </h3>
    </div>
    <hr class="bg-secondary">
    <div class="card mb-4">
        <div class="card-header bg-secondary text-white">
            <div class="row">
                <div class="col-md-10 mt-1 ">
                    <a href="<?php base_url() ?>/siswa" style="text-decoration: none;">
                        <h4 class="text-white "><i class="fas fa-arrow-left"></i></h4>
                    </a>
                </div>
                <div class="col-md-2">
                    <i class="fas fa-table me-1 mt-2"></i>
                    Data Siswa
                </div>
            </div>
        </div>
        <div class="card-body border-bordered">
            <?php if (session()->getFlashdata('pesan')) : ?>
                <script>
                    Swal.fire({
                        title: "Data  Siswa",
                        text: "Berhasil <?= session()->getflashdata('pesan'); ?>",
                        icon: 'success'
                    });
                </script>
            <?php endif; ?>
            <div class="card-body">
                <table id="example" class="display mt-2" style="width:100%">
                    <thead>
                        <th>No</th>
                        <th>NIS</th>
                        <th>Nama Siswa</th>
                        <th>Kelas</th>
                        <th>Jurusan</th>
                        <th>Option</th>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php
                        $page = isset($_GET['page']) ? $_GET['page'] : 1;
                        $no = 1 + (10 * ($page - 1));
                        foreach ($siswa as $row) : ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $row['nis']; ?></td>
                                <td><?= $row['nm_siswa']; ?></td>
                                <td><?= $row['kelas']; ?></td>
                                <td><?= $row['jurusan']; ?></td>
                                <td>
                                    <a href="/siswa/edit/<?= $row['id_siswa']; ?>/<?= $row['kelas']; ?>" class="btn btn-warning btn-sm" title="Edit">
                                        <i class="fas fa-edit "></i></a>
                                    <a href="/siswa/hapus/<?= $row['id_siswa']; ?>/<?= $row['kelas']; ?>" class="btn btn-danger btn-sm " id="hp" title="Hapus"><i class="fas fa-trash "></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
            <p class="text-danger" style="font: italic;"><i>* menghapus data siswa dapat menghapus semua transaksi</i></p>
        </div>
    </div>


</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('#example').DataTable();
    });
    $(document).on('click', '.hapus', function(e) {
        e.preventDefault();
        const href = this.href
        Swal.fire({
            title: 'Apakah yakin  ',
            text: "Data akan dihapus!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Hapus Data!'
        }).then((result) => {
            if (result.value) {
                document.location.href = href;
            }
        })

    })
</script>
<?= $this->endsection(); ?>