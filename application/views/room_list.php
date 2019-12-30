<div class="col-xs-12" style="margin: 20px 0">
    <h3 class="header-title">Registration</h3>
    <button class="btn btn-success" style="margin: 20px 0 20px 20px">Term <?php echo $term['name']?></button>
</div>

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
                <div class="table-responsive" id="room_table" style="width: 90%;margin: auto;"></div>
            </div>
        </div>
    </div>
</div>
