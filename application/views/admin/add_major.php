<div class="row card-box">
    <div class="header-title">Thêm chuyên ngành</div>
    <div class="tab-content">
        <form action='' method='POST' enctype="multipart/form-data">
            <div class="row">
                <!-- left column -->
                <div class="col-md-6 card-box">
                    <!-- general form elements -->
                    <div class="box-body">
                        <div class="form-group">
                            <label>Mã ngành</label>
                            <input type="text" name='major_code' required class="form-control" placeholder="Enter"/>
                        </div>
                        <div class="form-group">
                            <label>Tên ngành</label>
                            <input type="text" name='major_name' required class="form-control" placeholder="Enter"/>
                        </div>
                        <div class="form-group">
                            <label>Nhóm ngành</label>
                            <select class="building_id form-control" name="group_id" required>
                                <option value="">Chọn nhóm ngành</option>
                                <?php foreach($groups as $group):?>
                                    <option value="<?php echo $group['group_id']?>"><?php echo $group['group_name']?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Thời gian đào tạo</label>
                            <input type="text" name='training_time' required class="form-control" placeholder="Enter"/>
                        </div>
                        <div class="form-group">
                            <label>Bằng tốt nghiệp</label>
                            <input type="text" name='degree' required class="form-control" placeholder="Enter"/>
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
