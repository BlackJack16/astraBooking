<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class m_android extends base
{
	function __construct()
	{
		parent::__construct();
	}
	
	public function dologin($param)
	{
		$usr = $param['usr'];
		$pwd = $param['pwd'];
		
		$this->db->where("costumer_email", $usr);
		$this->db->where("costumer_pwd=MD5('$pwd')");
		$data = $this->db->getOne("tb_costumer");
	
		
		if($this->db->count > 0) {			
			return $data;
		}
		return FALSE;
	}
	
	
	public function get_akun($usr)
	{		
		$this->db->where("costumer_email", $usr);
		$data = $this->db->getOne("tb_costumer");
	
		
		if($this->db->count > 0) {			
			return $data;
		}
		return FALSE;
	}
	
	
	public function check_email($usr)
	{		
		$this->db->where("costumer_email", $usr);
		$data = $this->db->get("tb_costumer");
	
		
		if($this->db->count > 0) {			
			return FALSE;
		}
		return TRUE;
	}
	
	
	public function get_event($id=null)
	{		
		if (!is_null($id)){
			$this->db->where("event_id",$id);
			$data = $this->db->getOne("tb_event");
		}else{
			$data = $this->db->get("tb_event");
		}
	
		
		if($this->db->count > 0) {
			if (!is_null($id)){
				$d = $data;
				
				$item = array();
				$item['event_id'] = $d['event_id'];
				$item['event_nama'] = $d['event_nama'];
				$item['event_ket'] = $d['event_ket'];
				$item['event_foto'] = $d['event_foto'];
				$item['event_periode'] = date_format(date_create($d['event_tgl']),"d")." ".fullbulan(date_format(date_create($d['event_tgl']),"n"))." ".date_format(date_create($d['event_tgl']),"Y")." - ".date_format(date_create($d['event_akhir']),"d")." ".fullbulan(date_format(date_create($d['event_akhir']),"n"))." ".date_format(date_create($d['event_akhir']),"Y");
				return $item;
			}else{
				$result = array();
				foreach($data as $d){
					$item = array();
					$item['event_id'] = $d['event_id'];
					$item['event_nama'] = $d['event_nama'];
					$item['event_ket'] = $d['event_ket'];
					$item['event_foto'] = $d['event_foto'];
					$item['event_periode'] = date_format(date_create($d['event_tgl']),"d")." ".fullbulan(date_format(date_create($d['event_tgl']),"n"))." ".date_format(date_create($d['event_tgl']),"Y")." - ".date_format(date_create($d['event_akhir']),"d")." ".fullbulan(date_format(date_create($d['event_akhir']),"n"))." ".date_format(date_create($d['event_akhir']),"Y");
					
					array_push($result, $item);
				}
				return $result;
			}
		}
		return TRUE;
	}
	
	
	public function get_type()
	{		
		$data = $this->db->get("tb_type");	
		
		if($this->db->count > 0) {
			$result = array();
			foreach($data as $d){
				$item = array();
				$item = $d;
				$this->db->where("variant_type",$d['type_id']);
				$item['variant'] = $this->db->get("tb_variant");
				array_push($result, $item);
			}
			return $result;
		}
		return TRUE;
	}
	
	public function get_kendaraan($usr, $id=null)
	{
		$this->db->orderBy("kendCos_id","DESC");
		if (!is_null($id)){	
			$this->db->where("kendCos_id", $id);
		}
		$this->db->where("costumer_email", $usr);
		$this->db->where("kendCos_status", 1);
		$this->db->join("tb_variant","kendCos_variant= variant_id");
		$this->db->join("tb_type","type_id= variant_type");
		$this->db->join("tb_costumer","costumer_id= kendCos_costumer");
		$data = $this->db->get("tb_kend_costumer",null,"tb_kend_costumer.*, tb_type.*, tb_variant.*");
	
		
		if($this->db->count > 0) {			
			return $data;
		}
		return null;
	}
	
	
	public function get_booking($usr)
	{
		$this->db->orderBy("booking_id","DESC");
		$this->db->where("costumer_email", $usr);
		$this->db->join("tb_kend_costumer","kendCos_id= booking_kendaraan");
		$this->db->join("tb_variant","kendCos_variant= variant_id");
		$this->db->join("tb_type","type_id= variant_type");
		$this->db->join("tb_costumer","costumer_id= kendCos_costumer");
		$data = $this->db->get("tb_booking",null,"tb_booking.*, tb_kend_costumer.*, tb_type.*, tb_variant.*");
		
		if($this->db->count > 0) {
			$result = array();
			foreach($data as $d){
				$item = array();
				$item['booking_id'] = $d['booking_id'];
				$item['booking_status'] = $d['booking_status'];
				$item['booking_catatan'] = nullToEmpty($d['booking_catatan']);
				$item['booking_keterangan'] = nullToEmpty($d['booking_keterangan']);
				$item['booking_tgl'] = date_format(date_create($d['booking_tgl']),"d/m/Y");
				$item['jam'] = date_format(date_create($d['booking_jam']),"H");
				$item['menit'] = date_format(date_create($d['booking_jam']),"i");
				$item['type_nama'] =$d['type_nama'];
				$item['variant_nama'] =$d['variant_nama'];
				$item['kendCos_id'] =$d['kendCos_id'];
				$item['kendCos_thn'] =$d['kendCos_thn'];
				$item['kendCos_nopol'] =$d['kendCos_nopol'];
				$item['booking_jadwal'] = date_format(date_create($d['booking_tgl']),"d")." ".bulan(date_format(date_create($d['booking_tgl']),"n"))." ".date_format(date_create($d['booking_tgl']),"Y")." ".date_format(date_create($d['booking_jam']),"H:i");
				
				array_push($result,$item);
			}
			return $result;
		}
		return null;
	}
	
	
	public function get_riwayat($usr, $id=null)
	{
		
		$this->db->orderBy("booking_id","DESC");
		$this->db->where("costumer_email", $usr);
		$this->db->join("tb_booking","booking_id= trs_booking");
		$this->db->join("tb_kend_costumer","kendCos_id= booking_kendaraan");
		$this->db->join("tb_variant","kendCos_variant= variant_id");
		$this->db->join("tb_type","type_id= variant_type");
		$this->db->join("tb_costumer","costumer_id= kendCos_costumer");
		$this->db->join("(SELECT dsparepart_transaksi, SUM(dsparepart_harga) as total_part FROM tb_detail_sparepart GROUP BY dsparepart_transaksi) as sparepart","dsparepart_transaksi= trs_id");
		$this->db->join("(SELECT dservice_transaksi, SUM(dservice_harga) as total_service FROM tb_detail_service GROUP BY dservice_transaksi) as service","dservice_transaksi= trs_id");
		
		if (!is_null($id)){
			$this->db->where("trs_id",$id);
			$data = $this->db->getOne("tb_trservice","service.*, sparepart.*,tb_trservice.*, tb_booking.*, tb_kend_costumer.*, tb_type.*, tb_variant.*");
		}else{
			$data = $this->db->get("tb_trservice",null,"service.*, sparepart.*, tb_trservice.*, tb_booking.*, tb_kend_costumer.*, tb_type.*, tb_variant.*");
		}
		
		if($this->db->count > 0) {
			if (!is_null($id)){
					$d = $data;
					$item = array();
					$item['booking_id'] = $d['booking_id'];
					$item['booking_jadwal'] = date_format(date_create($d['booking_tgl']),"d")." ".bulan(date_format(date_create($d['booking_tgl']),"n"))." ".date_format(date_create($d['booking_tgl']),"Y")." ".date_format(date_create($d['booking_jam']),"H:i");
					$item['booking_catatan'] = nullToEmpty($d['booking_catatan']);
					$item['type_nama'] =$d['type_nama'];
					$item['variant_nama'] =$d['variant_nama'];
					$item['kendCos_id'] =$d['kendCos_id'];
					$item['kendCos_thn'] =$d['kendCos_thn'];
					$item['kendCos_nopol'] =$d['kendCos_nopol'];
					$item['total_part'] = number_format($d['total_part'],0,',','.');
					$item['total_service'] = number_format($d['total_service'],0,',','.');
					$item['total'] = number_format($d['total_part'] + $d['total_service'],0,',','.');
					$item['sparepart'] = $this->get_detail_sparepart($d['trs_id']);
					$item['service'] = $this->get_detail_service($d['trs_id']);
					return $item;
			}else{
				$result = array();
				foreach($data as $d){
					$item = array();
					$item['trs_id'] = $d['trs_id'];
					$item['booking_id'] = $d['booking_id'];
					$item['type_nama'] =$d['type_nama'];
					$item['variant_nama'] =$d['variant_nama'];
					$item['kendCos_thn'] =$d['kendCos_thn'];
					$item['kendCos_nopol'] =$d['kendCos_nopol'];
					$item['total'] = number_format($d['total_part'] + $d['total_service'],0,',','.');
					$item['booking_jadwal'] = date_format(date_create($d['booking_tgl']),"d")." ".bulan(date_format(date_create($d['booking_tgl']),"n"))." ".date_format(date_create($d['booking_tgl']),"Y")." ".date_format(date_create($d['booking_jam']),"H:i");
					
					array_push($result,$item);
				}
				return $result;
			}
		}
		return null;
	}
	
	private function get_detail_sparepart($id){
		$this->db->where("dsparepart_transaksi",$id);
		$this->db->join("tb_sparepart","sparepart_id= dsparepart_sparepart");
		$data = $this->db->get("tb_detail_sparepart");
		if($this->db->count > 0) {
			return $data;
		}
		return FALSE;
	}
	private function get_detail_service($id){
		$this->db->where("dservice_transaksi",$id);
		$this->db->join("tb_service","service_id= dservice_service");
		$data = $this->db->get("tb_detail_service");
		if($this->db->count > 0) {
			return $data;
		}
		return FALSE;
	}
	
	
	public function insert_kendaraan($data)
	{
		return $this->db->insert("tb_kend_costumer", $data);
	}
	
	public function update_kendaraan($data, $id)
	{
		$this->db->where("kendCos_id", $id);
		return $this->db->update("tb_kend_costumer", $data);
	}
	
	public function delete_kendaraan($id)
	{
		$data['kendCos_status'] = 0;
		$this->db->where("kendCos_id", $id);
		return $this->db->update("tb_kend_costumer", $data);
	}
	
	
	public function insert_booking($data)
	{
		return $this->db->insert("tb_booking", $data);
	}
	
	public function update_booking($data, $id)
	{
		$this->db->where("booking_id", $id);
		return $this->db->update("tb_booking", $data);
	}
	
	public function delete_booking($id)
	{
		$this->db->where("booking_id", $id);
		return $this->db->delete("tb_booking");
	}
	
	
	public function check_pwd($usr, $pwd)
	{		
		$this->db->where("costumer_email", $usr);
		$this->db->where("costumer_pwd=MD5('$pwd')");
		$data = $this->db->getOne("tb_costumer");
	
		
		if($this->db->count > 0) {			
			return TRUE;
		}
		return FALSE;
	}
	
	public function doRegistrasi($data)
	{
		return $this->db->insert("tb_costumer", $data);
	}
	
	
	public function doGantiPWD($data, $usr)
	{
		$this->db->where("costumer_email", $usr);
		return $this->db->update("tb_costumer", $data);
	}
	
	
	public function insert_saran($data)
	{
		return $this->db->insert("tb_saran", $data);
	}
	
}
