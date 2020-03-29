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
	<link href="<?php echo base_url('assets/plugins/datatables/dataTables.bootstrap.min.css'); ?>" rel="stylesheet" type="text/css"/>

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

	<!-- Top Bar Start -->
	<div class="topbar">

		<!-- LOGO -->
		<div class="topbar-left">
			<div class="text-center">
				<a href="<?php echo base_url('') ?>" class="logo">
                    <img src="<?php echo base_url('media/logo.png')?>" alt="logo" width="90%">
                </a>
			</div>
		</div>

		<!-- Button mobile view to collapse sidebar menu -->
		<div class="navbar navbar-default" role="navigation">
			<div class="container">
				<div class="">
					<div class="pull-left">
<!--						<button class="button-menu-mobile open-left">-->
<!--							<i class="ion-navicon"></i>-->
<!--						</button>-->
						<span class="clearfix"></span>
					</div>
					<ul class="pull-right">
						<ul class="nav navbar-nav navbar-right">
							<li class="dropdown">
								<a href="" class="dropdown-toggle profile" data-toggle="dropdown" aria-expanded="true">
									<i class="fa fa-cog"></i>
								</a>
								<ul class="dropdown-menu">
									<li><a href="<?php echo base_url('logout'); ?>"><i class="ti-power-off m-r-5"></i> Đăng xuất</a></li>
								</ul>
							</li>
							
						</ul>
					</ul>
				</div>
				<!--/.nav-collapse -->
			</div>
		</div>
	</div>
	<!-- Top Bar End -->


	<!-- ========== Left Sidebar Start ========== -->

	<div class="left side-menu">
		<div class="sidebar-inner slimscrollleft">
			<!--- Divider -->
			<div id="sidebar-menu">
				<ul>
					<!-- Admin -->
					<?php if(isset($group) && $group == 1):?>
						<li>
							<a href="<?php echo base_url('dashboard-a'); ?>" class="waves-effect<?php echo isset($parent_id) && $parent_id == 1 ? ' active' : ''; ?>">
                                <i class="fa fa-home"></i> <span>Trang chủ</span>
                            </a>
						</li>
						<li class="has_sub">
							<a href="#" class="waves-effect<?php echo isset($parent_id) && $parent_id == 2 ? ' active' : ''; ?>">
                                <i class="fa fa-users"></i> <span>Biên tập viên</span>
                            </a>
							<ul class="list-unstyled">
								<li <?php echo($sub_id == 21 ? 'class="active"' : ''); ?>>
									<a href="<?php echo base_url('add-editor'); ?>"><span>Thêm mới</span></a>
								</li>
								<li <?php echo($sub_id == 22 ? 'class="active"' : ''); ?>>
									<a href="<?php echo base_url('list-editor'); ?>">Danh sách</a>
								</li>
								
							</ul>
						</li>
                        <li>
                            <a href="<?php echo base_url('list-news-a'); ?>" class="waves-effect<?php echo isset($parent_id) && $parent_id == 3 ? ' active' : ''; ?>">
                                <i class="fa fa-newspaper"></i> <span>Bài viết</span>
                            </a>
                        </li>
                        <li class="has_sub">
                            <a href="#" class="waves-effect<?php echo isset($parent_id) && $parent_id == 4 ? ' active' : ''; ?>">
                                <i class="fa fa-book"></i> <span>Nhóm ngành</span>
                            </a>
                            <ul class="list-unstyled">
                                <li <?php echo($sub_id == 41 ? 'class="active"' : ''); ?>>
                                    <a href="<?php echo base_url('add-group'); ?>"><span>Thêm mới</span></a>
                                </li>
                                <li <?php echo($sub_id == 42 ? 'class="active"' : ''); ?>>
                                    <a href="<?php echo base_url('list-group'); ?>">Danh sách</a>
                                </li>

                            </ul>
                        </li>
                        <li class="has_sub">
                            <a href="#" class="waves-effect<?php echo isset($parent_id) && $parent_id == 5 ? ' active' : ''; ?>">
                                <i class="fa fa-pencil-ruler"></i> <span>Chuyên ngành</span>
                            </a>
                            <ul class="list-unstyled">
                                <li <?php echo($sub_id == 51 ? 'class="active"' : ''); ?>>
                                    <a href="<?php echo base_url('add-major'); ?>"><span>Thêm mới</span></a>
                                </li>
                                <li <?php echo($sub_id == 52 ? 'class="active"' : ''); ?>>
                                    <a href="<?php echo base_url('list-major'); ?>">Danh sách</a>
                                </li>

                            </ul>
                        </li>
                        <li>
                            <a href="<?php echo base_url('stats'); ?>" class="waves-effect<?php echo isset($parent_id) && $parent_id == 6 ? ' active' : ''; ?>">
                                <i class="fa fa-home"></i> <span>Thống kê</span>
                            </a>
                        </li>
						
					<!-- Editor -->
					<?php elseif(isset($group) && $group == 2):?>
                        <li>
                            <a href="<?php echo base_url('dashboard-e'); ?>" class="waves-effect<?php echo isset($parent_id) && $parent_id == 7 ? ' active' : ''; ?>">
                                <i class="fa fa-home"></i> <span>Trang chủ</span>
                            </a>
                        </li>
                        <li class="has_sub">
                            <a href="#" class="waves-effect<?php echo isset($parent_id) && $parent_id == 5 ? ' active' : ''; ?>">
                                <i class="fa fa-user-graduate"></i><span>Bài viết</span>
                            </a>
                            <ul class="list-unstyled">
                                <li <?php echo($sub_id == 51 ? 'class="active"' : ''); ?>>
                                    <a href="<?php echo base_url('add-news'); ?>"><span>Thêm mới</span></a>
                                </li>
                                <li <?php echo($sub_id == 52 ? 'class="active"' : ''); ?>>
                                    <a href="<?php echo base_url('list-news'); ?>">Danh sách</a>
                                </li>

                            </ul>
                        </li>
						<li>
							<a href="<?php echo base_url('account'); ?>" class="waves-effect<?php echo isset($parent_id) && $parent_id == 6 ? ' active' : ''; ?>">
                                <i class="fa fa-home"></i> <span>Tài khoản</span>
                            </a>
						</li>
                    <?php endif; ?>
				</ul>
				<div class="clearfix"></div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<!-- Left Sidebar End -->


	<!-- ============================================================== -->
	<!-- Start right Content here -->
	<!-- ============================================================== -->
	<div class="content-page">
		<!-- Start content -->
		<div class="content" ng-app="project">
			<div class="container">
				<?php
				echo isset($content) ? $content : 'Empty page';
				?>
			</div> <!-- container -->
		</div> <!-- content -->
		<footer class="footer text-right">
		</footer>

	</div>

