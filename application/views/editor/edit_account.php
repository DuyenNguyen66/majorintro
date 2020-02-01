<div class="row card-box">
    <div class="header-title">Thông tin tài khoản</div>
    <div class="tab-content">
        <form action='' method='POST' enctype="multipart/form-data">
            <div class="row">
                <!-- left column -->
                <div class="card-box">
                    <?php if($this->session->flashdata('check_pass_err')): ?>
                        <div class="alert alert-danger">
                            <?php echo $this->session->flashdata('check_pass_err')?>
                        </div>
                    <?php endif;?>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Họ và tên</label>
                            <input type="text" readonly class="form-control" placeholder="Enter" value="<?php echo $editor['full_name']?>" />
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" readonly class="form-control" placeholder="Enter" value="<?php echo $editor['email']?>" />
                        </div>
                        <div class="form-group">
                            <label>Số điện thoại</label>
                            <input type="text" name='phone' required class="form-control" placeholder="Enter" value="<?php echo $editor['phone']?>"/>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-12">Avatar</label>
                            <div class="col-md-4">
                                <img src="<?php echo $editor['avatar']?>" id='image' width='120' height='120' style='border: 4px solid #c6c6c6; border-radius: 4px'/>
                            </div>
                            <div class="col-md-8">
                                <div class="" onclick="$('#imagePhoto').click()">
                                    <input type="file" accept="image/*" name="image" id="imagePhoto" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Ngành đào tạo</label>
                            <input type="text" readonly class="form-control" placeholder="Enter" value="<?php echo $editor['major_name']?>" />
                        </div>
                        <div class="form-group row">
                            <label class="col-md-6">Trạng thái</label>
                            <div class="col-md-6">
                                <?php if($editor['status'] == 0): ?>
                                <a class="btn btn-warning btn-xs">Chưa kích hoạt</a>
                                <?php else: ?>
                                <a class="btn btn-success btn-xs">Đã kích hoạt</a>
                                <?php endif; ?>
                            </div>

                        </div>
                        <div class="form-group">
                            <label>Mật khẩu cũ</label>
                            <div class="row">
                                <div class="col-md-7">
                                    <input type="password" name='old_password' required class="form-control" placeholder="Enter"/>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Mật khẩu mới</label>
                            <div class="row">
                                <div class="col-md-7">
                                    <input type="password" name='password' id='password' required class="form-control" placeholder="Enter"/>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Xác nhận mật khẩu</label>
                            <div class="row">
                                <div class="col-md-7">
                                    <input type="password" name='re_password' id='re_password' required class="form-control" placeholder="Enter"/>
                                </div>
                                <div class="col-md-2" id="icon_check"></div>
                            </div>
                        </div>
                        <div class="form-group btn_save">
                            <button type="submit" class="btn btn-inverse btn-custom" name='cmd' value='Save' disabled >Save
                            </button>
                        </div>
                    </div>
                </div>
                
            </div>
        </form>
    </div>
</div>
