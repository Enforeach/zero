<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Post extends Core
{
  private $level;
  function __construct()
  {
    parent::__construct();
    $this->level = $this->session->userdata('level');
  }

  function index()
  {
    $this->renderpage('');
  }

  public function add()
  {
    if(!$this->isLogin){
      redirect('admin');
      die();
    }
    $this->form_validation->set_rules('title', 'Title', 'required');
    $this->form_validation->set_rules('content', 'Content', 'required');

    if($this->form_validation->run() == false){
      $data['alert'] = '';
    }else{
      $add = $this->m_article->addArticle();
      if($add){
        if($this->upload_images($_FILES['cover']['name'], './assets2/Images/article', 'cover')){
          $data['alert'] = 'success';
        }
      }
    }
    $this->renderpage('admin/pages/post', $data);
  }

}
