<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

if(!function_exists('connect'))
{
	function connect()
	{
		global $config;
		require_once ("MysqliDb.php");
		
		$db = new Mysqlidb($config);
		if(!$db) 
		return 'Database Error!!!';
		return $db;
	}
}
if(!function_exists('get_cm'))
{
	include_once('login_lib.php');
	function get_cm()
	{
		if (isset($_GET['c']) and ($_GET['c']!="")) {
			$class_name = strtolower(urldecode($_GET['c']));
		}else {
			$login_lib = new login_lib();
			if($login_lib->is_login())
			{
				$class_name = 'dashboard';
			}else{
				$class_name = 'login';
			}
		}

		if (isset($_GET['m']) and ($_GET['m']!="")) {
			$method_name = strtolower(urldecode($_GET['m']));
		} else {
			$method_name = "index";
		}
		
		
		if(file_exists(MODULEPATH.$class_name.'/'.$class_name.'.php') or class_exists(MODULEPATH.$class_name.'/'.$class_name.'.php'))
		{
			require_once(MODULEPATH.$class_name.'/'.$class_name.'.php');
			
			$class = new $class_name();
			if(method_exists($class,$method_name) and is_callable(array($class,$method_name)))
			{
				echo $class->$method_name();
			}
			else
			{
				echo show_error();
			}
		}
		else
		{
			echo show_error();
		}
	}
}

if (!function_exists('redirect'))
{
	function redirect($uri = './', $method = 'location', $http_response_code = 302)
	{
		switch($method)
		{
			case 'refresh'	: header("Refresh:0;url=".$uri);
				break;
			default			: header("Location: ".$uri, TRUE, $http_response_code);
				break;
		}
		exit;
	}
}

if (!function_exists('alert'))
{
	function alert($string,$type='error')
	{
		if(empty($string))
		{
			return;
		}
		
		$alert = "<script>";
		$type= strtolower($type);
		if ($type=="success"){
			$alert .= "toastr.success('Berhasil - ".$string."');";
		}elseif($type=="info"){
			$alert .= "toastr.info('Info - ".$string."');";			
		}elseif($type=="warning"){
			$alert .= "toastr.warning('Peringatan - ".$string."');";			
		}else{
			$alert .= "toastr.error('Gagal - ".$string."');";			
		}
		$alert .="</script>";
		
		return $alert;
	}
}

if (!function_exists('show_error'))
{
	function show_error($page='404')
	{
		require_once(MODULEPATH.'error/error.php');
		$error = new error();
		echo $error->index($page);
	}
}

