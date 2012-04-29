</div><!-- /container -->

<div class="footer"><strong>&copy; 2012</strong></div>
 	<script src="<?php echo base_url(); ?>/assets/js/jquery.js"></script>
    <script src="<?php echo base_url(); ?>/assets/js/bootstrap-transition.js"></script>
    <script src="<?php echo base_url(); ?>/assets/js/bootstrap-alert.js"></script>
    <script src="<?php echo base_url(); ?>/assets/js/bootstrap-modal.js"></script>
    <script src="<?php echo base_url(); ?>/assets/js/bootstrap-dropdown.js"></script>
    <script src="<?php echo base_url(); ?>/assets/js/bootstrap-scrollspy.js"></script>
    <script src="<?php echo base_url(); ?>/assets/js/bootstrap-tab.js"></script>
    <script src="<?php echo base_url(); ?>/assets/js/bootstrap-tooltip.js"></script>
    <script src="<?php echo base_url(); ?>/assets/js/bootstrap-popover.js"></script>
    <script src="<?php echo base_url(); ?>/assets/js/bootstrap-button.js"></script>
    <script src="<?php echo base_url(); ?>/assets/js/bootstrap-collapse.js"></script>
    <script src="<?php echo base_url(); ?>/assets/js/bootstrap-carousel.js"></script>
    <script src="<?php echo base_url(); ?>/assets/js/bootstrap-typeahead.js"></script>
    <script src="<?php echo base_url(); ?>/assets/js/bootstrap-datepicker.js"></script>
    <script type="text/javascript">
		(function(){
			$("#dp3").datepicker();

			$("#registerForm").submit(function (){

				var data = $(this).serializeArray();
				var url  = $(this).attr("action");
				$.ajax({
					data : data,
					type : 'post',
					dataType : 'json',
					url : url,
					success : function (res){
						console.log(res);
						if(res.success){
							console.log(" we are here");
							$("#success span").html(res.message);
							$("#success").show()
						}
					}
				});
				return false;
			});
		})();

	</script>
  </body>
</html>
