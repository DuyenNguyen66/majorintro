<div class="dashboard row">
	<div class="col-lg-3 col-6">
		<div class="small-box bg-primary">
			<div class="inner">
				<h3><?php echo $totalStudents ?></h3>
				<p>Students</p>
			</div>
			<div class="icon">
				<i class="fa fa-user"></i>
			</div>
			<a href="#" class="small-box-footer">View list <i class="fa fa-arrow-circle-right"></i></a>
		</div>
	</div>
	<div class="col-lg-3 col-6">
		<div class="small-box bg-warning">
			<div class="inner">
				<h3><?php echo $totalFormsNotConfirm ?></h3>
				<p>New Forms</p>
			</div>
			<div class="icon">
				<i class="fa fa-user-plus"></i>
			</div>
			<a href="#" class="small-box-footer">View list <i class="fa fa-arrow-circle-right"></i></a>
		</div>
	</div>
	<div class="col-lg-3 col-6">
		<div class="small-box bg-success">
			<div class="inner">
				<h3><?php echo $totalForms ?></h3>
				<p>Register Forms</p>
			</div>
			<div class="icon">
				<i class="fa fa-list-alt"></i>
			</div>
			<a href="#" class="small-box-footer">View list <i class="fa fa-arrow-circle-right"></i></a>
		</div>
	</div>
	<div class="col-lg-3 col-6">
		<div class="small-box bg-danger">
			<div class="inner">
				<h3><?php echo $totalBillNotPaid?></h3>
				<p>Unpaid Bills</p>
			</div>
			<div class="icon">
				<i class="fa fa-credit-card"></i>
			</div>
			<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-7">
		<h3 class=" header-title" style="visibility: hidden;">My Profile</h3>
		<div class="row card-box"> 
			<button class="btn btn-success" style="margin: 20px 0 20px 20px">Kỳ học <?php echo $term['name']?></button>
			<button class="btn btn-success" style="margin: 20px 0 20px 20px"><?php echo $building['name']?></button>
			<div id='wrap'>
				<div id='calendar'></div>
				<div style='clear:both'></div>
			</div>
		</div>
	</div>
	<div class="col-md-4" style="margin-left: 20px;">
		<h3 class=" header-title" style="visibility: hidden;">My Profile</h3>
		<div class="row card-box"> 
			<div class="row">
				<label class="col-md-3">Name</label>
				<div class="col-md-8"><?php echo $admin['full_name']?></div>
			</div>
			<div class="row">
				<label class="col-md-3">Email</label>
				<div class="col-md-8"><?php echo $admin['email']?></div>
			</div>
			<div class="row">
				<label class="col-md-3">Joined At</label>
				<div class="col-md-8"><?php echo date('d/m/Y', $admin['created'])?></div>
			</div>
			<div class="row" style="margin:2rem 0;">
				<label class="col-md-3"></label>
				<img src="<?php echo base_url($admin['avatar'])?>" alt="avatar" class="img-thumbnail" width="100" height="100">
			</div>
		</div>
	</div>
</div>