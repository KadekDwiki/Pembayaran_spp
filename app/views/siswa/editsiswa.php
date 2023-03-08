<!-- Begin Page Content -->
<div class="container-fluid">
   <h1>Edit siswa</h1>
   <form action="<?= BASE_URL ?>siswa/updatesiswa" method="post">
      <input type="hidden" name="id" value="<?= $data['siswa']['id'] ?>">
      <div class="row">
         <div class="col">
            <div class="form-group">
               <label for="nisn">Nisn</label>
               <input name="nisn" type="text" class="form-control" id="nisn" value="<?= $data['siswa']['nisn'] ?>">
            </div>
            <div class="form-group">
               <label for="nis">Nisn</label>
               <input name="nis" type="text" class="form-control" id="nis" value="<?= $data['siswa']['nis'] ?>">
            </div>
            <div class="form-group">
               <label for="nama">Nama</label>
               <input name="nama" type="text" class="form-control" id="nama" value="<?= $data['siswa']['nama'] ?>">
            </div>
            <div class=" form-group">
               <label for="telepon">Telepon</label>
               <input name="telepon" type="text" class="form-control" id="telepon" value="<?= $data['siswa']['telepon'] ?>">
            </div>
         </div>
         <div class=" col">
            <div class="form-group">
               <label for="kelas">Kelas</label>
               <select name="kelas" id="kelas" class="form-control">
                  <?php foreach ($data['kelas'] as $kls) { ?>
                     <option value="<?= $kls['id'] ?>" <?= ($kls['id'] == $data['siswa']['kelas_id']) ? "selected" : "" ?>><?= $kls['nama'] ?></option>
                  <?php } ?>
               </select>
            </div>
            <div class="form-group">
               <label for="alamat">Alamat</label>
               <textarea name="alamat" class="form-control" id="alamat"><?= $data['siswa']['alamat'] ?></textarea>
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