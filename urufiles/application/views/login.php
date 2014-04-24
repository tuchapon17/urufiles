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
	    	<div class="col-lg-4 col-lg-offset-4">
	    		<br>
	    		<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">เข้าสู่ระบบ</h3>
					</div>
					<div class="panel-body">
						<form role="form" action="" method="post" autocomplete="off" id="loginForm">
  							<div class="form-group">
    							<label for="InputUsername">ชื่อผู้ใช้</label>
    							<input type="text" class="form-control" id="InputUsername" name="InputUsername" placeholder="Username" maxlength="15">
    							<span class="help-block"></span>
  							</div><!-- @form-group -->
  							<div class="form-group">
    							<label for="InputPassword">รหัสผ่าน</label>
    							<input type="password" class="form-control" id="InputPassword" name="InputPassword" placeholder="" maxlength="15">
    							<span class="help-block"></span>
  							</div><!-- @form-group -->
  							<div class="form-group text-right">
  								<button type="submit" class="btn btn-primary">ยืนยัน</button>
  							</div>
						</form>
					</div><!-- @panel-body -->
				</div><!-- @panel-default -->
	    	</div><!-- @col-lg-12 -->
    	</div><!-- @row -->
      <?php echo $footer;?>
    </div><!-- @container -->



<?php 
echo $js;
?>
	<!-- Custom Javascript -->
	<script type="text/javascript" src="<?php echo base_url();?>plugins/jquery-validation-1.11.1/dist/jquery.validate.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>plugins/jquery-validation-1.11.1/localization/messages_th.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>plugins/jquery-validation-1.11.1/dist/additional-methods.min.js"></script>
	<script type="text/javascript">
	<!--
	$(function(){
		$("#InputUsername").focus();
		
		/**
		Show bootbox alert(confirm) after passed form validation
		*/
		<?php 
		if($this->session->flashdata("login_message"))
		{
		?>
			bootbox.alert("<?php echo $this->session->flashdata("login_message");?> ");
		<?php }?>
	});
	//-->
	</script>
<?php 
echo $bodyclose;
echo $htmlclose;