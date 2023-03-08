<?php

class HistoryTransaksi extends Controller
{
   public function index()
   {
      $data = [
         'title' => "Halaman History Transaksi",
         'role' => $_SESSION['role'],
         'user' => $this->model("Pengguna_model")->getUserLogin($_SESSION['userId']),
         'historytransaksi' => $this->model("Transaksi_model")->getAllTransaksi()
      ];

      $this->view("templates/header", $data);
      $this->view("templates/sidebar", $data);
      $this->view("transaksi/history_transaksi", $data);
      $this->view("templates/footer", $data);
   }

   public function historysiswa()
   {
      $data = [
         'title' => "Halaman History Transaksi",
         'role' => $_SESSION['role'],
         'user' => $this->model("Pengguna_model")->getUserLogin($_SESSION['userId']),
         'historytransaksi' => $this->model("Transaksi_model")->getAllTransaksiByPenggunaId($_SESSION['userId'])
      ];

      $this->view("templates/header", $data);
      $this->view("templates/sidebar", $data);
      $this->view("transaksi/history_transaksi", $data);
      $this->view("templates/footer", $data);
   }

   public function cetakhistory()
   {
      $data = [
         'title' => "Halaman History Transaksi",
         'role' => $_SESSION['role'],
         'user' => $this->model("Pengguna_model")->getUserLogin($_SESSION['userId']),
         'historytransaksi' => $this->model("Transaksi_model")->getAllTransaksi()
      ];

      $this->view("templates/header", $data);
      $this->view("transaksi/cetak_history", $data);
   }
}
