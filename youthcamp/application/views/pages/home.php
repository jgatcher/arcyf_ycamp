<div class='custom'>
		<?php  
			$attributes = array('class' => 'well custom', 'id'=>'registerForm' );
		echo form_open('registration/signup', $attributes);
		?>
		
		<div class="row">

			<div class="span4">
				<h2>Already Registered?</h2>
				<div >
				
						<label>Email:</label>
						<p>
							<input type='text' name='email_log' id='email_log'>
						</p>
						
						<label>Password:</label>
						<p>
							<input type='password' name='password_log' id='password_log'>
						</p>
					<input type='submit' value='Login' class='btn btn-primary' id='loginBtn'>
				</div>
			</div>
			<div class="span4">
				<h2>Not yet  Registered?</h2>
				<div >

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
					
					<input type='submit' value='Sign Up' class='btn btn-primary' id='SignUp'>
				</div>
			</div>

			
			
			
		</div>
	</form>
	</div>


<script type="text/javascript">
	(function(){
		
	})();
</script>