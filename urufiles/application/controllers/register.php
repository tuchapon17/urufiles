<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Register extends MY_Controller
{
	//register model
	private $rm;
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model("register_model");
		$this->rm = $this->register_model;
	}
	
	//-------------------------------------------
	
	/**
	 * Register new user
	 */
	public function index()
	{
		$config=array(
				array(
						"field"=>"InputUsername",
						"label"=>"ชื่อผู้ใช้งาน",
						"rules"=>"required|max_length[15]|min_length[5]"
				),
				array(
						"field"=>"InputPassword",
						"label"=>"รหัสผ่าน",
						"rules"=>"required|max_length[15]|min_length[5]"
				),
				array(
						"field"=>"InputPassword2",
						"label"=>"ยืนยันรหัสผ่าน",
						"rules"=>"required|max_length[15]|min_length[5]"
				),
				array(
						"field"=>"InputEmail",
						"label"=>"อีเมล",
						"rules"=>"required|valid_email|max_length[128]"
				),
				array(
						"field"=>"InputFirstname",
						"label"=>"ยืนยันรหัสผ่าน",
						"rules"=>"required|max_length[30]"
				),
				array(
						"field"=>"InputLastname",
						"label"=>"ยืนยันรหัสผ่าน",
						"rules"=>"required|max_length[30]"
				),
				array(
						"field"=>"InputPhone",
						"label"=>"หมายเลขโทรศัพท์",
						"rules"=>"required|max_length[10]|min_length[9]"
				),
				array(
						"field"=>"SelectSex",
						"label"=>"เพศ",
						"rules"=>"required"
				)
		);
		$this->frm->set_rules($config);
		$this->frm->set_message("rule","message");
		if($this->frm->run() == false)
		{
			$data=array(
					"htmlopen"=>$this->pel->html("1"),
					"head"=>$this->pel->head("ลงทะเบียน"),
					"bodyopen"=>$this->pel->body("1"),
					"navbar"=>$this->pel->navbar(),
					"js"=>$this->pel->js(),
					"footer"=>$this->pel->footer(),
					"bodyclose"=>$this->pel->body("0"),
					"htmlclose"=>$this->pel->html("0")
			);
			$this->load->view("register",$data);
		}
		else
		{
			$this->rm->add_user();
		}
	}
	
	//-------------------------------------------
	
	/**
	 * check username in DB
	 */
	public function already_exist_ajax()
	{
		echo json_encode($this->rm->username_already_exist($this->input->post("InputUsername")));
	}
}