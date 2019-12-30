        <div class="row">
            <?php if($this->session->flashdata('msg')){
                echo '<div class="col-md-6"><div class="alert alert-success">';
                echo $this->session->flashdata('msg');
                echo '</div></div>';
            } ?>
        </div>
<div class="row card-box"> 
	<div class="header-title">Edit Building</div>
    <div class="tab-content">
            <form action='' method='POST' enctype="multipart/form-data">
                <div class="row">
                    <!-- left column -->
                    <div class="card-box">
                        <!-- general form elements -->
                        <div class="row box-body">
                            <div class="col-md-7">
                                <div class="form-group">                       
                                    <label>Name</label>                        
                                    <input type="text" name='name_building' required class="form-control" value="<?php echo $building['name']?>" />
                                </div>
                                <div class="form-group">                       
                                    <label>Address</label>                        
                                    <input type="text" name='address' required class="form-control" value="<?php echo $building['address']?>" />
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group row">
                                    <label class="col-md-12">Image</label>
                                    <div class="col-md-4">
                                        <img id='image' width='120'height='120' style='border: 4px solid #c6c6c6; border-radius: 4px' src="<?php echo base_url($building['image'])?>" />
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
                            <button type="submit" class="btn btn-inverse btn-custom" name='cmd' value='Save'>Save</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
</div>

