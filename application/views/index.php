<?php include 'includes/core/document_head_pjax.php'?>
	<div id="pjax">
		<div id="wrapper" data-adminica-nav-top="1" data-adminica-side-top="1">
			<?php include 'includes/components/topbar.php'?>
			<?php include 'includes/components/sidebar.php'?>
			<?php include 'includes/components/stackbar.php'?></div><!-- Closing Div for Stack Nav, you can boxes under the stack before this -->

			<div id="main_container" class="main_container container_16 clearfix">
				<?php include 'includes/components/navigation.php'?>
				<div class="flat_area grid_16">
					<h2>Dashboard
                                            <small>- Welcome to Remote Reporting System.</small>
						<div class="holder">
							<?php include 'includes/components/dynamic_loading.php'?>
						</div>
					</h2>
				</div>
				<div class="box grid_16 tabs">
					<ul class="tab_header clearfix">
						<li><a href="#tabs-1">All Time Stats</a></li>
						<li><a href="#tabs-2">Today Stats</a></li>
					</ul>
					<div class="controls">
						<a href="#" class="grabber"></a>
						<a href="#" class="toggle"></a>
						<a href="#" class="show_all_tabs"></a>
					</div>
					<div class="toggle_container">
						<div id="tabs-1" class="block lines">
							<div class="columns">
								<div class="col_20 no_border_top">
									<div class="info_box">
										<div class="value_tag"><span><?php $diff=round($today_gree-$yeste_gree, 2); echo $diff?></span></div>
										<div class="split one">
											<div class="chart">
												<span class="spark_bar large"><?php echo $today_gree ?>, <?php echo $yeste_gree ?>, <?php echo $twday_gree ?>, <?php echo $thday_gree ?>, <?php echo $frday_gree ?></span>
											</div>
										</div>
										<label>Last 5 Days</label>
									</div>
								</div>
								<div class="col_20 no_border_top">
									<div class="info_box">
										<div class="value_tag"><span>estimated</span></div>
										<div class="split one">
											<div class="chart">
												<span class="spark_line large random_number_5"></span>
											</div>
										</div>
										<label>Daily Hits</label>
									</div>
								</div>
								<div class="col_20 no_border_top">
									<div class="info_box">
										<div class="split one">
											<div class="big_letter green"><?php echo $pesan ?></div>
										</div>
										<label>Remote Status</label>
									</div>
								</div>
								<div class="col_20 no_border_top">
									<div class="info_box">
										<div class="split one">
											<div class="chart">
												<span class="spark_pie large"><?php echo $gtype ?>, <?php echo $ttype ?>, <?php echo $rtype ?>
											</div>
										</div>
										<label>Race Type</label>
									</div>
								</div>
								<div class="col_20 no_border_top no_border_right">
                                                                    <div class="info_box" id="pjax_total">
										<div class="split two"><?php echo $sumrace ?> <small>races</small></div>
										<div class="split two red"><?php echo $red ?> <small>races</small></div>
										<label>Performance</label>
									</div>
								</div>
							</div>
						</div>
						<div id="tabs-2" class="block lines ui-tabs-hide">
							<div class="columns">
								<div class="col_20 no_border_top">
									<div class="info_box">
										<div class="value_tag"><span><?php $diff=round($today_gree-$yeste_gree, 2); echo $diff?></span></div>
										<div class="split one">
											<div class="chart">
												<span class="spark_bar large random_number_5"></span>
											</div>
										</div>
										<label>Leads per hour<div class="comment icon_small chat_black"><a href="#"></a></div></label>
									</div>
								</div>
								<div class="col_20 no_border_top">
									<div class="info_box">
										<div class="value_tag"><span>estimated</span></div>
										<div class="split one">
                                                                                    <div class="chart" id="pjax_today">
												<span class="big_letter green"><?php echo $today_gree ?> %</span>
											</div>
										</div>
										<label>Today Performance</label>
									</div>
								</div>
								<div class="col_20 no_border_top">
									<div class="info_box">
										<div class="split one" id="pjax_today_perf">
											<div class="big_letter yellow pjax_today_perf"><?php echo $today_perf ?></div>
										</div>
										<label>Remote Status</label>
									</div>
								</div>
								<div class="col_20 no_border_top">
									<div class="info_box">
										<div class="split one">
											<div class="chart">
												<span class="spark_pie large random_number_3">
												26, 74, 105</span>
											</div>
										</div>
										<label>Race Types</label>
									</div>
								</div>
								<div class="col_20 no_border_top no_border_right">
									<div class="info_box" id="pjax_today_total">
										<div class="split two"><?php echo $today_sum ?> <small>races</small></div>
										<div class="split two red"><?php echo $today_red ?> <small>races</small></div>
										<label>Performance</label>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="main_container glass clearfix">
				<div style="padding:0;">
					<div class="columns lines">
						<div class="col_20 no_border_top">
							<div class="info_box">
                                                            <div class="split one" id="pjax_today2">
									<div class="big_letter red"><?php echo $today_gree ?> %</div>
								</div>
								<label>Today Performance</label>
							</div>
						</div>
						<div class="col_20 no_border_top">
                                                    <div class="info_box" id="pjax_person">
								<div class="split three green">Surya <?php echo $surya; ?> %</div>
								<div class="split three orange">Indra <?php echo $indra; ?> %</div>
								<div class="split three red">Azis <?php echo $azis; ?> %</div>
								<label>Load Distribution</label>
							</div>
						</div>
						<div class="col_20 no_border_top">
							<div class="info_box">
								<div class="split one"><span class="spark_bar large"><?php echo $today_gree ?>, <?php echo $yeste_gree ?>, <?php echo $twday_gree ?>, <?php echo $thday_gree ?>, <?php echo $frday_gree ?></span></div>
								<label>Trends</label>
							</div>
						</div>
						<div class="col_20 no_border_top">
							<div class="info_box">
								<div class="split one">
                                                                    <div class="big_letter red" id="pjax_green"><?php echo $perce ?> %</div>
								</div>
								<label>All Time Performance</label>
							</div>
						</div>
						<div class="col_20 no_border_right no_border_top">
							<div class="info_box">
								<div class="split one">
									<div class="chart">
										<span class="big_letter red"><?php echo $yeste_gree ?> %</span>
									</div>
								</div>
								<label>Yesterday Performance</label>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="main_container container_16 clearfix">
				<div class="box grid_8 tabs">
					<ul class="tab_header clearfix">
						<li><a href="#pjax_last6">Last Results</a></li>
						<li><a href="#tabs-2">Content</a></li>
					</ul>
					<div class="controls">
						<a href="#" class="grabber"></a>
						<a href="#" class="toggle"></a>
						<a href="#" class="show_all_tabs"></a>
					</div>
					<div class="toggle_container">
                                            <div id="pjax_last6" class="block" >
							<ul class="flat medium">
                                                            <?php
                                                            foreach ($last6 as $row){
								echo '<li><a href="data/edit/'. $row->ID .'" target="_blank"><span class="spark_bar small random_number_5 spark_inline"></span>'. $row->Name .' clicked '.$row->Location .' number '. $row->Number .' with '. $row->Results .' as the result.</a></li>';
                                                            }
                                                            ?>
							</ul>
						</div>
						<div id="tabs-2" class="block">
							<div class="section">
								<h1>Primary Heading</h1>
								<p>Lorem Ipsum is simply dummy text of the <a href="#" title="This is a tooltip">printing industry</a>. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
								<h2>Secondary Heading</h2>
								<p>Lorem Ipsum is simply dummy text of the printing industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
							</div>
						</div>
					</div>
				</div>
				<div class="box grid_8">
					<div class="block compressed">
						<form class="validate_form">
						<fieldset class="label_side top">
							<label>Support Issue</label>
							<div>
								<input type="text">
							</div>
						</fieldset>
						<fieldset class="label_side">
							<label>Description</label>
							<div>
								<textarea style="height:79px;" placeholder="Please provide as much information as possible"></textarea>
							</div>
						</fieldset>
						<fieldset class="label_side">
							<label>Priority</label>
							<div>
								<div class="jqui_radios">
									<input type="radio" name="answer5" id="yes5"/><label for="yes5">Regular</label>
									<input type="radio" name="answer5" id="no5"/><label for="no5">Urgent</label>																												</div>
							</div>
						</fieldset>
						<div class="button_bar clearfix">
							<button class="small dark" type="submit">
								<img src="../../images/icons/small/white/speech_bubble.png">
								<span>Contact</span>
							</button>
							<button class="small light send_right" type="reset">
								<div class="ui-icon ui-icon-circle-close"></div>
								<span>Cancel</span>
							</button>
						</div>
						</form>
					</div>
				</div>
                            
                                <!--
				<div class="box grid_16">
					<ul class="block content_accordion ">
						<li>
							<h3 class="bar">Adminica Description</h3>
							<div class="content">
								<div class="columns">
									<div class="col_50">
										<p class="section"><strong>Adminica</strong> is a cleanly coded, beautifully styled, easily customisable, cross-browser compatible <strong>Admin Template</strong> and <strong>Web Application Interface</strong>.</p>
									</div>
									<div class="col_50">
										<p class="section"><strong>Adminica</strong> is packed full of features, allowing you <strong>unlimited combinations</strong> of layouts, controls and styles to ensure you have a trully unique app. </p>
									</div>
								</div>
							</div>
						</li>
					</ul>
				</div>
			</div> -->
                                
                        <!--
			<div class="main_container glass clearfix">
				<div class="columns" style="padding:10px 10px 0">
					<div class="flat_area col_30">
						<h3 style="margin-bottom:0;">Followers <small>- Most Popular</small></h1>
						<div class="chart" style="margin:5px 0 -5px;">
							<span class="spark_line_wide random_number_5">
							26, 74, 102, 153, 25, 26, 74, 102, 153, 25, </span>
						</div>
					</div>
					<div class="col_70">
						<ul class="picture_tiles clearfix send_right">
							<li><a href="contacts.php" class="pjax"><img width="45" alt="Profile Pic" src="../../images/content/profiles/mangatar-0.png"></a><div class="alert badge grad_yellow">★</div></li>
							<li><a href="contacts.php" class="pjax"><img width="45" alt="Profile Pic" src="../../images/content/profiles/mangatar-1.png"></a></li>
							<li><a href="contacts.php" class="pjax"><img width="45" alt="Profile Pic" src="../../images/content/profiles/mangatar-2.png"></a><div class="alert badge grad_green">↑</div></li>
							<li><a href="contacts.php" class="pjax"><img width="45" alt="Profile Pic" src="../../images/content/profiles/mangatar-3.png"></a></li>
							<li><a href="contacts.php" class="pjax"><img width="45" alt="Profile Pic" src="../../images/content/profiles/mangatar-4.png"></a></li>
							<li><a href="contacts.php" class="pjax"><img width="45" alt="Profile Pic" src="../../images/content/profiles/mangatar-5.png"></a></li>
							<li><a href="contacts.php" class="pjax"><img width="45" alt="Profile Pic" src="../../images/content/profiles/mangatar-6.png"></a></li>
							<li><a href="contacts.php" class="pjax"><img width="45" alt="Profile Pic" src="../../images/content/profiles/mangatar-7.png"></a><div class="alert badge grad_red">↓</div></li>
							<li><a href="contacts.php" class="pjax"><img width="45" alt="Profile Pic" src="../../images/content/profiles/mangatar-8.png"></a></li>
						</ul>

					</div>
				</div>
			</div> -->

                        <!--
                        <div class="main_container container_16 clearfix">
				<div class="box grid_8">
					<div class="block">
						<fieldset class="label_side label_small no_border">
							<label>Filter by:</label>
							<div>
								<div class="jqui_radios">
									<input type="radio" name="filter" class="isotope_filter" id="f_all" data-isotope-filter="*" checked="true"/><label for="f_all">All</label>
									<input type="radio" name="filter" class="isotope_filter" id="f_new" data-isotope-filter=".new"/><label for="f_new">New</label>
									<input type="radio" name="filter" class="isotope_filter" id="f_cool" data-isotope-filter=".cool"/><label for="f_cool">Cool</label>
								</div>
							</div>
						</fieldset>
					</div>
				</div>
				<div class="box grid_8">
					<div class="block">
						<fieldset class="label_side label_small no_border">
							<label>Sort by:</label>
							<div>
								<div class="jqui_radios">
									<input type="radio" name="sort" class="isotope_sort" id="s_name" data-isotope-sort="sort_1" checked="checked"/><label for="s_name">Name</label>
									<input type="radio" name="sort" class="isotope_sort" id="s_update" data-isotope-sort="sort_2"/><label for="s_update">Update</label>
									<input type="radio" name="sort" class="isotope_sort" id="s_random" data-isotope-sort="random"/><label for="s_random">Random</label>
								</div>
							</div>
						</fieldset>
					</div>
				</div>
				<div class="grid_16">
					<div class="isotope_holder indented_area">
						<?php include 'includes/content/feature_tiles.php'?>
					</div>
				</div>
			</div> -->
		<?php include 'includes/dialogs/dialog_register.php'?>
		<?php include 'includes/dialogs/dialog_welcome.php'?>
		<?php include 'includes/dialogs/dialog_logout.php'?>
		<!-- 
                <script type="text/javascript">
		$(document).ready(function() {
			$("#dialog_welcome").dialog("open");
		});
		</script>
                -->
<?php include 'includes/core/document_foot.php'?>