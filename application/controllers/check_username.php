<?php
class Check_username extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
	}
	
	public function Index()
	{

		$uname = explode("?ucheck=", $this->security->xss_clean($_SERVER['REQUEST_URI']));
		$this->db->cache_off();

		if( trim($uname[1]) == '' || preg_match("/[^A-Za-z0-9_]/", trim($uname[1])) )
		{
			echo "<font color=\"red\">Only letters, numbers and underscore are allowed</font>";
		}
		elseif( strlen(trim($uname[1])) < 4 )
		{
			echo "<font color=\"red\">Username needs to be 4 to 17 characters long.</font>";
		}
		elseif( $this->user_model->check_authenticate($uname[1], 'uname') )
		{
			echo "<font color=\"red\"><b>".$uname[1]."</b> was Taken! Try another one.</font>";
		}
		
	}
}