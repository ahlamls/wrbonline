<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserBackend extends CI_Controller {

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
      $this->load->model('backend_model');

    $this->config->load('asede', TRUE);
    $this->load->library('session');
    $this->load->database();
}

public function index() {
  die("Apa lo liat liat . iri bilang bos");
}

public function setorKue() {
	$this->backend_model->setorKue($_POST['kue'],$_POST['ua']);
}

public function cekApdet() {
	$this->backend_model->cekApdet($_POST['v']);
}

public function getCarousel() {
$this->backend_model->getKatImgList();
}

public function getKategori($id = 0) {
$this->backend_model->getKategori($id);
}

public function getMenu($id = 7) {
$this->backend_model->getMenu($id);;
}

public function addToCart() {
$this->backend_model->addToCart($_POST['kue'],$_POST['menu']);;
}

public function totalCart() {
	$kue = $_POST['kue'];
	$this->backend_model->totalCart($kue);
}

public function cartList() {
	$kue = $_POST['kue'];
	$this->backend_model->getCart($kue);
}

public function updateCart($id)
{
	$kue = $_POST['kue'];
 $id = (int) $this->db->escape_str($id);
 $value = (int) $this->db->escape_str(base64_decode($_POST['amount']));
 $this->backend_model->changeCart($id,$value,$kue);
}

public function deleteCart($id) {
	$kue = $_POST['kue'];
	$this->backend_model->removeCart($this->db->escape_str($id),$kue);
}

public function submitCart() {
	$kue = $_POST['kue'];
	$info = $this->db->escape_str(base64_decode($_POST['info']));
	$nama = $this->db->escape_str(base64_decode($_POST['nama']));
	$nohp = $this->db->escape_str(base64_decode($_POST['nohp']));
	$alamat = $this->db->escape_str(base64_decode($_POST['alamat']));
	$metode = $this->db->escape_str(base64_decode($_POST['metode']));
	if (!isset($nama) OR !isset($nohp) OR !isset($alamat) OR !isset($metode)) {
		die("gagal");
	}
	$this->backend_model->submitCart($kue,$info,$nama,$nohp,$alamat,$metode);

}

}
