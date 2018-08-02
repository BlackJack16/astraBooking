<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class event extends base
{
	private $m_event;
	function __construct()
	{
		parent::__construct();

		if(!$this->login_lib->is_login())
		{
			redirect(ROOT."?msg=You do not have access !&type_msg=warning&lead_msg=Warning!!!");
		}
		require_once('model/m_event.php');
		$this->m_event = new m_event();
	}

	function index()
	{
		$data['event'] = $this->m_event->get_data();
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
		$this->add_css('assets/plugins/bootstrap-datepicker-master/dist/css/bootstrap-datepicker3.min.css');
		$this->add_js('assets/plugins/bootstrap-datepicker-master/dist/js/bootstrap-datepicker.min.js');
		$this->add_js('assets/plugins/moment/moment.js');
		$this->add_js('
		$(function(){
			$(".datepicker").datepicker();
		});
		','embed');
		$this->output('add.php');
	}

	function add_save()
	{
		if($_POST)
		{
			$data['event_nama'] = $this->xss->setFilter($_POST['nama'],'whitelist');
			$data['event_ket'] = $this->xss->setFilter($_POST['keterangan'],'whitelist');
			$data['event_tgl'] = $this->xss->setFilter($_POST['tgl_open'],'whitelist');
			$data['event_akhir'] = $this->xss->setFilter($_POST['tgl_close'],'whitelist');

			if(in_array("",$data))
			{
				$msg = 'Please fill in the marked (*) !';
				redirect('?m=add&msg='.$msg);
			}
			else
			{
				$filename = md5($data['event_nama']."_".date('YmdHis'));
				$data['event_foto'] = $this->upload($filename);
				if ($data['event_foto']){
					$proses = $this->m_event->set_event($data);
					if($proses)
					{
						$customer = $this->m_event->get_user();
						if ($customer){
							foreach($customer as $c){
								sendNotif($c['costumer_identitas'],"event", $proses['event_id'],$proses['event_nama']);
							}
						}
						$msg = 'Data Berhasil Disimpan !';
						redirect('?msg='.$msg.'&type_msg=success');
					}
					else
					{
						$msg = 'Data Gagal Disimpan !';
						redirect('?m=add&msg='.$msg);
					}
				}else{
					$msg = 'Foto Gagal Diupload !';
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
		$id_event = $this->xss->setFilter($_GET['id'],'blacklist');
		$data['d'] = $this->m_event->get_data($id_event);
		$this->add_css('assets/plugins/bootstrap-datepicker-master/dist/css/bootstrap-datepicker3.min.css');
		$this->add_js('assets/plugins/bootstrap-datepicker-master/dist/js/bootstrap-datepicker.min.js');
		$this->add_js('assets/plugins/moment/moment.js');
		$this->add_js('
		$(function(){
			$(".datepicker").datepicker();
		});
		','embed');

		$this->output('edit.php',$data);
	}

	function edit_save()
	{
		if($_POST)
		{
			$id_event = $this->xss->setFilter($_POST['id'],'whitelist');
			$data['event_nama'] = $this->xss->setFilter($_POST['nama'],'whitelist');
			$data['event_ket'] = $this->xss->setFilter($_POST['keterangan'],'whitelist');
			$data['event_tgl'] = $this->xss->setFilter($_POST['tgl_open'],'whitelist');
			$data['event_akhir'] = $this->xss->setFilter($_POST['tgl_close'],'whitelist');

			if(in_array("",$data))
			{
				$msg = 'Please fill in the marked (*) !';
				redirect('?m=edit&msg='.$msg);
			}
			else
			{

				$filename = md5($data['event_nama']."_".date('YmdHis'));
				if ($_FILES['data']['error'] == 0){
					$data['event_foto'] = $this->upload($filename);
				}
				$proses = $this->m_event->edit_event($data,$id_event);
				if($proses)
				{
					$msg = 'Data Berhasil Diubah !';
					redirect('?msg='.$msg.'&type_msg=success');
				}
				else
				{
					$msg = 'Data Gagal Diubah !';
					redirect('?m=edit&id='.$id_event.'&msg='.$msg);
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
			$id_event = $this->xss->setFilter($_GET['id'],'whitelist');
			$proses = $this->m_event->del_event($id_event);
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


	private function upload($filename){
		$msg = FALSE;
		$target_dir = "data/";
		$ext = strtolower(pathinfo($_FILES["data"]["name"],PATHINFO_EXTENSION));
		$filename=$filename.'.'.$ext;
		$target_file = $target_dir . $filename;
		if (getimagesize($_FILES["data"]["tmp_name"])<=0){
				$msg .= "Format foto salah.\n";
		}
		if($ext != "jpg" && $ext != "png" && $ext != "jpeg" && $ext != "gif" ) {
				$msg .= "File ini bukan foto.\n";
		}

		if (!$msg){
			if (move_uploaded_file($_FILES["data"]["tmp_name"], $target_file)) {
				return $filename;
			}
			$msg .= "Foto gagal diupload.\n Silahkan coba lagi";
		}
		return FALSE;
	}

}
