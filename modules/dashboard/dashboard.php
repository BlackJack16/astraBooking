<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class dashboard extends base 
{
	function __construct()
	{
		
		parent::__construct();
		if(!$this->login_lib->is_login())
		{
			redirect(ROOT."?msg=You do not have access !&type_msg=warning&lead_msg=Warning!!!");
		}
		require_once('model/m_dashboard.php');
		
		$this->m_dashboard = new m_dashboard();
	}
	
	function index()
	{
		$data['d'] = $this->m_dashboard->get_data();
		$this->output('view.php',$data);
	}
	
	
}
