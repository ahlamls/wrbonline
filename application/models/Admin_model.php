<?php
class Admin_model extends CI_Model {

 public function __construct()
 {
         $this->load->database();
          // $this->load->library('config_Writer');

$this->load->library('upload', $config);
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
                <td><a href='/AdminWRBOnline/print/$aidi' target='_blank' >Print</a> | <a href='/AdminWRBOnline/delete/$aidi'>Hapus</a></td>
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
        $kategori = $this->db->escape_str($kategori);
        $nama = $this->db->escape_str($nama);
        $harga = $this->db->escape_str($harga);


      }

      private function _uploadImage()
      {
    $config['upload_path']          = './data/img/';
    $config['allowed_types']        = 'gif|jpg|jpeg|png';
    $config['file_name']            = generateRandomString(128);
    $config['overwrite']			= true;
    $config['max_size']             = 1024; // 1MB
    // $config['max_width']            = 1024;
    // $config['max_height']           = 768;

    $this->load->library('upload', $config);

    if ($this->upload->do_upload('image')) {
        return $this->upload->data("file_name");
    }

    return "default.jpg";
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

}
