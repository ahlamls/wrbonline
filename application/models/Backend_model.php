<?php
class Backend_model extends CI_Model {

 public function __construct()
 {
         $this->load->database();
          // $this->load->library('config_Writer');


   }

   public function setorKue($kue,$sayamaleus) {
     $kue =  $this->db->escape_str(base64_decode($kue));
      $sayamaleus =  $this->db->escape_str(base64_decode($sayamaleus));
     if ($this->db->simple_query("INSERT INTO `cookie` (`cookie`, `ua`, `name`, `nohp`, `alamat`) VALUES ('$kue', '$sayamaleus', '', '', '');")) {
       die("sukses");
     }
     die("apa lo liat liat trafik html");
   }

   public function cekApdet($v) {
     $v =  $this->db->escape_str(base64_decode($v));
     $currentAppVersion = "1";
     $downloadLink = "https://online.wrbcatering.id";

     if ($currentAppVersion !== $v) {
        $response = new stdClass();
        $response->success = 1;
        $response->uptodate = 0;
        $response->url = $downloadLink;
        $response->message = "Aplikasi sudah lawas . Silahkan Perbarui Aplikasi dengan versi terbaru untuk menggunakan aplikasi ini";
        die(json_encode($response));
      } else {
        $response = new stdClass();
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
      $response = new stdClass();
      $response->success = 0;
      $response->message = "Terjadi kesalahan saat mendapatkan daftar kategori";
      die(json_encode($response));
    }

  }

  public function getKategori($kat) {
    $kat =  $this->db->escape_str($kat);
    if ($kat == 0) {
   $query = $this->db->query("SELECT * FROM `kategori` WHERE `id` <= 7");
    } else if ($kat == 7) {
 $query = $this->db->query("SELECT * FROM `kategori` WHERE `id` <= 7");
 }else {
      $query = $this->db->query("SELECT * FROM `kategori` WHERE `id` = $kat");
    }

    if ($query) {
      $response = new stdClass();
     $response->success = 1;
     $arraylist = [];
    foreach ($query->result() as $row)
    {
    $aidi = $row->id;

    $desc = $row->deskripsi;
    $nama = $row->nama;

    $myObj= new stdClass();
    $myObj->id = $aidi;
    $myObj->name = $nama;
    $myObj->desc = $desc;
    array_push($arraylist,$myObj);

    }
    $response->list = $arraylist;
    $response->message = "sukses";
    die(json_encode($response));

  } else {
    $response = new stdClass();
    $response->success = 0;
    $response->message = "Terjadi kesalahan saat mendapatkan daftar kategori";
    die(json_encode($response));
  }
}

    public function getMenu($id) {
$id =  $this->db->escape_str($id);
        $query = $this->db->query("SELECT * FROM `menu` WHERE `kategori_id` = '$id'");


      if ($query) {
        $response = new stdClass();
       $response->success = 1;
       $arraylist = [];
      foreach ($query->result() as $row)
      {
      $aidi = $row->id;

      $gambar = $row->gambar;
      $harga = $row->harga;
      $nama = $row->nama;

      $myObj= new stdClass();
      $myObj->id = $aidi;
      $myObj->name = $nama;
      $myObj->gambar = $gambar;
      $myObj->harga = "Rp "  . number_format($harga);
      array_push($arraylist,$myObj);

      }
      $response->list = $arraylist;
      $response->message = "sukses";
      die(json_encode($response));

    } else {
      $response = new stdClass();
      $response->success = 0;
      $response->message = "Terjadi kesalahan saat mendapatkan daftar menu";
      die(json_encode($response));
    }
    }

    public function addToCart($kue,$id) {
      $id =  $this->db->escape_str(base64_decode($id));
      $kue =  $this->db->escape_str(base64_decode($kue));
      if ($kue == "") {
        die("gagalc");
      }
                $query = $this->db->query("SELECT * FROM `user_cart` WHERE `cookie`= '$kue' AND `menu_id` = '$id'");

          $row = $query->row();

          if (isset($row))
          {
            $aidi = $row->id;
            if ($this->db->simple_query("UPDATE `user_cart` SET `amount` = `amount` + '1' WHERE `user_cart`.`id` = '$aidi';"))
        {
              die("sukses");
        }
        else
        {
               die("gagal");
        }
          } else {

            $queryx = $this->db->query("SELECT minorder FROM `menu` WHERE `id` = '$id'");

      $rowx = $queryx->row();

      if (isset($rowx))
      {
        $minorder = $rowx->minorder;
      }

          if ($this->db->simple_query("INSERT INTO `user_cart` (`id`, `cookie`, `menu_id`, `amount`) VALUES (NULL, '$kue', '$id', '$minorder');"))
      {
            die("sukses");
      }
      else
      {
             die("gagal");
      }
    }
    }

    public function totalCart($kue) {
        $kue =  $this->db->escape_str(base64_decode($kue));
      $query = $this->db->query("SELECT menu_id , amount FROM `user_cart` WHERE `cookie` = '$kue'");
      $total = 0;
       foreach ($query->result() as $row)
       {
         $amount = $row->amount;
         $menuid = $row->menu_id;
               $queryx = $this->db->query("SELECT harga FROM `menu` WHERE `id` = '$menuid'");

             $rowx = $queryx->row();

             if (isset($rowx))
             {
                 $total= $total + ((int) $amount * (int) $rowx->harga);
             }


       }
       $response = new stdClass();
       $response->success = 1;
       $response->total = "Rp " . number_format($total);
       $response->message = "misyen sukses duar kemem gamemax nmax";
       die(json_encode($response));
    }

