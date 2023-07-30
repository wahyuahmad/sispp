   <?php if (has_permission('histori bayar')) : ?>
       <?= $this->include("layout/template user"); ?>
       <div class="container-fluid px-4">
           <div>
               <h3 class="mt-2"></i>History Pembayaran Siswa
               </h3>
           </div>
           <hr class="bg-secondary">
           <div class="card mb-4">
               <div class="card-header bg-success align-text-center">
                   <a class="link-website" href="<?= base_url(); ?>" style="text-decoration: none;">
                       <h4 class="text-white "><i class="fas fa-arrow-left me-2"></i>History</h4>
                   </a>
               </div>
               <div class="card-body">
                   <div class="border-top-primary ">
                       <div class="row">
                           <div class="col-md-5 offset-3">
                               <div class="card mb-4">
                                   <div class="card-header bg-success text-white">
                                       <h5>Biodata Siswa</h5>
                                   </div>
                                   <div class="card-body mb-4">
                                       <?php $i = 0; ?>
                                       <?php foreach ($spp as $row) : if ($i == 1) break;
                                            $i++;
                                        ?>
                                           <table width="100%" class="table table-striped">
                                               <tr>
                                                   <td>NIS</td>
                                                   <td>:</td>
                                                   <td width="50%"><?= $row['nis']; ?></td>
                                               </tr>
                                               <tr>
                                                   <td>Nama Siswa</td>
                                                   <td>:</td>
                                                   <td width="50%"><?= $row['nm_siswa']; ?></td>
                                               </tr>
                                               <tr>
                                                   <td>Kelas</td>
                                                   <td>:</td>
                                                   <td width="50%"><?= $row['kelas']; ?></td>
                                               </tr>
                                               <tr>
                                                   <td>Tahun Pelajaran</td>
                                                   <td>:</td>
                                                   <td width="50%"><?= $row['tahun']; ?></td>
                                               </tr>
                                               <tr>
                                                   <td>Total Tagihan</td>
                                                   <td>:</td>
                                                   <td width="50%"><?= rupiah($row['jumlah'] * 12); ?></td>
                                               </tr>
                                           </table>
                                       <?php endforeach; ?>
                                   </div>
                               </div>
                           </div>
                       </div>
                       <div class="row">
                           <div class="col-md-4">
                               <div class="card">
                                   <div class="card-header bg-warning">
                                       <h5>Pembayaran SPP </h5>
                                   </div>
                                   <div class="card-body">
                                       <table class="table table-striped table-bordered mb-5">
                                           <thead>
                                               <th>No</th>
                                               <th>Bulan</th>
                                               <th>Nominal</th>
                                               <th>Keterangan</th>
                                           </thead>
                                           <tbody>
                                               <?php $no = 1;

                                                ?>
                                               <?php foreach ($spp as $row) :
                                                    $keterangan = $row['tgl_bayar'] ?>
                                                   <tr>
                                                       <td><?= $no++; ?></td>
                                                       <td><?= bulan($row['bulan']); ?></td>
                                                       <td><?= rupiah($row['jumlah']); ?></td>
                                                       <td>
                                                           <?php
                                                            if ($keterangan > 0) {
                                                                echo "<span class= bagde text-bg-success>Lunas</span>";
                                                            } else {
                                                                echo "<span class= bagde text-bg-success>Belum Lunas</span>";
                                                            ?>
                                                           <?php } ?>
                                                       </td>
                                                   </tr>
                                               <?php endforeach; ?>
                                           </tbody>
                                       </table>
                                   </div>
                               </div>
                           </div>
                           <div class="col-md-8">
                               <div class="card">
                                   <div class="card-header bg-warning">
                                       <h5>Pembayaran Lain</h5>
                                   </div>
                                   <div class="card-body">
                                       <table class="table table-striped table-bordered">
                                           <thead>
                                               <th>No</th>
                                               <th>Jurusan</th>
                                               <th>Nominal</th>
                                               <th>Kekurangan</th>
                                               <th>Jumlah Bayar</th>
                                               <th>Tanggal Bayar</th>
                                               <th>Keterangan</th>
                                           </thead>
                                           <tbody>
                                               <?php $no = 1; ?>
                                               <?php
                                                foreach ($bebas as $row) :
                                                    $kekurangan = $row['nominal'] - $row['jumlah_bayar'];
                                                ?>
                                                   <tr>
                                                       <td><?= $no++; ?></td>
                                                       <td><?= $row['jenis']; ?></td>
                                                       <td><?= rupiah($row['nominal']); ?></td>
                                                       <td><?= rupiah($kekurangan); ?></td>
                                                       <td><?= rupiah($row['jumlah_bayar']); ?></td>
                                                       <td><?= $row['tgl_bayar']; ?></td>
                                                       <td>
                                                           <?php
                                                            if ($kekurangan == 0) {
                                                                echo "<span class= bagde text-bg-success>Lunas</span>";
                                                            } else {
                                                                echo "<span class= bagde text-bg-success>Belum Lunas</span>";
                                                            ?>
                                                           <?php } ?>
                                                       </td>
                                                   </tr>
                                               <?php endforeach ?>
                                           </tbody>
                                       </table>
                                   </div>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>

           </div>

       </div>
       <footer class="py-4 bg-white mt-auto fixed-bottom text-center">
           <div class="container-fluid px-4">
               <div class="d-flex align-items-center justify-content-between small">
                   <div class="text-muted">Copyright &copy; SISPP 2023 AWK COORPORATION</div>

               </div>
           </div>
       </footer>

       <footer class="py-4 bg-white mt-auto fixed-bottom text-center">
           <div class="container-fluid px-4">
               <div class="d-flex align-items-center justify-content-between small">
                   <div class="text-muted">Copyright &copy; SISPP 2023 AWK COORPORATION</div>
               </div>
           </div>
       </footer>
   <?php endif; ?>








  