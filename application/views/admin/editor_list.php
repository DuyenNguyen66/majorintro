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
                	<table id="example4" class="table table-striped">
                		<thead>
                			<tr>
                				<th>Ảnh đại diện</th>
                				<th>Họ và tên</th>
                				<th>Email</th>
                				<th>Số điện thoại</th>
                				<th>Ngành đào tạo</th>
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
                						<td><img style="max-width: 70px;max-height:70px;border-radius:5px" src="<?= media_thumbnail($row['avatar'])?>"/></td>
                						<td><?php echo $row['full_name']?></td>
                						<td><?php echo $row['email']?></td>
                						<td><?php echo $row['phone']?></td>
                                        <td><?php echo ($row['major_name'] != null) ? $row['major_code'] .' - '. $row['major_name'] : 'N/a' ?></td>
                						<td><?php echo date('d/m/Y', $row['created_at'])?></td>
                                        <td><?php echo $row['status'] == 0 ? '<a class="btn btn-warning btn-xs">Chưa kích hoạt</a>' : '<a class="btn btn-success btn-xs">Đã kích hoạt</a>'?></td>
                						<td>
                                            <button type="button" class="btn btn-inverse btn-custom btn-xs">
                                                <a href="<?php echo base_url('editor/edit/' . $row['editor_id'])?>"><i class="fa fa-edit"></i></a>
                                            </button>
                                            <?php if($row['status'] == 1):?>
                                            <button type="button" class="btn btn-inverse btn-custom btn-xs">
                                                <a href="<?php echo base_url('editor/disable/' . $row['editor_id'])?>"><i class="fa fa-eye-slash"></i></a>
                                            </button>
                                            <?php else:?>
                                            <button type="button" class="btn btn-inverse btn-custom btn-xs">
                                                <a href="<?php echo base_url('editor/enable/' . $row['editor_id'])?>"><i class="fa fa-eye"></i></a>
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
    </div>
</div>

