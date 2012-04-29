
<div class='custom well'>
		<?php  
			$attributes_login = array('class' => 'custom', 'id'=>'login_form' );
			$attributes_signup = array('class' => 'custom', 'id'=>'signup_form' );
		?>
		
		<div class="row" >
			<div class='span4'>

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
					<a id='click_signup' href="#"> Click here to sign up</a> 
				</div>
			

			<div id='signup_div'>
				<h2>Sign Up </h2>
				<?php echo form_open('home/signup', $attributes_signup); ?>

					<label>Email:</label>
					<p>
						<input type='text' name='email' id='email'>
					</p>
					
					<label>Password:</label>
					<p>
						<input type='password' name='password' id='password'>
					</p>
					
					<label>Confirm Password:</label>
					<p>
						<input type='password' name='confpassword' id='confpassword'>
					</p>
					
					<input type='submit' value='Sign Up' class='btn btn-primary' id='signUpBtn'>
				<?php echo form_close(); ?>
				<a id='click_login' href="#"> Click here if already registered</a> 
			</div>
		</div>
			<div class="span4">
				some image goes here
			</div>
			
		</div>
	</form>
	</div>


<script type="text/javascript">
	(function(){

		var loginDiv = $("#login_div");
		var signupDiv = $("#signup_div");

		$("#click_login").click(function (){
			loginDiv.show();
			signupDiv.hide();
		});


		$("#click_signup").click(function (){
			loginDiv.hide();
			signupDiv.show();
		});

		$("#signup_form").submit(function () {
		    var f =  $(this);
		    var data = window.data = $(this).serializeArray();	
		    var pass = f.find("#password").val();
		    var pass2 = f.find("#confpassword").val();
		    var email = f.find("#email").val();

		    var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            if(!filter.test(email)){
            	alert("please enter a valid email");
                return false;
            }

		    if(pass.length < 5){
		        alert("password must be more than 5 characters");
		        return false;
		    }
			
		    if(pass != pass2){
		       alert("password don't match");
		       return false;
		    }
		});

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

	})();
</script>