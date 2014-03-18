<?php include 'includes/core/document_head.php'?>
	<div id="pjax">
		<div id="wrapper" data-adminica-nav-top="6" data-adminica-nav-inner="1">
			<?php include 'includes/components/topbar.php'?>
			<?php include 'includes/components/sidebar.php'?>
			<?php include 'includes/components/stackbar.php'?></div><!-- Closing Div for Stack Nav, you can boxes under the stack before this -->

			<div id="main_container" class="main_container container_16 clearfix">
				<?php include 'includes/components/navigation.php'?>
				<div class="flat_area grid_16">
					<h2>Sortable Tables
						<div class="holder">
							<?php include 'includes/components/dynamic_loading.php'?>
						</div>
					</h2>
					<p>This table contains the last 200 races. The<strong> search is LIVE</strong> so doesn't require you to reload the page! Also, the items are <strong>automatically paginated</strong> into sets of 10, 20 or 50. </p>
				</div>
				<div class="box grid_16 single_datatable">
                                    <div id="dt1" class="no_margin">
                                        <table class=" datatable">
                                            <thead>
                                                    <tr>
                                                            <th>Jump Time</th>
                                                            <th>Type</th>
                                                            <th>Runners</th>
                                                            <th>Number</th>
                                                            <th>Location</th>
                                                            <th>Results</th>
                                                            <th>Name</th>
                                                            <th>Comments</th>
                                                    </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                foreach ($query as $row){
                                                echo '<tr class="gradeX">';
                                                        echo '<td>'. $row->Time .'</td>';
                                                        echo '<td class="center">'. $row->Type .'</td>';                                                                                   
                                                        echo '<td class="center">'. $row->Runners .'</td>';
                                                        echo '<td class="center">'. $row->Number .'</td>';
                                                        echo '<td class="center">'. $row->Location .'</td>';
                                                        echo '<td class="center">'. $row->Results .'</td>';
                                                        echo '<td>'. $row->Name .'</td>';
                                                        echo '<td>'. $row->Comment .'</td>';
                                                echo '</tr>'; 
                                                } ?>
                                            </tbody>
                                            </table> 
                                   </div>
				</div>
				<div class="flat_area grid_16">
					<h2>Tabbed table</h2>
					<p> This is really good to supply extra info about table or even plot a graph of the data. </p>
				</div>
				<div class="box grid_16 tabs">
					<ul id="touch_sort" class="tab_header clearfix">
						<li><a href="#tabs-1">Table Data</a></li>
						<li><a href="#tabs-2">Table <span>(no pagination)</span></a></li>
						<li><a href="#tabs-3">Another Tab</a></li>
					</ul>
					<div class="controls">
						<a href="#" class="grabber"></a>
						<a href="#" class="toggle"></a>
					</div>
					<div class="toggle_container">
						<div id="tabs-1" class="block">
							<div id="dt2">
                                                            <table class=" datatable">
                                                                <thead>
                                                                        <tr>
                                                                                <th>Jump Time</th>
                                                                                <th>Type</th>
                                                                                <th>Runners</th>
                                                                                <th>Number</th>
                                                                                <th>Location</th>
                                                                                <th>Results</th>
                                                                                <th>Comments</th>
                                                                        </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr class="gradeX">
                                                                            <td>16:45</td>
                                                                            <td>R</td>                                                                                   
                                                                            <td>10</td>
                                                                            <td class="center">4</td>
                                                                            <td class="center">ALBION PARK</td>
                                                                            <td class="center">10</td>
                                                                            <td>none</td>
                                                                    </tr>
                                                                </tbody>
                                                                </table>
                                                        </div>
						</div>
						<div id="tabs-2" class="block">
							<div id="dt3"><?php include 'includes/content/datatables_data.php'?></div>
						</div>
						<div id="tabs-3" class="block">
							<div class="section">
								<p>Information about the Table can go here, or another table could go here or pretty much anything could go here!</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<?php include 'includes/dialogs/dialog_welcome.php'?>
		<?php include 'includes/dialogs/dialog_logout.php'?>

<?php include 'includes/core/document_foot.php'?>