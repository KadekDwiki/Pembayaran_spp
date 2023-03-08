<?php
class Petugas extends Controller
{
   public function index()
   {
      $data = [
         'title' => "Halaman Manajemen Siswa",
         'role' => $_SESSION['role'],
         'user' => $this->model("Pengguna_model")->getUserLogin($_SESSION['userId']),
         'datapetugas' => $this->model("Petugas_model")->getAllPetugas()
      ];

      $this->view("templates/header", $data);
      $this->view("templates/sidebar", $data);
      $this->view("petugas/index", $data);
      $this->view("templates/footer", $data);
   }

   // menampilkan halaman tambah data
   public function tambahpetugas()
   {
      $data = [
         'title' => "Halaman tambah data petugas",
         'role' => $_SESSION['role'],
         'user' => $this->model("Pengguna_model")->getUserLogin($_SESSION['userId'])
      ];

      $this->view("templates/header", $data);
      $this->view("templates/sidebar", $data);
      $this->view("petugas/tambahpetugas", $data);
      $this->view("templates/footer", $data);
   }

   // menyimpan data user baru
   public function simpanpetugas()
   {
      $_POST["username"] = $_POST["username"];
      $_POST["password"] = "password";
      $_POST["role"] = "petugas";

      $pengguna = $this->model("Pengguna_model")->storePengguna($_POST);

      $_POST["pengguna_id"] = $pengguna;

      if ($pengguna) {
         if ($this->model("Petugas_model")->storePetugas($_POST)) {
            Flasher::setFlash("Berhasil", "Data Petugas berhasil ditambahkan", "success");
            location("petugas");
         }
      } else {
         Flasher::setFlash("Gagal", "Data petugas gagal ditambahkan", "danger");
         location("petugas/error");
      }
   }

   public function editpetugas($id)
   {
      $data = [
         'title' => "Halaman edit data petugas",
         'role' => $_SESSION['role'],
         'user' => $this->model("Pengguna_model")->getUserLogin($_SESSION['userId']),
         'petugas' => $this->model("Petugas_model")->getpetugas($id)
      ];

      $this->view("templates/header", $data);
      $this->view("templates/sidebar", $data);
      $this->view("petugas/editpetugas", $data);
      $this->view("templates/footer", $data);
   }

   public function updatepetugas()
   {
      if ($this->model("Petugas_model")->updatePetugas($_POST) > 0) {
         Flasher::setFlash("Berhasil", "Data petugas berhasil diupdate", "success");
         header("Location:" . BASE_URL . "petugas");
         exit;
      } else {
         Flasher::setFlash("Gagal", "Data petugas gagal diupdate", "danger");
         header("Location:" . BASE_URL);
         exit;
      }
   }

   public function deletepetugas($id)
   {
      if ($this->model("Petugas_model")->deletePetugas($id) > 0) {
         Flasher::setFlash("Berhasil", "Data petugas berhasil dihapus", "success");
         header("Location:" . BASE_URL . "petugas");
         exit;
      } else {
         Flasher::setFlash("Gagal", "Data petugas gagal dihapus", "danger");
         header("Location:" . BASE_URL);
         exit;
      }
   }
}
