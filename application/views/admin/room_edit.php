
<div class="row card-box"> 
	<div class="header-title">Edit Room</div>
    <div class="tab-content">
        <form action='' method='POST' enctype="multipart/form-data">
            <div class="row">
                <div class="card-box col-md-6">
                    <div class="row box-body">
                        <div class="form-group" style="margin-left: 10px;">
                        	<label>Room Name</label>
                        	<input type="text" name='name' required class="form-control" value="<?php echo $room['name']?>" />
                        </div>
                        <div class="form-group">
                        	<label class="col-md-3">Room Type</label>
                        	<div class="col-md-8">
                        		<?php if($room['type'] == 0):?>
                        		<input type="radio" name="type" value="0" checked>&nbsp;
                        		<i style="color: blue;font-size: 20px;" class="fa fa-mars"></i>&nbsp;&nbsp;&nbsp;&nbsp;
                        		<input type="radio" name="type" value="1">&nbsp;
                        		<i style="color: pink;font-size: 20px;" class="fa fa-venus"></i>
                        		<?php else:?>
                        			<input type="radio" name="type" value="0" >&nbsp;
                        		<i style="color: cornflowerblue;font-size: 20px;" class="fa fa-mars"></i>&nbsp;&nbsp;&nbsp;&nbsp;
                        		<input type="radio" name="type" value="1" checked>&nbsp;
                        		<i style="color: pink;font-size: 20px;" class="fa fa-venus"></i>
	                        	<?php endif;?>
                        	</div>
                        </div>
                    </div>
                    <div class="form-group m-b-0">
                        <button type="submit" class="btn btn-inverse btn-custom" name='cmd' value='Save'>Save</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

