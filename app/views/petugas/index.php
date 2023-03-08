<!-- Begin Page Content -->
<div class="container-fluid">
   <!-- DataTales  -->
   <div class="card shadow mb-4">
      <div class="card-header py-3 d-flex flex-row">
         <h5 class="m-0 mr-auto font-weight-bold text-primary">Data Petugas</h5>
         <a href="<?= BASE_URL ?>petugas/tambahpetugas" class="btn btn-primary">Tambah</a>
      </div>
      <div class="card-body">
         <div class="table-responsive pt-3 pr-2">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
               <thead>
                  <tr>
                     <th>No.</th>
                     <th>Pengguna_id</th>
                     <th>Nama</th>
                     <th width="120">Aksi</th>
                  </tr>
               </thead>
               <tbody>
                  <?php
                  $i = 0;
                  foreach ($data['datapetugas'] as $siswa) { ?>
                     <tr>
                        <td><?= ++$i ?></td>
                        <td><?= $siswa['pengguna_id'] ?></td>
                        <td><?= $siswa['nama'] ?></td>
                        <td>
                           <a href="<?php BASE_URL ?>petugas/editpetugas/<?= $siswa['id'] ?>" class="btn btn-warning">Edit</a>
                           <a href="<?php BASE_URL ?>petugas/deletepetugas/<?= $siswa['id'] ?>" class="btn btn-danger" onclick="return confirm('apakah anda yakin ingin menghapus data ini')">Hapus</a>
                        </td>
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