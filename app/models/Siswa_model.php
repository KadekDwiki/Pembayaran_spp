<?php
class Siswa_model
{
   private $db;

   public function __construct()
   {
      $this->db = new Database;
   }

   public function jumlahSiswa()
   {
      $this->db->query("SELECT COUNT(id) AS jumlah FROM siswa");
      return $this->db->resultSingle();
   }

   public function getAllSiswa()
   {
      $this->db->query("SELECT * FROM siswa");
      return $this->db->resultAll();
   }

   public function getSiswa($id)
   {
      $this->db->query("SELECT * FROM siswa WHERE id=:id");
      $this->db->bind("id", $id);

      return $this->db->resultSingle();
   }

   public function getSiswaByNis($nis)
   {
      $this->db->query("SELECT * FROM siswa WHERE nis=:nis");
      $this->db->bind("nis", $nis);

      return $this->db->resultSingle();
   }

   public function storeSiswa($post)
   {
      $this->db->query("INSERT INTO siswa (nisn, nis, nama, alamat, telepon, kelas_id, pengguna_id, pembayaran_id) VALUES (:nisn, :nis, :nama, :alamat, :telepon, :kelas, :pengguna_id, :pembayaran_id)");
      $this->db->bind("nisn", $post["nisn"]);
      $this->db->bind("nis", $post["nis"]);
      $this->db->bind("nama", $post["nama"]);
      $this->db->bind("alamat", $post["alamat"]);
      $this->db->bind("telepon", $post["telepon"]);
      $this->db->bind("kelas", $post["kelas"]);
      $this->db->bind("pengguna_id", $post["pengguna_id"]);
      $this->db->bind("pembayaran_id", $post["pembayaran_id"]);

      $this->db->execute();
      return $this->db->rowCount();
   }

   public function updateSiswa($post)
   {
      $this->db->query("UPDATE siswa SET nisn=:nisn, nis=:nis, nama=:nama, alamat=:alamat, telepon=:telepon, kelas_id=:kelas WHERE id=:id");
      $this->db->bind("id", $post["id"]);
      $this->db->bind("nisn", $post["nisn"]);
      $this->db->bind("nis", $post["nis"]);
      $this->db->bind("nama", $post["nama"]);
      $this->db->bind("alamat", $post["alamat"]);
      $this->db->bind("telepon", $post["telepon"]);
      $this->db->bind("kelas", $post["kelas"]);

      $this->db->execute();
      return $this->db->rowCount();
   }

   public function deleteSiswa($id)
   {
      $this->db->query("DELETE FROM siswa WHERE id=:id");
      $this->db->bind("id", $id);

      $this->db->execute();
      return $this->db->rowCount();
   }
}
