
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
		
		$attributes = array('class' => 'well span8', 'id'=>'registerForm');
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
					<select name='church' id='church'>
						<option value='ridge'>Ridge</option>
						<option value='manet'>Manet</option>
						<option value='tudu'>Tudu</option>
						<option value='other'>Other</option>
					</select>
					<div class="control-group">

						<input type='text' name='otherChurch' id='otherChurch' class='hide'>
					
					</div>
				</p>

				<label>Country of Residence: </label>
				<p>
					<select name='nationality' siz='1'>
<option value="Afghanistan">Afghanistan</option><option value="Ãland Islands">Ãland Islands</option><option value="Albania">Albania</option><option value="Algeria">Algeria</option><option value="American Samoa">American Samoa</option><option value="Andorra">Andorra</option><option value="Angola">Angola</option><option value="Anguilla">Anguilla</option><option value="Antarctica">Antarctica</option><option value="Antigua and Barbuda">Antigua and Barbuda</option><option value="Argentina">Argentina</option><option value="Armenia">Armenia</option><option value="Aruba">Aruba</option><option value="Australia" selected="selected">Australia</option><option value="Austria">Austria</option><option value="Azerbaijan">Azerbaijan</option><option value="Bahamas">Bahamas</option><option value="Bahrain">Bahrain</option><option value="Bangladesh">Bangladesh</option><option value="Barbados">Barbados</option><option value="Belarus">Belarus</option><option value="Belgium">Belgium</option><option value="Belize">Belize</option><option value="Benin">Benin</option><option value="Bermuda">Bermuda</option><option value="Bhutan">Bhutan</option><option value="Bolivia">Bolivia</option><option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option><option value="Botswana">Botswana</option><option value="Bouvet Island">Bouvet Island</option><option value="Brazil">Brazil</option><option value="British Indian Ocean territory">British Indian Ocean territory</option><option value="Brunei Darussalam">Brunei Darussalam</option><option value="Bulgaria">Bulgaria</option><option value="Burkina Faso">Burkina Faso</option><option value="Burundi">Burundi</option><option value="Cambodia">Cambodia</option><option value="Cameroon">Cameroon</option><option value="Canada">Canada</option><option value="Cape Verde">Cape Verde</option><option value="Cayman Islands">Cayman Islands</option><option value="Central African Republic">Central African Republic</option><option value="Chad">Chad</option><option value="Chile">Chile</option><option value="China">China</option><option value="Christmas Island">Christmas Island</option><option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option><option value="Colombia">Colombia</option><option value="Comoros">Comoros</option><option value="Congo">Congo</option><option value="Congo, Democratic Republic">Congo, Democratic Republic</option><option value="Cook Islands">Cook Islands</option><option value="Costa Rica">Costa Rica</option><option value="Côte d'Ivoire (Ivory Coast)">Côte d'Ivoire (Ivory Coast)</option><option value="Croatia (Hrvatska)">Croatia (Hrvatska)</option><option value="Cuba">Cuba</option><option value="Cyprus">Cyprus</option><option value="Czech Republic">Czech Republic</option><option value="Denmark">Denmark</option><option value="Djibouti">Djibouti</option><option value="Dominica">Dominica</option><option value="Dominican Republic">Dominican Republic</option><option value="East Timor">East Timor</option><option value="Ecuador">Ecuador</option><option value="Egypt">Egypt</option><option value="El Salvador">El Salvador</option><option value="Equatorial Guinea">Equatorial Guinea</option><option value="Eritrea">Eritrea</option><option value="Estonia">Estonia</option><option value="Ethiopia">Ethiopia</option><option value="Falkland Islands">Falkland Islands</option><option value="Faroe Islands">Faroe Islands</option><option value="Fiji">Fiji</option><option value="Finland">Finland</option><option value="France">France</option><option value="French Guiana">French Guiana</option><option value="French Polynesia">French Polynesia</option><option value="French Southern Territories">French Southern Territories</option><option value="Gabon">Gabon</option><option value="Gambia">Gambia</option><option value="Georgia">Georgia</option><option value="Germany">Germany</option>
<option selected='true' value="Ghana">Ghana</option>
<option value="Gibraltar">Gibraltar</option><option value="Greece">Greece</option><option value="Greenland">Greenland</option><option value="Grenada">Grenada</option><option value="Guadeloupe">Guadeloupe</option><option value="Guam">Guam</option><option value="Guatemala">Guatemala</option><option value="Guinea">Guinea</option><option value="Guinea-Bissau">Guinea-Bissau</option><option value="Guyana">Guyana</option><option value="Haiti">Haiti</option><option value="Heard and McDonald Islands">Heard and McDonald Islands</option><option value="Honduras">Honduras</option><option value="Hong Kong">Hong Kong</option><option value="Hungary">Hungary</option><option value="Iceland">Iceland</option><option value="India">India</option><option value="Indonesia">Indonesia</option><!-- copyright Felgall Pty Ltd --><option value="Iran">Iran</option><option value="Iraq">Iraq</option><option value="Ireland">Ireland</option><option value="Israel">Israel</option><option value="Italy">Italy</option><option value="Jamaica">Jamaica</option><option value="Japan">Japan</option><option value="Jordan">Jordan</option><option value="Kazakhstan">Kazakhstan</option><option value="Kenya">Kenya</option><option value="Kiribati">Kiribati</option><option value="Korea (north)">Korea (north)</option><option value="Korea (south)">Korea (south)</option><option value="Kuwait">Kuwait</option><option value="Kyrgyzstan">Kyrgyzstan</option><option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option><option value="Latvia">Latvia</option><option value="Lebanon">Lebanon</option><option value="Lesotho">Lesotho</option><option value="Liberia">Liberia</option><option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option><option value="Liechtenstein">Liechtenstein</option><option value="Lithuania">Lithuania</option><option value="Luxembourg">Luxembourg</option><option value="Macao">Macao</option><option value="Macedonia, Former Yugoslav Republic Of">Macedonia, Former Yugoslav Republic Of</option><option value="Madagascar">Madagascar</option><option value="Malawi">Malawi</option><option value="Malaysia">Malaysia</option><option value="Maldives">Maldives</option><option value="Mali">Mali</option><option value="Malta">Malta</option><option value="Marshall Islands">Marshall Islands</option><option value="Martinique">Martinique</option><option value="Mauritania">Mauritania</option><option value="Mauritius">Mauritius</option><option value="Mayotte">Mayotte</option><option value="Mexico">Mexico</option><option value="Micronesia">Micronesia</option><option value="Moldova">Moldova</option><option value="Monaco">Monaco</option><option value="Mongolia">Mongolia</option><option value="Montenegro">Montenegro</option><option value="Montserrat">Montserrat</option><option value="Morocco">Morocco</option><option value="Mozambique">Mozambique</option><option value="Myanmar">Myanmar</option><option value="Namibia">Namibia</option><option value="Nauru">Nauru</option><option value="Nepal">Nepal</option><option value="Netherlands">Netherlands</option><option value="Netherlands Antilles">Netherlands Antilles</option><option value="New Caledonia">New Caledonia</option><option value="New Zealand">New Zealand</option><option value="Nicaragua">Nicaragua</option><option value="Niger">Niger</option><option value="Nigeria">Nigeria</option><option value="Niue">Niue</option><option value="Norfolk Island">Norfolk Island</option><option value="Northern Mariana Islands">Northern Mariana Islands</option><option value="Norway">Norway</option><option value="Oman">Oman</option><option value="Pakistan">Pakistan</option><option value="Palau">Palau</option><option value="Palestinian Territories">Palestinian Territories</option><option value="Panama">Panama</option><option value="Papua New Guinea">Papua New Guinea</option><option value="Paraguay">Paraguay</option><option value="Peru">Peru</option><option value="Philippines">Philippines</option><option value="Pitcairn">Pitcairn</option><option value="Poland">Poland</option><option value="Portugal">Portugal</option><option value="Puerto Rico">Puerto Rico</option><option value="Qatar">Qatar</option><option value="Réunion">Réunion</option><option value="Romania">Romania</option><option value="Russian Federation">Russian Federation</option><option value="Rwanda">Rwanda</option><option value="Saint Helena">Saint Helena</option><option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option><option value="Saint Lucia">Saint Lucia</option><option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option><option value="Saint Vincent and the Grenadines">Saint Vincent and the Grenadines</option><option value="Samoa">Samoa</option><option value="San Marino">San Marino</option><option value="Sao Tome and Principe">Sao Tome and Principe</option><!-- copyright Felgall Pty Ltd --><option value="Saudi Arabia">Saudi Arabia</option><option value="Senegal">Senegal</option><option value="Serbia">Serbia</option><option value="Seychelles">Seychelles</option><option value="Sierra Leone">Sierra Leone</option><option value="Singapore">Singapore</option><option value="Slovakia">Slovakia</option><option value="Slovenia">Slovenia</option><option value="Solomon Islands">Solomon Islands</option><option value="Somalia">Somalia</option><option value="South Africa">South Africa</option><option value="South Georgia and the South Sandwich Islands">South Georgia and the South Sandwich Islands</option><option value="Spain">Spain</option><option value="Sri Lanka">Sri Lanka</option><option value="Sudan">Sudan</option><option value="Suriname">Suriname</option><option value="Svalbard and Jan Mayen Islands">Svalbard and Jan Mayen Islands</option><option value="Swaziland">Swaziland</option><option value="Sweden">Sweden</option><option value="Switzerland">Switzerland</option><option value="Syria">Syria</option><option value="Taiwan">Taiwan</option><option value="Tajikistan">Tajikistan</option><option value="Tanzania">Tanzania</option><option value="Thailand">Thailand</option><option value="Togo">Togo</option><option value="Tokelau">Tokelau</option><option value="Tonga">Tonga</option><option value="Trinidad and Tobago">Trinidad and Tobago</option><option value="Tunisia">Tunisia</option><option value="Turkey">Turkey</option><option value="Turkmenistan">Turkmenistan</option><option value="Turks and Caicos Islands">Turks and Caicos Islands</option><option value="Tuvalu">Tuvalu</option><option value="Uganda">Uganda</option><option value="Ukraine">Ukraine</option><option value="United Arab Emirates">United Arab Emirates</option><option value="United Kingdom">United Kingdom</option><option  value="United States of America">United States of America</option><option value="Uruguay">Uruguay</option><option value="Uzbekistan">Uzbekistan</option><option value="Vanuatu">Vanuatu</option><option value="Vatican City">Vatican City</option><option value="Venezuela">Venezuela</option><option value="Vietnam">Vietnam</option><option value="Virgin Islands (British)">Virgin Islands (British)</option><option value="Virgin Islands (US)">Virgin Islands (US)</option><option value="Wallis and Futuna Islands">Wallis and Futuna Islands</option><option value="Western Sahara">Western Sahara</option><option value="Yemen">Yemen</option><option value="Zaire">Zaire</option><option value="Zambia">Zambia</option><option value="Zimbabwe">Zimbabwe</option></select>
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

							<select name='school' id='school'>
								<option value="Aburi Girls Senior High">Aburi Girls Senior High</option>
								<option value="Accra Girls Senior High">Accra Girls Senior High</option>
								<option value="Achimota Senior High">Achimota Senior High</option>
								<option value="Akosombo International">Akosombo International</option>
								<option value="Alsyd Academy">Alsyd Academy</option>
								<option value="Archbishop Porter Girls Senior High">Archbishop Porter Girls Senior High</option>
								<option value="Ashesi University">Ashesi University</option>
								<option value="Audausudai Junior High School">Audausudai Junior High School</option>
								<option value="Bask Academy">Bask Academy</option>
								<option value="Bishop Bowers School">Bishop Bowers School</option>
								<option value="Bishop Girl's School">Bishop Girl's School</option>
								<option value="Cape Coast University">Cape Coast University</option>
								<option value="Central University">Central University</option>
								<option value="Christ The King International School">Christ The King International School</option>
								<option value="Corpus Christi Catholic Basic School">Corpus Christi Catholic Basic School</option>
								<option value="East Airport International">East Airport International</option>
								<option value="Emit Electronic Institute">Emit Electronic Institute</option>
								<option value="Faith Montessori">Faith Montessori</option>
								<option value="Fountainhead Christian School">Fountainhead Christian School</option>
								<option value="Franklin & Marshall College">Franklin & Marshall College</option>
								<option value="Ghana Christian High">Ghana Christian High</option>
								<option value="Holy Child Senior High">Holy Child Senior High</option>
								<option value="Ideal College">Ideal College</option>
								<option value="Jack And Jill">Jack And Jill</option>
								<option value="Krobo Girls Senior High">Krobo Girls Senior High</option>
								<option value="Kumasi Girls' Senior High">Kumasi Girls' Senior High</option>
								<option value="Kwame Nkrumah University of Science and Technology">Kwame Nkrumah University of Science and Technology</option>
								<option value="Lincoln High School">Lincoln High School</option>
								<option value="Mary Mother Of Good Counsel">Mary Mother Of Good Counsel</option>
								<option value="Mawuli Senoir High">Mawuli Senoir High</option>
								<option value="Methodist University">Methodist University</option>
								<option value="Mfantsiman Girls Senior High">Mfantsiman Girls Senior High</option>
								<option value="Mfantsipim Senior High">Mfantsipim Senior High</option>
								<option value="Mizpah International School">Mizpah International School</option>
								<option value="Morning Glory Montessori">Morning Glory Montessori</option>
								<option value="Morning Star">Morning Star</option>
								<option value="New Nation School">New Nation School</option>
								<option value="North Ridge Lyceum">North Ridge Lyceum</option>
								<option value="Osu Presby Junior High School">Osu Presby Junior High School</option>
								<option value="Pentecost University">Pentecost University</option>
								<option value="Pope John Senior High">Pope John Senior High</option>
								<option value="Presbyterian Boys Senior High">Presbyterian Boys Senior High</option>
								<option value="Presbyterian Senior High [Osu]">Presbyterian Senior High [Osu]</option>
								<option value="Queens International School">Queens International School</option>
								<option value="Ridge Church School">Ridge Church School</option>
								<option value="SOS-HGIC">SOS-HGIC</option>
								<option value="Soul Clinic International">Soul Clinic International</option>
								<option value="St. Augustine's Senior High">St. Augustine's Senior High</option>
								<option value="St. John's Grammar">St. John's Grammar</option>
								<option value="St. Mary's Senior High">St. Mary's Senior High</option>
								<option value="St. Roses Senior High">St. Roses Senior High</option>
								<option value="St. Theresa's School">St. Theresa's School</option>
								<option value="St. Thomas Aquinas Senior High">St. Thomas Aquinas Senior High</option>
								<option value="Tema International School">Tema International School</option>
								<option value="University of Ghana">University of Ghana</option>
								<option value="University Of Ghana Basic School">University Of Ghana Basic School</option>
								<option value="Wesley Girls' Senior High">Wesley Girls' Senior High</option>
								<option value="Winneba Senior High">Winneba Senior High</option>
								<option value="Word Of Faith Christian School">Word Of Faith Christian School</option>
								<option value="other">Other</option>

							</select>				
						</p>

					</div>

					<div class="control-group">
						<p>
							<input type='text' name='other_school' id='other_school' class='hide'>
						</p>
					</div>

					<div class="control-group">
						<label>Location of School  </label>
						<p>
							<select name='school_location' id='school_location'>
								<option value='Ashanti Region (Kumasi)'>Ashanti Region (Kumasi)</option>
								<option value='Brong-Ahafo Region (Sunyani)'>Brong-Ahafo Region (Sunyani)</option>
								<option value='Central Region (Cape Coast)'>Central Region (Cape Coast)</option>
								<option value='Eastern Region (Koforidua)'>Eastern Region (Koforidua)</option>
								<option value='Greater Accra Region (Accra)'>Greater Accra Region (Accra)</option>
								<option value='Northern Region (Tamale)'>Northern Region (Tamale)</option>
								<option value='Upper East Region (Bolgatanga)'>Upper East Region (Bolgatanga)</option>
								<option value='Upper West Region (Wa)'>Upper West Region (Wa)</option>
								<option value='Volta Region (Ho)'>Volta Region (Ho)</option>
								<option value='Western Region (Sekondi-Takoradi)'>Western Region (Sekondi-Takoradi)</option>
								<option value='other'>Other (If Outside Ghana)</option>
							</select>
						</p>
					</div>
					<div class="control-group">
						<p>
							<input type='text' name='other_school_location' id='other_school_location' class='hide'>
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
						<option value='committee'>Committee</option>
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
			var otherChurch = $("#otherChurch");

			var currentOccupation = $("input[name='occupation']:checked").val();
			check_occupation(currentOccupation);

			$("input[name='occupation']").change(function(){
				currentOccupation = $(this).val();
				check_occupation(currentOccupation);
			});

			var currentChurch;
			$("#church").change(function(){
				currentChurch = $.trim($(this).val());
				if(currentChurch=="other"){
					otherChurch.show();
				}else {
					otherChurch.hide();
				}
				//alert(currentChurch);
			});
			
			var otherSchool  = $("#other_school");
			var currentSchool;
			$("#school").change(function(){
				currentSchool = $.trim($(this).val()).toLocaleLowerCase();
				
				if(currentSchool=="other")
					otherSchool.show();
				else {
					otherSchool.hide();
				}
			});

			var otherSchoolLocation = $("#other_school_location");
			var currentSchoolLocation;
			$("#school_location").change(function(){

				currentSchoolLocation = $.trim($(this).val()).toLocaleLowerCase();
				//alert(currentSchoolLocation)
				if(currentSchoolLocation=="other"){
					otherSchoolLocation.show();
				}else{
					otherSchoolLocation.hide();
				}

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

				//validate church here 
				var church = $("#church").val();
				if($.trim(church)=="other"){
					//var otherChurch = $("#otherChurch").val();
					if(!validate("otherChurch")){
						ErrorMsg("Please provide a name for your church");
						return false;
					}
				}
				
				var filter = /^\d{10}$/;
				if(!validate_fon("phoneNumber",filter)){
					ErrorMsg("Please provide a valid 10 digit phone number in this format (xxxxxxxxxx)");
					return false;
				}

				if($.trim(currentOccupation)=="student"){
					//check school and location
					var school = $("#school").val();
					
					if($.trim(school).toLocaleLowerCase()=="other"){
						//check to make sure that other shcool text box has been filled.
						if(!validate("other_school")){
							ErrorMsg("Please provide a name for your school");
							return false;
						}
					}

					var schoolLocation  = $("#school_location").val();
					if($.trim(schoolLocation).toLocaleLowerCase()=='other'){
						if(!validate("other_school_location")){
							ErrorMsg("Please provide location for your school");
							return false;
						}
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
