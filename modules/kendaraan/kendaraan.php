<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class kendaraan extends base 
{
	private $m_kendaraan;
	function __construct()
	{
		parent::__construct();
		
		if(!$this->login_lib->is_login())
		{
			redirect(ROOT."?msg=You do not have access !&type_msg=warning&lead_msg=Warning!!!");
		}
		require_once('model/m_kendaraan.php');
		$this->m_kendaraan = new m_kendaraan();
	}
	
	function index()
	{
		$data['variant'] = $this->m_kendaraan->get_variant();
		$data['type'] = $this->m_kendaraan->get_type();
		$this->add_js('
			$(function(){
				
				$(".edittp").click(function(e){
					e.preventDefault();
					
					var id = $(this).attr("data-ref");
					var nama = $(this).attr("data-val");
					
					$("#type_id").val(id);
					$("#type_nama").val(nama);
				});
				$(".editvr").click(function(e){
					e.preventDefault();
					
					var id = $(this).attr("data-ref");
					var nama = $(this).attr("data-val");
					
					$("#variant_id").val(id);
					$("#variant_nama").val(nama);
				});
			});
		','embed');
		$this->output('data.php', $data);
	}
	

	function type_save()
	{
		if($_POST)
		{
			$data['type_nama'] = $this->xss->setFilter($_POST['nama'],'whitelist');
			$id = $this->xss->setFilter($_POST['id'],'whitelist');
			if(in_array("",$data))
			{
				$msg = 'Please fill in the marked (*) !';
				redirect('?m=add&msg='.$msg);
			}
			else
			{
				if ($id!="" || $id !=NULL){
					$proses = $this->m_kendaraan->editType($data,$id);
				}else{
					$proses = $this->m_kendaraan->setType($data);	
				}				
				redirect('kendaraan');				
			}
		}
		else
		{
			show_error();
		}
	}
	

	

	function variant_save()
	{
		if($_POST)
		{
			$data['variant_type'] = $this->xss->setFilter($_POST['type'],'whitelist');
			$data['variant_nama'] = $this->xss->setFilter($_POST['nama'],'whitelist');
			$id = $this->xss->setFilter($_POST['id'],'whitelist');
			if(in_array("",$data))
			{
				$msg = 'Please fill in the marked (*) !';
				redirect('?m=add&msg='.$msg);
			}
			else
			{
				if ($id!="" || $id !=NULL){
					$proses = $this->m_kendaraan->editVariant($data,$id);
				}else{
					$proses = $this->m_kendaraan->setVariant($data);	
				}				
				redirect('kendaraan');				
			}
		}
		else
		{
			show_error();
		}
	}

	
	public function deletetp()
	{		
		if(isset($_GET['id']) and $_GET['id'] !== '0' )
		{
			$id_type = $this->xss->setFilter($_GET['id'],'whitelist');
			$proses = $this->m_kendaraan->delType($id_type);
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
	
	public function deletevr()
	{		
		if(isset($_GET['id']) and $_GET['id'] !== '0' )
		{
			$id_variant = $this->xss->setFilter($_GET['id'],'whitelist');
			$proses = $this->m_kendaraan->delVariant($id_variant);
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