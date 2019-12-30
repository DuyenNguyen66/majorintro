<div class="col-xs-12" style="margin: 20px 0">
    <h3 class=" header-title">Reports</h3>
    <div style="margin: 3rem 0 0 2rem;">
        <form action="" method="post">
            <input type="submit" name="cmd" value="Send Report" class="btn btn-inverse btn-custom">
        </form>
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
                                <th>ID</th>
                                <th>Month</th>
                                <th>Term</th>
                                <th># of paid</th>
                                <th># of not paid</th>
                                <th>Expected total(VND)</th>
                                <th>Actual total(VND)</th>
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
                                        <td><?php echo $row['num_paid']?></td>
                                        <td><?php echo $row['num_not_paid']?></td>
                                        <td><?php echo number_format($row['expected_total'])?></td>
                                        <td><?php echo number_format($row['actual_total'])?></td>
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
