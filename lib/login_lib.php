<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class login_lib
{
	private $db;
	function __construct()
	{
		$this->db = connect();
	}
	
	
	function is_login()
	{
		if(isset($_SESSION['login']) and $_SESSION['login'] == TRUE)
		{
			$id_user = $_SESSION['id_user'];
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
	
	function is_level($level)
	{
		$level = (string)$level;
		if(isset($_SESSION['level']) and $_SESSION['level'] == $level)
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
	
	public function get_data()
	{
		if(isset($_SESSION['login']) and isset($_SESSION['id_user'])  and isset($_SESSION['level']))
		{
			$data['login'] = $_SESSION['login'];
			$data['id_user'] = $_SESSION['id_user'];
			$data['nama'] = $_SESSION['nama'];
			$data['level'] = $_SESSION['level'];
			return $data;
		}
		else
		{
			return;
		}
	}
	
	public function update_last_activity()
	{
		if($this->is_login())
		{
			$data = $this->get_data();
			$this->db->where('login_usr',$data['id_user']);
			return $this->db->update('tb_login',array('login_last'=>date('Y-m-d H:i:s')));
		}
		else
		{
			return NULL;
		}
	}
		
	function logout()
	{
		unset($_SESSION['login']);
		unset($_SESSION['id_user']);
		unset($_SESSION['nama']);
		unset($_SESSION['level']);
		session_destroy();
		if(!isset($_SESSION['id_user']))
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
	
}
