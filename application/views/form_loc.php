<?php include 'includes/core/document_head.php'?>
	<div id="pjax">
		<div id="wrapper" data-adminica-nav-top="4" data-adminica-nav-inner="4">
			<?php include 'includes/components/topbar.php'?>
			<?php include 'includes/components/sidebar.php'?>
			<?php include 'includes/components/stackbar.php'?></div><!-- Closing Div for Stack Nav, you can boxes under the stack before this -->
			<div id="main_container" class="main_container container_16 clearfix">
				<?php include 'includes/components/navigation.php'?>

				<div class="box grid_16">
					<div class="block">
					<form action="<?php echo $this->config->base_url(); ?>index.php/data/data_add" method="post" class="validate_form">
						<h2 class="section">Add New Location</h2>
						<fieldset class="label_side label_small">
							<label for="text_field_inline">Location Name</label>
							<div>
								<input type="text">
							</div>
						</fieldset>
						
						<div class="columns">
							<div class="col_50">
								<fieldset class="label_side label_small">
									<label>Race Type</label>
									<div>
										<div class="jqui_radios">
											<input type="radio" name="race_type" value="G" id="type_rc1"/><label for="type_rc1">G Type Races</label>
											<input type="radio" name="race_type" value="T" id="type_rc2"/><label for="type_rc2">T Type Races</label>
                                                                                        <input type="radio" name="race_type" value="R" id="type_rc3"/><label for="type_rc3">R Type Races</label>
                                                                                </div>
									</div>
								</fieldset>
							</div>
						</div>

						<div class="button_bar clearfix">
							<button class="dark" type="submit">
								<img src="../../images/icons/small/white/mail.png">
								<span>Send</span>
							</button>
							<button class="light send_right" type="reset">
								<span>Reset</span>
							</button>
						</div>
						</form>
					</div>

				</div>
			</div>
		</div>
		<?php include 'includes/dialogs/dialog_welcome.php'?>
		<?php include 'includes/dialogs/dialog_logout.php'?>
<?php include 'includes/core/document_foot.php'?>