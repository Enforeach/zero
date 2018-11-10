<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_article extends CI_Model
{
  private $level;
  function __construct(){
    parent::__construct();
    $this->level = $this->session->userdata('level');
  }
  function _post($name , $xss = true){
    return $this->input->post($name , $xss);
  }
  public function getArticle($idarticle)
  {
    $this->db->select("(article.idarticle) as idarticle, (profile.nama) as nama, (profile.pict) as pict, (article.date) as date, (article.judul) as judul, (article.isi) as isi, (article.cover) as cover");
    $this->db->from("article, profile");
    $this->db->where("profile.username = article.username");
    $this->db->where("idarticle", $idarticle);
    return $this->db->get()->row();
  }

  //ambil data mahasiswa dari database
  function get_article_list($limit, $start){
    $this->db->select("(article.idarticle) as idarticle, (profile.nama) as nama, (profile.pict) as pict, (article.date) as date, (article.judul) as judul, (article.isi) as isi, (article.cover) as cover");
    $this->db->from("profile, article");
    $this->db->where('profile.username = article.username');
    $this->db->limit($limit, $start);
    $query = $this->db->get()->result();
    return $query;
  }

  public function getComment($id, $limit, $start)
  {
    $this->db->select("(comment.idarticle) as idarticle, (profile.nama) as nama,(profile.status) as status, (profile.pict) as pict, (comment.date) as date, (comment.chat) as chat");
    $this->db->from("article, profile, comment");
    $this->db->where("profile.username = comment.username and article.idarticle = comment.idarticle");
    $this->db->where("article.idarticle", $id);
    $this->db->order_by('idcomment', 'desc');

    $this->db->limit($limit, $start);
    return $this->db->get()->result();
  }
  public function save_comment(){
    date_timezone_set("Asia/jakarta");
    $data = array(
      'idarticle'  => $this->input->post('idarticle'), 
      'username'  => $this->input->post('username'), 
      'chat' => $this->input->post('chat'),
      'date' => date('Y-m-d'),
      'time' => date('H:i:s')
    );
    $result=$this->db->insert('comment',$data);
    return $result;
  }
  public function getAllArticle()
  {
    $this->db->select("*");
    $this->db->from("article");
    return $this->db->get()->result();
  }
  public function getAllFArticle()
  {
    $this->db->select("(article.idarticle) as idarticle, (profile.nama) as nama, (profile.pict) as pict, (article.date) as date, (article.judul) as judul, (article.isi) as isi, (article.cover) as cover");
    $this->db->from("profile, article");
    $this->db->where('profile.username = article.username');
    return $this->db->get()->result();
  }
  public function getRecentArticle()
  {
    $this->db->select("*");
    $this->db->from("article");
    $this->db->order_by("idarticle", "DESC");
    $this->db->limit(5);
    return $this->db->get()->result();
  }
  public function getCountArticle()
  {
    $this->db->select("count(idarticle) as total");
    $this->db->from("article");
    $q = $this->db->get()->row();
    return $q->total;
  }
  public function addArticle()
  {
    $cover = $_FILES['cover']['name'];
    $cut = explode(" ", $cover);
    $new = implode("_", $cut);

    $data = array(
      'judul' => $this->input->post('title'),
      'cover' => $new,
      'username' => $this->session->userdata('username'),
      'judul' => $this->input->post('title'),
      'isi' => $this->input->post('content'),
      'date' => date("Y-m-d")
    );
    return $this->db->insert("article", $data);
  }
  public function editArticle($idarticle)
  {
    if($_FILES['cover']['name'] != null){
      $cover = $_FILES['cover']['name'];
      $cut = explode(" ", $cover);
      $new = implode("_", $cut);

      $data = array(
        'title' => $this->input->post('title'),
        'cover' => $new,
        'content' => $this->input->post('content')
      );
    }else{
      $data = array(
        'title' => $this->input->post('title'),
        'content' => $this->input->post('content')
      );
    }
    $this->db->where('idarticle', $idarticle);
    return $this->db->update("article", $data);
  }
  public function deleteArticle($idarticle)
  {
    $this->db->delete("article", array('idarticle' => $idarticle));
    return true;
  }
  public function datatableArticle()
  {
    $array = array("date","title");
    $start = $this->_post('start');
    $offset = $this->_post('length');
    if ($start != null && $offset != null) {
      $this->db->limit($offset,$start);
    }

    $search = $this->_post('search');
    if($search['value'] != ''){
      $key = $search['value'];
      $this->db->like('date', $key);
      $this->db->or_like('title', $key);
    }

    $order = $this->_post('order');
    $column = isset($order[0]['column'])?$order[0]['column']:-1;
    if($column >= 0 && $column < count($array)){
      $ord = $array[$column];
      $by = $order[0]['dir'];
      $this->db->order_by($ord , $by);
    }

    $this->db->select("SQL_CALC_FOUND_ROWS *" ,FALSE);
    $this->db->from("article");
    $this->db->order_by("date", "DESC");
    $sql = $this->db->get();
    $q = $sql->result();
    $this->db->select("FOUND_ROWS() AS total_row");
    $row = $this->db->get()->row();

    $sEcho = $this->_post('draw');
    $getCountAll = $this->getCountArticle();
    $output = array(
      "draw" => intval($sEcho),
      "recordsTotal" => $getCountAll,
      "recordsFiltered" => $row->total_row,
      "data" => array()
    );

    foreach ($q as $val) {
      $btn = '<a href="'.site_url('article/article_read/'.$val->idarticle).'" class="btn btn-primary btn-xs" data-toggle="tooltip" title="View"><i class="fa fa-eye"></i></a> ';
      if($this->level == 1){
        $btn .= '<a href="'.site_url('article/article_edit/'.$val->idarticle).'" class="btn btn-info btn-xs" data-toggle="tooltip" title="Edit"><i class="fa fa-pencil"></i></a>
        <a  href="#" data-url="'.site_url('article/article_delete/'.$val->idarticle).'" class="btn btn-danger btn-xs btn-deleteart" data-toggle="tooltip" title="Delete"><i class="fa fa-trash-o"></i></a>';
      }

      $output['data'][] = array(
        $val->date,
        $val->title,
        $btn
      );
    }
    return $output;
  }
}
