<div class="col-xs-12">
	<h3 class="m-t-0 m-b-20 header-title">Rooms</h3>
</div>
<ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#list">List Rooms</a></li>
    <li><a data-toggle="tab" href="#addRoom">Add Room</a></li>
</ul>
<div class="row card-box"> 
    <div class="tab-content">
        <div id="list" class="tab-pane fade in active">
        	<div class="col-xs-12">
                <div class="table-responsive">
                	<table id="example3" class="table table-hover">
                		<thead>
                			<tr>
                				<th>ID</th>
                				<th>Room Name</th>
                				<th>Floor</th>
                				<th>Type</th>
                				<th># of Students</th>
                				<th>Status</th>
                				<th>Actions</th>
                			</tr>
                		</thead>
                		<tbody>
                			<?php
                			if (isset($rooms) && is_array($rooms))
                			{
                				foreach ($rooms as $key => $row):
                					?>
                					<tr>
                						<td><?php echo $row['room_id'] ?></td>
                						<td><?php echo $row['room_name']?></td>
                						<td><?php echo $row['floor_name']?></td>
                						<td><?php echo $row['type'] == 0 ? '<i style="color: cornflowerblue;font-size: 20px;" class="fa fa-mars"></i>' : '<i style="color: pink;font-size: 20px;" class="fa fa-venus"></i>'?></td>
                						<td><?php echo $row['total_student']?>/10</td>
                						<td>
                							<?php if($row['total_student'] == 10):?>
                								<button type="button" class="btn btn-danger btn-xs">Full</button>
                								<?php else:?>
                									<button type="button" class="btn btn-success btn-xs">Active</button>
                								<?php endif;?>
                							</td>
                							<td>
                								<?php if($row['total_student'] == 10 && $row['status'] == 1):?>
                									<button type="button" class="btn btn-inverse btn-custom btn-xs">
                										<a href="<?php echo base_url('room/disableManager/' . $row['room_id'])?>">Deactive</a>
                									</button>
                								<?php endif; ?>
                								<button type="button" class="btn btn-inverse btn-custom btn-xs">
                									<a href="<?php echo base_url('room/viewByManager/' . $row['room_id'])?>">View Students</a>
                								</button>
                								<button type="button" class="btn btn-inverse btn-custom btn-xs">
                									<a href="<?php echo base_url('room/editByManager/' . $row['room_id'])?>">Edit</a>
                								</button>
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
        <div id="addRoom" class="tab-pane fade">             
            <form action='' method='POST' enctype="multipart/form-data">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-6 card-box">
                        <!-- general form elements -->
                        <div class="box-body">
                        	<div class="form-group">   
                        		<label>Choose Floor</label>                        
                        		<select class="floor_id form-control" name="floor_id" required="">
                        			<option value="">Select Floor</option>
                        			<?php foreach($floors as $floor): ?>
                        				<option value="<?php echo $floor['floor_id']?>"><?php echo $floor['name']?></option>
                    				<?php endforeach; ?>
                        		</select>                    
                        	</div>
                        	<div class="form-group">
                        		<label>Room Name</label>
                                <input type="text" name='name' required class="form-control" placeholder="Type room name..." />
                        	</div>
                            <div class="form-group">
                                <label class="col-md-3">Room Type</label>
                                <div class="col-md-8">
                                    <input type="radio" name="type" value="0" checked>&nbsp;
                                    <i style="color: cornflowerblue;font-size: 20px;" class="fa fa-mars"></i>&nbsp;&nbsp;&nbsp;&nbsp;
                                    <input type="radio" name="type" value="1">&nbsp;
                                    <i style="color: pink;font-size: 20px;" class="fa fa-venus"></i>
                                </div>
                            </div>
                            
                            <div class="form-group m-b-0 col-md-12">
                                <button type="submit" class="btn btn-inverse btn-custom" name='cmd' value='Save'>Save</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
