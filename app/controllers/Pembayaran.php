<?php
class Pembayaran extends Controller
{
   public function index()
   {
      $data = [
         'title' => "Halaman Manajemen data pembayaran",
         'role' => $_SESSION['role'],
         'user' => $this->model("Pengguna_model")->getUserLogin($_SESSION['userId']),
         'datapembayaran' => $this->model("Pembayaran_model")->getAllPembayaran()
      ];

      $this->view("templates/header", $data);
      $this->view("templates/sidebar", $data);
      $this->view("pembayaran/index", $data);
      $this->view("templates/footer", $data);
   }

   public function simpanpembayaran()
   {
      if ($this->model("Pembayaran_model")->storePembayaran($_POST) > 0) {
         Flasher::setFlash("Berhasil", "Data pembayaran berhasil ditambahkan", "success");
         location("pembayaran");
      } else {
         Flasher::setFlash("Gagal", "Data pembayaran gagal ditambahkan", "danger");
         location("pembayaran");
      }
   }

   public function updatepembayaran()
   {
      if ($this->model("Pembayaran_model")->updatePembayaran($_POST) > 0) {
         Flasher::setFlash("Berhasil", "Data pembayaran berhasil diupdate", "success");
         location("pembayaran");
      } else {
         Flasher::setFlash("Gagal", "Data pembayaran gagal diupdate", "danger");
         location('pembayaran');
      }
   }

   public function deletepembayaran($id)
   {
      if ($this->model("Pembayaran_model")->deletePembayaran($id)) {
         Flasher::setFlash("Berhasil", "Data pembayaran berhasil dihapus", "success");
         location('pembayaran');
      } else {
         Flasher::setFlash("Gagal", "Data Pembayran gagal dihapus", "danger");
         location("pembayaran");
      }
   }
}
