<?php
class Check_email extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
	}
	
	public function Index()
	{
		$this->db->cache_off();
		$email_id = explode("?echeck=", $this->security->xss_clean($_SERVER['REQUEST_URI']));
		if(trim($email_id[1]) == '' || !preg_match("/^[_A-z0-9-]+((\.|\+)[_A-z0-9-]+)*@[A-z0-9-]+(\.[A-z0-9-]+)*(\.[A-z]{2,4})$/",trim($email_id[1])))
		{
			echo "<font color=\"red\">Invalid email Id</font>";
		}
		elseif($this->user_model->check_authenticate($email_id[1],'email'))
		{
			echo "<font color=\"red\"><b>".$email_id[1]."</b> was Taken! Try another one.</font>";
		}
	}
}