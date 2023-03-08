<!-- Begin Page Content -->
<div class="container-fluid">
   <!-- DataTales  -->
   <div class="card shadow mb-4">
      <div class="card-header py-3 d-flex flex-row">
         <h5 class="m-0 mr-auto font-weight-bold text-primary">Data Kelas</h5>
         <!-- <a href="<?= BASE_URL ?>kelas/tambahkelas" class="btn btn-primary">Tambah</a> -->
         <a href="#" data-toggle="modal" data-target="#tambahkelas" class="btn btn-primary">Tambah</a>
      </div>
      <div class="card-body">
         <div class="table-responsive pt-3 pr-2">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
               <thead>
                  <tr>
                     <th>No.</th>
                     <th>Nama Kelas</th>
                     <th>Kompetensi Keahlian</th>
                     <th width="120">Aksi</th>
                  </tr>
               </thead>
               <tbody>
                  <?php
                  $i = 0;
                  foreach ($data['datakelas'] as $kelas) { ?>
                     <tr>
                        <td><?= ++$i ?></td>
                        <td><?= $kelas['nama'] ?></td>
                        <td><?= $kelas['kompetensi_keahlian'] ?></td>
                        <td>
                           <!-- <a href="<?php BASE_URL ?>kelas/editkelas/<?= $kelas['id'] ?>" class="btn btn-warning">Edit</a> -->
                           <!-- <a href="<?php BASE_URL ?>kelas/deletekelas/<?= $kelas['id'] ?>" class="btn btn-danger" onclick="return confirm('apakah anda yakin ingin menghapus data ini')">Hapus</a> -->
                           <a href="#" data-toggle="modal" data-target="#editkelas<?= $kelas['id'] ?>" class="btn btn-warning">edit</a>
                           <a href="#" data-toggle="modal" data-target="#deletekelas<?= $kelas['id'] ?>" class="btn btn-danger">hapus</a>

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

<!-- modal tambah kelas-->
<div class="modal fade" id="tambahkelas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Data kelas</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">×</span>
            </button>
         </div>
         <div class="modal-body">
            <form action="<?= BASE_URL ?>kelas/simpankelas" method="post">
               <div class="row">
                  <div class="col">
                     <div class="form-group">
                        <div class="form-group">
                           <label for="nama">Nama</label>
                           <input name="nama" type="text" class="form-control" id="nama">
                        </div>
                        <div class="">
                           <label for="kompetensi_keahlian">Kompetensi Keahlian</label>
                           <input name="kompetensi_keahlian" type="text" class="form-control" id="jurusan">
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

<?php foreach ($data['datakelas'] as $kelas) { ?>
   <!-- modal edit kelas-->
   <div class="modal fade" id="editkelas<?= $kelas['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-scrollable" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="exampleModalLabel">Edit Data kelas</h5>
               <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
               </button>
            </div>
            <div class="modal-body">
               <form action="<?= BASE_URL ?>kelas/updatekelas" method="post">
                  <input type="hidden" name="id" value="<?= $kelas['id'] ?>">
                  <div class="row">
                     <div class="col">
                        <div class="form-group">
                           <label for="nama">Nama</label>
                           <input name="nama" type="text" class="form-control" id="nama" value="<?= $kelas['nama'] ?>">
                        </div>
                        <div class="form-group">
                           <label for="kompetensi_keahlian">Kompetensi Keahlian</label>
                           <input name="kompetensi_keahlian" type="text" class="form-control" id="kompetensi_keahlian" value="<?= $kelas['kompetensi_keahlian'] ?>">
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
   <div class="modal fade" id="deletekelas<?= $kelas['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-scrollable" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="exampleModalLabel">Hapus Data kelas</h5>
               <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
               </button>
            </div>
            <div class="modal-body">
               Apakah anda yakin ingin menghapus kelas <?= $kelas['nama'] ?>?
            </div>
            <div class="modal-footer">
               <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
               <a href="<?= BASE_URL ?>kelas/deletekelas/<?= $kelas['id'] ?>" type="button" class="btn btn-danger">Delete</a>
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