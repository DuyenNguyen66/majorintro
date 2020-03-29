<div class="dashboard row">
    <div class="col-lg-4 col-6">
        <div class="small-box bg-group">
            <div class="inner">
                <h3><?php echo $total_groups ?></h3>
                <p>Số ngành</p>
            </div>
            <div class="icon">
                <i class="fas fa-layer-group"></i>
            </div>
            <a href="<?= base_url('list-group')?>" class="small-box-footer">Xem thêm <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-4 col-6">
        <div class="small-box bg-major">
            <div class="inner">
                <h3><?php echo $total_majors ?></h3>
                <p>Số chuyên ngành</p>
            </div>
            <div class="icon">
                <i class="fas fa-book"></i>
            </div>
            <a href="<?= base_url('list-major')?>" class="small-box-footer">Xem thêm <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-4 col-6">
        <div class="small-box bg-editor">
            <div class="inner">
                <h3><?php echo $total_editors ?></h3>
                <p>Số biên tập viên</p>
            </div>
            <div class="icon">
                <i class="fas fa-id-badge"></i>
            </div>
            <a href="<?= base_url('list-editor')?>" class="small-box-footer">Xem thêm <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-4 col-6">
        <div class="small-box bg-publish">
            <div class="inner">
                <h3><?php echo $published_news?></h3>
                <p>Bài viết đã duyệt</p>
            </div>
            <div class="icon">
                <i class="fas fa-check-circle"></i>
            </div>
            <a href="<?= base_url('list-news-a')?>" class="small-box-footer">Xem thêm <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-4 col-6">
        <div class="small-box bg-pending">
            <div class="inner">
                <h3><?php echo $pendding_news?></h3>
                <p>Bài viết chờ duyệt</p>
            </div>
            <div class="icon">
                <i class="fas fa-clock"></i>
            </div>
            <a href="<?= base_url('list-news-a')?>" class="small-box-footer">Xem thêm <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-4 col-6">
        <div class="small-box bg-hidden">
            <div class="inner">
                <h3><?php echo $hidden_news?></h3>
                <p>Bài viết đã ẩn</p>
            </div>
            <div class="icon">
                <i class="fas fa-eye-slash"></i>
            </div>
            <a href="<?= base_url('list-news-a')?>" class="small-box-footer">Xem thêm <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
</div>