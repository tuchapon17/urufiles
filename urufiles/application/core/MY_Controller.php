<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class MY_Controller extends CI_Controller
{
	//page_element_lib
	public $pel;
	
	//form_validation
	public $frm;
	
	public function __construct()
	{
		parent::__construct();
		$this->pel = $this->page_element_lib;
		$this->frm = $this->form_validation;
	}
}