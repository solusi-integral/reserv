<?php include 'includes/core/document_head.php'?>
	<div id="pjax">
		<div id="wrapper" data-adminica-nav-top="7" data-adminica-nav-inner="1">
			<?php include 'includes/components/topbar.php'?>
			<?php include 'includes/components/sidebar.php'?>
			<?php include 'includes/components/stackbar.php'?></div><!-- Closing Div for Stack Nav, you can boxes under the stack before this -->
			<div id="main_container" class="main_container container_16 clearfix">
				<?php include 'includes/components/navigation.php'?>
				<div class="box grid_16">
					<h2 class="box_head">File Manager</h2>
					<div class="controls">
						<a href="#" class="grabber"></a>
						<a href="#" class="toggle"></a>
					</div>
					<div class="toggle_container">
						<div class="block">
							<div class="section">
								<div id="finder"></div>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
		<?php include 'includes/dialogs/dialog_welcome.php'?>
		<?php include 'includes/dialogs/dialog_logout.php'?>
<?php include 'includes/core/document_foot.php'?>