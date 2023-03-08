<?php
class Kelas_model
{
   private $db;

   public function __construct()
   {
      $this->db = new Database;
   }

   public function jumlahKelas()
   {
      $this->db->query("SELECT COUNT(id) AS jumlah FROM kelas");
      return $this->db->resultSingle();
   }

   public function getAllKelas()
   {
      $this->db->query("SELECT * FROM kelas");
      return $this->db->resultAll();
   }

   public function getKelas($id)
   {
      $this->db->query("SELECT * FROM kelas WHERE id=:id");
      $this->db->bind("id", $id);
      return $this->db->resultSingle();
   }

   public function storeKelas($post)
   {
      $this->db->query("INSERT INTO kelas (nama, kompetensi_keahlian) VALUES (:nama, :kompetensi_keahlian)");
      $this->db->bind("nama", $post["nama"]);
      $this->db->bind("kompetensi_keahlian", $post["kompetensi_keahlian"]);
      $this->db->execute();
      return $this->db->rowCount();
   }

   public function updateKelas($post)
   {
      $this->db->query("UPDATE kelas SET  nama=:nama, kompetensi_keahlian=:kompetensi_keahlian WHERE id=:id");
      $this->db->bind("id", $post["id"]);
      $this->db->bind("nama", $post["nama"]);
      $this->db->bind("kompetensi_keahlian", $post["kompetensi_keahlian"]);

      $this->db->execute();
      return $this->db->rowCount();
   }

   public function deleteKelas($id)
   {
      $this->db->query("DELETE FROM kelas WHERE id=:id");
      $this->db->bind("id", $id);

      $this->db->execute();
      return $this->db->rowCount();
   }
}
