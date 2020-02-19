
<div class="cover">
    <h3>Ngành <?= $group['group_name']?></h3>
    <h4>Các chuyên ngành đào tạo</h4>
</div>
<div class="row">
    <?php if (isset($majors) && is_array($majors)): ?>
        <?php foreach ($majors as $key => $row): ?>
            <a href="<?= base_url('chuyen-nganh/' . $row['major_id'])?>">
                <div class="major-item col-md-6">
                    <div class="item-info">
                        <h3><?= $row['major_name'] ?></h3>
                        <p><i class="fas fa-graduation-cap"></i> <?= $row['degree'] ?></p>
                        <p><i class="fas fa-clock"></i> <?= $row['training_time']?> năm </p>
                        <div class="btn-more">
                            <a href="<?= base_url('chuyen-nganh/' . $row['major_id'])?>">
                                Xem thêm <i class="fas fa-angle-double-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </a>
        <?php endforeach; ?>
    <?php endif; ?>
</div>
