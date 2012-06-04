<div class='custom well'>
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


<div id='campers_grid'>

</div>
</div>

<script src="<?php echo base_url(); ?>/assets/js/ext-all.js"></script>
<link href="<?php echo base_url(); ?>/assets/resources/css/ext-all.css" rel="stylesheet">
<script type="text/javascript">
	Ext.onReady(function (){
		Ext.create('Ext.data.Store', {
		    storeId:'campersStore',
		    fields:['firstName', 'lastName', 'phoneNumber',"registrationCode"],
		    autoLoad : true,
		    proxy: {
		        type: 'ajax',
		        api: {
		        	read : 'admin/getRegisteredCampersAsJson'
		        },
		        reader: {
		            type: 'json',
		            root: 'data'
		        }
		    }
		});

		Ext.create('Ext.grid.Panel', {
		    title: 'Registered Campers',
		    store: Ext.data.StoreManager.lookup('campersStore'),
		    columns: [
		        { header: 'Name',  dataIndex: 'firstName' },
		        { header: 'Name',  dataIndex: 'firstName' },
		        { header: 'Phone', dataIndex: 'phoneNumber', flex: 1 },
		        { header: 'Registration Code', dataIndex: 'registrationCode' }
		    ],
		    height: 400,
		    width: 600,
		    dockedItems: [{
		        xtype: 'pagingtoolbar',
		        store: Ext.data.StoreManager.lookup('campersStore'),   // same store GridPanel is using
		        dock: 'bottom',
		        displayInfo: true
		    }],
		    renderTo: "campers_grid"
		});
	});

</script>
