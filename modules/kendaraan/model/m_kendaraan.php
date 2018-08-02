<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class m_kendaraan extends base
{
	function __construct()
	{
		parent::__construct();
	}
	
	public function get_variant($id_variant=NULL)
	{
		$this->db->orderBy("type_nama","ASC");
		$this->db->orderBy("variant_nama","ASC");
		if(!is_null($id_variant))
		{
			$this->db->where("variant_id", $id_variant);
		}
		
		$this->db->join("tb_type","tb_variant.variant_type = tb_type.type_id");			
		$data= $this->db->get('tb_variant');
			
		
		if($this->db->count > 0) {
		    return $data;
		} else {
		    return FALSE;
		}
	}

	public function get_type()
	{
					
		$data = $this->db->get('tb_type');
		
		
		if($this->db->count > 0) {
		    return $data;
		} else {
		    return FALSE;
		}
	}
	
	
	public function setVariant($data)
	{
		return $this->db->insert('tb_variant',$data);
	}
	
	public function editVariant($data,$id_variant)
	{
		$this->db->where('variant_id',$id_variant);
		return $this->db->update('tb_variant',$data);
	}

	public function delVariant($id_variant)
	{
		$this->db->where('variant_id',$id_variant);
		return $this->db->delete('tb_variant');
	}

	public function setType($data)
	{
		return $this->db->insert('tb_type',$data);
	}
	
	public function editType($data,$id_type)
	{
		$this->db->where('type_id',$id_type);
		return $this->db->update('tb_type',$data);
	}
	
	public function delType($id_type)
	{
		$this->db->where('type_id',$id_type);
		return $this->db->delete('tb_type');
	}
}
