<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_trans extends CI_Model
{
  private $level;

  function __construct()
  {
    parent::__construct();
    $this->level = $this->session->userdata('level');
  }
    function _post($name , $xss = true)
  {
    return $this->input->post($name , $xss);
  }
    public function getCountTrans()
  {
    $this->db->select("count(buktijual) as total");
    $this->db->from("transaksi");
    $q = $this->db->get()->row();
    return $q->total;
  }
      public function getCountTransTun()
  {
    $this->db->select("count(buktijual) as total");
    $this->db->from("transaksi");
    $this->db->where("jenis_pem", "Pembayaran Tunai");
    $q = $this->db->get()->row();
    return $q->total;
  }
      public function getCountTransKre()
  {
    $this->db->select("count(buktijual) as total");
    $this->db->from("transaksi");
    $this->db->where("jenis_pem", "Pembayaran Kredit");
    $q = $this->db->get()->row();
    return $q->total;
  }
    public function getAllTrans()
  {
    $this->db->select("*");
    $this->db->from("transaksi");
    return $this->db->get()->result();
  }

  public function datatableTransaksiTun()
  {
    $array = array("buktijual", "idrumah", "jenis_pem", "nama_konsumen", "ktp", "stats", "total_bayar");
    $start = $this->_post('start');
    $offset = $this->_post('length');
    if ($start != null && $offset != null) {
      $this->db->limit($offset,$start);
    }

    $search = $this->_post('search');
    if($search['value'] != ''){
      $key = $search['value'];
      $this->db->group_start();
      $this->db->like('buktijual', $key);
      $this->db->or_like('nama_konsumen', $key);
      $this->db->group_end();
      $this->session->set_userdata('search_datatable01', $key);
    }else{
      $this->session->unset_userdata('search_datatable01');
    }

    $order = $this->_post('order');
    $column = isset($order[0]['column'])?$order[0]['column']:-1;
    if($column >= 0 && $column < count($array)){
      $ord = $array[$column];
      $by = $order[0]['dir'];
      $this->db->order_by($ord , $by);
    }

    $this->db->select("transaksi.buktijual as buktijual, transaksi.idrumah as idrumah, transaksi.jenis_pem as jenis_pem, transaksi.nama_konsumen as nama_konsumen, transaksi.ktp as ktp, transaksi.stats as stats, transaksi.total_bayar as total_bayar, tbbarang.blok as blok, tbbarang.pictures as pic" ,FALSE);
    $this->db->from("transaksi, tbbarang");
    $this->db->where("tbbarang.idrumah = transaksi.idrumah and transaksi.jenis_pem = 'Pembayaran Tunai'");
    $this->db->order_by("buktijual", "DESC");
    $sql = $this->db->get();
    $q = $sql->result();
    $this->db->select("FOUND_ROWS() AS total_row");
    $row = $this->db->get()->row();

    $sEcho = $this->_post('draw');
    $getCountAll = $this->getCountTrans();
    $output = array(
      "draw" => intval($sEcho),
      "recordsTotal" => $getCountAll,
      "recordsFiltered" => $row->total_row,
      "data" => array()
    );

    foreach ($q as $val) {

      if ($val->stats == "Lunas") {
        $stats = '<strong style="color: green;"> Lunas </strong>';
      }else {
        $stats = '<strong style="color: red;"> Belum Lunas </strong>';
      }
      if ($val->jenis_pem == "Pembayaran Tunai") {
        $jenis_pem = '<strong style="color: blue;"> Tunai </strong>';
      }else {
        $jenis_pem = '<strong style="color: #f16807;"> Kredit </strong>';

      }

      $btn = '<a href="'.site_url('rumah/Rumah_det/'.$val->idrumah).'" class="btn btn-success btn-xs" data-toggle="tooltip" title="Detail"><i class="fa fa-bars"></i></a> ';
      if($this->level == 1){
        $btn .= '<a  href="#" data-url="'.site_url('rumah/Rumah_delete/'.$val->idrumah).'" class="btn btn-danger btn-xs btn-deleterumah" data-toggle="tooltip" title="Delete"><i class="fa fa-trash-o"></i></a> <a href="'.site_url('rumah/rumah_edit/'.$val->idrumah).'" class="btn btn-info btn-xs" data-toggle="tooltip" title="Edit"><i class="fa fa-pencil"></i></a>';
      }
      $pic = '<img src="'.site_url('images/Rumah/'.$val->pic).'" style="width: 100px;">';

      $img = '<img src="'.site_url('images/ktp/'.$val->ktp).'" style="width: 100px;">';
      $output['data'][] = array(
        $val->buktijual,
        $val->idrumah,
        $val->blok,
        $pic,
        $jenis_pem,
        $val->nama_konsumen,
        $img,
        $stats,
        // $val->period_y,
        $val->total_bayar,
        $btn
      );
    }
    return $output;
  }

  public function datatableTransaksi()
  {
    $array = array("buktijual", "idrumah", "jenis_pem", "nama_konsumen", "ktp", "stats", "total_bayar");
    $start = $this->_post('start');
    $offset = $this->_post('length');
    if ($start != null && $offset != null) {
      $this->db->limit($offset,$start);
    }

    $search = $this->_post('search');
    if($search['value'] != ''){
      $key = $search['value'];
      $this->db->group_start();
      $this->db->like('buktijual', $key);
      $this->db->or_like('nama_konsumen', $key);
      $this->db->group_end();
      $this->session->set_userdata('search_datatable01', $key);
    }else{
      $this->session->unset_userdata('search_datatable01');
    }

    $order = $this->_post('order');
    $column = isset($order[0]['column'])?$order[0]['column']:-1;
    if($column >= 0 && $column < count($array)){
      $ord = $array[$column];
      $by = $order[0]['dir'];
      $this->db->order_by($ord , $by);
    }

    $this->db->select("transaksi.buktijual as buktijual, transaksi.idrumah as idrumah, transaksi.jenis_pem as jenis_pem, transaksi.nama_konsumen as nama_konsumen, transaksi.ktp as ktp, transaksi.stats as stats, transaksi.total_bayar as total_bayar, tbbarang.blok as blok, tbbarang.pictures as pic" ,FALSE);
    $this->db->from("transaksi, tbbarang");
    $this->db->where("tbbarang.idrumah = transaksi.idrumah");
    $this->db->order_by("buktijual", "DESC");
    $sql = $this->db->get();
    $q = $sql->result();
    $this->db->select("FOUND_ROWS() AS total_row");
    $row = $this->db->get()->row();

    $sEcho = $this->_post('draw');
    $getCountAll = $this->getCountTrans();
    $output = array(
      "draw" => intval($sEcho),
      "recordsTotal" => $getCountAll,
      "recordsFiltered" => $row->total_row,
      "data" => array()
    );

    foreach ($q as $val) {

      if ($val->stats == "Lunas") {
        $stats = '<strong style="color: green;"> Lunas </strong>';
      }else {
        $stats = '<strong style="color: red;"> Belum Lunas </strong>';
      }
      if ($val->jenis_pem == "Pembayaran Tunai") {
        $jenis_pem = '<strong style="color: blue;"> Tunai </strong>';
      }else {
        $jenis_pem = '<strong style="color: #f16807;"> Kredit </strong>';

      }

      $btn = '<a href="'.site_url('rumah/Rumah_det/'.$val->idrumah).'" class="btn btn-success btn-xs" data-toggle="tooltip" title="Detail"><i class="fa fa-bars"></i></a> ';
      if($this->level == 1){
        $btn .= '<a  href="#" data-url="'.site_url('rumah/Rumah_delete/'.$val->idrumah).'" class="btn btn-danger btn-xs btn-deleterumah" data-toggle="tooltip" title="Delete"><i class="fa fa-trash-o"></i></a> <a href="'.site_url('rumah/rumah_edit/'.$val->idrumah).'" class="btn btn-info btn-xs" data-toggle="tooltip" title="Edit"><i class="fa fa-pencil"></i></a>';
      }
      $pic = '<img src="'.site_url('images/Rumah/'.$val->pic).'" style="width: 100px;">';

      $img = '<img src="'.site_url('images/ktp/'.$val->ktp).'" style="width: 100px;">';
      $output['data'][] = array(
        $val->buktijual,
        $val->idrumah,
        $val->blok,
        $pic,
        $jenis_pem,
        $val->nama_konsumen,
        $img,
        $stats,
        // $val->period_y,
        $val->total_bayar,
        $btn
      );
    }
    return $output;
  }
    public function datatableTransaksiKre()
  {
    $array = array("buktijual", "idrumah", "jenis_pem", "nama_konsumen", "ktp", "stats", "total_bayar");
    $start = $this->_post('start');
    $offset = $this->_post('length');
    if ($start != null && $offset != null) {
      $this->db->limit($offset,$start);
    }

    $search = $this->_post('search');
    if($search['value'] != ''){
      $key = $search['value'];
      $this->db->group_start();
      $this->db->like('buktijual', $key);
      $this->db->or_like('nama_konsumen', $key);
      $this->db->group_end();
      $this->session->set_userdata('search_datatable01', $key);
    }else{
      $this->session->unset_userdata('search_datatable01');
    }

    $order = $this->_post('order');
    $column = isset($order[0]['column'])?$order[0]['column']:-1;
    if($column >= 0 && $column < count($array)){
      $ord = $array[$column];
      $by = $order[0]['dir'];
      $this->db->order_by($ord , $by);
    }

    $this->db->select("transaksi.buktijual as buktijual, transaksi.idrumah as idrumah, transaksi.jenis_pem as jenis_pem, transaksi.nama_konsumen as nama_konsumen, transaksi.ktp as ktp, transaksi.stats as stats, transaksi.total_bayar as total_bayar, tbbarang.blok as blok, tbbarang.pictures as pic" ,FALSE);
    $this->db->from("transaksi, tbbarang");
    $this->db->where("tbbarang.idrumah = transaksi.idrumah and transaksi.jenis_pem = 'Pembayaran Kredit'");
    $this->db->order_by("buktijual", "DESC");
    $sql = $this->db->get();
    $q = $sql->result();
    $this->db->select("FOUND_ROWS() AS total_row");
    $row = $this->db->get()->row();

    $sEcho = $this->_post('draw');
    $getCountAll = $this->getCountTrans();
    $output = array(
      "draw" => intval($sEcho),
      "recordsTotal" => $getCountAll,
      "recordsFiltered" => $row->total_row,
      "data" => array()
    );

    foreach ($q as $val) {

      if ($val->stats == "Lunas") {
        $stats = '<strong style="color: green;"> Lunas </strong>';
      }else {
        $stats = '<strong style="color: red;"> Belum Lunas </strong>';
      }
      if ($val->jenis_pem == "Pembayaran Tunai") {
        $jenis_pem = '<strong style="color: blue;"> Tunai </strong>';
      }else {
        $jenis_pem = '<strong style="color: #f16807;"> Kredit </strong>';

      }

      $btn = '<a href="'.site_url('rumah/Rumah_det/'.$val->idrumah).'" class="btn btn-success btn-xs" data-toggle="tooltip" title="Detail"><i class="fa fa-bars"></i></a> ';
      if($this->level == 1){
        $btn .= '<a  href="#" data-url="'.site_url('rumah/Rumah_delete/'.$val->idrumah).'" class="btn btn-danger btn-xs btn-deleterumah" data-toggle="tooltip" title="Delete"><i class="fa fa-trash-o"></i></a> <a href="'.site_url('rumah/rumah_edit/'.$val->idrumah).'" class="btn btn-info btn-xs" data-toggle="tooltip" title="Edit"><i class="fa fa-pencil"></i></a>';
      }
      $pic = '<img src="'.site_url('images/Rumah/'.$val->pic).'" style="width: 100px;">';

      $img = '<img src="'.site_url('images/ktp/'.$val->ktp).'" style="width: 100px;">';
      $output['data'][] = array(
        $val->buktijual,
        $val->idrumah,
        $val->blok,
        $pic,
        $jenis_pem,
        $val->nama_konsumen,
        $img,
        $stats,
        // $val->period_y,
        $val->total_bayar,
        $btn
      );
    }
    return $output;
  }

}
