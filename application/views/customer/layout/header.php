<div class="topbar row">
    <!-- Top header -->
    <div class="top-header row">
        <div class="col-md-6 topbar-left">
            <div class="text-center">
                <a href="#" class="logo">
                    <img src="<?php echo base_url('media/logo.png')?>" alt="logo" width="90%">
                </a>
            </div>
        </div>
        <div class="col-md-6 top-header-info">
            <i class="fa fa-phone-volume"></i> 123 546 466 - 456 789 214
        </div>
    </div>
    <!-- Menu -->
    <div class="top-menu">
        <div class="navbar">
            <a href="<?= base_url('trang-chu')?>" class="waves-effect <?php echo isset($parent_id) && $parent_id == 'home' ? ' active' : ''; ?>">Trang chủ</a>
            <?php foreach($groups as $key => $row): ?>
            <div class="dropdown">
                <button class="dropbtn waves-effect<?php echo isset($parent_id) && $parent_id == $row['group_id'] ? ' active' : ''; ?>">
                    <?= $row['group_name']?>
                    <i class="fas fa-chevron-down"></i>
                </button>
                <div class="dropdown-content">
                <?php if($row['majors'] != null):?>
                    <?php foreach($row['majors'] as $key => $major):?>
                        <a href="<?= base_url('chuyen-nganh/' . $major['major_id'])?>"><?= $major['major_name']?></a>
                    <?php endforeach;?>
                <?php endif;?>
                </div>
            </div>
            <?php endforeach;?>
            <a href="<?= base_url('lien-he')?>" class="waves-effect<?php echo isset($parent_id) && $parent_id == 'contact' ? ' active' : ''; ?>">Liên hệ</a>
        </div>
    </div>
    <div class="breadcrumbs">
        <?= $breadcrumbs;?>
    </div>
</div>