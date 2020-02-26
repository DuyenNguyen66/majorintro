<div class="cover">
    <input id="major_id" value="<?= $major['major_id']?>" hidden>
    <h3>Chuyên ngành <?= $major['major_name']?></h3>
    <hr>
    <h4>Các bài viết liên quan</h4>
</div>
<div class="news-content row">
    <?php if (isset($news) && is_array($news)): ?>
        <?php foreach ($news as $key => $row): ?>
            <a href="<?= base_url('bai-viet/' . $row['news_id'])?>">
                <div class="item col-md-6">
                    <div class="item-photo">
                        <img src="<?= base_url($row['image']) ?>" alt="cover image">
                    </div>
                    <div class="item-info">
                        <h3><?= $row['title'] ?></h3>
                        <p><?= $row['description'] ?></p>
                    </div>
                    <div class="item-more row">
                        <div class="col-md-6">
                            <i class="far fa-calendar-alt"></i> <?= date('d/m/Y', $row['created_at']) ?>
                        </div>
                        <div class="col-md-6">
                            <a href="<?= base_url('bai-viet/' . $row['news_id'])?>">
                                Xem thêm <i class="fas fa-angle-double-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </a>
        <?php endforeach; ?>
    <?php endif; ?>
</div>
    <ul class="pagination">
        <?php if ($current_page > 1 && $total_page > 1): ?>
            <li class="page-item">
                <a class="page-link" href="<?= base_url('chuyen-nganh/'.$major['major_id'].'?page='.($current_page - 1)) ?>">Previous</a>
            </li>
        <?php endif; ?>
        <?php for ($i = 1; $i <= $total_page; $i++): ?>
            <?php if ($i == $current_page): ?>
                <li class="page-item active">
                    <a class="page-link" href=""><?php echo $i ?></a>
                </li>
            <?php else: ?>
                <li class="page-item">
                    <a class="page-link" href="<?= base_url('chuyen-nganh/'.$major['major_id']).'?page='.$i ?>"><?php echo $i ?></a>
                </li>
            <?php endif; ?>
        <?php endfor; ?>
        <?php if ($current_page < $total_page && $total_page > 1): ?>
            <li class="page-item">
                <a class="page-link" href="<?= base_url('chuyen-nganh/'.$major['major_id'].'?page='.($current_page + 1)) ?>">Next</a>
            </li>
        <?php endif; ?>
    </ul>

