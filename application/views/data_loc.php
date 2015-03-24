<?php include 'includes/core/document_head.php'?>
	<div id="pjax">
		<div id="wrapper">
			<div class="isolate">
				<div class="center">
					<div class="main_container full_size container_16 clearfix">
						<div class="box light grid_16">
							<h2 class="box_head">Race Details</h2>
							<div class="controls">
								<div class="wizard_progressbar"></div>
							</div>
							<div class="toggle_container">
								<div class="wizard">

									<div class="wizard_steps">
										<ul class="clearfix">
											<li class="current">
												<a href="#step_1" class="clearfix">
													<span>1. <strong>Race Information</strong></span>
													<small>Basic race information. </small>
												</a>
											</li>
											<li>
												<a href="#step_2" class="clearfix">
													<span>2. <strong>Additional Info</strong></span>
													<small>Details like comments.</small>
												</a>
											</li>
											<li>
												<a href="#step_3" class="clearfix">
													<span>3. <strong>Personal Info</strong></span>
													<small>Who is reporting the edit.</small>
												</a>
											</li>
											<li>
												<a href="#step_4" class="clearfix">
													<span>4. <strong>Finish</strong></span>
													<small>Confirm and complete</small>
												</a>
											</li>
										</ul>
									</div>


									<div class="wizard_content">

		                            	<form action="<?php echo $this->config->base_url(); ?>index.php/data/insert" method="post" class="validate_form">
										<div id="step_1" class="step block" style="display:block;">
											<div class="section">
												<h2>1. Race Information</h2>
												<p>Please verify race information below.</p>
											</div>
											<div class="columns clearfix">
												<div class="col_50">
													<fieldset class="label_side top">
														<label>Location</label>
														<div>
                                                                                                                    <input type="text" placeholder="Location Names">
															<div class="required_tag"></div>
				                                        </div>
													</fieldset>
												</div>
												<div class="col_50">
													<fieldset class="label_side top">
														<label>Type</label>
														<div>
															<input type="text" placeholder="Race Types">
															<div class="required_tag"></div>
				                                        </div>
													</fieldset>
												</div>
											</div>
											<div class="columns clearfix">
												<div class="col_50">
													<fieldset class="label_side bottom">
														<label>Race Number</label>
														<div>
															<input type="email" placeholder="Race Number">
															<div class="required_tag"></div>
				                                        </div>
													</fieldset>
												</div>
												<div class="col_50 clearfix">
													<fieldset class="label_side clearfix bottom">
														<label class="clearfix">Jump Date</label>
														<div>
															<input type="number" placeholder="Jump Date">
															<div class="required_tag"></div>
				                                        </div>
													</fieldset>
												</div>
											</div>
											<div class="button_bar clearfix">
												<button class="next_step forward send_right" data-goto="step_2" type="button">
													<img height="24" width="24" alt="Bended Arrow Right" src="<?php echo $this->config->base_url(); ?>images/icons/small/white/bended_arrow_right.png">
													<span>Next Step</span>
												</button>
											</div>
										</div>

										<div id="step_2" class="step block">
											<h2 class="section">2. Additional Info</h2>

											<div class="columns clearfix">
												<div class="col_50">
													<fieldset class="label_side top">
														<label>Location</label>
														<div class="clearfix">
															<input type="text" placeholder="Location Names">
															<div class="required_tag"></div>
														</div>
													</fieldset>
												</div>
												<div class="col_50">
													<fieldset class="label_side top">
														<label>Time</label>
														
															<div class="clearfix">
															<input type="text" placeholder="Jump Date">
															<div class="required_tag"></div>
														</div>
														
													</fieldset>
												</div>
											</div>
											<fieldset>
												<label>Comment<span>Please select race comment you wish to report.</span></label>
												<div class="jqui_radios">
                                                                                                    <input type="radio" name="comment" value="Network Error" id="required_2c1" class="required"/><label for="required_2c1">Network Error</label> 
                                                                                                    <input type="radio" name="comment" value="Remote Failure" id="required_2c2" /><label for="required_2c2">Remote Failure</label>
                                                                                                    <input type="radio" name="comment" value="Not Shown" id="required_2c3" /><label for="required_2c3">Not Shown</label>
                                                                                                    <input type="radio" name="comment" value="Late Shown" id="required_2c4" /><label for="required_2c4">Late Shown</label>
                                                                                                    <input type="radio" name="comment" value="False Start" id="required_2c5" /><label for="required_2c5">False Start</label>
                                                                                                    <input type="radio" name="comment" value="Standing Start" id="required_2c6" /><label for="required_2c6">Standing Start</label>
                                                                                                    <input type="radio" name="comment" value="Other" id="required_2c7" /><label for="required_2c7">Other</label>
                                                                                                                                
                                                                                                </div>
											</fieldset>

											<div class="button_bar clearfix">
												<button class="next_step back light" data-goto="step_1" type="button">
													<img height="24" width="24" alt="Bended Arrow Right" src="<?php echo $this->config->base_url(); ?>images/icons/small/grey/bended_arrow_left.png">
													<span>Prev Step</span>
												</button>
												<button class="next_step forward send_right" data-goto="step_3" type="button">
													<img height="24" width="24" alt="Bended Arrow Right" src="<?php echo $this->config->base_url(); ?>images/icons/small/white/bended_arrow_right.png">
													<span>Next Step</span>
												</button>
											</div>
										</div>

										<div id="step_3" class="step block">
											<div class="section">
												<h2>3. Personal Info</h2>
												<p>Who is reporting the edit.</p>
											</div>

											<fieldset class="label_side top">
												<label>Name</label>
												<div>
													<input type="text" id="required_3a" placeholder="Name">
		                                        </div>
											</fieldset>

											<div class="button_bar clearfix">
												<button class="next_step back light" data-goto="step_2" type="button">
													<img height="24" width="24" alt="Bended Arrow Right" src="<?php echo $this->config->base_url(); ?>images/icons/small/grey/bended_arrow_left.png">
													<span>Prev Step</span>
												</button>
												<button class="next_step forward send_right" data-goto="step_4" type="button">
													<img height="24" width="24" alt="Bended Arrow Right" src="<?php echo $this->config->base_url(); ?>images/icons/small/white/bended_arrow_right.png">
													<span>Next Step</span>
												</button>
											</div>
										</div>

										<div id="step_4" class="step block">
											<div class="section">
												<h2>4. Finish</h2>
												<p>Please confirm you want to submit the edit.</p>
											</div>

											<div class="button_bar clearfix">
												<button class="next_step back light" data-goto="step_3" type="button">
													<img height="24" width="24" alt="Bended Arrow Right" src="<?php echo $this->config->base_url(); ?>images/icons/small/grey/bended_arrow_left.png">
													<span>Prev Step</span>
												</button>
                                                                                            <button class="next_step green send_right submit_button" type="submit">
													<img height="24" width="24" alt="Bended Arrow Right" src="<?php echo $this->config->base_url(); ?>images/icons/small/white/bended_arrow_right.png">
													<span>Complete</span>
												</button>
											</div>
										</div>
		                           	</form>
									</div>

								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
            <?php print_r($info) ?>
<?php include 'includes/core/document_foot.php'?>