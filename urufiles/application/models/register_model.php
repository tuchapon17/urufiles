<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Register_Model extends MY_Model
{
	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Bangkok');
	}
	
	/**
	 * Check Username in tb_user, Return true if username not exists
	 * @param $username
	 * @return boolean
	 */
	function username_already_exist($username)
	{
		$this->db->select()->from("tb_user")->where("user_username",$username);
		$num_rows=$this->db->get()->num_rows();
		if($num_rows>0)return false;
		else if($num_rows==0)return true;
	}
	
	//-------------------------------------------
	
	/**
	 * Insert register information to tb_user
	 */
	function add_user()
	{
		$username = $this->input->post("InputUsername");
		$password = md5($this->input->post("InputPassword"));
		$email = $this->input->post("InputEmail");
		$firstname = $this->input->post("InputFirstname");
		$lastname = $this->input->post("InputLastname");
		$phone = $this->input->post("InputPhone");
		$sex = $this->input->post("SelectSex");
		$data=array(
				"user_username"=>strtolower($username),
				"user_password"=>$password,
				"user_email"=>strtolower($email),
				"user_register_on"=>date('Y-m-d H:i:s'),
				"user_firstname"=>$firstname,
				"user_lastname"=>$lastname,
				"user_phone"=>$phone,
				"tb_sex_id"=>$sex,
				"user_status"=>"1"
		);
		//inserting user data
		$this->db->set($data)->insert('tb_user');
		
		if($this->db->trans_status()===FALSE):
		$this->db->trans_rollback();
		$this->session->set_flashdata("register_status",false);
		$this->session->set_flashdata("register_message","ลงทะเบียนไม่สำเร็จ");
		redirect(base_url()."?c=register");
		//echo "Register Error.";
		else:
		$this->db->trans_commit();
		$this->session->set_flashdata("register_status",true);
		$this->session->set_flashdata("register_message","ลงทะเบียนสำเร็จ");
		redirect(base_url()."?c=register");
		endif;
	}
}