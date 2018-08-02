<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class m_transaksi extends base
{
	function __construct()
	{
		parent::__construct();
	}

	public function get_transaksi($id=NULL)
	{
		$this->db->join("tb_booking","trs_booking= booking_id");
		$this->db->join("tb_kend_costumer","booking_kendaraan= kendCos_id");
		$this->db->join("tb_costumer","kendCos_costumer= costumer_id");
		$this->db->join("tb_variant","kendCos_variant= variant_id");
		$this->db->join("tb_type","type_id= variant_type");
		if(!is_null($id))
		{
			$this->db->where("trs_id", $id);
			$data =  $this->db->getOne('tb_trservice');
		}
		else
		{
			$data =  $this->db->get('tb_trservice');
		}

		if($this->db->count > 0) {
		    return $data;
		} else {
		    return FALSE;
		}
	}

	public function get_detail_part($id=NULL)
	{
		$this->db->where("dsparepart_transaksi", $id);
		$this->db->join("tb_sparepart","dsparepart_sparepart= 	sparepart_id");
		$data =  $this->db->get('tb_detail_sparepart');

		if($this->db->count > 0) {
		    return $data;
		} else {
		    return FALSE;
		}
	}

	
		public function get_detail_service($id=NULL)
		{
			$this->db->where("dservice_transaksi", $id);
			$this->db->join("tb_service","dservice_service= 	service_id");
			$data =  $this->db->get('tb_detail_service');

			if($this->db->count > 0) {
			    return $data;
			} else {
			    return FALSE;
			}
		}


	public function get_booking()
	{
		$this->db->where("booking_status",2);
		$this->db->where("NOT EXISTS (SELECT * FROM tb_trservice WHERE tb_trservice.trs_booking = tb_booking.booking_id)");
		$this->db->join("tb_kend_costumer","booking_kendaraan= kendCos_id");
		$this->db->join("tb_costumer","kendCos_costumer= costumer_id");
		$this->db->join("tb_variant","kendCos_variant= variant_id");
		$this->db->join("tb_type","type_id= variant_type");
		$data = $this->db->get("tb_booking");

		$json=array();
		foreach($data as $d){
			$json[]=array(
                    'id'=> $d["booking_id"],
                    'value'=> $d["booking_id"]." ".$d['kendCos_nopol'],
					'nopol' => $d['kendCos_nopol'],
					'variant'=> $d['type_nama']." ".$d['variant_nama'],
					'nama'=> $d['costumer_nama'],
                    'telp'=>$d["costumer_telp"],
                    'email'=>$d["costumer_email"],
                    'agama'=>$d["costumer_agama"],
                    'jk'=>$d["costumer_jk"],
                    'identitas'=>$d["costumer_identitas"],
                    'alamat'=>$d["costumer_alamat"],
                    'tgl'=>$d["costumer_tgl"],
            );

		}
		return json_encode($json);

	}

	public function get_dsparepart()
	{
		$data = $this->db->get("tb_sparepart");

		$json=array();
		foreach($data as $d){
			$json[]=array(
                    'id'=> $d["sparepart_id"],
                    'value'=> $d["sparepart_nama"],
					'nama'=> $d['sparepart_nama'],
                    'harga'=>$d["sparepart_harga"]
            );

		}
		return json_encode($json);

	}

	public function get_dservice()
	{
		$data = $this->db->get("tb_service");

		$json=array();
		foreach($data as $d){
			$json[]=array(
                    'id'=> $d["service_id"],
                    'value'=> $d["service_nama"],
					'nama'=> $d['service_nama'],
                    'harga'=>$d["service_harga"]
            );

		}
		return json_encode($json);

	}

	public function get_sparepart()
	{
		$data =  $this->db->get('tb_sparepart');

		if($this->db->count > 0) {
		    return $data;
		} else {
		    return FALSE;
		}
	}

	public function get_service()
	{
		$data =  $this->db->get('tb_service');

		if($this->db->count > 0) {
		    return $data;
		} else {
		    return FALSE;
		}
	}


	public function insert_transaksi($data)
	{
		$proses = $this->db->insert('tb_trservice',$data);
		if ($proses){
			$this->db->orderBy("trs_id","DESC");
			$this->db->where("trs_booking",$data['trs_booking']);
			$this->db->join("tb_booking","booking_id = trs_booking");
			$this->db->join("tb_kend_costumer","kendCos_id = booking_kendaraan");
			$this->db->join("tb_costumer","costumer_id = kendCos_costumer");
			$result = $this->db->getOne("tb_trservice");
			if ($this->db->count > 0){
				return $result;
			}
		}
		return FALSE;
	}

	public function insert_part($data)
	{
		return $this->db->insert('tb_detail_sparepart',$data);
	}
	public function insert_service($data)
	{
		return $this->db->insert('tb_detail_service',$data);
	}

	public function delete($id)
	{
		$this->db->where('dsparepart_transaksi',$id);
		if($this->db->delete('tb_detail_sparepart')){
				$this->db->where('	dservice_transaksi',$id);
				if($this->db->delete('tb_detail_service')){
					$this->db->where('trs_id',$id);
					return $this->db->delete('tb_trservice');
				}
		}
	}
}
