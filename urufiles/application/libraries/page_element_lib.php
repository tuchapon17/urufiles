<?php
class Page_element_lib
{
	private $ci;
	
	public function __construct()
	{
		$this->ci =& get_instance();
	}
	
	/**
	 * tag html open/close
	 * @param string $state
	 * @return string
	 */
	public function html($state)
	{
		if($state == "0")
			return "</html>";
		else if($state == "1")
			return "<!DOCTYPE html>
					<html lang='th'>";
	}
	
	//-------------------------------------------
	
	/**
	 * tag body open/close
	 * @param string $state
	 * @return string
	 */
	public function body($state)
	{
		if($state == "0")
			return 	"</body>";
		else if($state == "1")
			return "<body>";
	}
	
	//-------------------------------------------
	
	/**
	 * return head of page with dynamic title
	 * @param string $title 
	 * @return string
	 */
	public function head($title)
	{
		$html='
		<head>
		    <meta charset="utf-8">
		
		    <meta name="viewport" content="width=device-width, initial-scale=1.0">
		    <meta name="description" content="">
		    <meta name="author" content="">
		    <title>'.$title.'</title>
			<link rel="stylesheet" href="'.base_url().'plugins/bootstrap/3.1.1/css/bootstrap.min.css">
			<link rel="stylesheet" href="'.base_url().'plugins/bootstrap/3.1.1/css/space_lab_theme/bootstrap_spacelab_theme.css">
			<link href="'.base_url().'plugins/font-awesome-4.0.3/css/font-awesome.min.css" rel="stylesheet">
    		<style>
				body {
					padding-top: 50px;
				}
				.my-error-class {
					color: #DD4B39;	
				}
      		</style>
		  </head>
		';
		return $html;
	}
	
	//-------------------------------------------
	
	/**
	 * javascript
	 * @return string
	 */
	public function js()
	{
		$html='
		<!-- Bootstrap core JavaScript
	    ================================================== -->
	    <!-- Placed at the end of the document so the pages load faster -->
		<script src="'.base_url().'plugins/bootstrap/3.1.1/jquery.js"></script>
	    <script src="'.base_url().'plugins/bootstrap/3.1.1/js/bootstrap.min.js"></script>
	    <script src="'.base_url().'js/bootbox4.0.0.min.js"></script>
    	<script>
    	 var b_url="'.base_url().'";
    	</script>
		';
		return $html;
	}
	
	//-------------------------------------------
	
	/**
	 * footer
	 * @return string
	 */
	public function footer()
	{
		return '
		<footer class="text-center">
			<p>
        	&copy; 2014 Uttaradit Rajabhat University All Rights Reserved.
			</p>
      	</footer>';
	}
	
	//-------------------------------------------
	
	/**
	 * bootstrap navbar
	 * @return string
	 */
	function navbar()
	{
		$html='
		<div class="navbar navbar-default navbar-fixed-top">
	      <div class="container">
	        <div class="navbar-header">
	          <a class="navbar-brand" href="'.base_url().'">URU FILES</a>
	          <button data-target="#navbar-main" data-toggle="collapse" type="button" class="navbar-toggle">
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	          </button>
	        </div><!-- @navbar-header -->
				
	        <div id="navbar-main" class="navbar-collapse collapse">
	          <ul class="nav navbar-nav">
	            <li>
	              <a href="'.base_url().'?c=files">รายการไฟล์</a>
	            </li>
	           ';
			if($this->ci->session->userdata("user_status") == "2")
			{
				$html.='
		            <li>
		              <a href="'.base_url().'?c=files&m=upload">อัพโหลดไฟล์</a>
		            </li>
		        ';
			}
	        $html.='
	          </ul>
	          <ul class="nav navbar-nav navbar-right">
	          ';
				if(!$this->ci->session->userdata("uf_username"))
				{
					$html.='
		            <li><a href="'.base_url().'?c=register">ลงทะเบียน</a></li>
					<li><a href="'.base_url().'?c=login">เข้าสู่ระบบ</a></li>
		          	';
				}
				else
				{
					$html.='
		            <li class="droupdown">
		            	<a id="dropdown_user" href="#" data-toggle="dropdown" class="dropdown-toggle">คุณ '.$this->ci->session->userdata("uf_username").'<span class="caret"></span></a>
		            	<ul aria-labelledby="dropdown_user" class="dropdown-menu">
		            		<li><a href="'.base_url().'?c=login&m=logout">ออกจากระบบ</a></li>
		            	</ul>
		            </li>
		          	';
				}
				$html.='
				</ul>
	        </div>
	      </div>
	    </div>
		';
		return $html;
	}
}