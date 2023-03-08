<!-- Begin Page Content -->
<div class="container-fluid">
   <!-- DataTales  -->
   <div class="card shadow mb-4">
      <div class="card-header py-3 d-flex flex-row">
         <h5 class="m-0 mr-auto font-weight-bold text-primary">History Transaksi Pembayaran</h5>
         <a href="<?= BASE_URL ?>historytransaksi/cetakhistory" target="blank" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Cetak Laporan</a>
      </div>
      <div class="card-body">
         <div class="table-responsive pt-3 pr-2">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
               <thead>
                  <tr>
                     <th>No.</th>
                     <th>Nis</th>
                     <th>Nama Siswa</th>
                     <th>Nama Petugas</th>
                     <th>Tanggal Bayar</th>
                     <th>Bulan Dibayar</th>
                     <th>Tahun Dibayar</th>
                     <th>Nominal</th>
                  </tr>
               </thead>
               <tbody>
                  <?php
                  $i = 0;
                  foreach ($data['historytransaksi'] as $history) { ?>
                     <tr>
                        <td><?= ++$i ?></td>
                        <td><?= $history['siswaNis'] ?></td>
                        <td><?= $history['nama_siswa'] ?></td>
                        <td><?= $history['nama_petugas'] ?></td>
                        <td><?= $history['tanggal_bayar'] ?></td>
                        <td><?= bulan($history['bulan_dibayar'])  ?></td>
                        <!-- <td><?= date('F', mktime(0, 0, 0, $history['bulan_dibayar'], 1))  ?></td> -->
                        <td><?= $history['tahun_dibayar'] ?></td>
                        <td><?= $history['nominal'] ?></td>
                     </tr>
                  <?php } ?>
               </tbody>
            </table>
         </div>
      </div>
   </div>
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->

<!-- Footer -->
<footer class="sticky-footer bg-white">
   <div class="container my-auto">
      <div class="copyright text-center my-auto">
         <span>Copyright &copy; Your Website 2020</span>
      </div>
   </div>
</footer>
<!-- End of Footer -->
</div>
<!-- End of Content Wrapper -->
</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
   <i class="fas fa-angle-up"></i>
</a>