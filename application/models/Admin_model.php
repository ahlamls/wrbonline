<?php
class Admin_model extends CI_Model {

 public function __construct()
 {
         $this->load->database();
          // $this->load->library('config_Writer');

   }

   public function handlelogin() {
        $user = $this->db->escape_str($_POST['email']);
        $pass = hash('sha512', $this->db->escape_str($_POST['password']));

        $query = $this->db->query("SELECT * FROM `admin` WHERE email = '$user' AND password = '$pass' ");
        if ($query->num_rows() == 1) {
          $row = $query->row();

          if (isset($row))
          {
            $aidi = $row->id;
            return $aidi;
          }




        } else {
          return "";
        }
      }

      public function orderList() {
        /*

        */
        $asede = "";
        $query = $this->db->query("SELECT * FROM `orders` ORDER BY `id` DESC");

        foreach ($query->result() as $row)
        {
          $aidi = $row->id;
          $waktu = $row->waktu;
          $nama = $row->nama;
          $paid = $row->paid;
          if ($paid == 0) {
            $status = "<td><span class='badge badge-danger'>Belum Dibayar</span><br><a href='/AdminWRBOnline/bayar/$aidi'>Sudah Bayar</a></td>
            ";
          } else {
            $status = "<td><span class='badge badge-success'>Sudah Dibayar</span></td>
            ";
          }
          $totalprice = number_format($row->totalprice);
          $method = $row->method;
          if ($method == 0 ) {
            $metode = "Transfer";
          } else {
            $metode = "COD";
          }


              $asede .= "<tr>
                <th scope='row'>$aidi</th>
                <td>$waktu</td>
                <td>$nama</td>
                $status
                <td>Rp $totalprice</td>
                <td>$metode</td>
                <td><a href='/AdminWRBOnline/print/$aidi' target='_blank' >Print</a> | <a href='/AdminWRBOnline/delete/$aidi' target='_blank' >Hapus</a></td>
              </tr>";
        }

        return $asede;
      }

