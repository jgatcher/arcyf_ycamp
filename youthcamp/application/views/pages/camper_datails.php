<html>
<head>
	
	<link href="<?php echo base_url(); ?>/assets/css/bootstrap.css" rel="stylesheet">
    <style>
      body {
        padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
      }
    </style>
    <link href="<?php echo base_url(); ?>/assets/css/bootstrap-responsive.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>/assets/css/datepicker.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>/assets/css/custom.css" rel="stylesheet">
	<title><?php echo $title ?> </title>

</head>
<body>
	  <div class="container">

	<?php 
		function print_details($key, $value){
			echo "<tr>";
			echo "<td> $key</td>";
			echo "<td> <b>$value</b> </td>";
			echo "</tr>";
		}
		$obj  = $camper[0];
	 ?>
	<div class='row'>
		<div class='span9'>

			<div>
				<h1>Youth Camp 2012 Registration Details</h1>
			</div>
			<br />
			<div id='camper_records' class='well'>
				<table class='table table-bordered table-striped'>
			    	<tbody>
			    	<?php 
			    		
			    		print_details("First Name", $obj["firstName"]);
			    		print_details("Last Name", $obj["lastName"]);
			    		print_details("Other Name", $obj["otherName"]);
			    		print_details("Email", $obj["email"]);
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
			    		print_details("Registeration Code", $obj["registrationCode"]);


			    	?>
			    	</tbody>
			</table>
			</div>
	</div>
	</div>
	 
</div>
<script type="text/javascript">
	window.onload =  function (){
		//window.print();
	}
</script>
</body>
</html>