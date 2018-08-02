<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class m_login extends base
{
	function __construct()
	{
		parent::__construct();
	}
	
	public function check_login($data)
	{
		$this->db->where("login_usr", $data['username']);
		$this->db->where("login_pwd", md5($data['password']));
		if($this->db->has("tb_login")) {
		    return TRUE;
		} else {
		    return FALSE;
		}
	}
	
	public function get_userdata($username=NULL)
	{
		if(!is_null($username))
		{
			$this->db->where('login_usr',$username);
			return $this->db->getOne('tb_login');
		}
		else
		{
			return $this->db->get('tb_login');
		}
	}
	
	public function edit($data,$id_user)
	{
		$this->db->where('login_usr',$id_user);
		return $this->db->update('tb_login',$data);
	}
}
