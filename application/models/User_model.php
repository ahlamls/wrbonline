<?php
class User_model extends CI_Model {

 public function __construct()
 {
         $this->load->database();
          // $this->load->library('config_Writer');


   }

   public function listMenu($kat = 0) {
     $asede = "";
     $kosong = TRUE;
     if ($kat == 0) {
       $query = $this->db->query("SELECT * FROM `kategori`");
     } else {
       $query = $this->db->query("SELECT * FROM `kategori` WHERE `id` = $kat");
     }
     foreach ($query->result() as $row)
     {
       $katname = $row->nama;
       $katid=$row->id;
       $asede.= "<h3>$katname</h3>";
       $asede .="<div class='row'>";
       $kosongx = TRUE;
        $queryx = $this->db->query("SELECT * FROM `menu` WHERE `kategori_id` = '$katid'");
        foreach ($queryx->result() as $rowx)
        {
          $gambar = $rowx->gambar;
          $name = $rowx->nama;
          $price = "Rp " . number_format($rowx->harga);
          $menuid = $rowx->id;
          $asede .= "<div class='col-6 col-md-3 ' style='padding:15px !important'>
            <div class='card'>
              <img src='/data/img/$gambar' class='card-img-top' alt='...'>
          <div class='card-body'>
          <p class='card-title'><b id='peloduk-$menuid'>$name</b></p>
          <p class='card-text'>$price</p>
          <button onclick='addCart($menuid)' class='btn btn-sm btn-success w-100'><b>+</b> Tambah</button>
          </div>
            </div>
          </div>";
           $kosongx = FALSE;
        }
        if ($kosongx) {
          $asede .= "<p>Tidak ada menu di kategori ini</p>";
        }

        $asede .="</div>";
       $kosong = FALSE;
     }
     if ($kosong) {
       return "<p>Tidak ada kategori</p>";
     }

     return $asede;

   }

   public function listKat($kat) {
     if ($kat == 0) {
        $asede = "<option selected value='0'>Semua</option>";
     } else {
        $asede = "<option value='0'>Semua</option>";
     }

     $query = $this->db->query("SELECT * FROM `kategori`");

     foreach ($query->result() as $row)
     {
     $katname = $row->nama;
     $katid=$row->id;
     if ($katid == $kat) {
       $asede .="<option selected value='$katid'>$katname</option>";
     } else {
     $asede .="<option value='$katid'>$katname</option>";
    }
    }
    return $asede;
   }

   public function generateRandomString($length = 10) {
       $characters = '0123456789abcdefghijklmnopqrstuvwxyz';
       $charactersLength = strlen($characters);
       $randomString = '';
       for ($i = 0; $i < $length; $i++) {
           $randomString .= $characters[rand(0, $charactersLength - 1)];
       }
       return $randomString;
   }

   public function getCookie() {
     if(!isset($_COOKIE["WRBOnline"])) {
 		  $kue = $this->user_model->setCookie();

 		} else {
 		 $kue = $_COOKIE["WRBOnline"];
 		}
    $sayamaleus = $_SERVER['HTTP_USER_AGENT'];
    $this->db->simple_query("INSERT INTO `cookie` (`cookie`, `ua`, `name`, `nohp`, `alamat`) VALUES ('$kue', '$sayamaleus', '', '', '');");
    return $this->db->escape_str($kue);
   }

   public function setCookie() {
     $asede =  $this->user_model->generateRandomString(69);
     setcookie("WRBOnline", $asede, time() + (86400 * 30 * 30), "/");
     return $asede;
   }

   public function getCart($kue) {
     $query = $this->db->query("SELECT * FROM `user_cart` WHERE `cookie`= '$kue'");
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
                $menuimage = $rowx->gambar;
                $menuname = $rowx->nama;
                $menuprice = number_format($rowx->harga);
                $totalprice = number_format($rowx->harga * $amount);
        }

        $asede .="<div class='col-12' style='padding-bottom:5px;'>
        <div class=' card'>
           <div class='row no-gutters'>
               <div class='col-auto'>
                   <img src='/data/img/$menuimage' class='img-fluid' alt='' height='96' width='96'>
               </div>
               <div class='col'>
                   <div class='card-block px-2'>
                       <p class='card-title' style='margin-bottom: .25rem;'><b id='menuname-$aidi'>$menuname</b></p>
                       <p class='card-text'  style='margin-bottom: .25rem;'>Rp $menuprice <span class='text-muted'>x $amount</span> | <b>Rp $totalprice</b></p>
        <div class='row' style='margin:0!important;'>
        <button class='btn btn-primary h-margin' onclick='dec($aidi)'>-</button>
        <input type='number' class='h-margin form-control' onchange='changenum($aidi)' id='quantity-$aidi' name='quantity-$aidi' value='$amount' min='1' max='10'>
        <button class='btn btn-primary h-margin'  onclick='inc($aidi)'>+</button>
                       <button onclick='hapus($aidi)' class='btn btn-danger h-margin'><b>X</b></button>
                       <div>

                   </div>
               </div>
           </div>
           <!-- <div class='card-footer w-100 text-muted'>
               Footer stating cats are CUTE little animals
           </div> -->
        </div>
        </div>
        </div>
        </div>
        </div>";
        $kosong = FALSE;

      }
      if ($kosong) {
        return "<p>Tidak ada barang di keranjang</p>";
      }
      return $asede;
   }

   public function changeCart($id,$value,$kue) {

     if ( (int)$value == 0 OR (int)$value > 10 ) {
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
     if ($this->db->simple_query("DELETE FROM `user_cart` WHERE `user_cart`.`id` = '$id' AND `cookie` = '$kue'"))
     {
           die("sukses");
     }
     else
     {
          die("gagal");
     }
   }

   public function totalCart($kue) {
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
      die(number_format($total));
   }
}