      public function orderCartList($id) {
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
               $asede .="    <tr>
                     <td>$menuname</td>
                     <td>Rp $harga</td>
                     <td>$jumlah</td>
                     <td>Rp $total</td>
                   </tr>";
         }
         return $asede;
      }
      public function setBayar($id) {
        $id = $this->db->escape_str($id);

        //
        if ( ! $this->db->simple_query("UPDATE `orders` SET `paid` = '1' WHERE `orders`.`id` = '$id';"))
          {
        die("Terjadi kesalahan " .  $this->db->error()); // Has keys 'code' and 'message'
        } else {
        header("Location: /AdminWRBOnline/order/");
        die("sukses");
        }
      }

      public function deleteOrder($id) {
        $id = $this->db->escape_str($id);

        //
        if ( ! $this->db->simple_query("DELETE FROM `orders` WHERE `orders`.`id` = '$id'"))
          {
        die("Terjadi kesalahan " .  $this->db->error()); // Has keys 'code' and 'message'
        } else {
        header("Location: /AdminWRBOnline/order/");
        die("sukses");
        }
      }

      public function deleteMenu($id) {
        $id = $this->db->escape_str($id);

        //
        if ( ! $this->db->simple_query("DELETE FROM `menu` WHERE `id` = '$id'"))
          {
        die("Terjadi kesalahan " .  $this->db->error()); // Has keys 'code' and 'message'
        } else {
        header("Location: /AdminWRBOnline/menu/");
        die("sukses");
        }
      }

      public function menuList() {
        /*

        */
        $asede = "";
        $query = $this->db->query("SELECT * FROM `menu`");

        foreach ($query->result() as $row)
        {
          $aidi = $row->id;
          $nama = $row->nama;
          $gambar = $row->gambar;
          $price = number_format($row->harga);



              $asede .= "    <tr>
                    <th scope='row'>$aidi</th>
                    <td><img src='/data/img/$gambar' height='64px'></td>
                    <td>$nama</td>
                    <td>Rp $price</td>

                    <td><a href='/AdminWRBOnline/edit/$aidi'  >Edit</a> | <a href='/AdminWRBOnline/deletemenu/$aidi'>Hapus</a></td>
                  </tr>";
        }

        return $asede;
      }

      public function handleAddMenu() {
        $kategori = $this->db->escape_str($_POST['kategori']);
        $nama = $this->db->escape_str($_POST['nama']);
        $harga = $this->db->escape_str($_POST['harga']);
        $minorder = $this->db->escape_str($_POST['minorder']);
        $ready = $this->db->escape_str($_POST['ready']);

        $gambar = $this->_uploadImage();
        if ( ! $this->db->simple_query("INSERT INTO `menu` (`id`, `kategori_id`, `waktu`, `nama`, `gambar`, `harga`, `open`,`minorder`,`ready`) VALUES (NULL, '$kategori', NOW(), '$nama', '$gambar', '$harga', '1','$minorder','$ready')"))
          {
        die("Terjadi kesalahan " .  $this->db->error()); // Has keys 'code' and 'message'
        } else {
        header("Location: /AdminWRBOnline/menu/");
        die("sukses");
        }


      }

      private function _uploadImage()
      {
    $config['upload_path']          = './data/img/';
    $config['allowed_types']        = 'gif|jpg|jpeg|png';
    $config['file_name']            = $this->admin_model->generateRandomString(128);
    $config['overwrite']			= true;
    $config['max_size']             = 3072; // 1MB
    // $config['max_width']            = 1024;
    // $config['max_height']           = 768;

    $this->load->library('upload', $config);

    if ($this->upload->do_upload('gambar')) {
        return $this->upload->data("file_name");
    } else {
      die("Gambar Tidak Valid / Gagal Upload Gambar");
    }

    return "default.jpg";
    }

    public function listKat($kat = 1) {
$asede = "";
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

    public function getMenuInfo($id,$type) {
      $id = $this->db->escape_str($id);
      $query = $this->db->query("SELECT * FROM `menu` WHERE `id` = '$id'");

       $row = $query->row();

       if (isset($row))
       {
             if ($type == 1) {
               return $row->kategori_id;
             } else if ($type == 2) {
               return $row->waktu;
             } else if ($type == 3) {
               return $row->nama;
             } else if ($type == 4) {
               return $row->gambar;
             } else if ($type == 5) {
               return $row->harga;
             } else if ($type == 6) {
               return $row->open;
             }  else if ($type == 7) {
               return $row->ready;
             }   else if ($type == 8) {
               return $row->minorder;
             } else {
               return "Invalid Type";
             }
       } else {
         die("Order Tidak ada");
       }
    }

    public function handleEditMenu($id) {
      $id = $this->db->escape_str($id);
      $kategori = $this->db->escape_str($_POST['kategori']);
      $nama = $this->db->escape_str($_POST['nama']);
      $harga = $this->db->escape_str($_POST['harga']);
      $open = $this->db->escape_str($_POST['open']);
      $minorder = $this->db->escape_str($_POST['minorder']);
      $ready = $this->db->escape_str($_POST['ready']);
      if ( ! $this->db->simple_query("UPDATE `menu` SET `kategori_id` = '$kategori', `nama` = '$nama', `harga` = '$harga', `open` = '$open' , `minorder` = '$minorder' , `ready` = '$ready' WHERE `menu`.`id` = '$id'"))
        {
      die("Terjadi kesalahan " .  $this->db->error()); // Has keys 'code' and 'message'
      } else {
      header("Location: /AdminWRBOnline/menu/");
      die("sukses");
      }
    }

      public function analisaMenu($type = 1) {
        $asede = "";
        if ($type == 1) {
        $sql = "SELECT `orders_cart`.`menu_id`, SUM(jumlah) AS totalSold FROM `orders` LEFT JOIN `orders_cart` ON `orders_cart`.`order_id` = `orders`.`id` WHERE `paid` = 1 GROUP BY `menu_id` ORDER BY `totalSold` DESC";

      } else if ($type == 2) {
        $date= date("Y-m-d");
        $sql = "SELECT `orders_cart`.`menu_id` , `orders`.`waktu`, SUM(jumlah) AS totalSold
FROM `orders`
    LEFT JOIN `orders_cart` ON `orders_cart`.`order_id` = `orders`.`id`
    WHERE `paid` = 1 AND `waktu` LIKE '$date%'
    GROUP BY `menu_id` ORDER BY `totalSold` DESC";
  } else if ($type == 3) {
        $date= date("Y-m-d");
        $sql = "SELECT `orders_cart`.`menu_id` , `orders`.`waktu`, SUM(jumlah) AS totalSold
FROM `orders`
    LEFT JOIN `orders_cart` ON `orders_cart`.`order_id` = `orders`.`id`
    WHERE `paid` = 1 AND `waktu` BETWEEN CURDATE() - INTERVAL 7 DAY AND NOW()
    GROUP BY `menu_id` ORDER BY `totalSold` DESC";
  } else if ($type == 4) {
        $date= date("Y-m-d");
        $sql = "SELECT `orders_cart`.`menu_id` , `orders`.`waktu`, SUM(jumlah) AS totalSold
FROM `orders`
    LEFT JOIN `orders_cart` ON `orders_cart`.`order_id` = `orders`.`id`
    WHERE `paid` = 1 AND `waktu` BETWEEN CURDATE() - INTERVAL 30 DAY AND NOW()
    GROUP BY `menu_id` ORDER BY `totalSold` DESC";
      }


        $query = $this->db->query($sql);

      foreach ($query->result() as $row)
      {
              $nama = $this->admin_model->getMenuInfo($row->menu_id,3);
              $totalsold = $row->totalSold;
              $asede .= "  <tr>
      <td>$nama</td>
      <td>$totalsold</td>
    </tr>";
      }
      return $asede;
      }

      public function excel($y=0,$m=0,$d=0,$type = 1) {
        $m = (int) $this->db->escape_str($m);
        $y = (int) $this->db->escape_str($y);
        $d = (int) $this->db->escape_str($d);
        $yx = (String)$y;
        $mx = (String)$m;
        if ($m < 10) {
          $mx = "0" . (String) $mx;
        } else {
          $mx = (String) $mx;
        }
        $dx = (String)$d;
        if ($d < 10) {
          $dx = "0" . (String) $dx;
        } else {
          $dx = (String) $dx;
        }

        if ($y == 0 OR $m == 0 OR $d == 0) {
          $curdate = date("Y-m-d");
        } else {
          $curdate = $y . "-" . $mx . "-" . $dx;
        }

        $asede = "";

        if ($type == 2) {
          $sql = "SELECT * FROM `orders` WHERE `paid` = '1'  AND `waktu` LIKE '$curdate%'";
        } else {
          $sql = "SELECT * FROM `orders` WHERE `paid` = '1' ";

        }
        $query = $this->db->query($sql);

        foreach ($query->result() as $row)
        {
          $aidi = $row->id;
          $waktu = $row->waktu;
          $nama = $row->nama;
          $alamat = $row->alamat;
          $info = $row->info;
          $total = number_format($row->totalprice);
          if ($row->method == 0) {
            $metode = "Transfer";
          } else {
            $metode = "COD";
          }
          $menu = "";
              $queryx = $this->db->query("SELECT * FROM `orders_cart` WHERE `order_id` = '$aidi'");

              foreach ($queryx->result() as $rowx)
              {
                $menu .= $rowx->name . "(Rp " . number_format($rowx->harga) . "x" . $rowx->jumlah . "),";
              }

            $asede .="
              <tr>
                <td><b>$aidi</b></td>
                <td>$waktu</td>
                <td>$nama</td>
                <td>$alamat</td>
                  <td>$info</td>
                  <td>$total</td>
                  <td>$metode</td>
                  <td>$menu</td>
              </tr>";
        }
        return $asede;


      }

      public function analisaOmset($type) {
        if ($type == 1) {
          $sql = "SELECT totalprice FROM `orders` WHERE `paid` = 1
  ";
        } else if ($type == 2) {
            $sql = "SELECT totalprice FROM `orders` WHERE `paid` = 1 AND `waktu` BETWEEN CURDATE() - INTERVAL 30 DAY AND NOW()

    ";
        } else if ($type == 3) {
            $sql = "SELECT totalprice FROM `orders` WHERE `paid` = 1 AND `waktu` BETWEEN CURDATE() - INTERVAL 7 DAY AND NOW()


          ";
        } else if ($type == 4) {
            $sql = "SELECT totalprice FROM `orders` WHERE `paid` = 1 AND `waktu` BETWEEN CURDATE() - INTERVAL 1 DAY AND NOW()
          ";
          }

          $asede = 0;

          $query = $this->db->query($sql);

          foreach ($query->result() as $row)
          {
                $asede = $asede + (int) $row->totalprice;
          }
          return number_format($asede);
      }

      public function getPengeluaran($m,$y) {
        $asede = "";
        $m = (int) $this->db->escape_str($m);
        $y = (int) $this->db->escape_str($y);
        if (($y % 4) == 0) {
          $kabisat = true;
        } else {
          $kabisat = false;
        }
        if ($m == 1 OR $m == 3 OR $m == 5 OR $m == 7 OR $m == 8 OR $m == 10 OR $m == 12) {
          $dtotal = 31;
        } else if ($m == 2) {
          if ($kabisat) {
            $dtotal = 29;
          } else {
            $dtotal = 28;
          }
        } else {
          $dtotal = 30;
        }
        $tpenghasilan = 0;
        $tpengeluaran = 0;
        $tprofit = 0;

        for ($x = 1; $x <= $dtotal; $x++) {

          $yx = (String)$y;
          $mx = (String)$m;
          if ($m < 10) {
            $mx = "0" . (String) $mx;
          } else {
            $mx = (String) $mx;
          }
          $dx = (String)$x;
          if ($x < 10) {
            $dx = "0" . (String) $dx;
          } else {
            $dx = (String) $dx;
          }
          $date = $yx . "-" . $mx . "-" . $dx;


          $pengeluaran = 0;

          $penghasilan = 0;
          $keterangan = "";
          $aidi = 0;

          $query = $this->db->query("SELECT totalprice FROM `orders` WHERE `waktu` LIKE '$yx-$mx-$dx%' AND `paid` = '1'");

          foreach ($query->result() as $row)
          {
                  $penghasilan = $penghasilan + $row->totalprice;
          }

          $query = $this->db->query("SELECT * FROM `pengeluaran` WHERE `waktu` = '$yx-$mx-$dx' LIMIT 0,1");

          foreach ($query->result() as $row)
          {
                  $pengeluaran = $row->nominal;
                  $keterangan = $row->keterangan;
                  $aidi = $row->id;
          }


          $profit = $penghasilan - $pengeluaran ;

                              if ($profit > 0) {
                                $opit = "opit";
                              } else {
                                $opit = "opitnt";


                              }

          $tpenghasilan = $tpenghasilan + $penghasilan;
          $tpengeluaran = $tpengeluaran + $pengeluaran;
          $tprofit = $tprofit + $profit;
          if ($tprofit > 0) {
            $topit = "opit";
          } else {
            $topit = "opitnt";


          }
          $penghasilan = number_format($penghasilan);
          $pengeluaran = number_format($pengeluaran);
          $profit = number_format($profit);



          $asede .= "<tr>
            <th scope='row'>$date</th>
            <td>Rp $pengeluaran</td>
            <td>Rp $penghasilan</td>
            <td class='$opit'>Rp $profit</td>
            <td>$keterangan</td>
            <td><a href='/AdminWRBOnline/editPengeluaran/?d=$dx&m=$mx&y=$yx'>Edit</a> | <a href='/AdminWRBOnline/excel/?d=$dx&m=$mx&y=$yx'>Excel</a></td>
          </tr>";
        }
        $tpenghasilan = number_format($tpenghasilan);
        $tpengeluaran = number_format($tpengeluaran);
        $tprofit = number_format($tprofit);

        $asede .= "<tr class='table-success'>
          <th scope='row'>Seluruh Bulan</th>
          <td><b>Rp $tpengeluaran</b></td>
          <td><b>Rp $tpenghasilan</b></td>
          <td class='$topit'><b>Rp $tprofit</b></td>
            <td></td>
              <td></td>
          </tr>";
        return $asede;

      }

      public function addPengeluaran() {
        $pengeluaran = (int) $this->db->escape_str($_POST['pengeluaran']);
        $keterangan = $this->db->escape_str($_POST['keterangan']);

        $today = date("Y-m-d");
        $query = $this->db->query("SELECT id FROM `pengeluaran` WHERE `waktu` = '$today' LIMIT 0,1");
        $exist = false;
        foreach ($query->result() as $row)
        {
          $exist = TRUE;
          $aidi = $row->id;
        }

        if (!$exist) {
          if ($this->db->simple_query("INSERT INTO `pengeluaran` (`id`, `waktu`, `nominal`, `keterangan`) VALUES (NULL, '$today', '$pengeluaran', '$keterangan');"))
            {
                  header("Location: /AdminWRBOnline/pengeluaran");
                  die("sukses");
            }
            else
            {
                  die("gagal menambah pengeluaran");
            }

        } else {
          if ($this->db->simple_query("UPDATE `pengeluaran` SET `nominal` = '$pengeluaran', `keterangan` = '$keterangan' WHERE `pengeluaran`.`id` = '$aidi';"))
            {
                  header("Location: /AdminWRBOnline/pengeluaran");
                  die("sukses");
            }
            else
            {
                  die("gagal mengubah pengeluaran");
            }
        }
        //

      }

      public function editPengeluaran() {
        $d = (int) $this->db->escape_str($_POST['d']);
        $m = (int) $this->db->escape_str($_POST['m']);
        $y = (int) $this->db->escape_str($_POST['y']);

        if ($m > 12) {
          die("NGACO KAMU");
        }
        if ($d > 31) {
          die("NGACO KAMU");
        }

        $pengeluaran = (int) $this->db->escape_str($_POST['pengeluaran']);
        $keterangan = $this->db->escape_str($_POST['keterangan']);

        $datex = $y . "-" . $m . "-" . $d;
        $query = $this->db->query("SELECT id FROM `pengeluaran` WHERE `waktu` = '$datex' LIMIT 0,1");
        $exist = false;
        foreach ($query->result() as $row)
        {
          $exist = TRUE;
          $aidi = $row->id;
        }

        if (!$exist) {
          if ($this->db->simple_query("INSERT INTO `pengeluaran` (`id`, `waktu`, `nominal`, `keterangan`) VALUES (NULL, '$datex', '$pengeluaran', '$keterangan');"))
            {
                  header("Location: /AdminWRBOnline/pengeluaran");
                  die("sukses");
            }
            else
            {
                  die("gagal menambah pengeluaran");
            }

        } else {
          if ($this->db->simple_query("UPDATE `pengeluaran` SET `nominal` = '$pengeluaran', `keterangan` = '$keterangan' WHERE `pengeluaran`.`id` = '$aidi';"))
            {
                  header("Location: /AdminWRBOnline/pengeluaran");
                  die("sukses");
            }
            else
            {
                  die("gagal mengubah pengeluaran");
            }
        }
        //


      }

      public function getPengeluaranInfo($date,$type) {
        $date = $this->db->escape_str($date);
        $query = $this->db->query("SELECT * FROM `pengeluaran` WHERE `waktu` = '$date' LIMIT 0,1");
        $exist = false;
        foreach ($query->result() as $row)
        {
          if ($type == 1) {
            return $row->id;
          } else if ($type == 2) {
            return $row->nominal;
          } else if ($type == 3) {
            return $row->keterangan;
          }
        }
      }

      public function getTestimoniInfo($id,$type) {
          $id = $this->db->escape_str($id);
        $query = $this->db->query("SELECT * FROM `testimoni` WHERE `id` = '$id' LIMIT 0,1");

        foreach ($query->result() as $row)
        {
          if ($type == 1) {
            return $row->id;
          } else if ($type == 2) {
            return $row->nama;
          } else if ($type == 3) {
            return $row->rating;
          } else if ($type == 4) {
            return $row->testi;
          }
        }
      }

      public function getTesti() {
        $query = $this->db->query("SELECT * FROM `testimoni` ORDER BY id DESC ");
           $asede = "";
            foreach ($query->result() as $row)
            {
              $aidi = $row->id;
              $nama = $row->nama;
              $waktu = $row->waktu;
              $testi = substr($row->testi,0,64) . "...";
              $rating = "";
              for ($x = 0; $x < $row->rating; $x++) {
                 $rating .=  "<i class='fas fa-star'></i>";
               }

              $asede .= "    <tr>
      <td>$aidi</th>
      <td>$waktu</th>
      <td>$nama</th>
      <td>$testi</th>
      <td>$rating</th>
      <td><a href='/AdminWRBOnline/edittesti/$aidi'>Edit</a> | <a href='/AdminWRBOnline/deletetesti/$aidi'>Hapus</a></th>
    </tr>";
            }

            return $asede;

      }

      public function handleEditTesti($id) {
        $id = $this->db->escape_str($id);

        $nama = $this->db->escape_str($_POST['nama']);
        $rating = $this->db->escape_str($_POST['rating']);
        $testi = $this->db->escape_str($_POST['testi']);

        if ( ! $this->db->simple_query("UPDATE `testimoni` SET `nama` = '$nama', `rating` = '$rating', `testi` = '$testi' WHERE `testimoni`.`id` = '$id'"))
          {
        die("Terjadi kesalahan " .  $this->db->error()); // Has keys 'code' and 'message'
        } else {
        header("Location: /AdminWRBOnline/testi/");
        die("sukses");
        }
      }

      public function handleAddTesti() {
        $nama = $this->db->escape_str($_POST['nama']);
        $rating = $this->db->escape_str($_POST['rating']);
        $testi = $this->db->escape_str($_POST['testi']);


        if ( ! $this->db->simple_query("INSERT INTO `testimoni` (`id`, `waktu`, `nama`, `testi`, `rating`) VALUES (NULL, NOW(), '$nama', '$testi', '$rating')"))
          {
        die("Terjadi kesalahan " .  var_dump($this->db->error())); // Has keys 'code' and 'message'
        } else {
        header("Location: /AdminWRBOnline/testi/");
        die("sukses");
        }
      }

      public function deleteTesti($id) {
        $id = $this->db->escape_str($id);

        //
        if ( ! $this->db->simple_query("DELETE FROM `testimoni` WHERE `testimoni`.`id` = '$id'"))
          {
        die("Terjadi kesalahan " .  $this->db->error()); // Has keys 'code' and 'message'
        } else {
        header("Location: /AdminWRBOnline/testi/");
        die("sukses");
        }
      }

    }
    ?>
