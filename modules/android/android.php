<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class android extends base 
{
	public $m_android;
	private $page;
	private $hasil;
	
	function __construct()
	{
		parent::__construct();
		include_once('model/m_android.php');
		$this->m_android = new m_android();		
	}
	
	function auth()
	{
		
		$this->hasil['hasil']=0;
		if($_POST)
		{
			$data['usr'] = $this->xss->setFilter($_POST['usr'],'blacklist');
			$data['pwd'] = $this->xss->setFilter($_POST['pwd'],'blacklist');
			$login = $this->m_android->dologin($data);
			if ($login){
				$this->hasil['hasil']		= 1;
				$this->hasil['costumer_identitas']	= $login['costumer_identitas'];
				$this->hasil['costumer_nama']		= $login['costumer_nama'];
				$this->hasil['costumer_tempat']		= $login['costumer_tempat'];
				$this->hasil['costumer_tgl']		= date_format(date_create($login['costumer_tgl']),"d/m/Y");
				$this->hasil['costumer_alamat']		= $login['costumer_alamat'];
				$this->hasil['costumer_agama']		= $login['costumer_agama'];
				$this->hasil['costumer_telp']		= $login['costumer_telp'];
				$this->hasil['costumer_email']		= $login['costumer_email'];
				if ($login['costumer_jk']=="L"){
					$this->hasil['costumer_jk']			= "Laki-laki";			
				}else{
					$this->hasil['costumer_jk']			= "Perempuan";					
				}
			}
		}
		echo json_encode($this->hasil);
	}
	
	function registrasi()
	{
		
		$this->hasil['hasil']=0;
		if($_POST)
		{
			$data['costumer_identitas'] = $this->xss->setFilter($_POST['id'],'blacklist');
			$data['costumer_nama'] = $this->xss->setFilter($_POST['nama'],'blacklist');
			$data['costumer_tgl'] = date_format(date_create(str_replace("/","-",$this->xss->setFilter($_POST['lahir'],'blacklist'))),"Y-m-d");
			$data['costumer_tempat'] = $this->xss->setFilter($_POST['tempat'],'blacklist');
			$data['costumer_alamat'] = $this->xss->setFilter($_POST['alamat'],'blacklist');
			$data['costumer_agama'] = $this->xss->setFilter($_POST['agama'],'blacklist');
			$data['costumer_telp'] = $this->xss->setFilter($_POST['telp'],'blacklist');
			$data['costumer_email'] = $this->xss->setFilter($_POST['email'],'blacklist');
			$data['costumer_jk'] = $this->xss->setFilter($_POST['jk'],'blacklist');
			$data['costumer_pwd'] = md5($this->xss->setFilter($_POST['pwd'],'blacklist'));
			if ($this->m_android->check_email($data['costumer_email'])){
				$login = $this->m_android->doRegistrasi($data);
				if ($login){
					$this->hasil['hasil']	= 1;
				}
			}else{
				$this->hasil['hasil']	= 2;				
			}
		}
		echo json_encode($this->hasil);
	}
	
	function master_kendaraan(){
		$data['type'] = $this->m_android->get_type();
		return json_encode($data);
	}
	
	
	function event(){
		$id=null;
		if (isset($_POST['id'])){
			$id = $this->xss->setFilter($_POST['id'],'blacklist');			
		}
		$data['data'] = $this->m_android->get_event($id);
		return json_encode($data);
	}
	
	
	function gantipwd()
	{
		
		$this->hasil['hasil']=0;
		if($_POST)
		{
			$usr = $this->xss->setFilter($_POST['usr'],'blacklist');
			$pwdl = $this->xss->setFilter($_POST['pwdl'],'blacklist');
			$data['costumer_pwd'] = md5($this->xss->setFilter($_POST['pwdb'],'blacklist'));
			if ($this->m_android->check_pwd($usr, $pwdl)){
				$login = $this->m_android->doGantiPWD($data, $usr);
				if ($login){
					$this->hasil['hasil']	= 1;
				}
			}else{
				$this->hasil['hasil']	= 2;				
			}
		}
		echo json_encode($this->hasil);
	}
	
	function kendaraan(){
		$id = null;
		$usr = null;
		$data['data'] = array();
		if (isset($_POST['id'])){
			$id = $this->xss->setFilter($_POST['id'],'blacklist');			
		}
		
		if (isset($_POST['usr'])){
			$usr = $this->xss->setFilter($_POST['usr'],'blacklist');	
			$data['data'] = $this->m_android->get_kendaraan($usr, $id);		
		}
		
		return json_encode($data);
	}
	
	function kendaraan_add(){
		$this->hasil['hasil']=0;
		if ($_POST){
			$usr = $this->xss->setFilter($_POST['usr'],'blacklist');
			$akun = $this->m_android->get_akun($usr);
			$data['kendCos_costumer'] = $akun['costumer_id'];
			$data['kendCos_variant'] = $this->xss->setFilter($_POST['variant'],'blacklist');	
			$data['kendCos_nopol'] = $this->xss->setFilter($_POST['plat'],'blacklist');	
			$data['kendCos_thn'] = $this->xss->setFilter($_POST['tahun'],'blacklist');	
		
			$proses = $this->m_android->insert_kendaraan($data);
			if ($proses){
				$this->hasil['hasil']	= 1;
			}
		}
		return json_encode($this->hasil);
	}
	
	function kendaraan_edit(){
		$this->hasil['hasil']=0;
		if ($_POST){
			$id = $this->xss->setFilter($_POST['id'],'blacklist');
			$data['kendCos_variant'] = $this->xss->setFilter($_POST['variant'],'blacklist');	
			$data['kendCos_nopol'] = $this->xss->setFilter($_POST['plat'],'blacklist');	
			$data['kendCos_thn'] = $this->xss->setFilter($_POST['tahun'],'blacklist');	
		
			$proses = $this->m_android->update_kendaraan($data, $id);
			if ($proses){
				$this->hasil['hasil']	= 1;
			}
		}
		return json_encode($this->hasil);
	}
	
	function kendaraan_delete(){
		$this->hasil['hasil']=0;
		if (isset($_POST['id'])){
			$id = $this->xss->setFilter($_POST['id'],'blacklist');			
		
			$proses = $this->m_android->delete_kendaraan($id);
			if ($proses){
				$this->hasil['hasil']	= 1;
			}
		}
		return json_encode($this->hasil);
	}
	
	
	
	function booking(){
		$usr = null;
		$data['data'] = array();
		
		if (isset($_POST['usr'])){
			$usr = $this->xss->setFilter($_POST['usr'],'blacklist');	
			$data['data'] = $this->m_android->get_booking($usr);		
		}
		
		return json_encode($data);
	}
	
	function booking_add(){
		$this->hasil['hasil']=0;
		if ($_POST){
			$data['booking_kendaraan'] = $this->xss->setFilter($_POST['kendaraan'],'blacklist');
			$data['booking_tgl'] = date_format(date_create(str_replace("/","-",$this->xss->setFilter($_POST['tgl'],'blacklist'))),"Y-m-d");
			$data['booking_jam'] = $this->xss->setFilter($_POST['jam'],'blacklist').":00";	
			$data['booking_catatan'] = $this->xss->setFilter($_POST['catatan'],'blacklist');	
		
			$proses = $this->m_android->insert_booking($data);
			if ($proses){
				$this->hasil['hasil']	= 1;
			}
		}
		return json_encode($this->hasil);
	}
	
	function booking_edit(){
		$this->hasil['hasil']=0;
		if ($_POST){
			$id = $this->xss->setFilter($_POST['booking'],'blacklist');
			$data['booking_kendaraan'] = $this->xss->setFilter($_POST['kendaraan'],'blacklist');
			$data['booking_tgl'] = date_format(date_create(str_replace("/","-",$this->xss->setFilter($_POST['tgl'],'blacklist'))),"Y-m-d");
			$data['booking_jam'] = $this->xss->setFilter($_POST['jam'],'blacklist').":00";	
			$data['booking_catatan'] = $this->xss->setFilter($_POST['catatan'],'blacklist');	
		
			$proses = $this->m_android->update_booking($data, $id);
			if ($proses){
				$this->hasil['hasil']	= 1;
			}
		}
		return json_encode($this->hasil);
	}
	
	
	function booking_delete(){
		$this->hasil['hasil']=0;
		if (isset($_POST['id'])){
			$id = $this->xss->setFilter($_POST['id'],'blacklist');			
		
			$proses = $this->m_android->delete_booking($id);
			if ($proses){
				$this->hasil['hasil']	= 1;
			}
		}
		return json_encode($this->hasil);
	}
	
	
	function riwayat(){
		$id = null;
		$usr = null;
		$data['data'] = array();
		if (isset($_POST['id'])){
			$id = $this->xss->setFilter($_POST['id'],'blacklist');			
		}
		
		if (isset($_POST['usr'])){
			$usr = $this->xss->setFilter($_POST['usr'],'blacklist');	
			$data['data'] = $this->m_android->get_riwayat($usr, $id);		
		}
		
		return json_encode($data);
	}
	
	function saran(){
		$this->hasil['hasil']=0;
		if ($_POST){
			$usr = $this->xss->setFilter($_POST['usr'],'blacklist');
			$akun = $this->m_android->get_akun($usr);
			$data['saran_costumer'] = $akun['costumer_id'];
			$data['saran_isi'] = $this->xss->setFilter($_POST['isi'],'blacklist');
		
			$proses = $this->m_android->insert_saran($data);
			if ($proses){
				$this->hasil['hasil']	= 1;
			}
		}
		return json_encode($this->hasil);
	}
}
