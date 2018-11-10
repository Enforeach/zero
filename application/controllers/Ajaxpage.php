<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajaxpage extends CI_Controller {
 
 function index()
 {
  if(!$this->isLogin){
      redirect('admin');
      die();
    }
    $this->renderpage('admin/pages/article', $data);
 }