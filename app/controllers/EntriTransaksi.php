<?php
class EntriTransaksi extends Controller
{
   public function index()
   {
      $data = [
         'title' => "Halaman Entri transaksi pembayaran",
         'role' => $_SESSION['role'],
         'user' => $this->model("Pengguna_model")->getUserLogin($_SESSION['userId']),
      ];

      $this->view("templates/header", $data);
      $this->view("templates/sidebar", $data);
      $this->view("transaksi/index", $data);
      $this->view("templates/footer", $data);
   }
   public function detailpembayaransiswa()
   {
      if (!$this->model("Siswa_model")->getSiswaByNis($_POST['nis'])) {
         Flasher::setFlash("Gagal", "data siswa tidak ditemukan", "danger");
         location("entritransaksi");
      }
      $data = [
         'title' => "Halaman Entri transaksi",
         'role' => $_SESSION['role'],
         'user' => $this->model("Pengguna_model")->getUserLogin($_SESSION['userId']),
         'siswabynis' => $this->model("Siswa_model")->getSiswaByNis($_POST['nis']),
         'datakelas' => $this->model("Kelas_model")->getAllKelas(),
         'datapembayaran' => $this->model("Pembayaran_model")->getAllPembayaran(),
         'petugas' => $this->model("Petugas_model")->getPetugasByPenggunaId($_SESSION['userId'])
      ];

      $this->view("templates/header", $data);
      $this->view("templates/sidebar", $data);
      $this->view("transaksi/detailpembayaran", $data);
      $this->view("templates/footer", $data);
   }

   public function simpantransaksi()
   {
      if ($this->model("Transaksi_model")->storeTransaksi($_POST) > 0) {
         Flasher::setFlash("Berhasil", "Pembayaran SPP Berhasil dilakukan", "success");
         location("entritransaksi");
      } else {
         Flasher::setFlash("Gagal", "Tidak bisa melakukan pembayaran", "danger");
         location("entritransaksi/spp sudah dibayar");
      }
   }
}
