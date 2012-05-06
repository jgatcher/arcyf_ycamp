<?php 

	function generate_code($fname, $lname){
		$date = date("Y-m-d H:i:s");
		$short = md5($date);
		return $fname[0] . $lname[0]. strtoupper(substr($short,0,6));	
	}

	echo generate_code("Selasie", "Hanson");
	
?>