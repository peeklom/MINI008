<?php
class Loginb extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->helper('url');

  }
  function logout()
  {
    setcookie('username','',time()-3600,'/');
    setcookie('password','',time()-3600,'/');
    redirect(base_url('index.php/Chacklogin'));
  }
  function index()
  {
    if(isset($_COOKIE['username'])&& isset($_COOKIE['password']))//isset คือการตรวจสอบค่าว่ามียุมัย
   {
     $this->load->model('book');
     $this->book->setUsername($_COOKIE['username']);
     $this->book->setPassword($_COOKIE['password']);
     if($this->book->login())
     {
       redirect(base_url('index.php/Addbook'));
     }
   }
   if($this->input->post())
   {
     $this->load->model('book');
     $this->book->setUsername($this->input->post('username'));
     $this->book->setPassword($this->input->post('password'));
     if($this->book->login())
     {
       setcookie('username',$this->input->post('username'),(time()+3600),'/');
       setcookie('password',$this->input->post('password'),(time()+3600),'/');
       redirect(base_url('index.php/Addbook'));
     }
     else
     {
         
         echo "<script language='javascript'>alert('  username,password ไม่ถูกต้อง');</script>";
     }
   }
     $this->load->view('home_add');
  }


}
?>
