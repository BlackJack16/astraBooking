<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class m_up extends base
{
	function __construct()
	{
		parent::__construct();
	}
	
	
	public function get_userdata($id_user=NULL)
	{
		if(!is_null($id_user))
		{
			$this->db->where('login_usr',$id_user);
			return $this->db->getOne('tb_login');
		}
		else
		{
			return NULL;
		}
	}
	
	public function update($data){
		$this->db->where('login_usr',$_SESSION['id_user']);
		$proses = $this->db->update('tb_login',$data);
		if($proses)
		{
			$_SESSION['nama'] = $data['nama'];
			return TRUE;
		}
		return FALSE;
	}
}
