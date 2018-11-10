<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_user extends CI_Model
{
  private $level;
  function __construct(){
    parent::__construct();
    $this->level = $this->session->userdata('level');
  }
  public function _post($name , $xss = true){
    return $this->input->post($name , $xss);
  }
  public function doLogin()
  {
    $username = $this->input->post('username');
    $password = $this->input->post('password');

    $this->db->select("*");
    $this->db->from("profile");
    $this->db->where("username", $username);
    $query = $this->db->get()->row();
    if($query != null){
      if($this->_hash_equals($password, $query->password)){
        $data = array(
          'isLogin' => true,
          'username' => $query->username,
          'email' => $query->email,
          'nama' => $query->nama,
          'status' => $query->status,
          'pict' => $query->pict
        );
        $this->session->set_userdata($data);
        return true;
      }else{
        return false;
      }
    }
  }
  function doLogout()
  {
    $this->session->sess_destroy();
    return true;
  }
  public function getUser($iduser)
  {
    $this->db->select("*");
    $this->db->from("profile");
    $this->db->where("iduser", $iduser);
    return $this->db->get()->row();
  }
  public function getAllUser()
  {
    $this->db->select("iduser, username, username");
    $this->db->from("profile");
    return $this->db->get()->result();
  }  
  public function getAll()
  {
    $this->db->select("*");
    $this->db->from("profile");
    $this->db->where("level","1");
    return $this->db->get()->result();
  }
  public function getCountUser()
  {
    $this->db->select("count(iduser) as total");
    $this->db->from("profile");
    $q = $this->db->get()->row();
    return $q->total;
  }
  public function usernameCheck($username)
  {
    $this->db->select("username");
    $this->db->from("profile");
    $this->db->where("username", $username);
    return $this->db->get()->row();
  }
  public function addUser()
  {
    $username = $this->input->post('username');
    $username = $this->input->post('username');
    $gender = $this->input->post('gender');
    $password = $this->input->post('password');
    $hash = $this->_crypt($password);
    $level = $this->input->post('level');
    $access = $this->input->post('access');
    if($access != "" && $level == 2){
      $access = implode(",", $this->input->post('access'));
    }else{
      $access = null;
    }
    if(!$this->usernameCheck($username)){
      $data = array(
        'username' => $username,
        'username' => $username,
        'gender' => $gender,
        'password' => $hash,
        'level' => $level,
        'access' => $access
      );
      $this->db->insert("profile", $data);
      return "success";
    }else{
      return "username_exist";
    }
  }
  public function editUser($iduser)
  {
    $access = "";
    if($this->input->post('level') == 2){
      $access = implode(",", $this->input->post('access'));
    }
    $data = array(
      'username' => $this->input->post('username'),
      'username' => $this->input->post('username'),
      'gender' => $this->input->post('gender'),
      'level' => $this->input->post('level'),
      'access' => $access
    );
    $this->db->where('iduser', $iduser);
    return $this->db->update("profile", $data);
  }
  public function deleteUser($id)
  {
    $this->db->delete("profile", array('iduser' => $id));
    return true;
  }
  public function changepict($iduser)
  {
    $pict = $_FILES['pict']['name'];
    $cut = explode(" ", $pict);
    $new = implode("_", $cut);
    $this->session->set_userdata('pict', $new);
    $data = array(
      'pict' => $new,
    );
    $this->db->where('iduser', $iduser);
    return $this->db->update("profile", $data);
  }
  public function changeName($iduser)
  {
    $data = array(
      'username' => $this->input->post('newnm')
    );
    $this->db->where('iduser', $iduser);
    return $this->db->update("profile", $data);
  }
  public function changeUsername($iduser)
  {
    $data = array(
      'username' => $this->input->post('newunm')
    );
    $this->db->where('iduser', $iduser);
    return $this->db->update("profile", $data);
  }
  public function changePassword($iduser)
  {
    $currentpass = $this->input->post('currentpass');
    $newpass = $this->input->post('newpass');
    $confirmpass = $this->input->post('confirmpass');
    $user = $this->getUser($iduser);
    if($this->_hash_equals($currentpass, $user->password)){
      if($newpass == $confirmpass){
        date_default_timezone_set("Asia/Jakarta");
        $newpassword = $this->_crypt($newpass);
        $lc = date("Y-m-d H:i:s");
        $data = array(
          'password' => $newpassword,
          'lc' => $lc
        );
        $this->db->where('iduser', $iduser);
        $this->db->update("profile", $data);
        return "ok";
        die();
      }else{
        return "not match";
        die();
      }
    }else{
      return "wrong";
      die();
    }
  }
  public function datatableUser()
  {
    $array = array("username","username","gender","level");
    $start = $this->_post('start');
    $offset = $this->_post('length');
    if ($start != null && $offset != null) {
      $this->db->limit($offset,$start);
    }

    $search = $this->_post('search');
    if($search['value'] != ''){
      $key = $search['value'];
      $this->db->like('username', $key);
      $this->db->or_like('username', $key);
      $this->session->set_userdata('search_datatableusr', $key);
    }else{
      $this->session->unset_userdata('search_datatableusr');
    }

    $order = $this->_post('order');
    $column = isset($order[0]['column'])?$order[0]['column']:-1;
    if($column >= 0 && $column < count($array)){
      $ord = $array[$column];
      $by = $order[0]['dir'];
      $this->db->order_by($ord , $by);
    }

    $this->db->select("SQL_CALC_FOUND_ROWS iduser, username, username, gender, level" ,FALSE);
    $this->db->from("profile");
    $sql = $this->db->get();
    $q = $sql->result();
    $this->db->select("FOUND_ROWS() AS total_row");
    $row = $this->db->get()->row();

    $sEcho = $this->_post('draw');
    $getCountAll = $this->getCountUser();
    $output = array(
      "draw" => intval($sEcho),
      "recordsTotal" => $getCountAll,
      "recordsFiltered" => $row->total_row,
      "data" => array()
    );

    foreach ($q as $val) {
      $gen = $val->gender;
      if($gen == 1){
        $gen = "Male";
      }else{
        $gen = "Female";
      }
      $lvl = $val->level;
      if($lvl == 1){
        $lvl = "Document Control";
      }else{
        $lvl = "Administrator";
      }
      $btn = "";
      if($this->level == 1){
        $btn = '<a  href="'.site_url('user/user_edit/'.$val->iduser).'" data-url="'.site_url('user/user_edit/'.$val->iduser).'" class="btn btn-info btn-xs" data-toggle="tooltip" title="Edit"><i class="fa fa-pencil"></i></a> ';
        if($this->session->userdata('iduser') != $val->iduser){
          $btn .= '<a  href="#" data-url="'.site_url('user/user_delete/'.$val->iduser).'" class="btn btn-danger btn-xs btn-deleteuser" data-toggle="tooltip" title="Delete"><i class="fa fa-trash-o"></i></a>';
        }else{
          $btn .= '<div class="btn btn-success btn-xs" data-toggle="tooltip" title="Online"><i class="fa fa-circle"></i></div>';
        }
      }

      $output['data'][] = array(
        $val->username,
        $val->username,
        $gen,
        $lvl,
        $btn
      );
    }
    return $output;
  }
  public function excelUser()
  {
    $key = $this->session->userdata('search_datatableusr');
    $this->db->select("iduser, username, username, gender, level");
    $this->db->from("profile");
    if($key != null){
      $this->db->like('username', $key);
      $this->db->or_like('username', $key);
      $this->db->or_like('nmpic', $key);
    }
    return $this->db->get()->result();
  }
  public function _crypt($password)
  {
    return crypt($password, '$2a$07$qiAs72yuqQwoeKasdSbCakuw83koa82mbaWlaZzAypD$');
  }
  public function _hash_equals($password, $hash)
  {
    if(hash_equals($hash, crypt($password, $hash))){
      return true;
    }else{
      return false;
    }
  }
}