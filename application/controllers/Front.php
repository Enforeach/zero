<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Front extends Core
{
  private $level;
  function __construct()
  {
    parent::__construct();
    $this->level = $this->session->userdata('level');
  }
  public function index()
  {
    $this->load->view('admin/pages/front');
  }

}
