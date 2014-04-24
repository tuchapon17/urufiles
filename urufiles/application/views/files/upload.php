<?php 

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
						<h3 class="panel-title">อัพโหลดไฟล์</h3>
					</div>
					<div class="panel-body">
				    	<form  role="form" action="" method="post" id="UploadForm" enctype="multipart/form-data" autocomplete="off">
				    		<input type="hidden" name="hidden">
							<div class="form-group col-lg-6 col-lg-offset-3">
								<label  for="InputFiles">เลือกไฟล์</label>
								<input type="file" name="InputFiles[]" multiple="" id="InputFiles">
								<span class="help-block">สามารถอัพโหลดพร้อมกันได้หลายไฟล์</span>
							</div><!-- @form-group -->
							<div class="form-group text-right">
		  						<button type="submit" class="btn btn-primary col-lg-6 col-lg-offset-3"><i class="fa fa-upload fa-2x"></i></button>
		  					</div>
				      	</form>
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
		/**
		Show bootbox alert(confirm) after passed form validation
		*/
		<?php 
		if($this->session->flashdata("upload_message"))
		{
		?>
			bootbox.alert("<?php echo $this->session->flashdata("upload_message");?> ");
		<?php 
		}?>
	});
	//-->
	</script>
<?php 
echo $bodyclose;
echo $htmlclose;