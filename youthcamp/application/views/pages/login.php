<div class='custom well'>
	<?php  
			$attributes_login = array('class' => 'custom', 'id'=>'login_form' );
		?>
		

	<div class="row" >

			<div class='span4'>
				<?php 
					$msg = $this->session->flashdata('item');
					if(!empty($msg)){
						?>
						<div class="alert alert-success">
							<?php echo  $msg; ?>
						</div>
				<?php	}
				 ?>
				
				<div id='login_div'>
					<h2>Login</h2>
					<?php echo $this->session->flashdata('error'); ?>
					<?php echo form_open('home/login', $attributes_login); ?>
					<label>Email:</label>
					<p>
						<input type='text' name='email_log' id='email_log'>
					</p>
					
					<label>Password:</label>
					<p>
						<input type='password' name='password_log' id='password_log'>
					</p>
					<input type='submit' value='Login' class='btn btn-primary' id='loginBtn'>
					<?php echo form_close(); ?>
					<a id='click_signup' href="<?php echo base_url() ?>"> Click here to first sign up
						before continuing.
					</a> 
				</div>
			</div>
			<div class="span4">
				some image goes here
			</div>
		</div>
	</div>


<script type="text/javascript">
	(function(){
		$("#login_form").submit(function () {
		    var f =  $(this);
		    var data = window.data = $(this).serializeArray();	
		    var pass = f.find("#password_log").val();
		    var email = f.find("#email_log").val(); 
		    var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            if(!filter.test(email)){
            	alert("please enter a valid email");
                return false;
            }

		    if($.trim(pass) == ""){
		    	alert("please enter a password");
		    	return false;
		    }

		});
	})()
</script>