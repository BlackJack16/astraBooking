<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class service extends base 
{
	private $m_service;
	function __construct()
	{
		parent::__construct();
		
		if(!$this->login_lib->is_login())
		{
			redirect(ROOT."?msg=You do not have access !&type_msg=warning&lead_msg=Warning!!!");
		}
		require_once('model/m_service.php');
		$this->m_service = new m_service();
	}
	
	function index()
	{
		$data['service'] = $this->m_service->get_data();
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

	function add()
	{
		
		$this->output('add.php');
	}
	
	function add_save()
	{
		if($_POST)
		{
			$data['service_nama'] = $this->xss->setFilter($_POST['nama'],'whitelist');
			$data['service_harga'] = $this->xss->setFilter($_POST['harga'],'whitelist');
			
			if(in_array("",$data))
			{
				$msg = 'Please fill in the marked (*) !';
				redirect('?m=add&msg='.$msg);
			}
			else
			{
				$proses = $this->m_service->set_service($data);
				if($proses)
				{
					$msg = 'Data Berhasil Disimpan !';
					redirect('?msg='.$msg.'&type_msg=success');
				}
				else
				{
					$msg = 'Data Gagal Disimpan !';
					redirect('?m=add&msg='.$msg);
				}
			}
		}
		else
		{
			show_error();
		}
	}

	function edit()
	{
		$id_service = $this->xss->setFilter($_GET['id'],'blacklist');
		$data['d'] = $this->m_service->get_data($id_service);
		$this->output('edit.php',$data);
	}

	function edit_save()
	{
		if($_POST)
		{
			$id_service = $this->xss->setFilter($_POST['id'],'whitelist');
			$data['service_nama'] = $this->xss->setFilter($_POST['nama'],'whitelist');
			$data['service_harga'] = $this->xss->setFilter($_POST['harga'],'whitelist');
			
			if(in_array("",$data))
			{
				$msg = 'Please fill in the marked (*) !';
				redirect('?m=edit&msg='.$msg);
			}
			else
			{
				
				$proses = $this->m_service->edit_service($data,$id_service);
				if($proses)
				{
					$msg = 'Data Berhasil Diubah !';
					redirect('?msg='.$msg.'&type_msg=success');
				}
				else
				{
					$msg = 'Data Gagal Diubah !';
					redirect('?m=edit&id='.$id_service.'&msg='.$msg);
				}
			}
		}
		else
		{
			show_error();
		}
	}
	

	function delete()
	{
		if(isset($_GET['id']) and $_GET['id'] !== '0' )
		{
			$id_service = $this->xss->setFilter($_GET['id'],'blacklist');
			$data['service_status'] = 0 ;
			$proses = $this->m_service->edit_service($data,$id_service);
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