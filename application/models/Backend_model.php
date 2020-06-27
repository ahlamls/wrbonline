<?php
class Backend_model extends CI_Model {

 public function __construct()
 {
         $this->load->database();
          // $this->load->library('config_Writer');


   }

   public function setorKue($kue,$sayamaleus) {
     $kue =  $this->db->escape_str(base64_encode($kue));
      $sayamaleus =  $this->db->escape_str(base64_encode($sayamaleus));
     if ($this->db->simple_query("INSERT INTO `cookie` (`cookie`, `ua`, `name`, `nohp`, `alamat`) VALUES ('$kue', '$sayamaleus', '', '', '');")) {
       die("sukses");
     }
     die("apa lo liat liat trafik html");
   }

   public function cekApdet($v) {
     $v =  $this->db->escape_str(base64_encode($v));
     $currentAppVersion = 1;
     $downloadLink = "https://online.wrbcatering.id";

     if ($currentAppVersion !== $v) {
        $response = new stdClass();
        $response->success = 1;
        $response->uptodate = 0;
        $response->url = $downloadLink;
        $response->message = "Aplikasi sudah lawas . Silahkan Perbarui Aplikasi dengan versi terbaru untuk menggunakan aplikasi ini";
        die(json_encode($response));
      } else {
        $response->success = 1;
        $response->uptodate = 1;
        $response->url = $downloadLink;
        $response->message = "Terupdate";
        die(json_encode($response));
      }

   }

   public function getKatImgList() {

     $query = $this->db->query("SELECT * FROM `kategori` WHERE `id` > '6' ORDER BY `urut` ASC ");

      if ($query) {
        $response = new stdClass();
       $response->success = 1;
       $arraylist = [];
      foreach ($query->result() as $row)
      {
      $aidi = $row->id;

      $gambar = $row->gambar;
      $nama = $row->nama;

       if ($aidi == 7) {
      $nama = "Catering Harian";
      }
      $myObj= new stdClass();
      $myObj->id = $aidi;
      $myObj->name = $nama;
      $myObj->gambar = $gambar;
      array_push($arraylist,$myObj);

      }
      $response->list = $arraylist;
      $response->message = "sukses";
      die(json_encode($response));

    } else {
      $response->success = 0;
      $response->message = "Terjadi kesalahan saat mendapatkan daftar kategori";
      die(json_encode($response));
    }

  }






   }

   ?>
