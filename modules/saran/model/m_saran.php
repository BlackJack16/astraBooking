<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class m_saran extends base
{
	function __construct()
	{
		parent::__construct();
	}

	public function get_data($id_saran=NULL)
	{

		$this->db->join("tb_costumer","saran_costumer = costumer_id");
		if(!is_null($id_saran))
		{
			$this->db->where("saran_id", $id_saran);
			$data =  $this->db->getOne('tb_saran');
		}
		else
		{			
			$data =  $this->db->get('tb_saran');
		}
		
		if($this->db->count > 0) {
		    return $data;
		} else {
		    return FALSE;
		}
	}

	

	public function del_saran($id_variant)
	{
		$this->db->where('saran_id',$id_saran);
		return $this->db->delete('tb_saran');
	}


}
