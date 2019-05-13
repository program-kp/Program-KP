 <!DOCTYPE html>
<html class="no-js css-menubar" lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
	<meta name="description" content="bootstrap material admin template">
	<meta name="author" content="">

	<title>SMSK&D DKP-3</title>

	<link rel="apple-touch-icon" href="<?php echo base_url() ?>assets/images/apple-touch-icon.png">
    <link rel="shortcut icon" href="<?php echo base_url() ?>assets/images/logo-dkp3.png">
    
    <!-- Stylesheets -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/global/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/global/css/bootstrap-extend.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/site.min.css">
    
    <!-- Plugins -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/global/fonts/font-awesome/font-awesome.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/global/vendor/animsition/animsition.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/global/vendor/asscrollable/asScrollable.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/global/vendor/switchery/switchery.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/global/vendor/intro-js/introjs.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/global/vendor/slidepanel/slidePanel.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/global/vendor/flag-icon-css/flag-icon.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/global/vendor/waves/waves.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/global/vendor/datatables.net-bs4/dataTables.bootstrap4.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/global/vendor/datatables.net-fixedheader-bs4/dataTables.fixedheader.bootstrap4.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/global/vendor/datatables.net-fixedcolumns-bs4/dataTables.fixedcolumns.bootstrap4.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/global/vendor/datatables.net-rowgroup-bs4/dataTables.rowgroup.bootstrap4.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/global/vendor/datatables.net-scroller-bs4/dataTables.scroller.bootstrap4.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/global/vendor/datatables.net-select-bs4/dataTables.select.bootstrap4.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/global/vendor/datatables.net-responsive-bs4/dataTables.responsive.bootstrap4.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/global/vendor/datatables.net-buttons-bs4/dataTables.buttons.bootstrap4.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/examples/css/tables/datatable.css">

        <link rel="stylesheet" href="<?php echo base_url() ?>assets/global/vendor/bootstrap-notify/animate.css">
        
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/global/vendor/bootstrap-datepicker/bootstrap-datepicker.css">
    
    <!-- Fonts -->
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/global/fonts/font-awesome/font-awesome.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/global/fonts/material-design/material-design.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/global/fonts/brand-icons/brand-icons.min.css">
    <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic'>

    
    <script src="<?php echo base_url() ?>assets/global/vendor/jquery/jquery.js"></script>
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
			<div class="navbar-brand navbar-brand-center">
				<img class="navbar-brand-logo" src="<?php echo base_url() ?>assets/images/logo-dkp3.png">
				<span class="navbar-brand-text hidden-xs-down"> SMSK&D DKP-3</span>
			</div>
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
						<label class="nav-link waves-effect waves-light waves-round">
							<?php echo $this->session->userdata("nama") ?>
						</label>		
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
					switch ($this->session->userdata("role")) {
						case 'Admin':
						$this->load->view('template/_menu_admin');
						break;
						case 'Bidang':
						$this->load->view('template/_menu_bidang');
						break;
						default:
						$this->load->view('login');
					}
					?>
				</div>
			</div>
		</div>
	</div>


	