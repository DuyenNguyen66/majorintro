
<div class="row">
	<div class="col-md-7">
		<div class="row card-box">
			<div id='wrap'>
				<div id='calendar'></div>
				<div style='clear:both'></div>
			</div>
		</div>
	</div>
	<div class="col-md-4" style="margin-left: 20px;">
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
				<img src="<?php echo media_thumbnail($admin['avatar'])?>" alt="avatar" class="img-thumbnail" width="100" height="100">
			</div>
		</div>
	</div>
</div>