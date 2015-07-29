<?php
class Searchbook extends CI_controller
{
  function __construct()
  {
  parent::__construct();
  $this->load->helper('url');
  }

  public function index()
	{

    if($this->input->post('name'))
    {
      $this->load->model('book');
      $data['book'] =$this->book->findByName($this->input->post('name'));
      $this->load->view('home_search',$data);
    }
    else
    {
        
        $data['book']='';
        $this->load->view('home_search',$data);
    }

	}

}


 ?>
