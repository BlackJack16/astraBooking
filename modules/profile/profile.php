<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class profile extends base 
{
	private $m_up;
	function __construct()
	{
		parent::__construct();
		if(!$this->login_lib->is_login())
		{
			redirect(ROOT."?msg=You do not have access !&type_msg=warning&lead_msg=Warning!!!");
		}
		require_once('model/m_up.php');
		$this->m_up = new m_up();
	}
	
	function index()
	{
		$data_user = $this->login_lib->get_data();
		$data['d'] = $this->m_up->get_userdata($data_user['id_user']);
		$data['data_user'] = $data_user;
		$this->output('profile.php',$data);
	}
	
	public function edit()
	{
		if($_POST)
		{
			$data_user = $this->login_lib->get_data();
			$id_user = $_SESSION['id_user'];
			$password = $this->xss->setFilter($_POST['password'],'whitelist');
			$c_password = $this->xss->setFilter($_POST['c_password'],'whitelist');
			$data = array();
			
				if(!empty($password))
				{
					$data['login_pwd'] = md5($password);
				}
			if($password != $c_password)
			{
				$msg = 'Password dan Konfirmasi Password harus sama !!!';
				redirect('?msg='.$msg);
			}
			if (count($data)>0){
				$proses = $this->m_up->update($data);
				if($proses)
				{
					$msg = 'Password Berhasil Diubah !';
					redirect('?msg='.$msg.'&type_msg=success');
				}
				else
				{
					$msg = 'Password Gagal Diubah !';
					redirect('?msg='.$msg);
				}
			}
			redirect(ROOT."profile");
		}
		else
		{
			show_error();
		}
	}
}
