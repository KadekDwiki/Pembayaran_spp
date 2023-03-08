<!-- Begin Page Content -->
<div class="container-fluid">
   <h3 class="text-dark mb-3">Entri Transaksi Pembayaran</h3>
   <form action="<?= BASE_URL ?>entritransaksi/simpantransaksi" method="post">
      <input type="hidden" name="siswa_id" value="<?= $data['siswabynis']['id'] ?>">
      <table>
         <thead>
            <tr>
               <th width="200px"></th>
               <th width="300px"></th>
            </tr>
         </thead>
         <tbody>
            <tr>
               <td>Nisn</td>
               <td>
                  <p class="mb-3">: <?= $data['siswabynis']['nisn'] ?></p>
               </td>
            </tr>
            <tr>
               <td>Nis</td>
               <td>
                  <p class="mb-3">: <?= $data['siswabynis']['nis'] ?></p>
               </td>
            </tr>
            <tr>
               <td>Nama</td>
               <td>
                  <p class="mb-3">: <?= $data['siswabynis']['nama'] ?></p>
               </td>
            </tr>
            <tr>
               <td>Kelas</td>
               <td>
                  <p class="mb-3">:
                     <?php foreach ($data['datakelas'] as $kelas) {
                        if ($data['siswabynis']['kelas_id'] == $kelas['id']) {
                           echo $kelas['nama'];
                        }
                     } ?></p>
               </td>
            </tr>
            <tr>
               <td>Petugas</td>
               <td>
                  <p class="mb-3">: <?= $data['petugas']['nama'] ?></p>
                  <input type="hidden" name="petugas_id" value="<?= $data['petugas']['id'] ?>">
               </td>
            </tr>
            <tr>
               <td><label for="tanggal_bayar">Tanggal Bayar</label></td>
               <td><input name="tanggal_bayar" type="date" class="form-control mb-3" id="tanggal_bayar" required></td>
            </tr>
            <tr>
               <td><label for="bulan_dibayar">Bulan Dibayar</label></td>
               <td>
                  <select name="bulan_dibayar" id="bulan_dibayar" class="form-control mb-3" required>
                     <option value="1">Januari</option>
                     <option value="2">Februari</option>
                     <option value="3">Maret</option>
                     <option value="4">April</option>
                     <option value="5">Mei</option>
                     <option value="6">Juni</option>
                     <option value="7">Juli</option>
                     <option value="8">Agustus</option>
                     <option value="9">September</option>
                     <option value="10">Oktober</option>
                     <option value="11">November</option>
                     <option value="12">Desember</option>
                  </select>
               </td>
            </tr>
            <tr>
               <td><label for="tahun_dibayar">Tahun Dibayar</label></td>
               <td>
                  <select name="tahun_dibayar" id="tahun_dibayar" class="form-control mb-3" required>
                     <?php foreach ($data['datapembayaran'] as $pembayaran) { ?>
                        <option value="<?= $pembayaran['tahun_ajaran'] ?>"><?= $pembayaran['tahun_ajaran'] ?></option>
                     <?php } ?>
                  </select>
               </td>
            </tr>
            <tr>
               <td>Nominal</td>
               <td>
                  <p class="mb-3">:
                     <?php foreach ($data['datapembayaran'] as $pembayaran) {
                        if ($data['siswabynis']['pembayaran_id'] == $pembayaran['id']) {
                           echo $pembayaran['nominal'];
                        }
                     } ?></p>
                  <input type="hidden" name="pembayaran_id" value="<?= $data['siswabynis']['pembayaran_id'] ?>">
               </td>
            </tr>
            <tr>
               <td></td>
               <td>
                  <button type="submit" class="btn btn-success mb-3">Bayar</button>
               </td>
            </tr>
         </tbody>
      </table>
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