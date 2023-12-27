<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Template Library
 *
 * To display standard template for all pages
 * 
 * @link http://maestric.com/doc/php/codeigniter_template
 *
 */

class xBridge {
	var $template_data = array();
	private $ci;

	public function __construct()
    {
      $this->ci =& get_instance();
    }

	function set($name, $value)
	{
		$this->template_data[$name] = $value;
	}

	function load($template = '', $view = '' , $view_data = array(), $return = FALSE)
	{               
		$this->CI =& get_instance();
		$this->set('contents', $this->CI->load->view($view, $view_data, TRUE));
		return $this->CI->load->view($template, $this->template_data, $return);
	}

	public function set_database($db_name)
    {
    	$db_data = $this->ci->load->database($db_name, TRUE);
    	$this->ci->db = $db_data;
    }
 
	public function validate_login()
	{
		$user_guid = $_SESSION['user_guid'];
		$validate_login = $this->ci->db->query("SELECT user_logs_guid from b2b_finance.user_logs where user_guid = '$user_guid';")->row('user_logs_guid');
		//echo var_dump($validate_login);die;
		return $validate_login;
	}

	public function get_uri()
	{
		$request = parse_url($_SERVER['REQUEST_URI']);
		//echo $_SERVER['QUERY_STRING']; die;
		$path = $request["path"].$_SERVER['QUERY_STRING'];
		//echo $path; die;
		//$result = rtrim(str_replace(basename($_SERVER['SCRIPT_NAME']), '', $path), '/');
		$trans_guid =  $this->ci->db->query("SELECT UPPER(REPLACE(UUID(),'-','')) as guid")->row('guid');
		$user_guid = $_SESSION['user_guid'];
		if(isset($_SESSION['customer_guid']))
		{
			$customer_guid = $_SESSION['customer_guid'];	
		}
		else
		{
			$customer_guid = '';
		};

		$ses_guid = $this->ci->db->query("SELECT user_logs_guid from b2b_finance.user_logs where user_guid = '$user_guid';")->row('user_logs_guid');
		$trans_date = $this->ci->db->query("SELECT CURDATE() as curdate")->row('curdate');
		$created_at = $this->ci->db->query("SELECT now() as now")->row('now');
		
		$this->ci->db->query("REPLACE INTO b2b_finance.transaction_logs SELECT '$trans_guid', '$customer_guid', '$ses_guid','$user_guid', '$path', '$trans_date', '$created_at'");

	}
 
}

/* End of file Template.php */
/* Location: ./system/application/libraries/Template.php */

