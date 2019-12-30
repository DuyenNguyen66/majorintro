<div class="row">
	<div class="col-md-7">
		<h3 class=" header-title" style="visibility: hidden;">My Profile</h3>
		<div class="row card-box"> 
			<button class="btn btn-success" style="margin: 20px 0 20px 20px">Term <?php echo $term['name']?></button>
			<div id='wrap'>
				<div id='calendar'></div>
				<div style='clear:both'></div>
			</div>
		</div>
	</div>
	<div class="col-md-4" style="margin-left: 20px;">
		<h3 class=" header-title">My Profile</h3>
		<div class="row card-box"> 
			<?php if($this->session->flashdata('mess')):?>
			<div class="col-md-12">
				<div class="alert alert-danger">
					<?php echo $this->session->flashdata('mess') ?>
				</div>
			</div>
			<?php endif; ?>
			<div class="row">
				<label class="col-md-3">Name</label>
				<div class="col-md-8"><?php echo $student['full_name']?></div>
			</div>
			<div class="row">
				<label class="col-md-3">Birthday</label>
				<div class="col-md-8"><?php echo date('d/m/Y', $student['birthday'])?></div>
			</div>
			<div class="row">
				<label class="col-md-3">Code</label>
				<div class="col-md-8"><?php echo $student['student_code']?></div>
			</div>
			<div class="row">
				<label class="col-md-3">Email</label>
				<div class="col-md-8"><?php echo $student['email']?></div>
			</div>
			<div class="row">
				<label class="col-md-3">Phone</label>
				<div class="col-md-8"><?php echo $student['phone']?></div>
			</div>
			<div class="row">
				<label class="col-md-3">Address</label>
				<div class="col-md-8"><?php echo $student['address']?></div>
			</div>
			<div class="row">
				<label class="col-md-3">Ethnic</label>
				<div class="col-md-8"><?php echo $student['ethnic']?></div>
			</div>
			<div class="row">
				<label class="col-md-3">Religion</label>
				<div class="col-md-8"><?php echo $student['religion']?></div>
			</div>
			<div style="text-align:right;">
				<a class="btn btn-success" href="<?php echo base_url('profile/' . $student['student_id'])?>">
					<i class="fa fa-pencil-alt"></i>
				</a>
			</div>
		</div>
	</div>
</div>