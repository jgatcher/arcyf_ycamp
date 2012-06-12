<html>
<head>
	
	<link href="<?php echo base_url(); ?>/assets/css/bootstrap.css" rel="stylesheet">
    <style>
      body {
        padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
      }
    </style>
    <link href="<?php echo base_url(); ?>/assets/css/bootstrap-responsive.css" rel="stylesheet">
    
	<title><?php echo $title ?> </title>

</head>
<body>
	  <div class="container">
	 
	<div class='row'>
		<div class='span9'>

			<div>
				<h1>Youth Camp 2012 Room Allocation</h1>
			</div>
			<br />
			<div id='camper_records' >
				<table class='table table-bordered table-striped'>
			    	<tbody>
			    	<?php 
			    		function cmp($a, $b){
							return strcmp($a['camper'], $b['camper']);				
						}
						
						usort($campers, "cmp");
			    		$count = 1;
			    		foreach ($campers as $camper) {
			    			 echo  "<tr>";
			    			 echo "<td>".  $count ."</td>";
			    			 echo  "<td>".  $camper["camper"] ."</td>";
			    			 echo  "<td>".  $camper["room"] ."</td>";
			    			 echo  "<td>".  $camper["roomType"] ."</td>";
			    			 echo  "</tr>";
			    			 $count ++;
			    		}


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