if (!function_exists('is_ajax_req'))
{
	function is_ajax_req()
	{
		if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest')
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
}

if (!function_exists('send_email'))
{
	function send_email($data)
	{
		$config['priority'] = 1;
		$config['protocol'] = 'smtp';
		$config['smtp_host'] = 'ssl://smtp.gmail.com';
		$config['smtp_port'] = 465;
		$config['smtp_user'] = 'simdatik.banyuasin@gmail.com';
		$config['smtp_pass'] = 'simdatik.perkebunan';
		$config['validate'] = TRUE;
		$config['mailtype'] = 'html';
		$config['charset'] = 'utf-8';
		$config['newline'] = "\r\n";
		
		require_once('email.php');
		$mail = new email($config);
		$mail->from($data['from_email'],$data['from_name']);
		$mail->to($data['to']);
        $mail->subject($data['subject']);
        $mail->message($data['content']);
        if($mail->send())
        {
			$return = TRUE;
        }
		else
		{
			$return = FALSE;
		}
        
        return $return;
	}
}

if (!function_exists('random_digit'))
{
	function random_digit($digits)
	{
		return rand(pow(10, $digits - 1) - 1, pow(10, $digits) - 1);
	}
}

if (!function_exists('angka_indo'))
{
	function angka_indo($angka,$digits_comma=0)
	{
		return number_format($angka,$digits_comma,',','.');
	}
}

if (!function_exists('tgl_indo'))
{
	function tgl_indo($tgl,$jam=FALSE)
	{
		$tanggal = substr($tgl,8,2);
		$bulan = bulan(substr($tgl,5,2));
		$tahun = substr($tgl,0,4);
		
		$hasil = $tanggal.' '.$bulan.' '.$tahun;
		if($jam)
		{
			$hasil .= ' '.substr($tgl,11,8);
		}
		
		return $hasil;
	}
}

if(!function_exists('bulan'))
{
    function bulan($input)
    {
    $output='';
        if($input=='1'){$output='Jan';}
        if($input=='2'){$output='Feb';}
        if($input=='3'){$output='Mar';}
        if($input=='4'){$output='Apr';}
        if($input=='5'){$output='Mei';}
        if($input=='6'){$output='Jun';}
        if($input=='7'){$output='Jul';}
        if($input=='8'){$output='Ags';}
        if($input=='9'){$output='Sep';}
        if($input=='10'){$output='Okt';}
        if($input=='11'){$output='Nov';}
        if($input=='12'){$output='Des';}
        return $output;
    }
}


if(!function_exists('fullbulan'))
{
    function fullbulan($input)
    {
    $output='';
        if($input=='1'){$output='Januari';}
        if($input=='2'){$output='Febriari';}
        if($input=='3'){$output='Maret';}
        if($input=='4'){$output='April';}
        if($input=='5'){$output='Mei';}
        if($input=='6'){$output='Juni';}
        if($input=='7'){$output='Juli';}
        if($input=='8'){$output='Agustus';}
        if($input=='9'){$output='September';}
        if($input=='10'){$output='Oktober';}
        if($input=='11'){$output='November';}
        if($input=='12'){$output='Desember';}
        return $output;
    }
}

if(!function_exists('nullToEmpty'))
{
	function nullToEmpty($string){
		if (is_null($string)){
			return "";
		}
		return $string;
	}
}

if(!function_exists('pageURL'))
{
	function pageURL(){
		$pageURL = (@$_SERVER["HTTPS"] == "on") ? "https://" : "http://";
		if ($_SERVER["SERVER_PORT"] != "80")
		{
			$pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
		} 
		else 
		{
			$pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
		}
		return $pageURL;
	}
}

if(!function_exists('hari'))
{
    function hari($input)
    {
    $output='';
        if($input==1){$output='Senin';}
        if($input==2){$output='Selasa';}
        if($input==3){$output='Rabu';}
        if($input==4){$output='Kamis';}
        if($input==5){$output='Jumat';}
        if($input==6){$output='Sabtu';}
        if($input==7){$output='Minggu';}
        return $output;
    }
}

if(!function_exists('send_sms'))
{
	function send_sms($hp,$pesan)
	{
		$userkey = '0fp4rm';
		$passkey = 'testing';
		$url = "https://reguler.zenziva.net/apps/smsapi.php";
		$curlHandle = curl_init();
		
		curl_setopt($curlHandle, CURLOPT_URL, $url);

		curl_setopt($curlHandle, CURLOPT_POSTFIELDS, 'userkey='.$userkey.'&passkey='.$passkey.'&nohp='.$hp.'&pesan='.urlencode($pesan));

		curl_setopt($curlHandle, CURLOPT_HEADER, 0);

		curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, 1);

		curl_setopt($curlHandle, CURLOPT_SSL_VERIFYHOST, 2);

		curl_setopt($curlHandle, CURLOPT_SSL_VERIFYPEER, 0);

		curl_setopt($curlHandle, CURLOPT_TIMEOUT,30);

		curl_setopt($curlHandle, CURLOPT_POST, 1);

		$results = curl_exec($curlHandle);

		curl_close($curlHandle);
		
		$response = new SimpleXMLElement($results);
		
		return array('status'=>strtolower($response->message->text),'hp'=>$response->message->to);
	}
}

if(!function_exists('word_limiter'))
{
	function word_limiter($str, $limit = 10) 
	{
	    //break str$dateg based upon space
		$str_array = explode(" ", strip_tags($str)); 
	 
		//return the extracted str$dateg with our word limit $date place
		return implode(" ", array_splice($str_array, 0, $limit)); 
	}
}


if(!function_exists('selected'))
{
	function selected($param1, $param2){
		if ($param1==$param2){
			return " selected ";
		}
		return "";
	}
}

if(!function_exists('sendNotif'))
{
	function sendNotif($uniqueid, $kategori, $id_content, $content){
		global $con;
		require_once 'lib/firebaseInterface.php';
		require_once 'lib/firebaseLib.php';
		require_once 'lib/firebaseStub.php';
	
		$firebase = new \Firebase\FirebaseLib(FIREBASE_URL,'');
	
		
		$firebase->set($uniqueid.'/'.$kategori.'/'.$id_content, $content);
	}
}
?>