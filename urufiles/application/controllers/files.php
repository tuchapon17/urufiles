<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Files extends MY_Controller
{
	//files_model
	private $fm;
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model("files_model");
		$this->fm = $this->files_model;
	}
	
	/**
	 * show all files in list view
	 */
	public function index()
	{
		if($this->session->userdata("uf_username")){}
		else redirect(base_url());
		$data=array(
				"htmlopen"=>$this->pel->html("1"),
				"head"=>$this->pel->head("อัพโหลดไฟล์"),
				"bodyopen"=>$this->pel->body("1"),
				"navbar"=>$this->pel->navbar(),
				"js"=>$this->pel->js(),
				"footer"=>$this->pel->footer(),
				"bodyclose"=>$this->pel->body("0"),
				"htmlclose"=>$this->pel->html("0"),
				"data_files_list"=>$this->fm->get_files_list()
		);
		$this->load->view("files/files_list",$data);
	}
	
	/**
	 * upload file
	 */
	public function upload()
	{
		if($this->session->userdata("uf_username") && $this->session->userdata("user_status")=="2")
		{}
		else redirect(base_url());
		$config2=array(
				array(
						"field"=>"hidden",
						"label"=>"",
						"rules"=>""
				)
		);
		$this->frm->set_rules($config2);
		$this->frm->set_message("rule","message");
		if($this->frm->run() == false)
		{
			$data=array(
					"htmlopen"=>$this->pel->html("1"),
					"head"=>$this->pel->head("อัพโหลดไฟล์"),
					"bodyopen"=>$this->pel->body("1"),
					"navbar"=>$this->pel->navbar(),
					"js"=>$this->pel->js(),
					"footer"=>$this->pel->footer(),
					"bodyclose"=>$this->pel->body("0"),
					"htmlclose"=>$this->pel->html("0")
			);
			$this->load->view("files/upload",$data);
		}
		else
		{
			$this->load->library('upload'); // Load Library
			$files = $_FILES;
			$cpt = count($_FILES['InputFiles']['name']);
			$config = array();
			$config['upload_path'] = './upload/';
			//allowed type such as "jpg|jpeg|png"
			$config['allowed_types'] = '*';
			$config['max_size']      = '0';
			$config['overwrite']     = FALSE;
			$this->upload->initialize($config); // These are just my options. Also keep in mind with PDF's YOU MUST TURN OFF xss_clean
				
			for($i=0; $i<$cpt; $i++)
			{
				$name = $_FILES["InputFiles"]["name"][$i];
				$ext = end(explode(".", $name));
				$file_detail=array(
						//1388212969.8946 to 1388212969_8946
						"new_name"=>str_replace(".", "_",microtime(true)).rand(100,999).".".end(explode(".", $files["InputFiles"]["name"][$i])),
						
						//replace " "(space) with "_"(underscore)
						"old_name"=>str_replace(" ", "_", $files["InputFiles"]["name"][$i]),
						"ext"=>end(explode(".", $files["InputFiles"]["name"][$i])),
						"type"=>$files["InputFiles"]["type"][$i],
						"error"=>$files["InputFiles"]["error"][$i],
						"size"=>$files["InputFiles"]["size"][$i]
				);
				//$_FILES['InputFiles']['name']= $file_detail["new_name"];
				//replace " "(space) with "_"(underscore) and convert utf-8 to tis-620 filesname in thai lang
				$_FILES['InputFiles']['name']= str_replace(" ", "_", iconv("utf-8", "tis-620", $file_detail["old_name"]));
				$_FILES['InputFiles']['type']= $files['InputFiles']['type'][$i];
				$_FILES['InputFiles']['tmp_name']= $files['InputFiles']['tmp_name'][$i];
				$_FILES['InputFiles']['error']= $files['InputFiles']['error'][$i];
				$_FILES['InputFiles']['size']= $files['InputFiles']['size'][$i];
				
				if($this->upload->do_upload('InputFiles'))
				{
					//upload success
					$set=array(
							"files_name"=>$file_detail["old_name"]
					);
					$this->fm->add_files($set);
					$this->session->set_flashdata("upload_message","อัพโหลดไฟล์สำเร็จ");
				}
				else
				{
					$this->session->set_flashdata("upload_message",$this->upload->display_errors());
					//echo $this->upload->display_errors('<p>', '</p>');
				}
			}
			redirect(base_url()."?c=files&m=upload");
		}
	}//@upload()
	
	function del_files()
	{
		//dfid = del file id
		$file_id = $_GET["dfid"];
		$get_file_name=$this->fm->get_file_name($file_id);
		$file_name = $get_file_name[0]["files_name"];
		$file_path = "upload/".iconv("utf-8", "tis-620", $file_name);
		if(file_exists($file_path))
		{
			if(unlink($file_path))
			{
				//echo "unlinked";
			}
		}
		$this->fm->del_files($file_id);
		redirect(base_url()."?c=files");
	}
}