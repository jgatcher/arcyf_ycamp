<div class='custom'>
	<div class='row'>
		<div class='well'>
			<?php 
			$item = $this->session->flashdata('item');
			if(!empty($item)){ 
				$type  = $item["type"];
				?>
				<div class="alert alert-<?php echo $type ?>">
					<?php echo  $item["message"]; ?>
				</div>
			<?php } ?>
			<div>
				<a href="<?php echo base_url(); ?>index.php/home/view_login"> Please login to Continue </a>
			</div>

		</div>
	</div>
</div>