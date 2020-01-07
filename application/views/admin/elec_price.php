<div class="col-xs-12">
	<h3 class="m-t-0 m-b-20 header-title">Electricity Price</h3>
</div>
<ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#list">Price List</a></li>
    <li><a data-toggle="tab" href="#add">Add Price</a></li>
</ul>
<div class="row card-box"> 
    <div class="tab-content">
        <div id="list" class="tab-pane fade in active">
            <div class="col-xs-12">
                <div class="table-responsive">
                	<table id="example3" class="table table-hover">
                		<thead>
                			<tr>
                                <th>Name</th>
                                <th>Description</th>
                				<th>Price(đ/kWh)</th>
                				<th>Actions</th>
                			</tr>
                		</thead>
                		<tbody>
                			<?php
                			if (isset($elec_prices) && is_array($elec_prices))
                			{
                				foreach ($elec_prices as $key => $row):
                					?>
                					<tr>
                                        <td><?php echo $row['name']?></td>
                                        <td><?php echo 'Cho ' . $row['description']?></td>
                                        <td><?php echo number_format($row['Major'])?></td>
                                        <td>
                                        	<button type="button" class="btn btn-inverse btn-custom btn-xs">
                                        		<a href="<?php echo base_url('price/editElec/' . $row['price_id'])?>">Edit</a>
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
        <div id="add" class="tab-pane fade">             
            <form action='' method='POST' enctype="multipart/form-data">
                <div class="row">
                    <div class="card-box">
                        <div class="row box-body">
                            <div class="col-md-7">
                                <div class="form-group">                       
                                    <label>Name</label>                        
                                    <input type="text" name='name' required class="form-control" placeholder="Type name" />
                                </div>
                                <div class="form-group">                       
                                    <label>Description</label>                        
                                    <input type="text" name='description' required class="form-control" placeholder="Type description" />
                                </div>
                                <div class="form-group">                       
                                    <label>Price(đ/kWh)</label>                        
                                    <input type="text" name='price' required class="form-control" placeholder="Type price" />
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
</div>
