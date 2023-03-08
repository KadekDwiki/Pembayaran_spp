<!-- Begin Page Content -->
<div class="container-fluid">
   <h1>Edit siswa</h1>
   <form action="<?= BASE_URL ?>petugas/updatepetugas" method="post">
      <input type="hidden" name="id" value="<?= $data['petugas']['id'] ?>">
      <div class="row">
         <div class="col-6">
            <div class="form-group">
               <label for="nama">Nama</label>
               <input name="nama" type="text" class="form-control" id="nama" value="<?= $data['petugas']['nama'] ?>">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
         </div>
      </div>
   </form>
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