</div>
<!-- END wrapper -->


<script>
	var resizefunc = [];
</script>

<!-- jQuery  -->
<script src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/detect.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/fastclick.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/jquery.slimscroll.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/jquery.blockUI.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/waves.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/wow.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/jquery.nicescroll.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/jquery.scrollTo.min.js'); ?>"></script>

<script src="<?php echo base_url('assets/plugins/datatables/jquery.dataTables.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/plugins/datatables/dataTables.bootstrap.min.js'); ?>"></script>


<!-- <script src="https://ajax.microsoft.com/ajax/jquery.templates/beta1/jquery.tmpl.min.js"></script> -->

<script src="<?php echo base_url('assets/js/jquery.core.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/jquery.app.js'); ?>"></script>

<script src="<?php echo base_url('assets/plugins/ckeditor/ckeditor.js')?>"></script>
<?php
if (isset($customJs) && is_array($customJs)) {
	foreach ($customJs as $script) {
		echo '<script type="text/javascript" src="' . base_url() . $script . '"></script>' . "\n";
	}
}
?>
<script>
	$('#example3').DataTable({
		'ordering': false,
        'dom' : 'frtlp'
	});
	$('#example4').DataTable({
		'ordering': true,
        'dom' : 'frtlp'
	});
</script>
</body>
</html>