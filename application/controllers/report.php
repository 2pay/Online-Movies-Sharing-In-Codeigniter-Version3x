<?php
class Report extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}
	
	function Index()
	{
		$this->load->view('report/report');
	}
}
