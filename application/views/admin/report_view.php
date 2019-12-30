<div class="col-xs-12" style="margin: 20px 0">
    <h3 class=" header-title">Reports</h3>
    <div style="margin: 3rem 0 0 2rem;">
        <button class="btn btn-success">Term <?php echo $report['term_name']?></button>
        <button class="btn btn-success">Month <?php echo $report['month']?></button>
    </div>
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
                				<th>Building</th>
                                <th># of paid</th>
                                <th># of not paid</th>
                                <th>Expected total(VND)</th>
                                <th>Actual total(VND)</th>
                                <th>Created at</th>
                                <th>Manager</th>
                			</tr>
                		</thead>
                		<tbody>
                			<?php
                			if (isset($report_detail) && is_array($report_detail))
                			{
                				foreach ($report_detail as $key => $row):
                					?>
                					<tr>
                						<td><?php echo $row['build_name']?></td>
                                        <td><?php echo $row['num_paid']?></td>
                                        <td><?php echo $row['num_not_paid']?></td>
                                        <td><?php echo number_format($row['expected_total'])?></td>
                                        <td><?php echo number_format($row['actual_total'])?></td>
                                        <td><?php echo date('d/m/Y h:i A',$row['created_at'])?></td>
                                        <td><?php echo $row['full_name']?></td>
                					</tr>
                					<?php 
                				endforeach;
                			}
                			?>
                			<tr style="font-weight: bold;">
                				<td>TOTAL</td>
                				<td></td>
                				<td></td>
                				<td><?php echo number_format($report['expected_total'])?></td>
                				<td><?php echo number_format($report['actual_total'])?></td>
                				<td></td>
                				<td></td>
                			</tr>
                		</tbody>
                	</table>
                </div>
            </div>
        </div>
    </div>
</div>
