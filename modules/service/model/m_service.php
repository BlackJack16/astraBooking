<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class m_service extends base
{
	function __construct()
	{
		parent::__construct();
	}

	public function get_data($id_service=NULL)
	{
		if(!is_null($id_service))
		{
			$this->db->where("service_id", $id_service);
			$data =  $this->db->getOne('tb_service');
		}
		else
		{	
			$this->db->where("service_status", 1);	
			$data =  $this->db->get('tb_service');
		}
		
		if($this->db->count > 0) {
		    return $data;
		} else {
		    return FALSE;
		}
	}

	public function set_service($data)
	{
		return $this->db->insert('tb_service',$data);
	}
	
	public function edit_service($data,$id_service)
	{
		$this->db->where('service_id',$id_service);
		return $this->db->update('tb_service',$data);
	}

	public function del_service($id_variant)
	{
		$this->db->where('service_id',$id_service);
		return $this->db->delete('tb_service');
	}


}
