
<?php $is_logged_in = $this->session->userdata("is_user_logged_in"); 
	if($is_logged_in){
		//echo $this->session->userdata("has_registered");
		?>
		<div class='custom'>
			<div class="logout">
				<a href="<?php echo site_url('home/logout') ?>">Logout</a>
			</div> 
	
			<div class='instructions'>
				<h2>Register for Youth Camp in just 3 simple steps.</h2>
				<h3>Step 3. Fill out the registering form</h3>
				<ol>
				  <li class="step1 ">1</li>
				  <li class="step2">2</li>
				  <li class="step3 selected">3</li>
				</ol>
			</div>

		<div class="alert alert-error hide" id='error_box'>
			<p></p>
		</div>
	<?php 
		
		$attributes = array('class' => 'well span8', 'id'=>'registerForm' );
		echo form_open('registeration/register_camper', $attributes);
 	?>
		<div class="row">
	  		<div class="span8"><h2>Register</h2><br /> </div>

	  		<div class="span4">

	  			<div class="control-group">
	  				<label>First Name  </label>
					<p>
						<input type='text' name='firstName' id='firstName'>
					</p>
	  			</div>
	  			<div class="control-group">
	  				<label>Last Name  </label>
					<p>
						<input type='text' name='lastName' id='lastName'>
					</p>
	  			</div>
	  			<div class="control-group">
	  				<label>Other Name </label>
					<p>
						<input type='text' name='otherName' id='otherName'>
					</p>
	  			</div>
	  			<div class="control-group">
	  				<label>Date of Birth</label>
					<p>
						
							<select class='span2'name='month' id='month' >
								<option value=''>Month</option>
								<option value='01'>January</option>
								<option value='02'>February</option>
								<option value='03'>March</option>
								<option value='04'>April</option>
								<option value='05'>May</option>
								<option value='06'>June</option>
								<option value='07'>July</option>
								<option value='08'>August</option>
								<option value='09'>September</option>
								<option value='10'>October</option>
								<option value='11'>November</option>
								<option value='12'>December</option>
							</select>
						
							<select class='span1' name='day'  id='day'>
								<option value=''>Day</option>
								<?php
									for ($i= 1; $i < 32 ; $i++) { 
										echo "<option value='$i' > $i  </option>";
									}
								 ?>

							</select>
						
							<select class='span1' name = 'year'  placeholder="year" id='year'>
							<option value=''>Year</option>
								<?php 
									$year =  date('Y'); 
									for ($i = 1960; $i  <= $year  ; $i++) { 
										echo "<option value='$i' > $i  </option>";
									}
								?>
							</select>
					</p>
	  			</div>
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
	  			
	  			<div class="control-group">
	  				<label>Area of Residence :</label>
					<p>
						<input type='text' name='residence' id='residence'>
					</p>
	  			</div>

	  			<label>Church </label>
				<p>
					<select name='church'>
						<option value='ridge'>Ridge</option>
						<option value='manet'>Manet</option>
						<option value='tudu'>Tudu</option>
						<option value='other'>Other</option>
					</select>
				</p>

				<label>Country of Residence: </label>
				<p>
					<select name='nationality'>
						<option value='ghana'>Ghana</option>
					</select>
				</p>
	  			
	  			<div class="control-group">
					<label>Phone Number</label>
					<p>
						<input type='text' name='phoneNumber' id='phoneNumber'>
					</p>
				</div>
	  		</div>
	  		<div class="span4">

	  			<label>Occupation</label>
				<p>
					<div class="controls">
		             	<label class="radio inline">
		                	<input type="radio" name="occupation" id="student" value="student" checked="">
		               		Student
		            	</label>
		              	<label class="radio inline">
		                <input type="radio" name="occupation" id="worker" value="worker">
		                	Worker
		              	</label>
		            </div>
				</p>
				<div id="student_details">
					<div class="control-group">
						<label>School  </label>
						<p>
							<input type='text' name='school' id='school'>
						</p>
					</div>
					<div class="control-group">
						<label>Location of School  </label>
						<p>
							<input type='text' name='school_location' id='school_location'>
						</p>
					</div>

					<label>Educational Level </label>
					<p>
						<select name='educationalLevel'>
							<option value='jhs student'> JHS Student</option>
							<option value='shs'>SHS Student</option>
							<option value='tertiary'>University/Tertiary</option>
						</select>
					</p>
				</div>

				<label>Role At Camp </label>
				<p>
					<select name='role'>
						<option value='camper'>Camper</option>
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
				
				<div class="control-group">
					<label>Emergency Contact (Name)</label>
					<p>
						<input type='text' name='emergency_contact' id='emergency_contact'>
					</p>
	  			</div>
	  			<div class="control-group">
	  				<label>Emergency Contact(Number)</label>
					<p>
						<input type='text' name='emergency_contact_num' id='emergency_contact_num'>
					</p>
	  			</div>
	  			<div class="control-group">

	  			</div>
			</div>
		</div>
		<input type='submit' id='submitBtn' value='Submit' class='btn-primary'>
	</form>
</div>

<script type="text/javascript">
		(function(){
			$("#dp3").datepicker();

			var studentDetails = $("#student_details");
			var errorBox = $("#error_box");

			var currentOccupation = $("input[name='occupation']:checked").val();
			check_occupation(currentOccupation);

			$("input[name='occupation']").change(function(){
				currentOccupation = $(this).val();
				check_occupation(currentOccupation);
			});

			

			function check_occupation(studentVal) {
				studentVal = $.trim(studentVal);
				if(studentVal=="worker"){
					studentDetails.hide();
				}

				if(studentVal== "student"){
					studentDetails.show();
				}
			}

			$("#registerForm").submit(function (){
				clear();

				//todo: validation
				if(!validate("firstName")){
					ErrorMsg("Please provide a First Name");
					return false;
				}

				if(!validate("lastName")){
					ErrorMsg("Please provide a Last Name");
					return false;
				}

				if(!validate('month')){
					ErrorMsg("Please select a Month for the date of Birth");
					return false;
				}

				if(!validate('day')){
					ErrorMsg("Please select a Day for the date of Birth");
					return false;
				}

				if(!validate('year')){
					ErrorMsg("Please select a Year for the date of Birth");
					return false;
				}


				if(!validate("residence")){
					ErrorMsg("Please provide an Area of residence");
					return false;
				}
				
				var filter = /^\d{10}$/;
				if(!validate_fon("phoneNumber",filter)){
					ErrorMsg("Please provide a valid 10 digit phone number in this format (xxxxxxxxxx)");
					return false;
				}

				if($.trim(currentOccupation)=="student"){
					//check school and location
					if(!validate("school")){
						ErrorMsg("Please provide a name for your school");
						return false;
					}

					if(!validate("school_location")){
						ErrorMsg("Please provide location for your school");
						return false;
					}
				}

				if(!validate("emergency_contact")){
					ErrorMsg("Please provide a name for an Emergency Contact");
					return false;
				}
				
				if(!validate_fon("emergency_contact_num",filter)){
					ErrorMsg("Please provide a valid 10 digit phone number for your Emergency Contact");
					return false;
				}

			});

			function ErrorMsg(message){
				errorBox.find("p").text(message);
				errorBox.show();
			}

			function validate(id){
				var _id = $("#" + id);
				var val = $.trim(_id.val());
				if (val == "") {
					_id.parents(".control-group").addClass("error");
					return false; 
				}
				else 
					return true;
			}

			function validate_fon(id, filter){
				var _id = $("#" + id);
				var val = $.trim(_id.val());
				if(!filter.test(val)){
					_id.parents(".control-group").addClass("error");
					return false; 
				} else {
					return true;
				}
			}

			
			function clear() {
				//hide the error box and clear all control groups
				errorBox.hide(); 
				$(".control-group").removeClass("error");
			}
			
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
