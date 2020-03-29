<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
    <meta name="author" content="Coderthemes">
    
    <link rel="shortcut icon" href="<?php echo base_url('assets/images/favicon_1.ico'); ?>">
    
    <title><?= $title?></title>
    
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
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v6.0&appId=205819374138873&autoLogAppEvents=1"></script>
<!-- Begin page -->
<div id="wrapper">
    
    <!-- Header Start -->
    <?php $this->load->view('customer/layout/header')?>
    <!-- Header End -->


    <div class="middle-page row">
            <div class="container">
                <div class="home row">
                    <div class="content-left col-md-4">
                        <div class="search-box">
                            <input id="search-text" type="text" class="form-control" placeholder="Tìm kiếm bài viết" >
                            <i class="fas fa-search"></i>
                        </div>
                        <div class="category">
                            <h4>Ngành đào tạo</h4>
                            <hr>
                            <?php foreach($groups as $key => $item): ?>
                            <div class="group">
                                <h4><a href="<?= base_url('nganh-hoc/' . $item['group_id'])?>">ngành <?= $item['group_name']?></a></h4>
                                <?php if($item['majors'] != null):?>
                                    <?php foreach($item['majors'] as $key => $major):?>
                                    <div class="major">
                                        <a href="<?= base_url('chuyen-nganh/' . $major['major_id'])?>">
                                            <i class="far fa-dot-circle"></i><?= $major['major_name']?>
                                        </a>
                                    </div>
                                    <?php endforeach;?>
                                <?php endif;?>
                            </div>
                            <?php endforeach;?>
                        </div>
                    </div>
                    <div class="content-right col-md-8">
                        <?php
                        echo isset($content) ? $content : 'Empty page';
                        ?>
                    </div>
                </div>
            </div> <!-- container -->
    </div>
    <?php $this->load->view('customer/layout/footer')?>

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