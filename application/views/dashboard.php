
    <div class="row">
        <?php if (isset($news) && is_array($news)): ?>
            <?php foreach ($news as $key => $row): ?>
                <a href="#">
                    <div class="item col-md-6">
                        <div class="item-photo">
                            <img src="<?= base_url($row['image']) ?>" alt="cover image">
                        </div>
                        <div class="item-info">
                            <h3><?= $row['title'] ?></h3>
                            <p><?= $row['description'] ?></p>
                        </div>
                        <div class="item-more row">
                            <div class="col-md-6"><i class="far fa-calendar-alt"></i> <?= date('d/m/Y',
                                    $row['created_at']) ?></div>
                            <div class="col-md-6">
                                <a href="#">Xem thêm <i class="fas fa-angle-double-right"></i></a>
                            </div>
                        </div>
                    </div>
                </a>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
