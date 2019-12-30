<div class="col-xs-12" style="margin: 20px 0">
    <h3 class="header-title">Hóa đơn nước</h3>
    <button class="btn btn-success" style="margin: 20px 0 20px 20px">Phòng <?php echo $room['name']?></button>
    <button class="btn btn-success" style="margin: 20px 0 20px 20px">Kỳ <?php echo $term['name']?></button>
</div>
<div class="row card-box"> 
    <div class="tab-content">
        <div id="list" class="tab-pane fade in active">
            <div class="col-xs-12">
                <div class="table-responsive">
                	<table id="example4" class="table table-hover">
                		<thead>
                			<tr>
                                <th>ID</th>
                                <th>Tháng</th>
                				<th>Chỉ số(m<sup>3</sup>)</th>
                                <th>Tiêu thụ(m<sup>3</sup>)</th>
                                <th>Thành tiền(VND)</th>
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
                                        <td><?php echo $row['bill_id'] ?></td>
                                        <td><?php echo $row['month']?></td>
                                        <td><?php echo $row['index']?></td>
                                        <td><?php echo $row['used']?></td>
                                        <td><?php echo number_format($row['total_pay'])?></td>
                                        <td><?php echo date('d/m/Y', $row['deadline'])?></td>
                                        <td>
                                            <?php if($row['paid'] == 0):?>
                                            <a class="btn-xs btn-danger">Chưa thanh toán</a>
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
