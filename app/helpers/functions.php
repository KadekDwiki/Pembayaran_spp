<?php
function parseUrl()
{
   if (isset($_GET['url'])) {
      $url = rtrim($_GET['url'], "/");
      $url = filter_var($url, FILTER_SANITIZE_URL);
      $url = explode("/", $url);
      return $url[0];
   } else {
      return "dashboard";
   }
}

function location($path)
{
   header("Location:" . BASE_URL . $path);
   exit;
}

function currentUrl($url)
{
   if ($url == parseUrl()) {
      return true;
   } else {
      return false;
   }
}

function bulan($bulan)
{
   switch ($bulan) {
      case 1:
         echo "Januari";
         break;
      case 2:
         echo "Februari";
         break;
      case 3:
         echo "Maret";
         break;
      case 4:
         echo "April";
         break;
      case 5:
         echo "Mei";
         break;
      case 6:
         echo "Juni";
         break;
      case 7:
         echo "Juli";
         break;
      case 8:
         echo "Agustus";
         break;
      case 9:
         echo "September";
         break;
      case 10:
         echo "Oktober";
         break;
      case 11:
         echo "November";
         break;
      case 12:
         echo "Desember";
         break;

      default:
         echo "not found";
         break;
   }
}
