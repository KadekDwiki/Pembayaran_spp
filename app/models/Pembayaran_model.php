<?php

class Pembayaran_model
{
   private $db;
   public function __construct()
   {
      $this->db = new Database;
   }

   public function getAllPembayaran()
   {
      $this->db->query("SELECT * FROM pembayaran");
      return $this->db->resultAll();
   }

   public function storePembayaran($post)
   {
      $this->db->query("INSERT INTO pembayaran (tahun_ajaran, nominal) VALUES (:tahun_ajaran, :nominal)");
      $this->db->bind("tahun_ajaran", $post["tahun_ajaran"]);
      $this->db->bind("nominal", $post["nominal"]);

      $this->db->execute();
      return $this->db->rowCount();
   }

   public function updatePembayaran($post)
   {
      $this->db->query("UPDATE pembayaran SET tahun_ajaran=:tahun_ajaran, nominal=:nominal WHERE id=:id");
      $this->db->bind("id", $post['id']);
      $this->db->bind("tahun_ajaran", $post['tahun_ajaran']);
      $this->db->bind("nominal", $post['nominal']);

      $this->db->execute();
      return $this->db->rowCount();
   }

   public function deletePembayaran($id)
   {
      $this->db->query("DELETE FROM pembayaran WHERE id=:id");
      $this->db->bind("id", $id);

      $this->db->execute();
      return $this->db->rowCount();
   }
}
