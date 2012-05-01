
<?php $is_logged_in = $this->session->userdata("is_user_logged_in"); 
	if($is_logged_in){
		//echo $this->session->userdata("has_registered");
		?>
		<div class='custom'>
			<div class="logout">
				<a href="<?php echo site_url('home/logout') ?>">Logout</a>
			</div> 
	<h2>Register</h2>
	<div class="alert alert-error hide" id='error_box'>
		<p></p>
	</div>
	<?php 
		
		$attributes = array('class' => 'well custom', 'id'=>'registerForm' );
		echo form_open('registeration/register_camper', $attributes);
 	?>
		<div class="row">
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
						<div class="input-append date" id="dp3" data-date="12-02-2012" data-date-format="dd-mm-yyyy">
							<input class="span2" size="16" type="text" value="12-02-2012"  name='dateOfbirth' readonly="" />
							<span class="add-on cust-add-on"><i class="icon-th"></i></span>
						</div>
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
						<input type='text' name='phone_number' id='phone_number'>
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
			var studentVal;
			var errorBox = $("#error_box");

			var currentOccupation = $("input[name='occupation']:checked").val();
			check_occupation(currentOccupation);

			$("input[name='occupation']").change(function(){
				check_occupation($(this).val());
			})


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

				if(!validate("residence")){
					ErrorMsg("Please provide an Area of residence");
					return false;
				}
				
				var filter = /^\d{10}$/;
				if(!validate_fon("phone_number",filter)){
					ErrorMsg("Please provide a valid 10 digit phone number in this format (xxxxxxxxxx)");
					return false;
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
