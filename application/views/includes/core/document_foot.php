		<!-- 
                <?//php include '../../includes/dialogs/dialog_register.php'?>
		<?//php include '../dialogs/dialog_form.php'?>
		<?//php include '../../includes/dialogs/dialog_delete.php'?>
		<?//php include '../../includes/dialogs/dialog_welcome.php'?>
		<?//php include '../../includes/dialogs/dialog_logout.php'?>
                -->
  
		<!-- Removed to avoid loading overlay at all times. This bug has been requested by at -->
                <!-- Cancelled due to reduced functionality -->
		<div id="loading_overlay">
			<div class="loading_message round_bottom">
				<img src="<?php echo $this->config->base_url(); ?>images/interface/loading.gif" alt="loading" />
			</div>
		</div>
                <!--
		<?//php include '../../includes/components/template_options.php'?>
                -->    
                
		</div>
	</body>
</html>