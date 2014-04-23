<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller
{
	/**
	 * site home page.
	 */
	public function index()
	{
		$data=array(
				"htmlopen"=>$this->pel->html("1"),
				"head"=>$this->pel->head("ระบบจัดการไฟล์ มหาวิทยาลัยราชภัฏอุตรดิตถ์"),
				"bodyopen"=>$this->pel->body("1"),
				"navbar"=>$this->pel->navbar(),
				"js"=>$this->pel->js(),
				"footer"=>$this->pel->footer(),
				"bodyclose"=>$this->pel->body("0"),
				"htmlclose"=>$this->pel->html("0")
		);
		$this->load->view("home",$data);
	}
	
}