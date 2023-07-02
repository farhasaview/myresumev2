<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

  public function __construct() {
    parent::__construct();
    
     $this->clearCache();
  }
  private function clearCache() {
    $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
    $this->output->set_header("Pragma: no-cache");
  }

  public function index() {
    if ($this->session->userdata('nu_asup') == 'admin') {
      redirect(base_url('admin'));
    }else{
      $this->load->view("admin/login");
    }
  }

  public function check() {
    $this->load->model('ModelAdmin');
    $username = $this->input->post('username');
    $pass = md5($this->input->post('password'));
    $user = $this->ModelAdmin->check($username, $pass);
    if (!$user) {
      $this->session->set_flashdata('pangbeja', '<div class="alert alert-danger alert-dismissible">
               Gagal Masuk, Kombinasi Tidak Sesuai
               </div>');
      redirect(base_url('login'));
    } else {
      $this->session->set_userdata(array(
        'nu_asup' => 'admin',
        'id_admin' => $user->id_admin,
        'username' => $user->username
      ));
      redirect(base_url('admin'));
    }
  }

  public function logout() {
    $this->session->sess_destroy();
    redirect(base_url('publik'));
  }

}
