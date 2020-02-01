<div class="row card-box" xmlns="http://www.w3.org/1999/html">
    <div class="header-title">thêm bài viết</div>
    <div class="tab-content">
        <form action='' method='POST' enctype="multipart/form-data">
            <div class="row">
                <!-- left column -->
                <div class="card-box">
                    <!-- general form elements -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Tiêu đề</label>
                            <input type="text" name='title' required class="form-control" placeholder="Enter" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Đường dẫn</label>
                            <input type="text" name='slug' required class="form-control" placeholder="Enter" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Mô tả</label>
                            <textarea name='description' required class="form-control" placeholder="Enter"></textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label>Ảnh bìa</label>
                        <div class="row">
                            <div class="col-md-5">
                                <img id='image' width='200' height='120' style='border: 4px solid #c6c6c6; border-radius: 4px'/>
                            </div>
                            <div class="uploader col-md-6" onclick="$('#imagePhoto').click()">
                                <button type="button" class="btn">Upload</button>
                            </div>
                            <input type="file" accept="image/*" name="image" id="imagePhoto"/>
                        </div>
                    </div>
                </div>
                <!--Content edit-->
                <div class="form-group m-b-0">
                        <button type="submit" class="btn btn-inverse btn-custom" name='cmd' value='Save'>Save</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
