<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class saran extends base 
{
	private $m_saran;
	function __construct()
	{
		parent::__construct();
		
		if(!$this->login_lib->is_login())
		{
			redirect(ROOT."?msg=You do not have access !&type_msg=warning&lead_msg=Warning!!!");
		}
		require_once('model/m_saran.php');
		$this->m_saran = new m_saran();
	}
	
	function index()
	{
		$data['saran'] = $this->m_saran->get_data();
		$this->add_css('assets/plugins/datatables/css/dataTables.bootstrap.min.css');
		$this->add_js('assets/plugins/datatables/js/jquery.dataTables.min.js');
		$this->add_js('assets/plugins/datatables/js/dataTables.bootstrap.min.js');
		$this->add_js('
		$(function(){
			$(".dataTable").dataTable();
		});
		','embed');
		$this->output('data.php',$data);
	}
	
}