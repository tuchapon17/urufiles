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
						<h3 class="panel-title">ลงทะเบียน</h3>
					</div>
					<div class="panel-body">
						<form role="form" action="" method="post" autocomplete="off" id="regisForm">
							<div class="form-group">
    							<label for="InputFirstname">ชื่อ</label>
    							<input type="text" class="form-control" id="InputFirstname" name="InputFirstname" placeholder="" maxlength="30">
    							<span class="help-block"></span>
  							</div><!-- @form-group -->
  							<div class="form-group">
    							<label for="InputLastname">นามสกุล</label>
    							<input type="text" class="form-control" id="InputLastname" name="InputLastname" placeholder="" maxlength="30">
    							<span class="help-block"></span>
  							</div><!-- @form-group -->
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
  							<div class="form-group">
    							<label for="InputPassword2">ยืนยันรหัสผ่าน</label>
    							<input type="password" class="form-control" id="InputPassword2" name="InputPassword2" placeholder="" maxlength="15">
    							<span class="help-block"></span>
  							</div><!-- @form-group -->
  							<div class="form-group">
    							<label for="InputEmail">อีเมล</label>
    							<input type="text" class="form-control" id="InputEmail" name="InputEmail" placeholder="" maxlength="128">
    							<span class="help-block"></span>
  							</div><!-- @form-group -->
  							<div class="form-group">
    							<label for="InputPhone">หมายเลขโทรศัพท์</label>
    							<input type="text" class="form-control" id="InputPhone" name="InputPhone" placeholder="" maxlength="10">
    							<span class="help-block"></span>
  							</div><!-- @form-group -->
  							<div class="form-group">
    							<label for="SelectSex">เพศ</label>
    							<select class="form-control" id="SelectSex" name="SelectSex">
    								<option value="">กรุณาระบุเพศ</option>
    								<option value="1">ชาย</option>
    								<option value="2">หญิง</option>
    								<option value="3">อื่นๆ</option>
    							</select>
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
		$.validator.addMethod("username_regex", function(value, element){
			//รูปแบบ username ขึ้นต้นด้วยอังกฤษ abc abc123
			var regex=/^([a-zA-Z0-9])+$/;
			return regex.test(value);
		}, "รูปแบบชื่อผู้เข้าใช้ไม่ถูกต้อง");
		$.validator.addMethod("password_match", function(value, element){
			//ตรวจสอบรหัสผ่านทั้งสองต้องเหมือนกัน
			if($("#InputPassword").val()==$("#InputPassword2").val())
			{
				//remove error message
				pwd_rm_error_msg();
				return true;
			}
			else return false;
		}, "รหัสผ่านและยืนยันรหัสผ่านไม่ตรงกัน.");
		$.validator.addMethod("email_regex", function(value, element){
			//regex email เอามาจาก library ของ codeigniter
			///^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix
			var regex=/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/i;
			return regex.test(value);
		}, "รูปแบบอีเมลไม่ถูกต้อง");
		$.validator.addMethod("noSpace", function(value, element){
			//ตรวจสอบช่องว่างในข้อความ
			return value.indexOf(" ") < 0;
		}, "ไม่อนุญาตให้มีช่องว่าง");
		$.validator.addMethod("firstlast_name", function(value, element){
			//รูปแบบ firstname lastname เฉพาะอักษรอังกฤษ/ไทย
			var regex=/^[a-zA-Zก-ํ]+$/g;
			return regex.test(value);
		}, "กรอกได้เฉพาะอักษรไทย และอังกฤษ เท่านั้น");
		$.validator.addMethod("phone", function(value, element){
			//รูปแบบหมายเลขโทรศัพท์ 0 นำหน้า
			var regex=/^[0][0-9]+$/g;
			return regex.test(value);
		}, "รูปแบบไม่ถูกต้อง");
		
		
		$("#regisForm").validate({
			lang:'th',
			errorClass: "my-error-class",
			rules: {
				"InputUsername":{
					required:true,
					username_regex:true,
					noSpace:true,
					minlength:5,
					maxlength:15,
					//ตรวจสอบว่ามี username ซ้ำหรือไม่
					remote:{
						// จะ return true / false
						// ชื่อ data ใช้ input_username
						url:b_url+"?c=register&m=already_exist_ajax",
						type:"POST"
					}
				},
				"InputPassword":{
					required:true,
					minlength:5,
					maxlength:15,
					password_match:true,
					noSpace:true
				},
				"InputPassword2":{
					required:true,
					minlength:5,
					maxlength:15,
					password_match:true,
					noSpace:true
				},
				"InputEmail":{
					required:true,
					//email:true,
					email_regex:true,
					noSpace:true,
					maxlength:128
				},
				"InputFirstname":{
					required:true,
					noSpace:true,
					firstlast_name:true,
					maxlength:30
				},
				"InputLastname":{
					required:true,
					noSpace:true,
					firstlast_name:true,
					maxlength:30
				},
				"InputPhone":{
					required:true,
					phone:true,
					maxlength:10,
					minlength:9
				},
				"SelectSex":{
					required:true
				}
			},
			messages:{
				"input_username": {
					remote:"มีคนใช้ชื่อผู้ใช้นี้แล้ว ลองชื่ออื่น"
				}
			}
		});

		
		$("#regisForm").submit(function(e){
			//e.preventDefault();
		});

		
		/**
		Show bootbox alert(confirm) after passed form validation
		*/
		<?php 
		if($this->session->flashdata("register_message"))
		{
			if($this->session->flashdata("register_status")==true)
			{?>
				bootbox.confirm("<?php echo $this->session->flashdata("register_message");?><br/>คุณต้องการไปยังหน้าเข้าสู่ระบบหรือไม่? ", function(result) {
					if(result == true)window.location="?c=login";
				}); 
			<?php
			}
			else if ($this->session->flashdata("register_status")==false) {
			?>
				bootbox.alert("<?php echo $this->session->flashdata("register_message");?> ");
			<?php	
			}
		}?>
	});

	//remove erorr message for password & password2
	function pwd_rm_error_msg()
	{
		if($("#InputPassword").val()==$("#InputPassword2").val())
		{
			$("#InputPassword").next('label.my-error-class').remove();
			$("#InputPassword").removeClass('my-error-class');
			$("#InputPassword2").next('label.my-error-class').remove();
			$("#InputPassword2").removeClass('my-error-class');
		}
	}
	//-->
	</script>
<?php 
echo $bodyclose;
echo $htmlclose;