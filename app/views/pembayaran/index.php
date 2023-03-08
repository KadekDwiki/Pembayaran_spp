<!-- Begin Page Content -->
<div class="container-fluid">
   <!-- DataTales  -->
   <div class="card shadow mb-4">
      <div class="card-header py-3 d-flex flex-row">
         <h5 class="m-0 mr-auto font-weight-bold text-primary">Data Pembayaran</h5>
         <a href="#" data-toggle="modal" data-target="#tambahpembayaran" class="btn btn-primary">Tambah</a>
      </div>
      <div class="card-body">
         <div class="table-responsive pt-3 pr-2">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
               <thead>
                  <tr>
                     <th>No.</th>
                     <th>Tahun Ajaran</th>
                     <th>Nominal</th>
                     <th width="120">Aksi</th>
                  </tr>
               </thead>
               <tbody>
                  <?php
                  $i = 0;
                  foreach ($data['datapembayaran'] as $pembayaran) { ?>
                     <tr>
                        <td><?= ++$i ?></td>
                        <td><?= $pembayaran['tahun_ajaran'] ?></td>
                        <td><?= $pembayaran['nominal'] ?></td>
                        <td>
                           <a href="#" data-toggle="modal" data-target="#editPembayaran<?= $pembayaran['id'] ?>" class="btn btn-warning">Edit</a>
                           <a href="#" data-toggle="modal" data-target="#deletePembayaran<?= $pembayaran['id'] ?>" class="btn btn-danger">Hapus</a>
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

<!-- modal pembayaran -->
<div class="modal fade" id="tambahpembayaran" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Data Pembayaran</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">×</span>
            </button>
         </div>
         <div class="modal-body">
            <form action="<?= BASE_URL ?>pembayaran/simpanpembayaran" method="post">
               <div class="row">
                  <div class="col">
                     <div class="form-group">
                        <div class="form-group">
                           <label for="tahun_ajaran">Tahun ajaran</label>
                           <input name="tahun_ajaran" type="text" class="form-control" id="tahun_ajaran">
                        </div>
                        <div class="">
                           <label for="nominal">Nominal</label>
                           <input name="nominal" type="text" class="form-control" id="nominal">
                        </div>
                     </div>
                  </div>
               </div>
               <div class="modal-footer">
                  <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                  <button type="submit" class="btn btn-primary">Simpan</button>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>

<?php foreach ($data['datapembayaran'] as $pembayaran) { ?>
   <!-- modal edit kelas-->
   <div class="modal fade" id="editPembayaran<?= $pembayaran['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-scrollable" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="exampleModalLabel">Edit Data Pembayaran</h5>
               <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
               </button>
            </div>
            <div class="modal-body">
               <form action="<?= BASE_URL ?>pembayaran/updatepembayaran" method="post">
                  <input type="hidden" name="id" value="<?= $pembayaran['id'] ?>">
                  <div class="row">
                     <div class="col">
                        <div class="form-group">
                           <label for="tahun_ajaran">Nama</label>
                           <input name="tahun_ajaran" type="text" class="form-control" id="tahun_ajaran" value="<?= $pembayaran['tahun_ajaran'] ?>">
                        </div>
                        <div class="form-group">
                           <label for="nominal">Nominal</label>
                           <input name="nominal" type="text" class="form-control" id="nominal" value="<?= $pembayaran['nominal'] ?>">
                        </div>
                     </div>
                  </div>
                  <div class="modal-footer">
                     <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                     <button type="submit" class="btn btn-primary">Update</button>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>

   <!-- modal delete kelas -->
   <div class="modal fade" id="deletePembayaran<?= $pembayaran['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-scrollable" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="exampleModalLabel">Hapus Data kelas</h5>
               <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
               </button>
            </div>
            <div class="modal-body">
               Apakah anda yakin ingin menghapus tahun ajaran <?= $pembayaran['tahun_ajaran'] ?> dengan nominal <?= $pembayaran['nominal'] ?>?
            </div>
            <div class="modal-footer">
               <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
               <a href="<?= BASE_URL ?>pembayaran/deletepembayaran/<?= $pembayaran['id'] ?>" type="button" class="btn btn-danger">Delete</a>
            </div>
         </div>
      </div>
   </div>
<?php } ?>

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