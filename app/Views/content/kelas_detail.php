<?= $this->extend("layout/template"); ?>
<?= $this->section("content"); ?>
<div class="container-fluid px-4">
    <div>
        <h3 class="mt-2"> <i class="fas fa-user-graduate me-3 fa-2x"></i>Siswa <h6 class="text-primary">Master Data / Data Siswa</h6>
        </h3>
    </div>
    <hr class="bg-secondary">

    <div class="card mb-4">

        <div class="card-header bg-secondary text-white">
            <div class="row">
                <div class="col-md-10 mt-1"> <i class="fas fa-table me-1"></i>
                    Data siswa</div>
                <div class="col-md-2">
                    <?php if (has_permission("tambah-siswa")) : ?>
                        <a href="<?php base_url() ?>/siswa/input_siswa"> <button class="btn btn-sm btn-primary "><i class="fas fa-plus me-2"></i>Input Data Siswa</button>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="card-body">
            <?php if (session()->getFlashdata('pesan')) : ?>
                <script>
                    Swal.fire({
                        title: "Data  Siswa",
                        text: "Berhasil <?= session()->getflashdata('pesan'); ?>",
                        icon: 'success'
                    });
                </script>
            <?php endif; ?>
            <table id="example" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kelas</th>
                        <th>Jurusan</th>
                        <th>Option</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($kelas as $row) : ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $row['kelas']; ?></td>
                            <td><?= $row['jurusan']; ?></td>
                            <td>
                                <a href="<?php base_url() ?>/siswa/detail/<?= $row['kelas']; ?>" class="btn btn-sm btn-primary"><i class="fas fa-edit me-2"></i>Detail</a>
                            </td>
                        </tr>
                    <?php endforeach ?>
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
            if (result.value) {
                document.location.href = href;
            }
        })

    })
</script>

<?= $this->endsection(); ?>