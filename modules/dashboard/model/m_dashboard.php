<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class m_dashboard extends base
{	
	function __construct()
	{
		parent::__construct();
	} 
		
	public function get_data(){
		$data['booking'] = number_format($this->get_booking(),0,',','.');
		$data['demand'] = number_format($this->get_booking_waiting(),0,',','.');
		$data['terima'] = number_format($this->get_booking_terima(),0,',','.');
		$data['service'] = number_format($this->get_service(),0,',','.');
		
		return $data;
	}
	
	
	private function get_booking(){
		$data = $this->db->getOne("tb_booking","COUNT(*) as jumlah");
		if ($this->db->count > 0){
			return $data['jumlah'];
		}
		return 0;
	}
	private function get_booking_waiting(){
		$this->db->where("booking_status",1);
		$data = $this->db->getOne("tb_booking","COUNT(*) as jumlah");
		if ($this->db->count > 0){
			return $data['jumlah'];
		}
		return 0;
	}
	private function get_booking_terima(){
		$this->db->where("booking_status",2);
		$data = $this->db->getOne("tb_booking","COUNT(*) as jumlah");
		if ($this->db->count > 0){
			return $data['jumlah'];
		}
		return 0;
	}
	private function get_service(){
		$data = $this->db->getOne("tb_trservice","COUNT(*) as jumlah");
		if ($this->db->count > 0){
			return $data['jumlah'];
		}
		return 0;
	}
	
		
}
