<div class="col-xs-12" style="margin: 20px 0">
    <h3 class=" header-title">Reports</h3>
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
                                <th>Month</th>
                                <th>Term</th>
                                <th>Expected Total(VND)</th>
                                <th>Actual Total(VND)</th>
                				<th>Actions</th>
                			</tr>
                		</thead>
                		<tbody>
                			<?php
                			if (isset($reports) && is_array($reports))
                			{
                				foreach ($reports as $key => $row):
                					?>
                					<tr>
                                        <td><?php echo $row['report_id'] ?></td>
                                        <td><?php echo $row['month']?></td>
                                        <td><?php echo $row['term_name']?></td>
                                        <td><?php echo number_format($row['expected_total'])?></td>
                                        <td><?php echo number_format($row['actual_total'])?></td>
                						<td>
                                            <button type="button" class="btn btn-inverse btn-custom btn-xs">
                                                <a href="<?php echo base_url('report/view/' . $row['report_id'])?>">View Report</a>
                                            </button>
                                            <button type="button" class="btn-inverse btn-custom">
                                                <a href="<?php echo base_url('report/export/' . $row['report_id'])?>"><i class="fa fa-file-excel"></i></a>
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
    </div>
</div>
