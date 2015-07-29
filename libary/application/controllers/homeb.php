<?php
class Homeb extends CI_Controller
{
   public function index()
  {
    $this->load->helper('url');
    $this->load->view('home_book');
   // $this->load->model('show_home');
  }
  
}

?>
