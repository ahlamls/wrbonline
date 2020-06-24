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
     } else if ($kat == 7) {
	$query = $this->db->query("SELECT * FROM `kategori` WHERE `id` <= 7");
}else {
       $query = $this->db->query("SELECT * FROM `kategori` WHERE `id` = $kat");
     }
     foreach ($query->result() as $row)
     {
       $katname = $row->nama;
       $katdesc = $row->deskripsi;
       $katid=$row->id;
       $asede.= "<h3><b>$katname</b></h3>";
       if ($katdesc != "") {
         $asede.= "<p class='text-muted'>$katdesc</p>";
       }
       $asede .="<div class='rownormal row'>";
       $kosongx = TRUE;
        $queryx = $this->db->query("SELECT * FROM `menu` WHERE `kategori_id` = '$katid'");
        foreach ($queryx->result() as $rowx)
        {
          $gambar = $rowx->gambar;
          $name = $rowx->nama;
          $ready = "";
          if ($rowx->ready == 1) {
          $ready = "<span class='badge badge-success'>Ready Stock</span>";
          }
          $price = "Rp " . number_format($rowx->harga);
          $menuid = $rowx->id;
          $asede .= "<div class='col-6 col-md-3 ' style='padding:15px !important'>
            <div class='card'>
              <img src='/data/img/$gambar' class='card-img-top' alt='...'>
          <div class='card-body'>
          <p class='card-title'><b id='peloduk-$menuid'>$name</b></p>
          <p class='card-text'>$price $ready</p>
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
              $minorder = $rowx->minorder;
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
        <input type='number' class='h-margin form-control' onchange='changenum($aidi)' id='quantity-$aidi' name='quantity-$aidi' value='$amount' min='$minorder' max='10000'>
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
      return number_format($total);
   }

   public function submitCart($kue,$info,$nama,$nohp,$alamat,$metode) {
     $total =  str_replace(",","",$this->user_model->totalCart($kue));
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

      return (String) $oid;
   }

   public function getOrderCart($id) {
     $id = $this->db->escape_str($id);
     /**/
     $query = $this->db->query("SELECT * FROM `orders_cart` WHERE `order_id` = '$id'");
     $asede = "";
      foreach ($query->result() as $row)
      {
        $menuname = $row->name;
        $harga = number_format($row->harga);
        $jumlah = $row->jumlah;
        $total = number_format($row->harga * $row->jumlah);
            $asede .="<div class='card'>
              <div class='card-body'>
                <p><b>$menuname</b></p>
                <p class='text-muted'>Rp $harga * $jumlah <span class='badge badge-success'>Rp $total</span></p>

              </div>
            </div>";
      }
      return $asede;
   }

   public function getOrderInfo($id,$type) {
     $query = $this->db->query("SELECT * FROM `orders` WHERE `id` = '$id'");

      $row = $query->row();

      if (isset($row))
      {
            if ($type == 1) {
              return $row->waktu;
            } else if ($type == 2) {
              return $row->nama;
            } else if ($type == 3) {
              return $row->nohp;
            } else if ($type == 4) {
              return $row->alamat;
            } else if ($type == 5) {
              return $row->info;
            } else if ($type == 6) {
              return $row->paid;
            } else if ($type == 7) {
              return $row->totalprice;
            } else if ($type == 8) {
              return $row->method;
            } else if ($type == 9) {
              return $row->kue;
            } else {
              return "Invalid Type";
            }
      } else {
        die("Order Tidak ada");
      }
   }

   public function getKatImgList($kat = 0) {
     if ($kat != 0 AND $kat <= 7) {
	$kat = 7;
	}
	$query = $this->db->query("SELECT * FROM `kategori` WHERE `id` > '6' ORDER BY `urut` ASC ");
     $asede = "";
      foreach ($query->result() as $row)
      {
	$aidi = $row->id;

      $gambar = $row->gambar;
      $nama = $row->nama;
      if ($kat == $aidi) {
        $active = "pesbarimgtextactive";
        $nama = "<b>" . $nama . "</b>";
      	if ($aidi == 7) {
	$nama = "<b>" . "Catering Harian" . "</b>";
	}
	} else {
        $active = "";
	if ($aidi == 7) {
$nama = "Catering Harian";
}
      }

     $asede .= " <div class='col-6 pesbar'>
     <div class='pesbarimg' onclick='pesbarclick($aidi)'>
     <img src='/data/katimg/$gambar' class='pesbarimgx'>
     <div class='pesbarimgtext $active'>
     <h3 class='pesbarimgtextx'>$nama</h3>
     </div>
     </div>
     </div>";
      }

      return $asede;


   }

   public function getTesti(){
     $query = $this->db->query("SELECT * FROM `testimoni` ORDER BY id DESC ");
        $asede = "";
         foreach ($query->result() as $row)
         {
           $nama = $row->nama;
           $waktu = $row->waktu;
           $testi = $row->testi;
           $rating = "";
           for ($x = 0; $x < $row->rating; $x++) {
              $rating .=  "<i class='fas fa-star'></i>";
            }

           $asede .= "  <b>$nama</b><br>
      <p class='text-muted'>$waktu | $rating</p>
      <p>$testi</p>
      <hr>";
         }

         return $asede;

   }
}
