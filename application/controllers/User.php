<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends Core
{
  private $level;
  function __construct()
  {
    parent::__construct();
    $this->level = $this->session->userdata('level');
  }
  public function index()
  {
    if($this->isLogin)
    {
      $data['iduser'] = $this->session->userdata('iduser');
      $data['nmuser'] = $this->session->userdata('nmuser');
      $data['allUser'] = $this->m_user->getAllUser();
      $this->renderpage('admin/pages/user', $data);
    }else{
      redirect('admin');
    }
  }
  public function checkUsername($username="")
  {
    if(!$this->isLogin){
      redirect('admin');
      die();
    }
    $check = $this->m_user->usernameCheck($username);
    if($username == ""){

    }else if($check){
      echo "exist";
    }else{
      echo "available";
    }
  }
  public function user_add()
  {
    if(!$this->isLogin){
      redirect('admin');
      die();
    }
    if($this->level == 1){
      $this->form_validation->set_rules('nmuser', 'Name', 'required');
      $this->form_validation->set_rules('username', 'Username', 'required');
      $this->form_validation->set_rules('password', 'Password', 'required');
      $this->form_validation->set_rules('level', 'Level', 'required');
      $data['edit'] = false;
      if($this->form_validation->run() == false){
        $data['alert'] = "";
      }else{
        if($this->m_user->addUser() == "success"){
          $data['alert'] = "success";
        }else if($this->m_user->addUser() == "username_exist"){
          $data['alert'] = "username_exist";
        }
      }
      $this->renderpage('admin/pages/user_add', $data);
    }else{
      redirect('admin');
    }
  }
  public function user_edit($iduser)
  {
    if(!$this->isLogin){
      redirect('admin');
      die();
    }
    if($this->level == 1){
      $this->form_validation->set_rules('nmuser', 'Name', 'required');
      $this->form_validation->set_rules('username', 'Username', 'required');
      $this->form_validation->set_rules('level', 'Level', 'required');
      $data['user'] = $this->m_user->getUser($iduser);
      $data['edit'] = true;
      if($this->form_validation->run() == false){
        $data['alert'] = "";
      }else{
        if($this->m_user->editUser($iduser)){
          $data['alert'] = "success_edit";
        }else{
          $data['alert'] = "failed";
        }
      }
      $this->renderpage('admin/pages/user_add', $data);
    }else{
      redirect('admin');
    }
  }
  public function user_delete($id)
  {
    if(!$this->isLogin){
      redirect('admin');
      die();
    }
    if($this->level == 1){
      $this->m_user->deleteUser($id);
      return true;
    }else{
      redirect('admin');
    }
  }
  public function user_profile($iduser)
  {
    if(!$this->isLogin){ redirect('admin'); }
    if($iduser == null){ redirect('admin'); }
    if(!$this->m_user->getUser($iduser)){ redirect('admin'); }
    if($iduser !== $this->session->userdata('iduser')){ redirect('admin'); }

    $photo = $this->input->post('p');
    $newnm = $this->input->post('newnm');
    $newunm = $this->input->post('newunm');
    $currentpass = $this->input->post('currentpass');
    $newpass = $this->input->post('newpass');
    $confirmpass = $this->input->post('confirmpass');

    $data['profile'] = $this->m_user->getUser($iduser);

    if($photo == "" && $newnm == "" && $newunm == ""){
      $data['alert'] = "";
    }
    if($photo != ""){
      if($this->m_user->changePhoto($iduser)){
        $this->upload_images($_FILES['photo']['name'], './images/profile', 'photo');
        $data['alert'] = "success_change_photo";
      }
    }
    if($newnm != ""){
      if($this->m_user->changeName($iduser)){
        $this->session->set_userdata('nmuser', $newnm);
        $data['alert'] = "success_change_name";
      }
    }
    if($newunm != ""){
      if($this->m_user->changeUsername($iduser)){
        $this->session->set_userdata('username', $newunm);
        $data['alert'] = "success_change_username";
      }
    }
    if($currentpass != "" && $newpass != "" && $confirmpass != ""){
      $cp = $this->m_user->changePassword($iduser);
      if($cp == "ok"){
        $data['alert'] = "success_change_password";
      }else if($cp == "wrong"){
        $data['alert'] = "wrong";
      }else if($cp == "not match"){
        $data['alert'] = "not_match";
      }
    }
    $this->renderpage('admin/pages/user_profile', $data);
  }
  public function user_datatable()
  {
    if(!$this->isLogin){
      redirect('admin');
      die();
    }
    $ret = $this->m_user->datatableUser();
    echo json_encode($ret);
    die();
  }
  public function user_excel()
  {
    if(!$this->isLogin){
      redirect('admin');
      die();
    }
    if($this->level == 1){
      date_default_timezone_set("Asia/Jakarta");
      $objPHPExcel = PHPExcel_IOFactory::load("./files/excel/dinosusr.xltx");
      $objPHPExcel->setActiveSheetIndex(0);
      $date = date("Ymd");
      $data = $this->m_user->excelUser();
      $label = ": ".$this->session->userdata('search_datatableusr');
      $row = 9;
      $n = 1;
      $count = count($data);
      $objPHPExcel->getActiveSheet()->setCellValue("E1", "Exported at ".$date);
      $objPHPExcel->getActiveSheet()->setCellValue("C5", $label);
      $objPHPExcel->getActiveSheet()->insertNewRowBefore(9, $count);
      foreach ($data as $value) {
        if($n % 2 == 1){
          $objPHPExcel->getActiveSheet()->getStyle('A'.$row.':E'.$row)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB('F0F3FA');
        }
        $gender = $value->gender;
        $level = $value->level;
        if($level == 1){ $level = "Document Control"; }else{ $level = "Administrator"; }
        if($gender == 1){ $gender = "Laki-laki"; }else{ $gender = "Perempuan"; }
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(0, $row, $n);
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(1, $row, $value->nmuser);
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(2, $row, $value->username);
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(3, $row, $gender);
        $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(4, $row, $level);
        $row++;
        $n++;
      }
      $filename = $date."-dinosusr.xlsx";
      header('Content-Type: application/vnd.ms-excel'); //mime type
      header('Content-Disposition: attachment;filename="'.$filename.'"');
      header('Cache-Control: max-age=0'); //no cache
      $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
      $objWriter->save('php://output');
    }else{
      redirect('admin');
    }
  }
}
