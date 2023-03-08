<?php

class Flasher
{
   public static function setFlash($pesan, $aksi, $tipe)
   {
      $_SESSION["flash"] = [
         'pesan' => $pesan,
         'aksi' => $aksi,
         'tipe' => $tipe
      ];
   }

   public static function flash()
   {
      if (isset($_SESSION['flash'])) {
         echo '
         <div class="position-fixed alert alert-' . $_SESSION['flash']['tipe'] . ' alert-dismissible fade show" role="alert" style="bottom:10%;right:20px;z-index:9999;width:300px">
            <strong>' . $_SESSION['flash']['pesan'] . '! </strong><p>' . $_SESSION['flash']['aksi'] . '<p>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
               <span aria-hidden="true">x</span>
            </button>
         </div>
         ';
         unset($_SESSION['flash']);
      }
   }
}
