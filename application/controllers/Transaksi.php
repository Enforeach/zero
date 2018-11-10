<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends Core
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
    $data['allTransaksi'] = $this->m_trans->getAllTrans();
    $this->renderpage('admin/pages/transaksi', $data);
  }
    public function tunai()
  {
    if(!$this->isLogin){
      redirect('admin');
      die();
    }
    $data['allTransaksi'] = $this->m_trans->getAllTrans();
    $this->renderpage('admin/pages/transaksi_tunai', $data);
  }
      public function kredit()
  {
    if(!$this->isLogin){
      redirect('admin');
      die();
    }
    $data['allTransaksi'] = $this->m_trans->getAllTrans();
    $this->renderpage('admin/pages/transaksi_kredit', $data);
  }
    public function transaksi_tunai_datatable()
  {
    $ret = $this->m_trans->datatableTransaksiTun();
    echo json_encode($ret);
    die();
  }
      public function transaksi_kredit_datatable()
  {
    $ret = $this->m_trans->datatableTransaksiKre();
    echo json_encode($ret);
    die();
  }
  public function transaksi_datatable()
  {
    $ret = $this->m_trans->datatableTransaksi();
    echo json_encode($ret);
    die();
  }
}
