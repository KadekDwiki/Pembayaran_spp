<?php

class Pengguna_model
{
   private $db;

   public function __construct()
   {
      $this->db = new Database();
   }
   public function getUserLogin($id)
   {
      $this->db->query("SELECT * FROM pengguna WHERE id=:id");
      $this->db->bind("id", $id);

      return $this->db->resultSingle();
   }

   public function getAllPengguna()
   {
      $this->db->query("SELECT * FROM pengguna");
      return $this->db->resultAll();
   }

   // user login
   public function login($post)
   {
      $this->db->query("SELECT * FROM pengguna WHERE username=:username");
      $this->db->bind("username", $post["username"]);

      $result =  $this->db->resultSingle();

      if ($result['password'] == $post['password']) {
         $_SESSION['login'] = "login";
         $_SESSION['role'] = $result['role'];
         $_SESSION['userId'] = $result['id'];
         return 1;
      }
   }

   // insert pengguna
   public function storePengguna($post)
   {
      $this->db->query("INSERT INTO pengguna (username, password, role) VALUES (:username, :password, :role)");

      $this->db->bind("username", $post['username']);
      $this->db->bind("password", md5($post['password'] . SALT));
      $this->db->bind("role", $post['role']);

      return $this->db->getLastId();
   }

   public function deletePengguna($id)
   {
      $this->db->query("DELETE FROM pengguna WHERE id=:id");

      $this->db->bind("id", $id);

      $this->db->execute();
      return $this->db->rowCount();
   }
}
