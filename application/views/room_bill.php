<div class="col-xs-12" style="margin: 20px 0">
    <h3 class="header-title">Hóa đơn phòng</h3>
    <button class="btn btn-success" style="margin: 20px 0 20px 20px">Phòng <?php echo $room['name']?></button>
</div>
<div class="row card-box"> 
    <?php if($this->session->flashdata('error')):?>
        <div class="col-md-12">
            <div class="alert alert-danger">
                <?php echo $this->session->flashdata('error') ?>
            </div>
        </div>
    <?php endif; ?>
    <div class="tab-content">
        <div id="list" class="tab-pane fade in active">
            <div class="col-xs-12">
                <div class="table-responsive">
                	<table id="example4" class="table table-hover">
                		<thead>
                			<tr>
                                <th>ID</th>
                                <th>Kỳ</th>
                                <th>Tổng sinh viên</th>
                				<th>Tổng tiền</th>
                                <th>Hạn thanh toán</th>
                				<th>Ngày thanh toán</th>
                                <th>Trạng thái</th>
                			</tr>
                		</thead>
                		<tbody>
                			<?php
                			if (isset($bills) && is_array($bills))
                			{
                				foreach ($bills as $key => $row):
                					?>
                					<tr>
                                        <td><?php echo $row['id'] ?></td>
                                        <td><?php echo $row['term_name']?></td>
                                        <td><?php echo $row['total_student']?></td>
                                        <td><?php echo $row['total_pay']?></td>
                                        <td><?php echo date('d/m/Y', $row['deadline'])?></td>
                                        <td>
                                            <?php if($row['paid'] == 0):?>
                                            <button class="btn btn-xs btn-danger">Chưa thanh toán</button>
                                            <?php else: 
                                                echo date('d/m/Y h:iA', $row['paid']);
                                            endif; ?>
                                        </td>
                                        <td><?php echo $row['status'] == 0 ? '<a class="btn-warning btn-xs">Disabled</a>' : '<a class="btn-success btn-xs">Enabled</a>' ?></td>
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
