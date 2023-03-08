<?php

class Auth extends Controller
{
   public function login()
   {
      $data['title'] = "Halaman Home";

      $this->view("templates/header", $data);
      $this->view("auth/login", $data);
      $this->view("templates/footer", $data);
   }

   public function handleLogin()
   {
      if ($this->model("Pengguna_model")->login($_POST) > 0) {
         location("Dashboard");
      } else {
         location("auth/login");
      }
   }

   public function logout()
   {
      session_destroy();
      location("auth/login");
   }
}
