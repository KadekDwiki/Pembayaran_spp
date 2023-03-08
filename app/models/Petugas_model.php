<?php
class Petugas_model
{
   private $db;

   public function __construct()
   {
      $this->db = new Database;
   }


   public function getAllPetugas()
   {
      $this->db->query("SELECT * FROM petugas");
      return $this->db->resultAll();
   }

   public function getPetugas($id)
   {
      $this->db->query("SELECT * FROM petugas WHERE id=:id");
      $this->db->bind("id", $id);
      return $this->db->resultSingle();
   }
   public function getPetugasByPenggunaId($id)
   {
      $this->db->query("SELECT * FROM petugas WHERE pengguna_id=:id");
      $this->db->bind("id", $id);
      return $this->db->resultSingle();
   }

   public function storePetugas($post)
   {
      $this->db->query("INSERT INTO petugas (nama, pengguna_id ) VALUES (:nama, :pengguna_id)");

      $this->db->bind("nama", $post["nama"]);
      $this->db->bind("pengguna_id", $post["pengguna_id"]);

      $this->db->execute();
      return $this->db->rowCount();
   }

   public function updatePetugas($post)
   {
      $this->db->query("UPDATE petugas SET  nama=:nama WHERE id=:id");
      $this->db->bind("id", $post["id"]);
      $this->db->bind("nama", $post["nama"]);

      $this->db->execute();
      return $this->db->rowCount();
   }

   public function deletePetugas($id)
   {
      $this->db->query("DELETE FROM petugas WHERE id=:id");
      $this->db->bind("id", $id);

      $this->db->execute();
      return $this->db->rowCount();
   }
}
