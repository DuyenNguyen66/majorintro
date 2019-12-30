<div class="row card-box">
	<p class="lead">Building Infomation</p>
	<div class="row">
		<div class="col-md-6">
			<div class="table-responsive">
				<table class="table">
					<tbody>
						<tr>
							<th style="width:50%">ID</th>
							<td><?php echo $building['building_id']; ?></td>
						</tr>
						<tr>
							<th style="width:50%">Name</th>
							<td><?php echo $building['name']; ?></td>
						</tr>
						<tr>
							<th>Address</th>
							<td><?php echo $building['address']; ?></td>
						</tr>
						<tr>
							<th># of Floors</th>
							<td><?php echo $building['total_floor'] ?></td>
						</tr>
						<tr>
							<th style="width:50%"># of Rooms</th>
							<td><?php echo $building['total_room']; ?></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
		<div class="col-md-6">
			<img src="<?php echo base_url($building['image'])?>" class="img-thumbnail" width="500" height="420">
		</div>
	</div>
</div>