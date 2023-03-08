<!-- Begin Page Content -->
<div class="container-fluid">
   <form action="<?= BASE_URL ?>siswa/simpansiswa" method="post">
      <div class="row">
         <div class="col">
            <div class="form-group">
               <label for="nisn">Nisn</label>
               <input name="nisn" type="text" class="form-control" id="nisn">
            </div>
            <div class="form-group">
               <label for="nis">Nis <small class="text-danger">max 5 karakter</small></label>
               <input name="nis" type="text" class="form-control" id="nis">
            </div>
            <div class="form-group">
               <label for="nama">Nama</label>
               <input name="nama" type="text" class="form-control" id="nama">
            </div>
            <div class="form-group">
               <label for="telepon">Telepon</label>
               <input name="telepon" type="text" class="form-control" id="telepon">
            </div>
         </div>
         <div class="col">
            <div class="form-group">
               <label for="kelas">Kelas</label>
               <select name="kelas" id="kelas" class="form-control">
                  <?php foreach ($data['kelas'] as $kls) { ?>
                     <option value="<?= $kls['id'] ?>"><?= $kls['nama'] ?></option>
                  <?php } ?>
               </select>
            </div>
            <div class="form-group">
               <label for="pembayaran_id">Pembayaran Id</label>
               <select name="pembayaran_id" id="pembayaran_id" class="form-control mb-3" required>
                  <?php foreach ($data['datapembayaran'] as $pembayaran) { ?>
                     <option value="<?= $pembayaran['id'] ?>"><?= $pembayaran['tahun_ajaran'] ?></option>
                  <?php } ?>
               </select>
            </div>
            <div class="form-group">
               <label for="alamat">Alamat</label>
               <textarea name="alamat" class="form-control" id="alamat"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
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