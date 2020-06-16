<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	 public function __construct()
{
    parent::__construct();
      $this->load->model('user_model');

    $this->config->load('asede', TRUE);
    $this->load->library('session');
    $this->load->database();
}

	public function index($kat = 0)
	{

		$kue = $this->user_model->getCookie();
		$data['content'] = $this->user_model->listMenu($kat);
		$data['katlist'] = $this->user_model->listKat($kat);
		$data['katimglist'] = $this->user_model->getKatImgList($kat);
		$this->load->view('user/header',$data);
    $this->load->view('user/content/home',$data);
    $this->load->view('user/footer',$data);
	}

	public function Payment($id) {
		$data['aidi'] = $id;
		$data['waktu'] = $this->user_model->getOrderInfo($id,1);
		$data['nama'] = $this->user_model->getOrderInfo($id,2);
		$data['nohp'] = $this->user_model->getOrderInfo($id,3);
		$data['alamat'] = $this->user_model->getOrderInfo($id,4);
		$data['info'] = $this->user_model->getOrderInfo($id,5);
		$data['paid'] = $this->user_model->getOrderInfo($id,6);
		$data['total'] = number_format($this->user_model->getOrderInfo($id,7));
		$data['method'] = $this->user_model->getOrderInfo($id,8);
		$data['content'] = $this->user_model->getOrderCart($id);
		$this->load->view('user/header',$data);
		$this->load->view('user/content/payment',$data);


		$this->load->view('user/footer',$data);
	}

	public function lacakOrder($kode) {

	}

  public function Cart() {
		$kue = $this->user_model->getCookie();
    $data['kahfi'] = "kucrit";


    $this->load->view('user/header',$data);
    $this->load->view('user/content/cart',$data);
    $this->load->view('user/footer',$data);
  }

	public function cartList() {
		$kue = $this->user_model->getCookie();
		if ($kue == "") {
			die("Gagal memuat keranjang . pastikan fitur Cookie di browser diaktifkan");
		}
		echo $this->user_model->getCart($kue);
	}

	public function updateCart($id)
 {
	 $kue = $this->user_model->getCookie();
	 $id = (int) $this->db->escape_str($id);
	 $value = (int) $this->db->escape_str($_GET['v']);
	 $this->user_model->changeCart($id,$value,$kue);
 }

 public function totalCart() {
	 $kue = $this->user_model->getCookie();
	 die($this->user_model->totalCart($kue));
 }

 public function deleteCart($id) {
	 $kue = $this->user_model->getCookie();
	 $this->user_model->removeCart($this->db->escape_str($id),$kue);
 }

	public function addToCart($id) {
		//
		$kue = $this->user_model->getCookie();
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

	public function submitCart() {
		$kue = $this->user_model->getCookie();
		$info = $this->db->escape_str($_POST['info']);
		$nama = $this->db->escape_str($_POST['nama']);
		$nohp = $this->db->escape_str($_POST['nohp']);
		$alamat = $this->db->escape_str($_POST['alamat']);
		$metode = $this->db->escape_str($_POST['metode']);
		if (!isset($nama) OR !isset($nohp) OR !isset($alamat) OR !isset($metode)) {
			die("gagal");
		}
		die($this->user_model->submitCart($kue,$info,$nama,$nohp,$alamat,$metode));

	}

}
