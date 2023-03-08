<?php

class Pengguna extends Controller
{
   public function index()
   {
      $data = [
         'title' => "Halaman Manajemen Pengguna",
         'role' => $_SESSION['role'],
         'user' => $this->model("Pengguna_model")->getUserLogin($_SESSION['userId']),
         'datapengguna' => $this->model("Pengguna_model")->getAllPengguna()
      ];

      $this->view("templates/header", $data);
      $this->view("templates/sidebar", $data);
      $this->view("pengguna/index", $data);
      $this->view("templates/footer", $data);
   }

   public function deletepengguna($id)
   {
      if ($this->model("Pengguna_model")->deletePengguna($id) > 0) {
         Flasher::setFlash("Berhasil", "Data pengguna berhasil dihapus", "success");
         location("pengguna");
      } else {
         Flasher::setFlash("Gagal", "Data Pengguna gagal dihapus", "danger");
         location("pengguna/error");
      }
   }
}
