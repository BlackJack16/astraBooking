<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class m_booking extends base
{
	function __construct()
	{
		parent::__construct();
	}
	
	public function get_booking($id=NULL)
	{
		$this->db->orderBy("booking_tgl","DESC");
		$this->db->orderBy("booking_jam","DESC");
		//$this->db->where("booking_status",1);
		$this->db->join("tb_kend_costumer","booking_kendaraan= kendCos_id");
		$this->db->join("tb_costumer","kendCos_costumer= costumer_id");
		$this->db->join("tb_variant","kendCos_variant= variant_id");
		$this->db->join("tb_type","type_id= variant_type");
		if(!is_null($id))
		{
			$this->db->where("booking_id", $id);
			$data =  $this->db->getOne('tb_booking');
		}
		else
		{			
			$data =  $this->db->get('tb_booking');
		}
		
		if($this->db->count > 0) {
		    return $data;
		} else {
		    return FALSE;
		}
	}

		
	public function insert($data)
	{
		return $this->db->insert('tb_booking',$data);
	}
	
	public function edit_booking($data,$id)
	{
		$this->db->where('booking_id',$id);
		$proses =  $this->db->update('tb_booking',$data);
		if ($proses){
			$this->db->where('booking_id',$id);
			$this->db->join("tb_kend_costumer","kendCos_id = booking_kendaraan");
			$this->db->join("tb_costumer","costumer_id = kendCos_costumer");
			$oneData = $this->db->getOne("tb_booking");
			if ($this->db->count > 0){
				return $oneData;
			}
			return FALSE;
		}
		return FALSE;
	}
	
	public function delete($id)
	{
		$this->db->where('booking_id',$id);
		return $this->db->delete('tb_booking');
	}
}
