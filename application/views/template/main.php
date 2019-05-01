<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
	<meta name="description" content="bootstrap material admin template">
	<meta name="author" content="">

	<title>SMSK&D DK-3</title>

	<link rel="apple-touch-icon" href="<?php echo base_url() ?>assets/images/apple-touch-icon.png">
	<link rel="shortcut icon" href="<?php echo base_url() ?>assets/images/favicon.ico">

	<!-- Stylesheets -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/global/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/global/css/bootstrap-extend.min.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/site.min.css">

	<!-- Plugins -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/global/vendor/animsition/animsition.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/global/vendor/asscrollable/asScrollable.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/global/vendor/switchery/switchery.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/global/vendor/intro-js/introjs.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/global/vendor/slidepanel/slidePanel.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/global/vendor/flag-icon-css/flag-icon.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/global/vendor/waves/waves.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/global/vendor/select2/select2.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/global/vendor/bootstrap-tokenfield/bootstrap-tokenfield.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/global/vendor/bootstrap-tagsinput/bootstrap-tagsinput.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/global/vendor/bootstrap-select/bootstrap-select.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/global/vendor/icheck/icheck.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/global/vendor/switchery/switchery.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/global/vendor/asrange/asRange.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/global/vendor/ionrangeslider/ionrangeslider.min.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/global/vendor/asspinner/asSpinner.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/global/vendor/clockpicker/clockpicker.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/global/vendor/ascolorpicker/asColorPicker.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/global/vendor/bootstrap-touchspin/bootstrap-touchspin.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/global/vendor/jquery-labelauty/jquery-labelauty.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/global/vendor/bootstrap-datepicker/bootstrap-datepicker.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/global/vendor/bootstrap-maxlength/bootstrap-maxlength.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/global/vendor/timepicker/jquery-timepicker.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/global/vendor/jquery-strength/jquery-strength.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/global/vendor/multi-select/multi-select.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/global/vendor/typeahead-js/typeahead.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/examples/css/forms/advanced.css">


	<!-- Fonts -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/global/fonts/material-design/material-design.min.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/global/fonts/brand-icons/brand-icons.min.css">
	<link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic'>

    <!--[if lt IE 9]>
    <script src="?php echo base_url() ?>assets2/global/vendor/html5shiv/html5shiv.min.js"></script>
<![endif]-->

    <!--[if lt IE 10]>
    <script src="?php echo base_url() ?>assets2/global/vendor/media-match/media.match.min.js"></script>
    <script src="?php echo base_url() ?>assets2/global/vendor/respond/respond.min.js"></script>
<![endif]-->

<!-- Scripts -->
<script src="<?php echo base_url() ?>assets/global/vendor/breakpoints/breakpoints.js"></script>
<script>
	Breakpoints();
