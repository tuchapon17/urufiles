<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends MY_Controller
{
	//login model
	private $lm;
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model("login_model");
		$this->lm = $this->login_model;
	}
	
	/**
	 * login
	 */
	public function index()
	{
		if($this->session->userdata("uf_username")) redirect(base_url());
		$config=array(
				array(
						"field"=>"InputUsername",
						"label"=>"ชื่อผู้ใช้",
						"rules"=>"required"
				),
				array(
						"field"=>"InputPassword",
						"label"=>"รหัสผ่าน",
						"rules"=>"required"
				)
		);
		$this->frm->set_rules($config);
		$this->frm->set_message("rule","message");
		if($this->frm->run() == false)
		{
			$data=array(
					"htmlopen"=>$this->pel->html("1"),
					"head"=>$this->pel->head("เข้าสู่ระบบ"),
					"bodyopen"=>$this->pel->body("1"),
					"navbar"=>$this->pel->navbar(),
					"js"=>$this->pel->js(),
					"footer"=>$this->pel->footer(),
					"bodyclose"=>$this->pel->body("0"),
					"htmlclose"=>$this->pel->html("0")
			);
			$this->load->view("login",$data);
		}
		else
		{
			$login_result = $this->lm->check_auth();
			if($login_result==false)
			{
				$this->session->set_flashdata("login_message","ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง");
				redirect(base_url()."?c=login");
			}
			else if($login_result==true)
			{
				redirect(base_url());
			}
		}
	}
	
	/**
	 * logout
	 */
	function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url()."?c=login");
	}
}