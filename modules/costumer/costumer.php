<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class costumer extends base 
{
	private $m_costumer;
	function __construct()
	{
		parent::__construct();
		
		if(!$this->login_lib->is_login())
		{
			redirect(ROOT."?msg=You do not have access !&type_msg=warning&lead_msg=Warning!!!");
		}
		require_once('model/m_costumer.php');
		$this->m_costumer = new m_costumer();
	}
	
	function index()
	{
		$data['data'] = $this->m_costumer->get_data();
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
	
	
	function detail()
	{
		if(isset($_GET['id']))
		{
			$id_costumer = $this->xss->setFilter($_GET['id'],'blacklist');
			$data['d'] = $this->m_costumer->get_data($id_costumer);
			$data['kendaraan'] = $this->m_costumer->get_kendaraan($id_costumer);
			$this->add_css('assets/plugins/datatables/css/dataTables.bootstrap.min.css');
			$this->add_js('assets/plugins/datatables/js/jquery.dataTables.min.js');
			$this->add_js('assets/plugins/datatables/js/dataTables.bootstrap.min.js');
			$this->add_js('
			$(function(){
				$(".dataTable").dataTable();
			});
			','embed');
			$this->output('detail.php',$data);
		}
		else
		{
			show_error();
		}
	}

	public function delete()
	{
		
		if(isset($_GET['id']) and $_GET['id'] !== '0' )
		{
			$id_costumer = $this->xss->setFilter($_GET['id'],'whitelist');
			$proses = $this->m_costumer->delete($id_costumer);
			if($proses)
			{
				$msg = 'Data Berhasil Dihapus !';
				redirect('?msg='.$msg.'&type_msg=success');
			}
			else
			{
				$msg = 'Data Gagal Dihapus !';
				redirect('?msg='.$msg);
			}
		}
		else
		{
			show_error();
		}
	}
}