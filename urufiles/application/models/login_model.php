<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_model extends MY_Model
{
	public function __construct()
	{
		parent::__construct();
	}
	
	/**
	 * authentication
	 * @return boolean
	 */
	function check_auth()
	{
		$username = $this->security->xss_clean(strtolower($this->input->post("InputUsername")));
		$password = $this->security->xss_clean($this->input->post("InputPassword"));
		$where=array(
				"user_username"=>$username,
				"user_password"=>md5($password)
		);
		$this->db->select()->from("tb_user")->where($where)->limit(1);
		$query = $this->db->get();
		
		if($query->num_rows()===1)
		{
			$r = $query->result_array();
			//set session
			$set_session=array(
					"uf_username"=>$r[0]["user_username"],
					"user_status"=>$r[0]["user_status"]
			);
			$this->session->set_userdata($set_session);
			return true;
		}
		else return false;
	}
	
}