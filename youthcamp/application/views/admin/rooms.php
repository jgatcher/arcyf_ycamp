<?php $is_admin_logged_in = $this->session->userdata("is_admin_logged_in");  ?>
<?php if($is_admin_logged_in){ ?>
<div class='custom well'>
		<?php include ("links.php"); ?>
	<script src="<?php echo base_url(); ?>/assets/js/room_management.js"></script>
	
	<h2>Rooms</h2>
	<br />
	<button id='printroomlistfemale' class="btn" href="#">Print Female Room List</button> 
	<button id='printroomlistmale' class="btn" href="#">Print Male Room List</button>
	<br /> <br />
	<div id="rooms_grid"></div>
	

	<script type="text/javascript">
	
	(function(){
		var baseUrl =  "<?php echo base_url(); ?>" ;
		var url = baseUrl + "index.php/myprint/print_rooms";
		$("#printroomlistmale").click(function (){
			
			var a = window.open(url + "/male", "print_window", 'height=600,width=720', false);
			a.focus();

		});
		$("#printroomlistfemale").click(function (){
			
			var a = window.open(url + "/female", "print_window", 'height=600,width=720', false);
			a.focus();

		});

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