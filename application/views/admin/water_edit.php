<div class="row">
    <?php if($this->session->flashdata('msg')){
        echo '<div class="col-md-6"><div class="alert alert-success">';
        echo $this->session->flashdata('msg');
        echo '</div></div>';
    } ?>
</div>
<div class="row card-box"> 
	<div class="header-title">Edit Electricity Price</div>
    <div class="tab-content">
        <form action='' method='POST' enctype="multipart/form-data">
            <div class="row">
                <div class="card-box">
                    <div class="row box-body">
                        <div class="col-md-7">
                            <div class="form-group">                       
                                <label>Name</label>                        
                                <input type="text" name='name' required class="form-control" value="<?php echo $price['name']?>" />
                            </div>
                            <div class="form-group">                       
                                <label>Description</label>                        
                                <input type="text" name='description' required class="form-control" value="<?php echo $price['description']?>"/>
                            </div>
                            <div class="form-group">                       
                                <label>Price(đ/m<sup>3</sup>)</label>                        
                                <input type="text" name='price' required class="form-control" value="<?php echo $price['price']?>"/>
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

