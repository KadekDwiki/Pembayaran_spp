<?php
class Kelas extends Controller
{
   public function index()
   {
      $data = [
         'title' => "Halaman Manajemen Kelas",
         'role' => $_SESSION['role'],
         'user' => $this->model("Pengguna_model")->getUserLogin($_SESSION['userId']),
         'datakelas' => $this->model("Kelas_model")->getAllKelas()
      ];

      $this->view("templates/header", $data);
      $this->view("templates/sidebar", $data);
      $this->view("kelas/index", $data);
      $this->view("templates/footer", $data);
   }

   // menampilkan halaman tambah data
   public function tambahkelas()
   {
      $data = [
         'title' => "Halaman tambah data kelas",
         'role' => $_SESSION['role'],
         'user' => $this->model("Pengguna_model")->getUserLogin($_SESSION['userId'])
      ];

      $this->view("templates/header", $data);
      $this->view("templates/sidebar", $data);
      $this->view("kelas/tambahkelas", $data);
      $this->view("templates/footer", $data);
   }

   // menyimpan data user baru
   public function simpankelas()
   {
      if ($this->model("Kelas_model")->storeKelas($_POST) > 0) {
         Flasher::setFlash("Berhasil", "Data Kelas Berhasil ditambahkan", "success");
         location("kelas");
      } else {
         Flasher::setFlash("Gagal", "Data kelas gagal ditambahkan", "danger");
         location("kelas/error");
      }
   }

   public function editkelas($id)
   {
      $data = [
         'title' => "Halaman edit data kelas",
         'role' => $_SESSION['role'],
         'user' => $this->model("Pengguna_model")->getUserLogin($_SESSION['userId']),
         'kelas' => $this->model("Kelas_model")->getKelas($id)
      ];

      $this->view("templates/header", $data);
      $this->view("templates/sidebar", $data);
      $this->view("kelas/editkelas", $data);
      $this->view("templates/footer", $data);
   }

   public function updatekelas()
   {
      if ($this->model("Kelas_model")->updateKelas($_POST) > 0) {
         Flasher::setFlash("Berhasil", "Data kelas berhasil diupdate", "success");
         header("Location:" . BASE_URL . "kelas");
         exit;
      } else {
         Flasher::setFlash("Gagal", "Data Kelas gagal diupdate", "danger");
         header("Location:" . BASE_URL);
         exit;
      }
   }

   public function deleteKelas($id)
   {
      if ($this->model("Kelas_model")->deleteKelas($id) > 0) {
         Flasher::setFlash("Berhasil", "Data kelas berhasil dihapus", "success");
         header("Location:" . BASE_URL . "kelas");
         exit;
      } else {
         Flasher::setFlash("Gagal", "Data kelas gagal dihapus", "danger");
         header("Location:" . BASE_URL);
         exit;
      }
   }
}
