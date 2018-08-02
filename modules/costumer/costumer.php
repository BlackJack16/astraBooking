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

	public function registrasi()
	{

		if($_POST)
		{
			$data['costumer_identitas'] = $this->xss->setFilter($_POST['id'],'whitelist');
			$data['costumer_nama'] = $this->xss->setFilter($_POST['nama'],'whitelist');
			$data['costumer_tgl'] = $this->xss->setFilter($_POST['tgl_lahir'],'whitelist');
			$data['costumer_tempat'] = $this->xss->setFilter($_POST['tempat'],'whitelist');
			$data['costumer_alamat'] = $this->xss->setFilter($_POST['alamat'],'whitelist');
			$data['costumer_agama'] = $this->xss->setFilter($_POST['agama'],'whitelist');
			$data['costumer_telp'] = $this->xss->setFilter($_POST['telp'],'whitelist');
			$data['costumer_email'] = $this->xss->setFilter($_POST['email'],'whitelist');
			$data['costumer_jk'] = $this->xss->setFilter($_POST['jk'],'whitelist');
			$data['costumer_pwd'] = md5($this->xss->setFilter($_POST['pwd'],'whitelist'));
			// if(in_array("",$data))
			// {
			// 	$msg = 'Please fill in the marked (*) !';
			// 	redirect('?m=add&msg='.$msg);
			// } else {
				if ($this->m_costumer->check_email($data['costumer_email'])){
					$proses = $this->m_costumer->insert($data);
					if ($proses){
						$msg = 'Data Berhasil Disimpan !';
						redirect('?msg='.$msg.'&type_msg=success');
					}
				}else{
					$msg = 'Data Gagal Disimpan !';
					redirect('?m=add&msg='.$msg);			
				}
			// }
		}
		echo json_encode($this->hasil);
	}
	
	function master_kendaraan(){
		$data['type'] = $this->m_android->get_type();
		return json_encode($data);
	}

}