<div class="col-xs-12" style="margin: 20px 0">
	<h3 class="header-title">Roommates List</h3>
	<button class="btn btn-success" style="margin: 20px 0 20px 20px">Term <?php echo $term_name?></button>
	<button class="btn btn-success" style="margin: 20px 0 20px 20px">Room <?php echo $room_name?></button>
</div>

<div class="row card-box"> 
    <div class="tab-content">
        <div id="list" class="tab-pane fade in active">
            <div class="col-xs-12">
                <div class="table-responsive">
                	<table id="example3" class="table table-bordered table-hover">
                		<thead>
                			<tr>
                                <th>Name</th>
                				<th>Email</th>
                				<th>Phone Number</th>
                			</tr>
                		</thead>
                		<tbody>
                			<?php
                			if (isset($roommates) && is_array($roommates))
                			{
                				foreach ($roommates as $key => $row):
                					?>
                					<tr>
                                        <td><?php echo $row['full_name'] ?></td>
                                        <td><?php echo $row['email']?></td>
                                        <td><?php echo $row['phone']?></td>
                					</tr>
                					<?php 
                				endforeach;
                			}
                			?>
                		</tbody>
                	</table>
                </div>
            </div>
        </div>
        
        
    </div>
</div>
