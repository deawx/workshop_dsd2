<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

  public $data = array();

  public function __construct()
  {
    parent::__construct();
    $this->data = array(
      'page_title' => 'DSD System',
      'page_header' => '',
      'page_header_small' => '',
      'parent' => '',
      'menu' => '',
      'meta_tag' => array(),
      'css' => array(),
      'js' => array(),
      'header' => '',
      'footer' => '',
      'navbar' => '',
      'body' => '',
      'leftbar' => '',
      'rightbar' => ''
    );
  }
}

class Public_Controller extends MY_Controller {

  public function __construct()
  {
    parent::__construct();
  }

}

class Private_Controller extends MY_Controller {

  public function __construct()
  {
    parent::__construct();
    if ( ! $this->session->has_userdata('is_login'))
      redirect('auth/logout');
  }

}

class Admin_Controller extends Private_Controller {

  public function __construct()
  {
    parent::__construct();
    if ( ! $this->session->has_userdata('is_admin'))
      redirect('auth/logout');
  }

}
