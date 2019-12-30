<div class="row card-box">
	<p class="lead">Student Infomation</p>
	<div class="row">
		<div class="col-md-6">
			<div class="table-responsive">
				<table class="table">
					<tbody>
						
						<tr>
							<th style="width:50%">ID</th>
							<td><?php echo $student['student_id']; ?></td>
						</tr>
						<tr>
							<th style="width:50%">Full Name</th>
							<td><?php echo $student['full_name']; ?></td>
						</tr>
						<tr>
							<th>Birthday</th>
							<td><?php echo date('d/m/Y', $student['birthday']) ?></td>
						</tr>
						<tr>
							<th style="width:50%">Code</th>
							<td><?php echo $student['student_code']; ?></td>
						</tr>
						<tr>
							<th>Email</th>
							<td><?php echo $student['email']; ?></td>
						</tr>
						<tr>
							<th>Address</th>
							<td><?php echo $student['address'] ?></td>
						</tr>
						<tr>
							<th>Phone</th>
							<td><?php echo $student['phone'] ?></td>
						</tr>
						
						<tr>
							<th>Gender</th>
							<td><?php echo $student['gender'] == 1 ? 'Nữ' : 'Nam' ?></td>
						</tr>
						<tr>
							<th>Nation</th>
							<td><?php echo $student['religion_name'] ?></td>
						</tr>
						<tr>
							<th>Ethnic</th>
							<td><?php echo $student['ethnic_name'] ?></td>
						</tr>
						<tr>
							<th>Status</th>
							<td><?php echo $student['status'] == 0 ? 'Unverify' : 'Verified' ?></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
		<div class="col-md-6">
			<img src="<?php echo base_url($student['student_card'])?>" class="img-thumbnail" width="500" height="420">
		</div>
	</div>
</div>