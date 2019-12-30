<div class="col-xs-12">
	<h3 class="m-t-0 m-b-20 header-title">Buildings</h3>
</div>
<ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#list">List Buildings</a></li>
    <li><a data-toggle="tab" href="#addBuilding">Add building</a></li>
    <li><a data-toggle="tab" href="#addFloor">Add floor</a></li>
</ul>
<div class="row card-box"> 
    <div class="tab-content">
        <div id="list" class="tab-pane fade in active">
            <div class="col-xs-12">
                <div class="table-responsive">
                	<table id="example3" class="table table-hover">
                		<thead>
                			<tr>
                				<th>Image</th>
                                <th>ID</th>
                                <th>Building Name</th>
                                <th># of Floors</th>
                				<th># of Rooms</th>
                                <th>Address</th>
                				<th>Actions</th>
                			</tr>
                		</thead>
                		<tbody>
                			<?php
                			if (isset($buildings) && is_array($buildings))
                			{
                				foreach ($buildings as $key => $row):
                					?>
                					<tr>
                						<td><img style="max-width: 70px;max-height:70px;border-radius:5px" src="<?= $row['image']?>"/></td>
                                        <td><?php echo $row['building_id'] ?></td>
                                        <td><?php echo $row['name']?></td>
                                        <td><?php echo $row['total_floor'] ?></td>
                						<td><?php echo $row['total_room'] ?></td>
                                        <td><?php echo $row['address']?></td>
                						<td>
                                            <button type="button" class="btn btn-inverse btn-custom btn-xs">
                                                <a href="<?php echo base_url('building/view/' . $row['building_id'])?>">View</a>
                                            </button>
                                            <button type="button" class="btn btn-inverse btn-custom btn-xs">
                                                <a href="<?php echo base_url('building/edit/' . $row['building_id'])?>">Edit</a>
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
        <div id="addBuilding" class="tab-pane fade">             
            <form action='' method='POST' enctype="multipart/form-data">
                <div class="row">
                    <!-- left column -->
                    <div class="card-box">
                        <!-- general form elements -->
                        <div class="row box-body">
                            <div class="col-md-7">
                                <div class="form-group">                       
                                    <label>Name</label>                        
                                    <input type="text" name='name_building' required class="form-control" placeholder="Type building name" />
                                </div>
                                <div class="form-group">                       
                                    <label>Address</label>                        
                                    <input type="text" name='address' required class="form-control" placeholder="Type address" />
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group row">
                                    <label class="col-md-12">Image</label>
                                    <div class="col-md-4">
                                        <img id='image' width='120' height='120' style='border: 4px solid #c6c6c6; border-radius: 4px'/>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="" onclick="$('#imagePhoto').click()">
                                            <input type="file" accept="image/*" name="image" id="imagePhoto"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group m-b-0">
                            <button type="submit" class="btn btn-inverse btn-custom" name='cmd1' value='Save'>Save</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div id="addFloor" class="tab-pane fade">             
            <form action='' method='POST' enctype="multipart/form-data">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-6 card-box">
                        <!-- general form elements -->
                        <div class="box-body">
                            <div class="form-group">   
                                <label>Building</label>                        
                            	<select name="building_id" class="form-control">
                            		<option value="">Select Building</option>
                            		<?php foreach($buildings as $building):?>
                            		<option value="<?php echo $building['building_id']?>"><?php echo $building['name']?></option>
	                            	<?php endforeach; ?>
                            	</select>                    
                            </div>
                            <div class="form-group">                       
                                <label>Name</label>                        
                                <input type="text" name='name_floor' required class="form-control" placeholder="Type floor name" />
                            </div>
                            <div class="form-group m-b-0">
                                <button type="submit" class="btn btn-inverse btn-custom" name='cmd2' value='Save'>Save</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
