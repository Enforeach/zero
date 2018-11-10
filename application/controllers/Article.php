<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Article extends Core
{
  private $level;
  function __construct()
  {
    parent::__construct();
    $this->level = $this->session->userdata('level');
  }

  public function index()
  {
    if(!$this->isLogin){
      redirect('admin');
      die();
    }
    $data['allArticle'] = $this->m_article->getAllArticle();
    $this->renderpage('admin/pages/article', $data);
  }
  public function comment($aa)
  {
    
    $this->load->library('pagination');
    //konfigurasi pagination
        $config['base_url'] = site_url('article/article_read/'.$aa); //site url
        $config['total_rows'] = $this->db->count_all('article'); //total row
        $config['per_page'] = 2;  //show record per halaman
        $config["uri_segment"] = 4;  // uri parameter
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);

        // Membuat Style pagination untuk BootStrap v4
        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';

        $this->pagination->initialize($config);
        $lali['page'] = substr($_SERVER['HTTP_REFERER'], strlen($_SERVER['HTTP_REFERER'])-1);

        //panggil function get_mahasiswa_list yang ada pada mmodel mahasiswa_model. 
        $lali['lala'] = $this->m_article->getComment($aa, $config["per_page"], $lali['page']);           
        
        $lali['pagination'] = $this->pagination->create_links();
        echo json_encode($lali);
  }
        
   public function save(){
    $data=$this->m_article->save_comment();
    echo json_encode($data);
  }

  public function article_add()
  {
    if(!$this->isLogin){
      redirect('admin');
      die();
    }
    if($this->level == 1){
      $this->form_validation->set_rules('title', 'Title', 'required');
      $this->form_validation->set_rules('content', 'Content', 'required');

      $data['edit'] = false;

      if($this->form_validation->run() == false){
        $data['alert'] = '';
      }else{
        $add = $this->m_article->addArticle();
        if($add){
          if($this->upload_images($_FILES['cover']['name'], './images/article', 'cover')){
            $data['alert'] = 'success';
          }
        }
      }
      $this->renderpage('admin/pages/article_add', $data);
    }else{
      redirect('admin');
    }
  }
  public function article_read($idarticle)
  {
    if(!$this->isLogin){
      redirect('admin');
      die();
    }

    $data['article'] = $this->m_article->getArticle($idarticle);
    $data['id'] = $idarticle;
    $this->renderpage('admin/pages/filtered_article', $data);
  }
  public function article_edit($idarticle)
  {
    if(!$this->isLogin){
      redirect('admin');
      die();
    }
    if($this->level == 1){
      $this->form_validation->set_rules('title', 'Title', 'required');
      $this->form_validation->set_rules('content', 'Content', 'required');

      $data['article'] = $this->m_article->getArticle($idarticle);
      $data['edit'] = true;

      if($this->form_validation->run() == false){
        $data['alert'] = '';
      }else{
        if($_FILES['cover']['name'] != null){
          $cover = $this->m_article->getArticle($idarticle);
          //unlink('./images/'.$cover->cover);
          $this->upload_images($_FILES['cover']['name'], './images/article', 'cover');
          $edit = $this->m_article->editArticle($idarticle);
          if($edit){
            $data['alert'] = 'success_edit';
          }
        }else{
          $edit = $this->m_article->editArticle($idarticle);
          if($edit){
            $data['alert'] = 'success_edit';
          }
        }
      }
      $this->renderpage('admin/pages/article_add', $data);
    }else{
      redirect('admin');
    }
  }
  public function article_delete($idarticle)
  {
    if(!$this->isLogin){
      redirect('admin');
      die();
    }
    if($this->level == 1){
      $this->m_article->deleteArticle($idarticle);
    }else{
      redirect('admin');
    }
  }
  public function article_datatable()
  {
    $ret = $this->m_article->datatableArticle();
    echo json_encode($ret);
    die();
  }
}
