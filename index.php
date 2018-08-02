<?php
session_start();
error_reporting(E_ALL);
date_default_timezone_set("Asia/Jakarta");

$base_url = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on") ? "https" : "http");
$base_url .= "://".$_SERVER['HTTP_HOST'];
$home=$base_url;
$base_url .= str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']);
define('PATH',getcwd());
define('HOME','..');
define('ROOT',$base_url);
define('BASEPATH','./');
define('MODULEPATH','modules/');
define('LIBPATH','lib/');
define('EXT','.php');
define('FIREBASE_URL','https://honda-service-booking.firebaseio.com/');
require_once(LIBPATH.'config.php');
require_once(LIBPATH.'common.php');

class base {
	public $_styles = array();
	public $_scripts = array();
	public $db;
	public $msg;
	public $config;
	public $fixed_bottom;
	public $login_lib;
	public $xss;
	public $global = array();
	
	public function __construct()
	{	
		$db = connect();
		$this->db = $db;
		
		include_once('lib/antixss.php');
		$this->xss = new AntiXSS();
		
		include_once('lib/login_lib.php');
		$this->login_lib = new login_lib();
		$this->global['userdata'] = $this->login_lib->get_data();
		
		$msg_string = isset($_GET['msg'])? $this->xss->setFilter($_GET['msg'],'blacklist'):NULL;
		$lead_msg = isset($_GET['lead_msg'])? $this->xss->setFilter($_GET['lead_msg'],'blacklist'):NULL;
		$type_msg = isset($_GET['type_msg'])? $this->xss->setFilter($_GET['type_msg'],'blacklist'):'danger';
		$this->msg = alert($msg_string,$type_msg,$lead_msg);
	}
	
	public function add_css($style, $type = 'link', $media = FALSE)
	{
		$success = TRUE;
		$css = NULL;

		$filepath = ROOT.$style;

		switch ($type)
		{
		 case 'link':
		    
		    $css = '<link type="text/css" rel="stylesheet" href="'. $filepath .'"';
		    if ($media)
		    {
		       $css .= ' media="'. $media .'"';
		    }
		    $css .= ' />';
		    break;
		 
		 case 'import':
		    $css = '<style type="text/css">@import url('. $filepath .');</style>';
		    break;
		 
		 case 'embed':
		    $css = '<style type="text/css">';
		    $css .= $style;
		    $css .= '</style>';
		    break;
		    
		 default:
		    $success = FALSE;
		    break;
		}

		// Add to js array if it doesn't already exist
		if ($css != NULL && !in_array($css, $this->_styles))
		{
			$this->_styles[] = $css;
		}
	}
	
	public function add_js($script, $type = 'import', $defer = FALSE)
	{
		$success = TRUE;
		$js = NULL;

		switch ($type)
		{
		 case 'import':
		    $filepath = ROOT.$script;
		    $js = '<script type="text/javascript" src="'. $filepath .'"';
		    if ($defer)
		    {
		       $js .= ' defer="defer"';
		    }
		    $js .= "></script>";
		    break;
		 
		 case 'ext':
		    $js = '<script type="text/javascript" src="'. $script .'"';
		    $js .= "></script>";
		    break;
		 
		 case 'embed':
		    $js = '<script type="text/javascript"';
		    if ($defer)
		    {
		       $js .= ' defer="defer"';
		    }
		    $js .= ">";
		    $js .= $script;
		    $js .= '</script>';
		    break;
		    
		 default:
		    $success = FALSE;
		    break;
		}

		// Add to js array if it doesn't already exist
		if ($js != NULL && !in_array($js, $this->_scripts))
		{
			$this->_scripts[] = $js;
		}
	}
	
	public function head()
	{	
		extract($this->global);
		$styles = implode("\n\t",$this->_styles);
		require_once('header.php');
	}
	
	public function foot()
	{
		extract($this->global);
		$scripts = implode("\n\t",$this->_scripts);
		require_once('footer.php');
	}
	
	public function output($input=NULL,$data=NULL,$object=FALSE)
	{
		if(!$object)
		{
			$this->head();
			extract($this->global);
			if(!is_null($data) and is_array($data))
			{
				extract($data);
			}
			$class_name = get_class($this).'/';
			
			require_once(MODULEPATH.$class_name.'view/'.$input);
			$this->foot();
		}
		else
		{
			extract($this->global);
			if(!is_null($data) and is_array($data))
			{
				extract($data);
			}
			$class_name = get_class($this).'/';
			
			require_once(MODULEPATH.$class_name.'view/'.$input);
		}
	}
	
	function __destruct()
	{
		$this->db = NULL;
		$this->xss = NULL;
		$this->login_lib = NULL;
		$this->msg = NULL;
		$this->global = NULL;
		$this->fixed_bottom = NULL;
		$this->styles = array();
		$this->scripts = array();
	}
}

get_cm();
?>