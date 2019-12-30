<div class="row card-box"> 
	<div class="header-title">Edit Manager</div>
    <div class="tab-content">
        <form action='' method='POST' enctype="multipart/form-data">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-6 card-box">
                        <!-- general form elements -->
                        <div class="box-body">
                        	<div class="form-group">   
                        		<label>Manager</label>                        
                        		<select class="manager_id form-control" name="manager_id">
                                    <option value="<?php echo $admin['admin_id']?>" selected><?php echo $admin['full_name']?></option>
                                </select>            
                        	</div>
                        	<div class="form-group">   
                        		<label>Choose Building</label>                        
                        		<select class="building_id form-control" name="building_id" required="">
                        			<option value="<?php echo $admin['building_id']?>"><?php echo $admin['building_name']?></option>
                        			<?php foreach($buildings as $building):?>
				        				<option value="<?php echo $building['building_id']?>"><?php echo $building['name']?></option>
				        			<?php endforeach; ?>
                        		</select>                    
                        	</div>
                            <div class="form-group">   
                                <label>Choose Position</label>                        
                                <select class="position_id form-control" name="position_id" required="">
                                    <option value="<?php echo $admin['position_id']?>"><?php echo $admin['position_name']?></option>
                                    <?php foreach($positions as $position):?>
                                        <option value="<?php echo $position['position_id']?>"><?php echo $position['name']?></option>
                                    <?php endforeach; ?>
                                </select>                    
                            </div>
                            <div class="form-group m-b-0">
                                <button type="submit" class="btn btn-inverse btn-custom" name='cmd' value='Save'>Save</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
    </div>
</div>
