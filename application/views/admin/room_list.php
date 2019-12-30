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
        	<div class="col-md-6 form-group">   
        		<label>Choose Building</label>                        
        		<select class="building_id form-control">
        			<option value="">Select Building</option>
        			<?php foreach($buildings as $building):?>
        				<option value="<?php echo $building['building_id']?>"><?php echo $building['name']?></option>
        			<?php endforeach; ?>
        		</select>                    
        	</div>
        	<div class="col-md-6 form-group">   
        		<label>Choose Floor</label>                        
        		<select class="floor_id form-control">
					<option value="">Select Floor</option>
        		</select>                    
        	</div>
            <div class="col-xs-12">
                <div class="table-responsive" id="room_table"></div>
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
                        		<label>Choose Building</label>                        
                        		<select class="building_id form-control" name="building_id" required="">
                        			<option value="">Select Building</option>
                        			<?php foreach($buildings as $building):?>
                        				<option value="<?php echo $building['building_id']?>"><?php echo $building['name']?></option>
                        			<?php endforeach; ?>
                        		</select>                    
                        	</div>
                        	<div class="form-group">   
                        		<label>Choose Floor</label>                        
                        		<select class="floor_id form-control" name="floor_id" required="">
                        			<option value="">Select Floor</option>
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
