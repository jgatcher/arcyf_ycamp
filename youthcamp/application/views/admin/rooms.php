<?php $is_admin_logged_in = $this->session->userdata("is_admin_logged_in");  ?>
<?php if($is_admin_logged_in){ ?>
<div class='custom well'>
		<?php include ("links.php"); ?>
	<script src="<?php echo base_url(); ?>/assets/js/room_management.js"></script>
	
	<h2>Rooms</h2>
	<br />
	<button id='processRoomAllocation' class="btn" href="#">Process Room Allocation</button> 
	<button id='printRoomListFemale' class="btn" href="#">Print Female Room List</button> 
	<button id='printRoomListMale' class="btn" href="#">Print Male Room List</button>
	<br /> <br />
	<div id="rooms_grid"></div>
	

	<script type="text/javascript">
	
	(function(){
		//var baseUrl =  "<?php echo base_url(); ?>" ;
		//var url = baseUrl + "index.php/myprint/print_rooms";
		//var baseUrl =  "<?php echo base_url(); ?>" ;
		
		
	})();
</script>
	</script>
</div>
<?php 
	}
	else {
		//do redirect
		redirect("admin/");
	}
 ?>