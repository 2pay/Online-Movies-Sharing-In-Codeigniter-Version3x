<?php
class Playlists extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}
	
	function Index()
	{
		$this->session->set_flashdata('msg','<div class="error_message">This feature has been temporarily disabled.</div>');
		redirect(base_url());
		exit(0);
	}
}