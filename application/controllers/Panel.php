<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Panel extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();

    $this->load->library('form_validation');

    is_login();
    is_admin();
     
  }

  public function index()
  {
    $this->template->load('template', 'admin/index');
  }
}