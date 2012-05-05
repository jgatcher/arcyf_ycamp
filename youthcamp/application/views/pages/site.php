<?php 
	$has_registered = $this->session->userdata("has_registered");	
	//echo "<pre>";
	//print_r($camper);
	//echo "<pre>";

	function print_details($key, $value){
		echo "<tr>";
		echo "<td> $key</td>";
		echo "<td> $value</td>";
		echo "</tr>";
	}
?>
	
	<?php if ($has_registered == 1) {
		//$this->session->sess_destroy(); 
		?>
		<div class="alert alert-success span6">
			<p>
				You can now make payments<br/> Thanks for registering for Youth Camp 2012. Can't wait to see you there. Till then, keep your fire burning.
			</p>
		</div>
		<div class='span6'>
			<table class='table table-bordered table-striped'>
		    
		    <tbody>
		    	<?php 
		    		$obj = $camper[0];
		    		print_details("First Name", $obj["firstName"]);
		    		print_details("Last Name", $obj["lastName"]);
		    		print_details("Other Name", $obj["otherName"]);
		    		print_details("Date of Birth", $obj["dateOfBirth"]);
		    		print_details("Gender", $obj["gender"]);
		    		print_details("Area of Residence", $obj["residence"]);
		    		print_details("Church", $obj["church"]["name"]);
		    		print_details("Country of Residence", $obj["nationality"]);
		    		print_details("Phone Number", $obj["phoneNumber"]);
		    		$occType = $obj["occupation"]["type"];
		    		print_details("Occupation", $occType);
		    		if(trim($occType)=="student"){
		    			print_details("School", $obj["occupation"]["school"]);
		    			print_details("Location of School", $obj["occupation"]["school_location"]);
		    			print_details("Educational Level", $obj["occupation"]["educationalLevel"]);
		    		}
		    		print_details("Role At Camp", $obj["role"]);
		    		print_details("Day of Arival", $obj["arrival_day"]);
		    		print_details("Time of Arival", $obj["arrival_time"]);
		    		print_details("Emergency Contact (Name)", $obj["emergency"]["name"]);
		    		print_details("Emergency Contact(Number)", $obj["emergency"]["number"]);


		    	?>
		    </tbody>

			</table>
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


