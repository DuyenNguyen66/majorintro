<div class="col-xs-12">
	<h3 class="m-t-0 m-b-20 header-title">Biên tập viên</h3>
</div>
<ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#list">Danh sách</a></li>
<!--    <li><a data-toggle="tab" href="#add">Assign to Building</a></li>-->
</ul>
<div class="row card-box"> 
    <div class="tab-content">
        <div id="list" class="tab-pane fade in active">
            <div class="col-xs-12">
                <div class="table-responsive">
                	<?php if($this->session->flashdata('error')): ?>
	                    <div style='color: red; margin: 0 0 20px 0; border: solid 1px #f0a8b5; background: rgba(230,117,136,0.15); padding: 10px; border-radius: 5px'>
	                    	<?php echo $this->session->flashdata('error')?>
	                    </div>
	                <?php endif;?>
                	<table id="example4" class="table table-hover">
                		<thead>
                			<tr>
                				<th>Ảnh đại diện</th>
                				<th>ID</th>
                				<th>Họ và tên</th>
                				<th>Email</th>
                				<th>Nhóm ngành</th>
                				<th>Ngày tạo</th>
                                <th>Trạng thái</th>
                				<th></th>
                			</tr>
                		</thead>
                		<tbody>
                			<?php
                			if (isset($editors) && is_array($editors))
                			{
                				foreach ($editors as $key => $row):
                					?>
                					<tr>
                						<td><img style="max-width: 70px;max-height:70px;border-radius:5px" src="<?= $row['avatar']?>"/></td>
                						<td><?php echo $row['editor_id'] ?></td>
                						<td><?php echo $row['full_name']?></td>
                						<td><?php echo $row['email']?></td>
                                        <td><?php echo ($row['major_name'] != null) ? $row['major_name'] : 'N/a' ?></td>
                						<td><?php echo date('d/m/Y h:iA', $row['created_at'])?></td>
                                        <td><?php echo $row['status'] == 0 ? '<a class="btn btn-warning btn-xs">Chưa kích hoạt</a>' : '<a class="btn btn-success btn-xs">Đã kích hoạt</a>'?></td>
                						<td>
                                            <?php if($row['major_name'] != null): ?>
                                            <button type="button" class="btn btn-inverse btn-custom btn-xs">
                                                <a href="<?php echo base_url('editor/edit/' . $row['editor_id'])?>">Sửa</a>
                                            </button>
                                            <?php endif;?>
                                            <?php if($row['status'] == 1):?>
                                            <button type="button" class="btn btn-inverse btn-custom btn-xs">
                                                <a href="<?php echo base_url('editor/disable/' . $row['editor_id'])?>">Vô hiệu hóa</a>
                                            </button>
                                            <?php else:?>
                                            <button type="button" class="btn btn-inverse btn-custom btn-xs">
                                                <a href="<?php echo base_url('editor/enable/' . $row['editor_id'])?>">Kích hoạt</a>
                                            </button>
                                            <?php endif;?>
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
                    <!-- left column -->
                    <div class="col-md-6 card-box">
                        <!-- general form elements -->
                        <div class="box-body">
                        	<div class="form-group">   
                        		<label>Choose Manager</label>                        
                        		<select class="major_id form-control" name="manager_id" required="">
                        			<option value="">Select Manager</option>
                        			<?php foreach($managerOthers as $manager):?>
                        				<option value="<?php echo $manager['admin_id']?>"><?php echo $manager['full_name']?></option>
                        			<?php endforeach; ?>
                        		</select>                    
                        	</div>
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
                                <label>Choose Position</label>                        
                                <select class="position_id form-control" name="position_id" required="">
                                    <option value="">Select Position</option>
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
</div>

