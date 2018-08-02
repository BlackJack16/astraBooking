<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class m_sparepart extends base
{
	function __construct()
	{
		parent::__construct();
	}

	public function get_data($id_sparepart=NULL)
	{
		if(!is_null($id_sparepart))
		{
			$this->db->where("sparepart_id", $id_sparepart);
			$data =  $this->db->getOne('tb_sparepart');
		}
		else
		{			

			$this->db->where("sparepart_status", 1);
			$data =  $this->db->get('tb_sparepart');
		}
		
		if($this->db->count > 0) {
		    return $data;
		} else {
		    return FALSE;
		}
	}

	public function set_sparepart($data)
	{
		return $this->db->insert('tb_sparepart',$data);
	}
	
	public function edit_sparepart($data,$id_sparepart)
	{
		$this->db->where('sparepart_id',$id_sparepart);
		return $this->db->update('tb_sparepart',$data);
	}

	public function del_sparepart($id_variant)
	{
		$this->db->where('sparepart_id',$id_sparepart);
		return $this->db->delete('tb_sparepart');
	}


}
