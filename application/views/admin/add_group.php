<div class="row card-box">
    <div class="header-title">Thêm nhóm ngành</div>
    <div class="tab-content">
        <form action='' method='POST' enctype="multipart/form-data">
            <div class="row">
                <!-- left column -->
                <div class="col-md-6 card-box">
                    <!-- general form elements -->
                    <div class="box-body">
                        <div class="form-group">
                            <label>Mã ngành</label>
                            <input type="text" name='group_code' required class="form-control" placeholder="Enter"/>
                        </div>
                        <div class="form-group">
                            <label>Tên nhóm ngành</label>
                            <input type="text" name='group_name' required class="form-control" placeholder="Enter"/>
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
