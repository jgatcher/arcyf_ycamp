
	<?php 
		$is_registering =  $this->session->userdata("is_registering");
		if($is_registering){
			?>
			<div class='custom'>
				<div class='instructions'>
					<h2>Register for Youth Camp in just 3 simple steps.</h2>
					<h3>Step 2. Login with the details you just created.</h3>
					<ol>
					  <li class="step1 ">1</li>
					  <li class="step2 selected">2</li>
					  <li class="step3">3</li>
					</ol>
				</div>
			</div>
		<?php
		}
		?>
	
	<?php  
			$attributes_login = array('class' => 'custom', 'id'=>'login_form' );
		?>
		

	<div class="row hero-unit stuff" >
		<div class='custom'>
			<div class='span4 well'>
				<?php 
					$msg = $this->session->flashdata('log_err');
					if(!empty($msg)){
						?>
						<div class="alert alert-error">
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
						<input type='text' name='email_log' id='email_log' class='span3'>
					</p>
					
					<label>Password:</label>
					<p>
						<input type='password' name='password_log' id='password_log' class='span3'>
					</p>
					<input type='submit' value='Login' class='btn btn-primary' id='loginBtn'>
					<a  class='btn btn-success form_links' id='click_signup' href="<?php echo base_url() ?>"> Sign up  First.
					</a> 
					<?php echo form_close(); ?>
					<br /> <br /> <br /> <br /> 
				</div>
			</div>
			<div class="span5">
			    <div id="myCarousel" class="carousel border">
				    <!-- Carousel items -->
				    <div class="carousel-inner">
				    	<div class="active item">
				    		<img src="<?php echo base_url(); ?>/assets/images/youthcamp.png">
				    	</div>
				    	<div class="item">
				    		<img src="<?php echo base_url(); ?>/assets/images/abokobi.jpg">
				    	</div>
				    	<div class="item">
				    		<img src="<?php echo base_url(); ?>/assets/images/hz.jpg">
				    	</div>
				    	<div class="item">
				    		<img src="<?php echo base_url(); ?>/assets/images/in_worship.jpg">
				    	</div>
				    	<div class="item">
				    		<img src="<?php echo base_url(); ?>/assets/images/in_worship_again.jpg">
				    	</div>
				    	<div class="item">
				    		<img src="<?php echo base_url(); ?>/assets/images/last.png">
				    	</div>

				    </div>
				    <!-- Carousel nav -->
				    <a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
				    <a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
				</div>
			</div>
		</div>
	</div>
	<?php include("testimonials.php"); ?>
	


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