</script>
</head>
<body class="animsition">
	<nav class="site-navbar navbar navbar-default navbar-fixed-top navbar-mega" role="navigation">
		<div class="navbar-header">
			<button type="button" class="navbar-toggler hamburger hamburger-close navbar-toggler-left hided"
			data-toggle="menubar">
			<span class="sr-only">Toggle navigation</span>
			<span class="hamburger-bar"></span></button>
			<button type="button" class="navbar-toggler collapsed" data-target="#site-navbar-collapse"
			data-toggle="collapse">
			<i class="icon md-more" aria-hidden="true"></i></button>
			<div class="navbar-brand navbar-brand-center" data-toggle="gridmenu">
				<img class="navbar-brand-logo" src="<?php echo base_url() ?>assets/images/logo-dkp3.png" title="Remark">
				<span class="navbar-brand-text hidden-xs-down"> SMSK&D DK-3</span>
			</div>
			<button type="button" class="navbar-toggler collapsed" data-target="#site-navbar-search"
			data-toggle="collapse">
			<span class="sr-only">Toggle Search</span>
			<i class="icon md-search" aria-hidden="true"></i></button>
		</div>

		<div class="navbar-container container-fluid">
			<!-- Navbar Collapse -->
			<div class="collapse navbar-collapse navbar-collapse-toolbar" id="site-navbar-collapse">
				<!-- Navbar Toolbar -->
				<ul class="nav navbar-toolbar">
					<li class="nav-item hidden-float" id="toggleMenubar">
						<a class="nav-link" data-toggle="menubar" href="#" role="button">
							<i class="icon hamburger hamburger-arrow-left">
								<span class="sr-only">Toggle menubar</span>
								<span class="hamburger-bar"></span>
							</i>
						</a>
					</li>
				</ul>
				<!-- End Navbar Toolbar -->

				<!-- Navbar Toolbar Right -->
				<ul class="nav navbar-toolbar navbar-right navbar-toolbar-right">

					<li class="nav-item">
						<label class="nav-link navbar-avatar">
							<span class="avatar avatar-online">
								<img src="<?php echo base_url() ?>assets/global/portraits/5.jpg" alt="...">
							</span>
						</label>
					</li>
					<li class="nav-item">
						<label class="nav-link waves-effect waves-light waves-round">Muhamamad Bawaihi</label>		
					</li>
				</ul>
				<!-- End Navbar Toolbar Right -->
			</div>
			<!-- End Navbar Collapse -->
		</div>
	</nav>
	<div class="site-menubar">
		<div class="site-menubar-body">
			<div>
				<div>
					<?php
                        switch ($role) {
                            case 'Admin':
                                $this->load->view('template/_menu_admin');
                                break;
                            case 'Bidang':
                                $this->load->view('template/_menu_bidang');
                                break;
                            default:
                                echo "<ul><li><a>Tidak ada menu</a></li></ul>";
                        }

                    ?>
				</div>
			</div>
		</div>
	</div>

	<!-- Page -->
	<div class="page">
		<div class="page-header">
			<h1 class="page-title">Form Advanced Elements</h1>
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="../index.html">Home</a></li>
				<li class="breadcrumb-item"><a href="javascript:void(0)">Forms</a></li>
				<li class="breadcrumb-item active">Advanced</li>
			</ol>
		</div>
		<div class="page-content container-fluid">
			<div class="panel">
				dgsres
			</div>
		</div>
	</div>
	<!-- End Page -->


	<!-- Footer -->
	<footer class="site-footer">
		<div class="site-footer-legal">© 2018 <a href="http://themeforest.net/item/remark-responsive-bootstrap-admin-template/11989202">W A I - PINKYBEAR</a></div>
		<div class="site-footer-right">
			Crafted with <i class="red-600 icon md-favorite"></i> by <a href="#">Bootstrap Themes</a>
		</div>
	</footer>
	<!-- Core  -->
	<script src="<?php echo base_url() ?>assets/global/vendor/babel-external-helpers/babel-external-helpers.js"></script>
	<script src="<?php echo base_url() ?>assets/global/vendor/jquery/jquery.js"></script>
	<script src="<?php echo base_url() ?>assets/global/vendor/popper-js/umd/popper.min.js"></script>
	<script src="<?php echo base_url() ?>assets/global/vendor/bootstrap/bootstrap.js"></script>
	<script src="<?php echo base_url() ?>assets/global/vendor/animsition/animsition.js"></script>
	<script src="<?php echo base_url() ?>assets/global/vendor/mousewheel/jquery.mousewheel.js"></script>
	<script src="<?php echo base_url() ?>assets/global/vendor/asscrollbar/jquery-asScrollbar.js"></script>
	<script src="<?php echo base_url() ?>assets/global/vendor/asscrollable/jquery-asScrollable.js"></script>
	<script src="<?php echo base_url() ?>assets/global/vendor/ashoverscroll/jquery-asHoverScroll.js"></script>
	<script src="<?php echo base_url() ?>assets/global/vendor/waves/waves.js"></script>

	<!-- Plugins -->
	<script src="<?php echo base_url() ?>assets/global/vendor/switchery/switchery.js"></script>
	<script src="<?php echo base_url() ?>assets/global/vendor/intro-js/intro.js"></script>
	<script src="<?php echo base_url() ?>assets/global/vendor/screenfull/screenfull.js"></script>
	<script src="<?php echo base_url() ?>assets/global/vendor/slidepanel/jquery-slidePanel.js"></script>
	<script src="<?php echo base_url() ?>assets/global/vendor/select2/select2.full.min.js"></script>
	<script src="<?php echo base_url() ?>assets/global/vendor/bootstrap-tokenfield/bootstrap-tokenfield.min.js"></script>
	<script src="<?php echo base_url() ?>assets/global/vendor/bootstrap-tagsinput/bootstrap-tagsinput.min.js"></script>
	<script src="<?php echo base_url() ?>assets/global/vendor/bootstrap-select/bootstrap-select.js"></script>
	<script src="<?php echo base_url() ?>assets/global/vendor/icheck/icheck.min.js"></script>
	<script src="<?php echo base_url() ?>assets/global/vendor/switchery/switchery.js"></script>
	<script src="<?php echo base_url() ?>assets/global/vendor/asrange/jquery-asRange.min.js"></script>
	<script src="<?php echo base_url() ?>assets/global/vendor/ionrangeslider/ion.rangeSlider.min.js"></script>
	<script src="<?php echo base_url() ?>assets/global/vendor/asspinner/jquery-asSpinner.min.js"></script>
	<script src="<?php echo base_url() ?>assets/global/vendor/clockpicker/bootstrap-clockpicker.min.js"></script>
	<script src="<?php echo base_url() ?>assets/global/vendor/ascolor/jquery-asColor.min.js"></script>
	<script src="<?php echo base_url() ?>assets/global/vendor/asgradient/jquery-asGradient.min.js"></script>
	<script src="<?php echo base_url() ?>assets/global/vendor/ascolorpicker/jquery-asColorPicker.min.js"></script>
	<script src="<?php echo base_url() ?>assets/global/vendor/bootstrap-maxlength/bootstrap-maxlength.js"></script>
	<script src="<?php echo base_url() ?>assets/global/vendor/jquery-knob/jquery.knob.js"></script>
	<script src="<?php echo base_url() ?>assets/global/vendor/bootstrap-touchspin/bootstrap-touchspin.min.js"></script>
	<script src="<?php echo base_url() ?>assets/global/vendor/jquery-labelauty/jquery-labelauty.js"></script>
	<script src="<?php echo base_url() ?>assets/global/vendor/bootstrap-datepicker/bootstrap-datepicker.js"></script>
	<script src="<?php echo base_url() ?>assets/global/vendor/timepicker/jquery.timepicker.min.js"></script>
	<script src="<?php echo base_url() ?>assets/global/vendor/datepair/datepair.min.js"></script>
	<script src="<?php echo base_url() ?>assets/global/vendor/datepair/jquery.datepair.min.js"></script>
	<script src="<?php echo base_url() ?>assets/global/vendor/jquery-strength/password_strength.js"></script>
	<script src="<?php echo base_url() ?>assets/global/vendor/jquery-strength/jquery-strength.min.js"></script>
	<script src="<?php echo base_url() ?>assets/global/vendor/multi-select/jquery.multi-select.js"></script>
	<script src="<?php echo base_url() ?>assets/global/vendor/typeahead-js/bloodhound.min.js"></script>
	<script src="<?php echo base_url() ?>assets/global/vendor/typeahead-js/typeahead.jquery.min.js"></script>
	<script src="<?php echo base_url() ?>assets/global/vendor/jquery-placeholder/jquery.placeholder.js"></script>

	<!-- Scripts -->
	<script src="<?php echo base_url() ?>assets/global/js/Component.js"></script>
	<script src="<?php echo base_url() ?>assets/global/js/Plugin.js"></script>
	<script src="<?php echo base_url() ?>assets/global/js/Base.js"></script>
	<script src="<?php echo base_url() ?>assets/global/js/Config.js"></script>

	<script src="<?php echo base_url() ?>assets/js/Section/Menubar.js"></script>
	<script src="<?php echo base_url() ?>assets/js/Section/GridMenu.js"></script>
	<script src="<?php echo base_url() ?>assets/js/Section/Sidebar.js"></script>
	<script src="<?php echo base_url() ?>assets/js/Section/PageAside.js"></script>
	<script src="<?php echo base_url() ?>assets/js/Plugin/menu.js"></script>

	<script src="<?php echo base_url() ?>assets/global/js/config/colors.js"></script>
	<script src="<?php echo base_url() ?>assets/js/config/tour.js"></script>
	<script>Config.set('assets2', '<?php echo base_url() ?>assets2');</script>

	<!-- Page -->
	<script src="<?php echo base_url() ?>assets/js/Site.js"></script>
	<script src="<?php echo base_url() ?>assets/global/js/Plugin/asscrollable.js"></script>
	<script src="<?php echo base_url() ?>assets/global/js/Plugin/slidepanel.js"></script>
	<script src="<?php echo base_url() ?>assets/global/js/Plugin/switchery.js"></script>
	<script src="<?php echo base_url() ?>assets/global/js/Plugin/select2.js"></script>
	<script src="<?php echo base_url() ?>assets/global/js/Plugin/bootstrap-tokenfield.js"></script>
	<script src="<?php echo base_url() ?>assets/global/js/Plugin/bootstrap-tagsinput.js"></script>
	<script src="<?php echo base_url() ?>assets/global/js/Plugin/bootstrap-select.js"></script>
	<script src="<?php echo base_url() ?>assets/global/js/Plugin/icheck.js"></script>
	<script src="<?php echo base_url() ?>assets/global/js/Plugin/switchery.js"></script>
	<script src="<?php echo base_url() ?>assets/global/js/Plugin/asrange.js"></script>
	<script src="<?php echo base_url() ?>assets/global/js/Plugin/ionrangeslider.js"></script>
	<script src="<?php echo base_url() ?>assets/global/js/Plugin/asspinner.js"></script>
	<script src="<?php echo base_url() ?>assets/global/js/Plugin/clockpicker.js"></script>
	<script src="<?php echo base_url() ?>assets/global/js/Plugin/ascolorpicker.js"></script>
	<script src="<?php echo base_url() ?>assets/global/js/Plugin/bootstrap-maxlength.js"></script>
	<script src="<?php echo base_url() ?>assets/global/js/Plugin/jquery-knob.js"></script>
	<script src="<?php echo base_url() ?>assets/global/js/Plugin/bootstrap-touchspin.js"></script>
	<script src="<?php echo base_url() ?>assets/global/js/Plugin/card.js"></script>
	<script src="<?php echo base_url() ?>assets/global/js/Plugin/jquery-labelauty.js"></script>
	<script src="<?php echo base_url() ?>assets/global/js/Plugin/bootstrap-datepicker.js"></script>
	<script src="<?php echo base_url() ?>assets/global/js/Plugin/jt-timepicker.js"></script>
	<script src="<?php echo base_url() ?>assets/global/js/Plugin/datepair.js"></script>
	<script src="<?php echo base_url() ?>assets/global/js/Plugin/jquery-strength.js"></script>
	<script src="<?php echo base_url() ?>assets/global/js/Plugin/multi-select.js"></script>
	<script src="<?php echo base_url() ?>assets/global/js/Plugin/jquery-placeholder.js"></script>

	<script src="<?php echo base_url() ?>assets/examples/js/forms/advanced.js"></script>

</body>
</html>
