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

public function getKategori() {
	
}

public function getMenuList($id = 0) {

}


?>
