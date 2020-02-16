<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
    <meta name="author" content="Coderthemes">
    
    <link rel="shortcut icon" href="<?php echo base_url('assets/images/favicon_1.ico'); ?>">
    
    <title>MIT</title>
    
    <link href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url('assets/css/core.css'); ?>" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url('assets/css/components.css'); ?>" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url('assets/css/icons.css'); ?>" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url('assets/css/pages.css'); ?>" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url('assets/css/responsive.css'); ?>" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url('assets/css/user.css'); ?>" rel="stylesheet" type="text/css"/>
    
    <?php
    if (isset($customCss) && is_array($customCss)) {
        foreach ($customCss as $style) {
            echo '<link href="' . base_url($style) . '" rel="stylesheet" type="text/css" />' . "\n";
        }
    }
    ?>
    <script src="https://kit.fontawesome.com/169fed9aa0.js"></script>
</head>


<body class="fixed-left">

<!-- Begin page -->
<div id="wrapper">
    
    <!-- Header Start -->
    <div class="topbar row">
        
        <!-- Top header -->
        <div class="top-header row">
            <div class="col-md-6 topbar-left">
                <div class="text-center">
                    <a href="<?php echo base_url('') ?>" class="logo">
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
                <a href="<?= base_url('dashboard')?>" class="waves-effect<?php echo isset($parent_id) && $parent_id == 1 ? ' active' : ''; ?>">Trang chủ</a>
                <a href="#news" class="waves-effect<?php echo isset($parent_id) && $parent_id == 2 ? ' active' : ''; ?>">News</a>
                <div class="dropdown">
                    <button class="dropbtn">Dropdown
                        <i class="fa fa-caret-down"></i>
                    </button>
                    <div class="dropdown-content">
                        <a href="#">Link 1</a>
                        <a href="#">Link 2</a>
                        <a href="#">Link 3</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->


    <div class="middle-page row">
        <!-- Start content -->
        <!--<div class="content" ng-app="project">-->
            <div class="container">
                <div class="home row">
                    <div class="content-right col-md-4">
                        <div class="search-box">
                            <input id="search-text" type="text" class="form-control" placeholder="Tìm kiếm bài viết" >
                            <i class="fas fa-search"></i>
                        </div>
                        <div class="category">
                            <h4>Ngành đào tạo</h4>
                            <hr>
                            <?php foreach($groups as $key => $item): ?>
                            <div class="group">
                                <h4><a href="#"><?= $item['group_name']?></a></h4>
                                <?php if($item['majors'] != null):?>
                                    <?php foreach($item['majors'] as $key => $major):?>
                                    <div class="major">
                                        <a><i class="far fa-dot-circle"></i><?= $major['major_name']?></a>
                                    </div>
                                    <?php endforeach;?>
                                <?php endif;?>
                            </div>
                            <?php endforeach;?>
                        </div>
                    </div>
                    <div class="content-left col-md-8">
                        <?php
                        echo isset($content) ? $content : 'Empty page';
                        ?>
                    </div>
                </div>
            </div> <!-- container -->
        <!--</div>-->
    </div>
    <footer class="footer-page">
        <div class="footer-info row">
            <div class="col-md-4">
                <h3>Cơ sở Hà Nội</h3>
                <ul class="ul-info">
                    <li>
                        <i class="fa fa-search-location"></i>
                        <p>Số 54 Phố Triều Khúc, Phường Thanh Xuân Nam, Quận Thanh Xuân, Hà Nội</p>
                    </li>
                    <li>
                        <i class="fa fa-envelope-open"></i>
                        <p>infohn@utt.edu.vn</p>
                    </li>
                    <li>
                        <i class="fa fa-mobile"></i>
                        <p>Điện thoại: 0243.552.6713 - 0243.552.6714</p>
                    </li>
                </ul>
            </div>
            <div class="col-md-4">
                <h3>Cơ sở Hà Nội</h3>
                <ul class="ul-info">
                    <li>
                        <i class="fa fa-search-location"></i>
                        <p>Số 54 Phố Triều Khúc, Phường Thanh Xuân Nam, Quận Thanh Xuân, Hà Nội</p>
                    </li>
                    <li>
                        <i class="fa fa-envelope-open"></i>
                        <p>infohn@utt.edu.vn</p>
                    </li>
                    <li>
                        <i class="fa fa-mobile"></i>
                        <p>Điện thoại: 0243.552.6713 - 0243.552.6714</p>
                    </li>
                </ul>
            </div>
            <div class="col-md-4">
                <h3>Cơ sở Hà Nội</h3>
                <ul class="ul-info">
                    <li>
                        <i class="fa fa-search-location"></i>
                        <p>Số 54 Phố Triều Khúc, Phường Thanh Xuân Nam, Quận Thanh Xuân, Hà Nội</p>
                    </li>
                    <li>
                        <i class="fa fa-envelope-open"></i>
                        <p>infohn@utt.edu.vn</p>
                    </li>
                    <li>
                        <i class="fa fa-mobile"></i>
                        <p>Điện thoại: 0243.552.6713 - 0243.552.6714</p>
                    </li>
                </ul>
            </div>
            
        </div>
        <div class="footer-share row">
            <div class="col-md-6" style="padding: 10px;">
                © 2020 Trường Đại học Công nghệ Giao thông vận tải
            </div>
            <div class="col-md-6">
                <a href="#">
                    <i class="fa fa-envelope-square"></i>
                </a>
                <a href="#">
                    <i class="fab fa-facebook-square"></i>
                </a>
                <a href="#">
                    <i class="fab fa-youtube-square"></i>
                </a>
                <a href="#">
                    <i class="fab fa-google-plus-square"></i>
                </a>
            </div>
        </div>
    </footer>

</div>
<!-- END wrapper -->


<script>
    var resizefunc = [];
</script>

<!-- jQuery  -->
<script src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/jquery.slimscroll.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/jquery.blockUI.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/waves.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/wow.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/jquery.nicescroll.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/jquery.scrollTo.min.js'); ?>"></script>


<!-- <script src="https://ajax.microsoft.com/ajax/jquery.templates/beta1/jquery.tmpl.min.js"></script> -->

<script src="<?php echo base_url('assets/js/jquery.core.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/jquery.app.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/user.js'); ?>"></script>


<?php
if (isset($customJs) && is_array($customJs)) {
    foreach ($customJs as $script) {
        echo '<script type="text/javascript" src="' . base_url() . $script . '"></script>' . "\n";
    }
}
?>

</body>
</html>