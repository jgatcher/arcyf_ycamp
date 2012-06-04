<?php $is_admin_logged_in = $this->session->userdata("is_admin_logged_in");  ?>
<?php if($is_admin_logged_in){ ?>
<div class='custom well'>
	<div class="logout">
		<a href="<?php echo site_url('admin/logout') ?>">Logout</a>
	</div> 
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
	
	<div id='campers_search'>
		
	</div>

	<h3>Registered Campers</h3>
	<div id='campers_stuff'>
			<div id='campers_grid'>

		</div>
		<div id='campers_form'>
			
		</div>
	
	</div>
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

	<br />
</div>
<?php 
	}
	else {
		//do redirect
		redirect("admin/");
	}
 ?>