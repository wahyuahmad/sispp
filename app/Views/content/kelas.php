<?= $this->extend("layout/template"); ?>
<?= $this->section("content"); ?>
<div class="container-fluid px-4">
    <div>
        <h3 class="mt-2"> <i class="fas fa-school me-3 fa-2x"></i>Kelas <h6 class="text-primary">Master Data / Data Kelas</h6>
        </h3>
    </div>
    <hr class="bg-secondary">

    <div class="card mb-4">

        <div class="card-header bg-secondary text-white">
            <div class="row">
                <div class="col-md-10 mt-1"> <i class="fas fa-table me-1"></i>
                    Data Kelas</div>
                <div class="col-md-2">
                    <a href="<?php base_url() ?>/kelas/input_kelas"> <button class="btn btn-sm btn-primary "><i class="fas fa-plus me-2"></i>Input Data Kelas</button>
                    </a>
                </div>
            </div>
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
                                <a href="<?php base_url() ?>/kelas/edit/<?= $row['id_kelas']; ?>"><button class="btn btn-warning btn-sm" title="Edit"><i class="fas fa-edit"></i> </button></a>
                                <a href="<?= base_url(); ?>/kelas/hapus/<?= $row['id_kelas']; ?>" class="btn btn-danger btn-sm hapus" title="Hapus"><i class="fas fa-trash"></i></a>


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