<?= $this->extend("layout/template"); ?>
<?= $this->section("content"); ?>

<div class="container-fluid px-4">
    <div>
        <h3 class="mt-2"> <i class="fas fa-chart-bar me-3 fa-2x"></i>Laporan SPP
            <h6 class=" text-primary">Laporan SPP Persiswa</h6>
        </h3>
    </div>
    <hr class="bg-secondary">
    <div class="card mb-4">
        <div class="card-header bg-secondary text-white">
            <div class="row">
                <div class="col-md-10 mt-1"> <i class="fas fa-table me-1"></i>
                    Data Siswa</div>
            </div>
        </div>
        <div class="card-body border-bordered">
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
                                    <a href="/laporan/siswa_spp/<?= $row['id_siswa']; ?>" target="_blank" class="btn btn-success btn-sm mr-2" data-target="#editModal">
                                        <i class="fas fa-print me-2"></i><span class="ml-2">SPP</span></a>
                                    <a href="/laporan/siswa_bebas/<?= $row['nis']; ?>" target="_blank" class="btn btn-warning btn-sm mr-2" data-target="#editModal">
                                        <i class="fas fa-print me-2"></i><span class="ml-2">Non SPP</span></a>
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