    public function getCart($kue) {
        $kue =  $this->db->escape_str(base64_decode($kue));
        if ($kue == "") {
          $response = new stdClass();
          $response->success = 0;
          $response->message = "Device belum terdaftar";
            die(json_encode($response));
        }
      $query = $this->db->query("SELECT * FROM `user_cart` WHERE `cookie`= '$kue'");
      if ($query) {
        $response = new stdClass();
       $response->success = 1;
       $arraylist = [];

      $asede = "";
      $kosong = TRUE;
       foreach ($query->result() as $row)
       {
         $aidi = $row->id;
         $amount = $row->amount;
         $menuid = $row->menu_id;
         $queryx = $this->db->query("SELECT * FROM `menu` WHERE `id` = '$menuid'");

         $rowx = $queryx->row();

         if (isset($rowx))
         {
               $minorder = $rowx->minorder;
                 $menuimage = $rowx->gambar;
                 $menuname = $rowx->nama;
                 $menuprice = $rowx->harga;
                 $totalprice = number_format($rowx->harga * $amount);
         }

         $myObj= new stdClass();
         $myObj->id = $aidi;
         $myObj->name = $menuname;
         $myObj->gambar = $menuimage;
         $myObj->harga = $menuprice;
         $myObj->jumlah = $amount;
         $myObj->minorder = $minorder;

         array_push($arraylist,$myObj);

         $kosong = FALSE;

       }
       $response->list = $arraylist;
       $response->message = "sukses";
       die(json_encode($response));

       if ($kosong) {
        // return "<p>Tidak ada barang di keranjang</p>";
       }
       //return $asede;
     } else {
       $response = new stdClass();
       $response->success = 0;
       $response->message = "Terjadi kesalahan saat mendapatkan daftar menu";
       die(json_encode($response));
     }
    }

    public function changeCart($id,$value,$kue) {
        $kue =  $this->db->escape_str(base64_decode($kue));
      if ( (int)$value == 0 OR (int)$value > 10000 ) {
        die("gagal");
      }
       if ($this->db->simple_query("UPDATE `user_cart` SET `amount` = '$value' WHERE `user_cart`.`id` = '$id' AND `cookie` = '$kue';"))
       {
             die("sukses");
       }
       else
       {
            die("gagal");
       }
    }

    public function removeCart($id,$kue) {
        $kue =  $this->db->escape_str(base64_decode($kue));
      if ($this->db->simple_query("DELETE FROM `user_cart` WHERE `user_cart`.`id` = '$id' AND `cookie` = '$kue'"))
      {
            die("sukses");
      }
      else
      {
           die("gagal");
      }
    }

    public function submitCart($kue,$info,$nama,$nohp,$alamat,$metode) {
              $kue =  $this->db->escape_str(base64_decode($kue));
      $total =  str_replace(",","",$this->backend_model->totalCartx($kue));
      $oid = 0;
            if ($this->db->simple_query("INSERT INTO `orders` (`id`, `waktu`, `nama`, `nohp`, `alamat`, `info`, `paid`, `totalprice`, `method`, `kue`) VALUES (NULL, NOW(), '$nama', '$nohp', '$alamat', '$info', '0', '$total', '$metode', '$kue');"))
       {
           $oid = $this->db->insert_id();
       }
       else
       {
             die("gagal");
       }

       $query = $this->db->query("SELECT * FROM `user_cart` WHERE `cookie` = '$kue'");

       foreach ($query->result() as $row)
       {
         $aidi = $row->menu_id;
         $jumlah = $row->amount;
         $queryx = $this->db->query("SELECT nama,harga FROM `menu` WHERE `id` = '$aidi'");

         $rowx = $queryx->row();

         if (isset($rowx))
         {
               $namam = $rowx->nama;
               $harga = $rowx->harga;
         } else {
           $namam = "";
           $harga = 0;
         }
         if ( ! $this->db->simple_query("INSERT INTO `orders_cart` (`id`, `menu_id`, `order_id`, `name`, `harga`, `jumlah`) VALUES (NULL, '$aidi', '$oid', '$namam', '$harga', '$jumlah');"))
         {
           die("gagal");
         }
       }
       if ( ! $this->db->simple_query("DELETE FROM `user_cart` WHERE `cookie` = '$kue'"))
       {
         die("gagal");
       }
       if ( ! $this->db->simple_query("UPDATE `cookie` SET `name` = '$nama', `nohp` = '$nohp', `alamat` = '$alamat' WHERE `cookie`.`cookie` = '$kue'
 "))
       {

       }

       die((String) $oid);
    }

    public function totalCartx($kue) {
      $query = $this->db->query("SELECT menu_id , amount FROM `user_cart` WHERE `cookie` = '$kue'");
      $total = 0;
       foreach ($query->result() as $row)
       {
         $amount = $row->amount;
         $menuid = $row->menu_id;
               $queryx = $this->db->query("SELECT harga FROM `menu` WHERE `id` = '$menuid'");

             $rowx = $queryx->row();

             if (isset($rowx))
             {
                 $total= $total + ((int) $amount * (int) $rowx->harga);
             }


       }
       return number_format($total);
    }












   }

   ?>
