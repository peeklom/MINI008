<?php
class Addmember extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
    $this->load->helper('url');
		$this->load->library('form_validation');
	}

	function adddata()
	{
		if(isset($_COOKIE['username'])&& isset($_COOKIE['password']))//isset คือการตรวจสอบค่าว่ามียุมัย
    {
      $this->load->model('Member');
      $this->Member->setUsername($_COOKIE['username']);
      $this->Member->setPassword($_COOKIE['password']);
      if(!$this->Member->login())
      {
        redirect(base_url('index.php/Chacklogin'));
      }
    }
    else
    {
        redirect(base_url('index.php/Chacklogin'));
    }

    $this->form_validation->set_rules('bookid', 'รหัสหนังสือ', 'required',
			array(
					'required' => 'กรุณากรอก{field}',
		));
    $this->form_validation->set_rules('bookname', 'ชื่อหนังสือ', 'required',
      array(
          'required' => 'กรุณากรอก{field}',
    ));

      $this->form_validation->set_rules('bookauthor', 'ชื่อผู้แต่ง', 'required',
      array(
        'required' => 'กรุณากรอก{field}',

        ));

		//$this->load->library('upload',$config);
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('data');
		}
		else
		{
				$this->load->model('Book');
				$this->Book->setBookid($this->input->post('bookid'));
				$this->Book->setBookname($this->input->post('bookname'));
				$this->Book->setBookauthor($this->input->post('bookauthor'));

       // $this->Member->set('user');


				 $this->Book->add();
			//$this->load->view('homeaddtour');

      $this->load->view('data');
      //echo "<script language='javascript'>alert('  succses!');</script>";
		}


	//	$this->load->view('Homeaddtour');
	}
}
?>
