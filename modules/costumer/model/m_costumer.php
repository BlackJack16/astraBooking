<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class m_costumer extends base
{
	function __construct()
	{
		parent::__construct();
	}
	
	public function get_data($id=NULL)
	{
		if(!is_null($id))
		{
			$this->db->where("costumer_id", $id);
			$data =  $this->db->getOne('tb_costumer');
		}
		else
		{			
			$data =  $this->db->get('tb_costumer');
		}
		
		if($this->db->count > 0) {
		    return $data;
		} else {
		    return FALSE;
		}
	}

	public function get_kendaraan($id=NULL)
	{
		$this->db->join("tb_costumer","kendCos_costumer = costumer_id");
		$this->db->join("tb_variant","kendCos_variant = variant_id");
		if(!is_null($id))
		{
			$this->db->where("kendCos_costumer", $id);
			$data =  $this->db->get('tb_kend_costumer');
		}
		else
		{			
			$data =  $this->db->get('tb_kend_costumer');
		}
		
		if($this->db->count > 0) {
		    return $data;
		} else {
		    return FALSE;
		}
	}
		
	public function insert($data)
	{
		return $this->db->insert('tb_costumer',$data);
	}
	
	public function edit($data,$id)
	{
		$this->db->where('costumer_id',$id);
		return $this->db->update('tb_costumer',$data);
	}
	
	public function delete($id)
	{
		$this->db->where('costumer_id',$id);
		return $this->db->delete('tb_costumer');
	}
}
