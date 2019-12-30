<div class="col-xs-12" style="margin: 20px 0">
    <h3 class=" header-title">Registrations</h3>
</div>
<div class="row card-box"> 
    <div class="tab-content">
        <div id="list" class="tab-pane fade in active">
            <div class="col-xs-12">
                <div class="table-responsive">
                	<table id="example4" class="table table-hover">
                		<thead>
                			<tr>
                                <th>ID</th>
                                <th>Term</th>
                                <th>Student</th>
                                <th>Code</th>
                				<th>Room</th>
                				<th>Floor</th>
                				<th>Building</th>
                				<th>Registed</th>
                				<th>Confirmed</th>
                				<th>Status</th>
                				<th>Actions</th>
                			</tr>
                		</thead>
                		<tbody>
                			<?php
                			if (isset($forms) && is_array($forms))
                			{
                				foreach ($forms as $key => $row):
                					?>
                					<tr>
                                        <td><?php echo $row['id'] ?></td>
                                        <td><?php echo $row['term_name']?></td>
                                        <td><?php echo $row['full_name']?></td>
                                        <td><?php echo $row['student_code']?></td>
                                        <td><?php echo $row['room_name']?></td>
                                        <td><?php echo $row['floor_name']?></td>
                                        <td><?php echo $row['build_name']?></td>
                						<td><?php echo date('d/m/Y h:iA', $row['registed']) ?></td>
                						<td><?php echo $row['confirmed'] == null ? '<a class="btn btn-warning btn-xs">Not confirmed yet</a>' : date('d/m/Y h:iA', $row['confirmed']) ?></td>
                						<td><?php echo $row['status'] == 0 ? '<a class="btn btn-warning btn-xs">Inactive</a>' : '<a class="btn btn-success btn-xs">Active</a>' ?></td>
                						<td>
        									<?php if($row['status'] == 0 && $row['confirmed'] == null): ?>
                                            <button type="button" class="btn btn-inverse btn-custom btn-xs">
                                                <a href="<?php echo base_url('register/confirm/' . $row['id'])?>">Confirm</a>
                                            </button>
                                            <?php elseif($row['status'] == 0):?>
                                            <button type="button" class="btn btn-inverse btn-custom btn-xs disabled">
                                                <a>Disable</a>
                                            </button>
        									<?php else: ?>
                                            <button type="button" class="btn btn-inverse btn-custom btn-xs">
                                                <a href="<?php echo base_url('register/disable/' . $row['id'])?>">Disable</a>
                                            </button>
            								<?php endif; ?>

                						</td>
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
