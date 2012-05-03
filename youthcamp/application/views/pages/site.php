<?php 
	$has_registered = $this->session->userdata("has_registered");	
?>
	
	<?php if ($has_registered == 1) {
		$this->session->sess_destroy(); 
		?>
		<div class="alert alert-success">
			<p>
				Thanks for registering for youth camp 2012. Hope to see you there. Till then, keep your fire burning.
			</p>
		</div>
	<?php }
	else{
	?>
	<div class="logout">
		<a href="<?php echo site_url('home/logout') ?>">Logout</a>
	</div> 
		<div class="alert alert-error">
			<p>
				You have not filled your registration form. This implies that you have not been registered. 
				<br />
				 <a href="<?php  echo site_url('registeration') ?>"> Please click Here to do so.</a> 
			</p>
		</div>
	<?php
	} ?>


