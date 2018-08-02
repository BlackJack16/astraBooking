<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class m_event extends base
{
	function __construct()
	{
		parent::__construct();
	}
	
	public function get_user(){
		$data = $this->db->get("tb_costumer");
		
		if ($this->db->count > 0){
			return $data;
		}
		return false;
	}

	public function get_data($id_event=NULL)
	{
		if(!is_null($id_event))
		{
			$this->db->where("event_id", $id_event);
			$data =  $this->db->getOne('tb_event');
		}
		else
		{			
			$data =  $this->db->get('tb_event');
		}
		
		if($this->db->count > 0) {
		    return $data;
		} else {
		    return FALSE;
		}
	}

	public function set_event($data)
	{
		$proses = $this->db->insert('tb_event',$data);
		if ($proses){
			$this->db->where("event_nama",$data['event_nama']);
			$this->db->where("event_tgl",$data['event_tgl']);
			$this->db->where("event_akhir",$data['event_akhir']);
			$result = $this->db->getOne('tb_event');
			
			if ($this->db->count > 0){
				return $result;
			}
			return FALSE;
		}
		return FALSE;
	}
	
	public function edit_event($data,$id_event)
	{
		$this->db->where('event_id',$id_event);
		return $this->db->update('tb_event',$data);
	}

	public function del_event($id_event)
	{
		$this->db->where('event_id',$id_event);
		return $this->db->delete('tb_event');
	}


}
