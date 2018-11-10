<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rumah extends Core
{
  private $level;
  function __construct()
  {
    parent::__construct();
    $this->level = $this->session->userdata('level');
  }
  public function allhousing()
  {
    if(!$this->isLogin){
      redirect('admin');
      die();
    }
    $data['idrumah'] = $this->session->userdata('idrumah');
    $data['allHouse'] = $this->m_rumah->getAllHouse();
    $this->renderpage('admin/pages/rumah', $data);
  }
    public function allhousingkos()
  {
    if(!$this->isLogin){
      redirect('admin');
      die();
    }
    $data['idrumah'] = $this->session->userdata('idrumah');
    $data['allHouse'] = $this->m_rumah->getAllHouse();
    $this->renderpage('admin/pages/rumah_kosong', $data);
  }
      public function allhousingjual()
  {
    if(!$this->isLogin){
      redirect('admin');
      die();
    }
    $data['idrumah'] = $this->session->userdata('idrumah');
    $data['allHouse'] = $this->m_rumah->getAllHouse();
    $this->renderpage('admin/pages/rumah_terjual', $data);
  }
    public function rumah_delete($idrumah)
  {
    if(!$this->isLogin){
      redirect('admin');
      die();
    }
    if($this->level == 1){
      $this->m_rumah->deleteRumah($idrumah);
      return true;
    }else{
      redirect('admin');
    }
  }
      public function rumah_edit($idrumah)
  {
    if(!$this->isLogin){
      redirect('admin');
      die();
    }
    if($this->level == 1){

      $this->form_validation->set_rules('blok', 'blok', 'required');
      $this->form_validation->set_rules('kamar', 'kamar', 'required');
      $data['rumah'] = $this->m_rumah->gethouse($idrumah);
      $data['edit'] = true;
      if($this->form_validation->run() == false){
        $data['alert'] = "";
      }else{
        $this->upload_images($_FILES['photo']['name'], './images/Rumah', 'photo');
        if ($this->m_rumah->editRumah($idrumah) == "success") {
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
        public function rumah_jual($idrumah)
  {
    if(!$this->isLogin){
      redirect('admin');
      die();
    }
    if($this->level == 1){

      $this->form_validation->set_rules('buktijual', 'buktijual', 'required');
      
    $data['rumah'] = $this->m_rumah->gethouse($idrumah);
      if($this->form_validation->run() == false){
        $data['alert'] = "";
      }else{
        $this->upload_images($_FILES['photo']['name'], './images/ktp', 'photo');
        if ($this->m_rumah->jual_rumah() == "success") {
          $data['alert'] = "success";
        }else {
          $data['alert'] = "failed";
        }
      }

    $this->renderpage('admin/pages/rumah_jual', $data);
    }else {
      redirect('admin');
    }
  }
  public function house_datatable()
  {
    if(!$this->isLogin){
      redirect('admin');
      die();
    }
    $ret = $this->m_rumah->datatableRumah();
    echo json_encode($ret);
    die();
  }
    public function house_datatable_kosong()
  {
    if(!$this->isLogin){
      redirect('admin');
      die();
    }
    $ret = $this->m_rumah->datatableRumahkosong();
    echo json_encode($ret);
    die();
  }
      public function house_datatable_jual()
  {
    if(!$this->isLogin){
      redirect('admin');
      die();
    }
    $ret = $this->m_rumah->datatableRumahjual();
    echo json_encode($ret);
    die();
  }
    public function Rumah_det($idrumah)
  {
    if(!$this->isLogin){
      redirect('admin');
      die();
    }
    $data['rumah'] = $this->m_rumah->gethouse($idrumah);
    $this->renderpage('admin/pages/rumah_detail', $data);
  }

}
