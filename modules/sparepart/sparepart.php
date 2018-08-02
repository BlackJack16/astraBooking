<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class sparepart extends base 
{
	private $m_sparepart;
	function __construct()
	{
		parent::__construct();
		
		if(!$this->login_lib->is_login())
		{
			redirect(ROOT."?msg=You do not have access !&type_msg=warning&lead_msg=Warning!!!");
		}
		require_once('model/m_sparepart.php');
		$this->m_sparepart = new m_sparepart();
	}
	
	function index()
	{
		$data['sparepart'] = $this->m_sparepart->get_data();
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
			$data['sparepart_kode'] = $this->xss->setFilter($_POST['kode'],'whitelist');
			$data['sparepart_nama'] = $this->xss->setFilter($_POST['nama'],'whitelist');
			$data['sparepart_harga'] = $this->xss->setFilter($_POST['harga'],'whitelist');
			
			if(in_array("",$data))
			{
				$msg = 'Please fill in the marked (*) !';
				redirect('?m=add&msg='.$msg);
			}
			else
			{
				$proses = $this->m_sparepart->set_sparepart($data);
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
		$id_sparepart = $this->xss->setFilter($_GET['id'],'blacklist');
		$data['d'] = $this->m_sparepart->get_data($id_sparepart);
		$this->output('edit.php',$data);
	}

	function edit_save()
	{
		if($_POST)
		{
			$id_sparepart = $this->xss->setFilter($_POST['id'],'whitelist');
			$data['sparepart_kode'] = $this->xss->setFilter($_POST['kode'],'whitelist');
			$data['sparepart_nama'] = $this->xss->setFilter($_POST['nama'],'whitelist');
			$data['sparepart_harga'] = $this->xss->setFilter($_POST['harga'],'whitelist');
			
			if(in_array("",$data))
			{
				$msg = 'Please fill in the marked (*) !';
				redirect('?m=edit&msg='.$msg);
			}
			else
			{
				
				$proses = $this->m_sparepart->edit_sparepart($data,$id_sparepart);
				if($proses)
				{
					$msg = 'Data Berhasil Diubah !';
					redirect('?msg='.$msg.'&type_msg=success');
				}
				else
				{
					$msg = 'Data Gagal Diubah !';
					redirect('?m=edit&id='.$id_sparepart.'&msg='.$msg);
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
			$id_sparepart = $this->xss->setFilter($_GET['id'],'blacklist');
			$data['sparepart_status'] = 0 ;
			$proses = $this->m_sparepart->edit_sparepart($data,$id_sparepart);
			if($proses)
			{
				$msg = 'Booking Berhasil Di Hapus !';
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