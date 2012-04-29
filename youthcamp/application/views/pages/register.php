
<?php $is_logged_in = $this->session->userdata("is_user_logged_in"); 
	if($is_logged_in){
		//echo $this->session->userdata("has_registered");
		?>
		<div class='custom'>
			<div class="logout">
				<a href="<?php echo site_url('home/logout') ?>">Logout</a>
			</div> 
	<h2>Register</h2>
	<?php 
		
		$attributes = array('class' => 'well custom', 'id'=>'registerForm' );
		echo form_open('registeration/register_camper', $attributes);
 	?>
		<div class="row">
			
			<div class="span2"></div>
	  		<div class="span4">

	  			<label>First Name  </label>
				<p>
					<input type='text' name='firstName' id='firstName'>
				</p>
				<label>Last Name  </label>
				<p>
					<input type='text' name='lastName' id='lastName'>
				</p>
				<label>Other Name </label>
				<p>
					<input type='text' name='otherName' id='otherName'>
				</p>
				<label>Date of Birth</label>
				<p>
					<div class="input-append date" id="dp3" data-date="12-02-2012" data-date-format="dd-mm-yyyy">
						<input class="span2" size="16" type="text" value="12-02-2012"  name='dateOfbirth' readonly="" />
						<span class="add-on cust-add-on"><i class="icon-th"></i></span>
					</div>
				</p>
				<label>Gender</label>
				<p>
					<div class="controls">
		             	<label class="radio inline">
		                	<input type="radio" name="gender" id="male" value="male" checked="">
		               		Male
		            	</label>
		              	<label class="radio inline">
		                <input type="radio" name="gender" id="female" value="female">
		                	Female
		              	</label>
		            </div>
				</p>
				<label>Residence :</label>
				<p>
					<input type='text' name='residence' id='residence'>
				</p>
				<label>Church </label>
				<p>
					<select name='church'>
						<option value='ridge'>Ridge</option>
						<option value='manet'>Manet</option>
						<option value='tudu'>Tudu</option>
						<option value='other'>Other</option>
					</select>
				</p>
	  		</div>
	  		<div class="span4">
	  			<label>Nationality: </label>
				<p>
					<select name='nationality'>
						<option value='ghana'>Ghana</option>
					</select>
				</p>

				<label>School  </label>
				<p>
					<input type='text' name='school' id='school'>
				</p>
				<label>Location of School  </label>
				<p>
					<input type='text' name='school_location' id='school_location'>
				</p>

				<label>Educational Level </label>
				<p>
					<select name='educationalLevel'>
						<option value='jhs student'> JHS Student</option>
						<option value='shs'>SHS Student</option>
						<option value='tertiary'>University/Tertiary</option>
					</select>
				</p>
				<label>Role At Camp </label>
				<p>
					<select name='role'>
						<option value='prayer warrior'>Prayer Warrior</option>
						<option value='protocol'>Protocol</option>
						<option value='participant'>Participant</option>
					</select>
				</p>
				<label>Day of Arival</label>
				<p>
					<select name='arrival_day'>
						<option value='wednesday'>Wednesday</option>
						<option value='thursday'>Thursday</option>
						<option value='friday'>Friday</option>
						<option value='saturday'>Saturday</option>
						<option value='sunday'>Sunday</option>
					</select>
				</p>
				<label>Time of Arival</label>
				<p>
					<select name='arrival_time'>
						<option value='morning'>Morning</option>
						<option value='afternoon'>Afternoon</option>
						<option value='evenining'>Evening</option>
					</select>
				</p>
	  		</div>
		</div>
		<input type='submit' id='submitBtn' value='Submit' class='btn-primary'>
	</form>
</div>

<script type="text/javascript">
		(function(){
			$("#dp3").datepicker();

			$("#registerForm").submit(function (){


				//todo: validation

				
				// var data = $(this).serializeArray();
				// var url  = $(this).attr("action");
				// $.ajax({
				// 	data : data,
				// 	type : 'post',
				// 	dataType : 'json',
				// 	url : url,
				// 	success : function (res){
				// 		console.log(res);
				// 		if(res.success){
				// 			console.log(" we are here");
				// 			$("#success span").html(res.message);
				// 			$("#success").show()
				// 		}
				// 	}
				// });
				
			});
		})();

	</script>
		<?php
	}else {
		?>
		<div class="row custom">
			<div class="span6">
				You need to login to be able to view this page. 
			</div>
			
		</div>
	<?php }
?>
