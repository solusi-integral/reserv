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
                                        <?php echo form_open('data/data_add'); ?>
						<h2 class="section">Add New Location</h2>
						<fieldset class="label_side label_small">
							<label for="text_field_inline">Location</label>
							<div>
                                                                <?php 
                                                                    $data_name = array(
                                                                    'name' => 'loc_name',
                                                                    'id' => 'loc_name',
                                                                    'class' => 'input_box',
                                                                    'placeholder' => 'Please Enter Name'
                                                                    );

                                                                    echo form_input($data_name);
                                                                ?>
							</div>
						</fieldset>
						
						<div class="columns">
							<div class="col_50">
								<fieldset class="label_side label_small">
									<label>Race Type</label>
									<div>
										<div class="jqui_dr">
                                                                                    <?php 
                                                                                        $data_gender = array(
                                                                                        'G' => 'G',
                                                                                        'T' => 'T',
                                                                                        'R' => 'R'
                                                                                        );

                                                                                        echo form_dropdown('race_type', $data_gender, 'G', 'class="dropdown_box"');
                                                                                    
                                                                                    ?>
                                                                                </div>
									</div>
								</fieldset>
							</div>
						</div>

						<div class="button_bar clearfix">
                                                            <?php echo form_submit('submit', 'Submit', "class='dark'"); ?>
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