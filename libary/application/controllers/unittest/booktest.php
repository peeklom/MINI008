<?php

class BookTest extends CI_Controller
{
	public function index()
	{
		$memberId = 0;

		$this->load->library('unit_test');

		$this->load->model('Book');

		#######################add##################################
		$this->Book->setCodebook('2222');
		$this->Book->setName('peeklom128');
		$this->Book->setAuthor('wijittra');
		

		$test=$this->Book->add();
		$memberId=$test;

		$expected_result='is_int';

		$this->unit->run($test,$expected_result,'UT-01:INSERT TEST ACCOUNT');
		########################Login#################################

		$this->Book->setUsername('admin');
		$this->Book->setPassword('1234');


		$test=$this->Book->Login();
		$expected_result=true;

		$this->unit->run($test,$expected_result,'UT-02:Login Pass');

		#########################Login################################

		$this->Book->setUsername('admi');
		$this->Book->setPassword('1234');

		$test=$this->Book->Login();
		$expected_result=false;

		$this->unit->run($test,$expected_result,'UT-03:Login fail(UserName Not Match)');

		#######################Login##################################

		$this->Book->setUsername('admin');
		$this->Book->setPassword('124');

		$test=$this->Book->Login();
		$expected_result=false;

		$this->unit->run($test,$expected_result,'UT-04:Login  fail(PassWord Not Match)');


		########################Login#################################

		$this->Book->setUsername('admi');
		$this->Book->setPassword('124');

		$test=$this->Book->Login();
		$expected_result=false;
		$this->unit->run($test,$expected_result,'UT-05:Login  fail(UserName and PassWord Not Match)');
		########################report #################################

		$result=$this->Book->findByPk($memberId);

		$test=$result['codebook'];
		$expected_result='2222';

		$this->unit->run($test,$expected_result,'UT-07: codebook Change');

		########################report #################################


		$test=$result['name'];
		$expected_result='peeklom128';

		$this->unit->run($test,$expected_result,'UT-08:name Change');
		########################report #################################


		$test=$result['author'];
		$expected_result='wijittra';

		$this->unit->run($test,$expected_result,'UT-08:author Change');



		echo $this->unit->report();

		###http://localhost/mit/index.php/unittest/membertest



	}
}
?>
