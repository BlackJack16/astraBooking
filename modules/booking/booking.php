<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class booking extends base 
{
	private $m_booking;
	function __construct()
	{
		parent::__construct();
		
		if(!$this->login_lib->is_login())
		{
			redirect(ROOT."?msg=You do not have access !&type_msg=warning&lead_msg=Warning!!!");
		}
		require_once('model/m_booking.php');
		$this->m_booking = new m_booking();
	}
	
	function index()
	{
		$data['booking'] = $this->m_booking->get_booking();
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


	function cancel()
	{
		if(isset($_GET['id']) and $_GET['id'] !== '0' )
		{
			$id_booking = $this->xss->setFilter($_GET['id'],'blacklist');
			$data['booking_status'] = 0 ;
			$proses = $this->m_booking->edit_booking($data,$id_booking);
			if($proses)
			{				
				sendNotif($proses['costumer_identitas'],"booking", $proses['booking_id'],"Booking Penuh, Silahkan pilih jam atau hari lain!");

				$msg = 'Booking Berhasil Di Cancel !';
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

	
	function submit()
	{
		if(isset($_GET['id']) and $_GET['id'] !== '0' )
		{
			$id_booking = $this->xss->setFilter($_GET['id'],'blacklist');
			$data['booking_status'] = 2 ;
			$proses = $this->m_booking->edit_booking($data,$id_booking);
			if($proses)
			{
				sendNotif($proses['costumer_identitas'],"booking", $proses['booking_id'],"Jadwal Booking Service Anda telah diterima !");

				$msg = 'Booking Berhasil Di Terima !';
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

	
	function detail()
	{
		if(isset($_GET['id']))
		{
			$id_booking = $this->xss->setFilter($_GET['id'],'blacklist');
			$data['d'] = $this->m_booking->get_booking($id_booking);
			
			$this->output('detail.php',$data);
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
			$id_booking = $this->xss->setFilter($_GET['id'],'whitelist');
			$proses = $this->m_booking->del_booking($id_booking);
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