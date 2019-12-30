<div class="dashboard row">
	<div class="col-lg-3 col-6">
		<div class="small-box bg-primary">
			<div class="inner">
				<h3><?php echo 12 ?></h3>
				<p>Ngành</p>
			</div>
			<div class="icon">
				<i class="fa fa-user"></i>
			</div>
			<a href="#" class="small-box-footer">Xem thêm <i class="fa fa-arrow-circle-right"></i></a>
		</div>
	</div>
	<div class="col-lg-3 col-6">
		<div class="small-box bg-success">
			<div class="inner">
				<h3><?php echo 11 ?></h3>
				<p>Chuyên ngành</p>
			</div>
			<div class="icon">
				<i class="fa fa-users"></i>
			</div>
			<a href="#" class="small-box-footer">Xem thêm <i class="fa fa-arrow-circle-right"></i></a>
		</div>
	</div>
	<div class="col-lg-3 col-6">
		<div class="small-box bg-warning">
			<div class="inner">
				<h3><?php echo 12 ?></h3>
				<p>Số biên tập viên</p>
			</div>
			<div class="icon">
				<i class="fa fa-building"></i>
			</div>
			<a href="#" class="small-box-footer">Xem thêm <i class="fa fa-arrow-circle-right"></i></a>
		</div>
	</div>
	<div class="col-lg-3 col-6">
		<div class="small-box bg-danger">
			<div class="inner">
				<h3><?php echo 15?></h3>
				<p>Số bài đăng</p>
			</div>
			<div class="icon">
				<i class="fa fa-list-alt"></i>
			</div>
			<a href="#" class="small-box-footer">Xem thêm <i class="fa fa-arrow-circle-right"></i></a>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-7">
		<h3 class=" header-title" style="visibility: hidden;">Thông tin tài khoản</h3>
		<div class="row card-box"> 
			<div id='wrap'>
				<div id='calendar'></div>
				<div style='clear:both'></div>
			</div>
		</div>
	</div>
	<div class="col-md-4" style="margin-left: 20px;">
		<h3 class=" header-title" style="visibility: hidden;">Tài khoản</h3>
		<div class="row card-box"> 
			<div class="row">
				<label class="col-md-3">Họ và tên</label>
				<div class="col-md-8"><?php echo $admin['full_name']?></div>
			</div>
			<div class="row">
				<label class="col-md-3">Email</label>
				<div class="col-md-8"><?php echo $admin['email']?></div>
			</div>
			<div class="row">
				<label class="col-md-3">Ngày đăng ký</label>
				<div class="col-md-8"><?php echo date('d/m/Y', $admin['created_at'])?></div>
			</div>
			<div class="row" style="margin:2rem 0;">
				<label class="col-md-3"></label>
				<img src="<?php echo base_url($admin['avatar'])?>" alt="avatar" class="img-thumbnail" width="100" height="100">
			</div>
		</div>
	</div>
</div>