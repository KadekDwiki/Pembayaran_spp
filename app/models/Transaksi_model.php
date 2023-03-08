<?php
class Transaksi_model
{

   private $db;

   public function __construct()
   {
      $this->db = new Database;
   }

   public function jumlahTransaksi()
   {
      $this->db->query("SELECT COUNT(id) AS jumlah FROM transaksi");
      return $this->db->resultSingle();
   }

   public function jumlahSaldo()
   {
      $this->db->query("SELECT SUM(pembayaran.nominal) AS jumlah FROM transaksi INNER JOIN pembayaran ON transaksi.pembayaran_id = pembayaran.id");

      return $this->db->resultSingle();
   }

   public function getAllTransaksi()
   {
      $query = "SELECT transaksi.id, transaksi.siswa_id, transaksi.petugas_id, transaksi.pembayaran_id, transaksi.tanggal_bayar, transaksi.bulan_dibayar, transaksi.tahun_dibayar,siswa.id AS siswaId, siswa.nama AS nama_siswa, siswa.nis AS siswaNis, petugas.id AS petugasId, petugas.nama AS nama_petugas, pembayaran.id AS pembayaranId, pembayaran.nominal FROM transaksi INNER JOIN siswa ON transaksi.siswa_id = siswa.id INNER JOIN petugas ON transaksi.petugas_id = petugas.id INNER JOIN pembayaran ON transaksi.pembayaran_id = pembayaran.id";

      $this->db->query($query);
      return $this->db->resultAll();
   }

   public function getAllTransaksiByPenggunaId($id)
   {
      $query = "SELECT transaksi.id, transaksi.siswa_id, transaksi.petugas_id, transaksi.pembayaran_id, transaksi.tanggal_bayar, transaksi.bulan_dibayar, transaksi.tahun_dibayar,siswa.id AS siswaId, siswa.nama AS nama_siswa, siswa.nis AS siswaNis, siswa.pengguna_id, petugas.id AS petugasId, petugas.nama AS nama_petugas, pembayaran.id AS pembayaranId, pembayaran.nominal FROM transaksi INNER JOIN siswa ON transaksi.siswa_id = siswa.id INNER JOIN petugas ON transaksi.petugas_id = petugas.id INNER JOIN pembayaran ON transaksi.pembayaran_id = pembayaran.id WHERE siswa.pengguna_id = :pengguna_id";

      $this->db->query($query);
      $this->db->bind("pengguna_id", $id);

      return $this->db->resultAll();
   }

   public function checkTransaksi($post)
   {
      $this->db->query("SELECT * FROM transaksi WHERE bulan_dibayar=:bulan_dibayar AND tahun_dibayar=:tahun_dibayar AND siswa_id=:siswa_id");

      $this->db->bind("bulan_dibayar", $post['bulan_dibayar']);
      $this->db->bind("tahun_dibayar", $post['tahun_dibayar']);
      $this->db->bind("siswa_id", $post['siswa_id']);

      $this->db->execute();
      return $this->db->rowCount();
   }

   public function storeTransaksi($post)
   {
      if ($this->checkTransaksi($post) > 0) {
         return 0;
      } else {
         $this->db->query("INSERT INTO transaksi (tanggal_bayar, bulan_dibayar, tahun_dibayar, siswa_id, petugas_id, pembayaran_id) VALUES (:tanggal_bayar, :bulan_dibayar, :tahun_dibayar, :siswa_id, :petugas_id, :pembayaran_id)");

         $this->db->bind("tanggal_bayar", $post['tanggal_bayar']);
         $this->db->bind("bulan_dibayar", $post['bulan_dibayar']);
         $this->db->bind("tahun_dibayar", $post['tahun_dibayar']);
         $this->db->bind("siswa_id", $post['siswa_id']);
         $this->db->bind("petugas_id", $post['petugas_id']);
         $this->db->bind("pembayaran_id", $post['pembayaran_id']);

         $this->db->execute();

         return $this->db->rowCount();
      }
   }
}
