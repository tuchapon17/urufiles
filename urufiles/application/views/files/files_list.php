<?php 
$ci =& get_instance();
echo $htmlopen;
echo $head;
?>
    <!-- Custom styles -->
    <style type="text/css">
    </style>
<?php
echo $bodyopen;
echo $navbar;
?>
	<!-- Custom Content -->
    <div class="container">
    	<div class="row">
	    	<div class="col-lg-6 col-lg-offset-3">
		    	<br>
		    	<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">รายการไฟล์</h3>
					</div>
					<div class="panel-body">
						<table class="table table-hover">
							<?php 
								if(!$data_files_list)
								{
									echo '<tr>';
										echo '<td colspan="3">ไม่พบไฟล์</td>';
									echo '</tr>';
								}
								foreach($data_files_list as $key=>$val)
								{
									echo '<tr>';
										echo '<td>'.($key+1).'</td>';
										echo '<td>'.$val["files_name"].'</td>';
										echo '<td><a href="'.base_url().'/upload/'.$val["files_name"].'"><i class="fa fa-download"></i></a></td>';
										if($ci->session->userdata("user_status") == "2")
										{
											echo '<td><a href="'.base_url().'?c=files&m=del_files&dfid='.$val["files_id"].'"><i class="fa fa-times"></i></a></td>';
										}
									echo '</tr>';
								}
							?>
						</table>
					</div><!-- @panel-body -->
				</div><!-- @panel-default -->
	    	</div>
    	</div>
	    <hr>
	    <?php echo $footer;?>
    </div>
<?php 
echo $js;
?>
<!-- Custom Javascript -->
	<script type="text/javascript">
	<!--
	$(function(){
		
	});
	//-->
	</script>
<?php 
echo $bodyclose;
echo $htmlclose;