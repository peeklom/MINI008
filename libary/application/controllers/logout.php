<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Logout extends CI_Controller
{
  public function index()
  {
    $this->load->helper('url');
    

    if(isset($_COOKIE['username'])&& isset($_COOKIE['password']))
    {
      $this->load->model('book');
      $this->book->setUsername($_COOKIE['username']);
      $this->book->setPassword($_COOKIE['password']);

      if(!$this->book->CheackLogin())
      {
          redirect(base_url('index.php/login_home'));

      }
       
    }
      $this->load->view('show_logout');

  }
}
?>
