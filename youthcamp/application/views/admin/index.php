<div class='custom'>
	<h2>Admin Page</h2>

	<table class='table table-bordered table-striped'>
		
		<tbody>
			<tr>
				<td>Number of Campers Registered</td>
				<td><?php echo $num_campers_registered;  ?> </td>
			</tr>
			<tr>
				<td>Number of Campers Signed Up</td>
				<td><?php echo $num_campers_signedup;  ?> </td>
			</tr>
			
		</tbody>
		
	</table>
	
	<br />
	<h3>Registered Campers</h3>
	<table class='table table-bordered table-striped'>
		<thead>
			    <tr>
			    	<th>Name  of Camper</th>
				    <th>Phone Number </th>
				    <th>Registration Code</th>
			    </tr>
		    </thead>
		<tbody>
			<?php 
				$campers = $campers_registered;
				foreach ($campers as $camper) {
					?>
					<tr>
						<td><?php echo $camper["firstName"]  . " ". $camper["lastName"] ;?> </td>
						<td> <?php echo $camper["phoneNumber"]; ?></td>
						<td> <?php echo $camper["registrationCode"]; ?> </td>
					</tr>	
					<?php
				} 
			?>
			
		</tbody>
	</table>

	<br />
	<h3>Signed Campers </h3>
	<table class='table table-bordered table-striped'>
		<thead>
			    <tr>
			    	<th>Email</th>
				    <th>Date Signed Up</th>
				</tr>
		    </thead>
		<tbody>
			<?php 
				foreach ($campers_signedup as $camper) {
					?>
					<tr>
						<td><?php echo $camper["email"]  ;?> </td>
						<td> <?php echo $camper["date_signed_up"]; ?></td>
					</tr>	
					<?php
				} 
			?>
			
		</tbody>
	</table>

</div>