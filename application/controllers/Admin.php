<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends Core
{
  private $level;
  function __construct()
  {
    parent::__construct();
    $this->level = $this->session->userdata('level');
  }
  public function index()
  {
    if($this->isLogin){
      redirect('admin/home');
      die();
    }
    $this->form_validation->set_rules('username', 'Username', 'required');
    $this->form_validation->set_rules('password', 'Password', 'required');

    if($this->form_validation->run() == false){
      $data['alert'] = '';
      $this->load->view('admin/pages/front', $data);
    }else{
      if($this->m_user->doLogin()){
        redirect('admin');
      }else{
        $data['alert'] = 'failed';
        $this->load->view('admin/pages/front', $data);
      }
    }

  }
  public function rumah_add()
  {
    if(!$this->isLogin){
      redirect('admin');
      die();
    }
    if($this->level == 1){
      $this->form_validation->set_rules('blok', 'blok', 'required');
      $this->form_validation->set_rules('kamar', 'kamar', 'required');
      

      if($this->form_validation->run() == false){
        $data['alert'] = "";
        $data['edit'] = false;
      }else{
        $data['edit'] = false;
        $this->upload_images($_FILES['photo']['name'], './images/Rumah', 'photo');
        if ($this->m_rumah->addRumah() == "success") {
          $data['alert'] = "success";
        }else {
          $data['alert'] = "failed";
        }

      }
      
      $this->renderpage('admin/pages/rumah_add', $data);
    }else{
      redirect('admin');
    }
  }
  
  public function guest_login()
  {
    $data = array(
      'isLogin' => true,
      'iduser' => 'guest',
      'nmuser' => 'Guest'
    );
    $this->session->set_userdata($data);
    redirect('admin');
  }
  public function logout()
  {
    $this->m_user->doLogout();
    redirect('admin');
  }
  public function home()
  {

        $this->load->library('pagination');
    //konfigurasi pagination
        $config['base_url'] = site_url('admin/home'); //site url
        $config['total_rows'] = $this->db->count_all('article'); //total row
        $config['per_page'] = 2;  //show record per halaman
        $config["uri_segment"] = 3;  // uri parameter
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
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        //panggil function get_mahasiswa_list yang ada pada mmodel mahasiswa_model. 
        $data['data'] = $this->m_article->get_article_list($config["per_page"], $data['page']);           

        $data['pagination'] = $this->pagination->create_links();
        $data['article'] = $this->m_article->getAllFArticle();
        $this->renderpage('admin/pages/home', $data);
      }
      public function db_backup()
      {
        if(!$this->isLogin){
          redirect('admin');
          die();
        }
        if($this->level == 1){
          date_default_timezone_set("Asia/Jakarta");
          $this->load->dbutil();

          $prefs = array(
            'format'      => 'zip',
            'filename'    => 'homies.sql'
          );

          $backup =& $this->dbutil->backup($prefs);

          $db_name = 'backup-on-'. date("Y-m-d-H:i:s") .'.zip';
          $save = 'C:\\'.$db_name;

          $this->load->helper('file');
          write_file($save, $backup);

          $this->load->helper('download');
          force_download($db_name, $backup);
        }else{
          redirect('admin');
        }
      }
      public function file_backup($destination)
      {
        if(!$this->isLogin){
          redirect('admin');
          die();
        }
        $source = 'C:\xampp\htdocs\dinos';
        $destination = $destination."\\";
        set_time_limit(10000);
        system("xcopy $source $destination /e /q /j");
      }
    }
