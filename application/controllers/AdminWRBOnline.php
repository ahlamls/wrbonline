<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminWRBOnline extends CI_Controller {

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
      $this->load->model('admin_model');
      $this->load->model('user_model');

    $this->config->load('asede', TRUE);
    $this->load->library('session');
    $this->load->database();
}

public function index()
{
  header("Location: /AdminWRBOnline/home");
	die();


}


public function logout()
{

	$this->session->sess_destroy();
	header("Location: /AdminWRBOnline/login");
	  die("[WRBOnline] sudah logout");
	}


public function login()
{
  if (isset($_SESSION['aid'])){
     $aaidi = $_SESSION['aid'];
     header("Location: /AdminWRBOnline/home");
     die("Sudah Login");
    } else {

    }


    // $data['alerttext'] = "";
    // $data['alertstyle'] = "display:none";
    //
    // if (isset($_GET['msg'])) {
    // 			$data['alerttext'] = htmlentities($_GET['msg']);
    // 			$data['alertstyle'] = "";
    // }

  //	$this->load->view('admin/content/login',$data);
    	$this->load->view('admin/content/login');

}

public function handleLogin() {
  if (!isset($_POST['email']) OR !isset($_POST['password'])) {
    show_404();
  }
  $asede = $this->admin_model->handlelogin();
  if ($asede == "") {
  //  header("Location: /AdminWRBOnline/login/?msg=Email Atau Password Salah");
  die("Email atau password salah");
  } else {
    $this->session->set_userdata('aid', $asede);

    header("Location: /AdminWRBOnline/home/");
     die("[WRBOnline] admin sudah login");
  }
}

public function home()
{
  if (isset($_SESSION['aid'])){
     $aaidi = $_SESSION['aid'];
    } else {
      header("Location: /AdminWRBOnline/login/?msg=Silahkan Login Untuk Melanjutkan");
      die("Belum Login");
    }
    $data['l'] = "d";

  	$this->load->view('admin/header',$data);
  	$this->load->view('admin/content/home',$data);

      $this->load->view('admin/footer',$data);
}

public function Order() {
  if (isset($_SESSION['aid'])){
     $aaidi = $_SESSION['aid'];
    } else {
      header("Location: /AdminWRBOnline/login/?msg=Silahkan Login Untuk Melanjutkan");
      die("Belum Login");
    }
    $data['content'] = $this->admin_model->orderList();

    $this->load->view('admin/header',$data);
    $this->load->view('admin/content/order',$data);

      $this->load->view('admin/footer',$data);
}

public function analisaMenu() {
  if (isset($_SESSION['aid'])){
     $aaidi = $_SESSION['aid'];
    } else {
      header("Location: /AdminWRBOnline/login/?msg=Silahkan Login Untuk Melanjutkan");
      die("Belum Login");
    }
    $data['content'] = $this->admin_model->analisaMenu();

    $this->load->view('admin/header',$data);
    $this->load->view('admin/content/analisa-menu',$data);

      $this->load->view('admin/footer',$data);
}

public function Menu() {
  if (isset($_SESSION['aid'])){
     $aaidi = $_SESSION['aid'];
    } else {
      header("Location: /AdminWRBOnline/login/?msg=Silahkan Login Untuk Melanjutkan");
      die("Belum Login");
    }
    $data['content'] = $this->admin_model->menuList();

    $this->load->view('admin/header',$data);
    $this->load->view('admin/content/menu',$data);

      $this->load->view('admin/footer',$data);
}

public function print($id = 0) {
  if (isset($_SESSION['aid'])){
     $aaidi = $_SESSION['aid'];
    } else {
      header("Location: /AdminWRBOnline/login/?msg=Silahkan Login Untuk Melanjutkan");
      die("Belum Login");
    }
    if ($id == 0 ) {
      die("ID tidak valid");
    }
    $data['content'] = $this->admin_model->orderCartList($id);

    $data['aidi'] = $id;
     $data['waktu'] = $this->user_model->getOrderInfo($id,1);
     $data['nama'] = $this->user_model->getOrderInfo($id,2);
     $data['nohp'] = $this->user_model->getOrderInfo($id,3);
     $data['alamat'] = $this->user_model->getOrderInfo($id,4);
     $data['info'] = $this->user_model->getOrderInfo($id,5);
     $data['paid'] = $this->user_model->getOrderInfo($id,6);
     $data['totalprice'] = number_format($this->user_model->getOrderInfo($id,7));
     $data['method'] = $this->user_model->getOrderInfo($id,8);



    $this->load->view('admin/content/print',$data);
}

public function bayar($id) {
  if (isset($_SESSION['aid'])){
     $aaidi = $_SESSION['aid'];
    } else {
      header("Location: /AdminWRBOnline/login/?msg=Silahkan Login Untuk Melanjutkan");
      die("Belum Login");
    }
    if ($id == 0 ) {
      die("ID tidak valid");
    }
    $this->admin_model->setBayar($id);
}

public function delete($id) {
  if (isset($_SESSION['aid'])){
     $aaidi = $_SESSION['aid'];
    } else {
      header("Location: /AdminWRBOnline/login/?msg=Silahkan Login Untuk Melanjutkan");
      die("Belum Login");
    }
    if ($id == 0 ) {
      die("ID tidak valid");
    }
    $this->admin_model->deleteOrder($id);
}

public function deleteMenu($id) {
  if (isset($_SESSION['aid'])){
     $aaidi = $_SESSION['aid'];
    } else {
      header("Location: /AdminWRBOnline/login/?msg=Silahkan Login Untuk Melanjutkan");
      die("Belum Login");
    }
    if ($id == 0 ) {
      die("ID tidak valid");
    }
    $this->admin_model->deleteMenu  ($id);
}

public function addMenu() {
  if (isset($_SESSION['aid'])){
     $aaidi = $_SESSION['aid'];
    } else {
      header("Location: /AdminWRBOnline/login/?msg=Silahkan Login Untuk Melanjutkan");
      die("Belum Login");
    }
    $data["katlist"] = $this->admin_model->listKat();
    $this->load->view('admin/header',$data);
    $this->load->view('admin/content/addmenu',$data);

      $this->load->view('admin/footer',$data);
}

public function handleAddMenu() {
  if (isset($_SESSION['aid'])){
     $aaidi = $_SESSION['aid'];
    } else {
      header("Location: /AdminWRBOnline/login/?msg=Silahkan Login Untuk Melanjutkan");
      die("Belum Login");
    }

    $this->admin_model->handleAddMenu();

}

public function Edit($id = 0) {
  if (isset($_SESSION['aid'])){
     $aaidi = $_SESSION['aid'];
    } else {
      header("Location: /AdminWRBOnline/login/?msg=Silahkan Login Untuk Melanjutkan");
      die("Belum Login");
    }
    if ($id == 0 ) {
      die("ID tidak valid");
    }
    $data['id'] = $id;
    $data['nama'] = $this->admin_model->getMenuInfo($id,3);
    $katid = $this->admin_model->getMenuInfo($id,1);
    $data['harga'] = $this->admin_model->getMenuInfo($id,5);
    $data["katlist"] = $this->admin_model->listKat($katid);
    $this->load->view('admin/header',$data);
    $this->load->view('admin/content/editmenu',$data);

      $this->load->view('admin/footer',$data);
}

public function handleEditMenu($id) {
  if (isset($_SESSION['aid'])){
     $aaidi = $_SESSION['aid'];
    } else {
      header("Location: /AdminWRBOnline/login/?msg=Silahkan Login Untuk Melanjutkan");
      die("Belum Login");
    }

    $this->admin_model->handleEditMenu($id);

}




}
?>
