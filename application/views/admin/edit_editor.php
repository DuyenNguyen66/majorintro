<div class="row card-box">
    <div class="header-title">Sửa Biên tập viên</div>
    <div class="tab-content">
        <form action='' method='POST' enctype="multipart/form-data">
            <div class="row">
                <!-- left column -->
                <div class="col-md-6 card-box">
                    <!-- general form elements -->
                    <div class="box-body">
                        <div class="form-group">
                            <label>Họ và tên</label>
                            <input type="text" name='name' required class="form-control" placeholder="Enter" value="<?php echo $editor['full_name']?>" />
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" name='email' required class="form-control" placeholder="Enter" value="<?php echo $editor['email']?>"/>
                        </div>
                        <div class="form-group">
                            <label>Số điện thoại</label>
                            <input type="text" name='phone' required class="form-control" placeholder="Enter" value="<?php echo $editor['phone']?>"/>
                        </div>
                        <div class="form-group">
                            <label>Chuyên ngành quản lý</label>
                            <select class="building_id form-control" name="major_id" required="">
                                <option value="<?php echo $editor['major_id']?>"><?php echo $editor['major_name']?></option>
                                <?php foreach($majors as $major):?>
                                    <option value="<?php echo $major['major_id']?>"><?php echo $major['major_name']?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group m-b-0">
                            <button type="submit" class="btn btn-inverse btn-custom" name='cmd' value='Save'>Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
