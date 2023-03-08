<?php

class Siswa extends Controller
{
   // menampilkan halaman data siswa
   public function index()
   {
      $data = [
         'title' => "Halaman Manajemen Siswa",
         'role' => $_SESSION['role'],
         'user' => $this->model("Pengguna_model")->getUserLogin($_SESSION['userId']),
         'datasiswa' => $this->model("Siswa_model")->getAllSiswa()
      ];

      $this->view("templates/header", $data);
      $this->view("templates/sidebar", $data);
      $this->view("siswa/index", $data);
      $this->view("templates/footer", $data);
   }
   // menampilkan halaman tambah data
   public function tambahsiswa()
   {
      $data = [
         'title' => "Halaman tambah data siswa",
         'role' => $_SESSION['role'],
         'user' => $this->model("Pengguna_model")->getUserLogin($_SESSION['userId']),
         'kelas' => $this->model("Kelas_model")->getAllKelas(),
         'datapembayaran' => $this->model("Pembayaran_model")->getAllPembayaran()
      ];

      $this->view("templates/header", $data);
      $this->view("templates/sidebar", $data);
      $this->view("siswa/tambahsiswa", $data);
      $this->view("templates/footer", $data);
   }

   // menyimpan data user baru
   public function simpansiswa()
   {
      $_POST["username"] = $_POST["nis"];
      $_POST["password"] = "password";
      $_POST["role"] = "siswa";

      $pengguna = $this->model("Pengguna_model")->storePengguna($_POST);

      $_POST["pengguna_id"] = $pengguna;

      if ($pengguna) {
         if ($this->model("Siswa_model")->storeSiswa($_POST)) {
            Flasher::setFlash("Berhasil", "Siswa sudah berhasil ditambahkan", "success");
            location("siswa");
         }
      } else {
         Flasher::setFlash("Gagal", "Siswa tidak berhasil ditambahkan", "danger");
         location("siswa");
      }
   }

   public function editsiswa($id)
   {
      $data = [
         'title' => "Halaman edit data siswa",
         'role' => $_SESSION['role'],
         'user' => $this->model("Pengguna_model")->getUserLogin($_SESSION['userId']),
         'kelas' => $this->model("Kelas_model")->getAllKelas(),
         'siswa' => $this->model("Siswa_model")->getSiswa($id)
      ];

      $this->view("templates/header", $data);
      $this->view("templates/sidebar", $data);
      $this->view("siswa/editsiswa", $data);
      $this->view("templates/footer", $data);
   }

   public function updatesiswa()
   {
      if ($this->model("Siswa_model")->updateSiswa($_POST) > 0) {
         Flasher::setFlash("Berhasil", "Siswa sudah berhasil diupdate", "success");
         location("siswa");
         header("Location:" . BASE_URL . "siswa");
         exit;
      } else {
         Flasher::setFlash("Gagal", "Siswa tidak berhasil diupdate", "danger");
         location("siswa");
         header("Location:" . BASE_URL);
         exit;
      }
   }

   public function deletesiswa($id)
   {
      if ($this->model("Siswa_model")->deleteSiswa($id) > 0) {
         Flasher::setFlash("Berhasil", "Siswa berhasil dihapus", "success");
         header("Location:" . BASE_URL . "siswa");
         exit;
      } else {
         Flasher::setFlash("Gagal", "Siswa gagal dihapus", "danger");
         header("Location:" . BASE_URL);
         exit;
      }
   }
}
