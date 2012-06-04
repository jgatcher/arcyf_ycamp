<style type="text/css">
	
	/*#campers_stuff {
		overflow: hidden
	}
	#campers_form{
		float : right;
	}

	#campers_grid {
		float: left;
	}
*/
	#admin_login {
		margin-left: 300px;
		margin-top: 30px;
	}
</style>

<div class='custom '>
	<?php 
		$msg = $this->session->flashdata('admin_log_err');
		if(!empty($msg)){
			?>
			<div class="alert alert-error">
				<?php echo  $msg; ?>
			</div>
	<?php	} ?>
				
	<div id='admin_login'>
		<h3>Admin Login</h3>
		<?php //echo "<h3>". md5('slashdot') ."</h3>" ; ?>
		<?php  

			$attributes_login = array('class' => 'custom', 'id'=>'admin_login_form' );
		?>
		<?php echo $this->session->flashdata('error'); ?>
		
		<?php echo form_open('admin/login', $attributes_login); ?>
		<label>Email:</label>
		<p>
			<input type='text' name='username_log' id='username_log' class='span3'>
		</p>
		
		<label>Password:</label>
		<p>
			<input type='password' name='password_log' id='password_log' class='span3'>
		</p>
		<input type='submit' value='Login' class='btn btn-primary' id='loginBtn'>
		
		<?php echo form_close(); ?>
		<br /> <br /> <br /> <br /> 
	</div>
</div>

