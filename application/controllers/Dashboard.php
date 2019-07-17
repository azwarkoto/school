<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

  public function __construct()
  {
    
    parent::__construct();

    $this->load->library('form_validation');
  }

  /**
   * Show our dashboard
   * 
   * 
   * @return view
   */
  public function index()
  {
    $this->template->load('template','dashboard/index');
  }

  public function identitas_saya()
  {
    $this->template->load('template','dashboard/identitas_saya');
  }
}