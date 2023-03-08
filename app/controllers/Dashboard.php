<?php

class Dashboard extends Controller
{
   public function __construct()
   {
      if (!isset($_SESSION['login'])) {
         location("auth/login");
      }
   }

   // menampilkan halaman dashboard
   public function index()
   {
      $data = [
         'title' => "Halaman Home",
         'role' => $_SESSION['role'],
         'user' => $this->model("Pengguna_model")->getUserLogin($_SESSION['userId']),
         'jumlahsiswa' => $this->model("Siswa_model")->jumlahSiswa(),
         'jumlahkelas' => $this->model("Kelas_model")->jumlahKelas(),
         'jumlahtransaksi' => $this->model("Transaksi_model")->jumlahTransaksi(),
         'jumlahsaldo' => $this->model("Transaksi_model")->jumlahSaldo()
      ];

      $this->view("templates/header", $data);
      $this->view("templates/sidebar", $data);
      $this->view("home", $data);
      $this->view("templates/footer", $data);
   }
}
