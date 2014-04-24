<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Files_Model extends MY_Model
{
	public function __construct()
	{
		parent::__construct();
	}
	
	public function add_files($setdata)
	{
		$this->db->insert("tb_files",$setdata);
	}
	
	public function get_files_list()
	{
		$this->db->select()->from("tb_files");
		return $this->db->get()->result_array();
	}
	
	public function get_file_name($file_id)
	{
		$this->db->select()->from("tb_files")->where("files_id",$file_id)->limit(1);
		return $this->db->get()->result_array();
	}
	
	public function del_files($file_id)
	{
		$this->db->delete("tb_files",array("files_id"=>$file_id),1);
	}
}