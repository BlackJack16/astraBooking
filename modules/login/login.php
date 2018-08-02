<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class login extends base 
{
	private $m_login;
	
	function __construct()
	{
		parent::__construct();
		include_once('model/m_login.php');
		$this->m_login = new m_login();
	}
	
	public function index()
	{
		$this->output('login_form.php', NULL, TRUE);
		
	}
	
	public function do_login()
	{
		if($this->login_lib->is_login())
		{
			redirect('?c=login');
		}
		if(!empty($_POST))
		{
			$ref = isset($_POST['ref']) ? $_POST['ref'] : NULL;
			$data['username'] = $this->xss->setFilter($_POST['username'],'blacklist');
			$data['password'] = $this->xss->setFilter($_POST['password'],'blacklist');
			$check_login = $this->m_login->check_login($data);
			if($check_login)
			{				
				$data_user = $this->m_login->get_userdata($data['username']);
					$_SESSION['login'] = TRUE;
					$_SESSION['id_user'] = $data_user['login_usr'];
					$_SESSION['nama'] = $data_user['login_nama'];
					$_SESSION['level'] = $data_user['login_level'];
					
					$update['login_last'] = date("Y-m-d H:i:s");
					$proses = $this->m_login->edit($update,$data_user['login_usr']);
					redirect(ROOT);
			}
			else
			{
				echo "<script language=\"Javascript\">\n";
				echo "alert('Username/Password yang Anda masukkan Salah/tidak terdaftar!!!!');";
				echo "</script>";
				echo "<meta http-equiv='refresh' content='0; ".ROOT."'>";
				//redirect('?c=login&msg=Login Gagal. Cek Back Data yang Anda Masukkan !!!');
			}
		}
		else
		{
			return 'FALSE';
		}
	}
	
	public function logout()
	{
		if($this->login_lib->logout())
		{
			redirect(ROOT);
		}
	}
}
