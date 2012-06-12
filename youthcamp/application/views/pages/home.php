
			<?php  

			$attributes_signup = array('class' => 'custom', 'id'=>'signup_form' );
		?>
		<style type="text/css">
			.close_reg {
				font-size: 38px;
				color: black;
				font-weight : bold;
				line-height: 145px;
			}
		</style>
		<div class="row hero-unit stuff" >
			<div class='custom'>
					<div class='span4 well'>
						<?php 
						 
						
							$error = $this->session->flashdata('err');
							if(!empty($error)){
								?>
								<div class="alert alert-error">
									<?php echo  $error; ?>
								</div>
						<?php	}
						 ?>

						<div id='signup_div'>
							<div class='close_reg'>
								<span >REGISTERATION</span>
								<br>
								<span> CLOSED</span>
					
							 </div>
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
		



