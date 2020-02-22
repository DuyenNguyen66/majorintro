<div class="row card-box" xmlns="http://www.w3.org/1999/html">
    <div class="header-title">duyệt bài viết</div>
    <div class="tab-content">
        <form action='' method='POST' enctype="multipart/form-data">
            <div class="row">
                <!-- left column -->
                <div class="card-box">
                    <!-- general form elements -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Tiêu đề</label>
                            <input type="text" name='title' readonly class="form-control" placeholder="Enter" value="<?php echo $news['title']?>"/>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Đường dẫn</label>
                            <input type="text" name='slug' readonly class="form-control" placeholder="Enter" value="<?php echo $news['slug']?>"/>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Mô tả</label>
                            <textarea name='description' readonly class="form-control" placeholder="Enter"> <?php echo $news['description']?> </textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label>Ảnh bìa</label>
                        <div class="row">
                            <div class="col-md-5">
                                <img id='image' width='200' height='120' style='border: 4px solid #c6c6c6; border-radius: 4px' src="<?php echo base_url($news['image'])?>"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Nội dung</label>
                            <textarea name='content' id="edit_frame" readonly class="form-control" placeholder="Enter" data-sample-short>
                                <?php echo $news['content']?>
                            </textarea>
                        </div>
                        <div class="form-group m-b-0">
                            <?php if($news['status'] == 1): ?>
                            <button type="submit" class="btn btn-inverse btn-custom" name='cmd' value="verify">Xuất bản</button>
                            <?php else: ?>
                            <button type="submit" class="btn btn-inverse btn-custom" disabled >Xuất bản</button>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
