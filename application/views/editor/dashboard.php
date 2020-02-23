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
        <div class="row card-box db-custom">
            <h3 class=" header-title" style="visibility: hidden;">Thông tin tài khoản</h3>
            <div id='wrap'>
                <div id='calendar'></div>
                <div style='clear:both'></div>
            </div>
        </div>
    </div>
    <div class="col-md-4" style="margin-left: 20px;">
        <div class="row card-box db-custom">
            <h3 class=" header-title" style="text-align: center">Tài khoản</h3>
            <?php if($this->session->flashdata('acc_mess')): ?>
            <div class="alert alert-danger">
                <a href="<?php echo base_url('account')?>" style="color: darkred ">
                <?php echo $this->session->flashdata('acc_mess')?> &nbsp;
                <i class="fa fa-arrow-right" style="color: darkred"></i>
                </a>
            </div>
            <?php endif;?>
            
            <div class="row">
                <label class="col-md-4">Họ và tên</label>
                <div class="col-md-8"><?php echo $account['full_name']?></div>
            </div>
            <div class="row">
                <label class="col-md-4">Email</label>
                <div class="col-md-8"><?php echo $account['email']?></div>
            </div>
            <div class="row">
                <label class="col-md-4">Ngày đăng ký</label>
                <div class="col-md-8"><?php echo date('d/m/Y', $account['created_at'])?></div>
            </div>
            <div class="row" style="margin:2rem 0;">
                <label class="col-md-4"></label>
                <img src="<?php echo media_thumbnail($account['avatar'])?>" alt="avatar" class="img-thumbnail" width="100" height="100">
            </div>
        </div>
        <div class="row card-box db-custom">
            <h3 class=" header-title" style="text-align: center">Ngành quản lý</h3>
            <div class="row">
                <label class="col-md-4">Mã ngành</label>
                <div class="col-md-8"><?php echo $major['major_code']?></div>
            </div>
            <div class="row">
                <label class="col-md-4">Chuyên ngành</label>
                <div class="col-md-8"><?php echo $major['major_name']?></div>
            </div>
            <div class="row">
                <label class="col-md-4">Nhóm ngành</label>
                <div class="col-md-8"><?php echo $major['group_name']?></div>
            </div>
            <div class="row">
                <label class="col-md-4">Thời gian đào tạo</label>
                <div class="col-md-8"><?php echo $major['training_time']?> năm</div>
            </div>
            <div class="row">
                <label class="col-md-4">Bằng tốt nghiệp</label>
                <div class="col-md-8"><?php echo $major['degree']?></div>
            </div>
        </div>
    </div>
</div>