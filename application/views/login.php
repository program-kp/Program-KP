

<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
	<meta name="description" content="bootstrap material admin template">
	<meta name="author" content="">

	<title>Login | SIPALSU</title>

	<link rel="apple-touch-icon" href="<?php echo base_url() ?>assets/images/apple-touch-icon.png">
    <link rel="shortcut icon" href="<?php echo base_url() ?>assets/images/logo-dkp3.png">

	<!-- Stylesheets -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/global/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/global/css/bootstrap-extend.min.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/site.min.css">

	<!-- Plugins -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/global/fonts/font-awesome/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/global/vendor/animsition/animsition.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/global/vendor/asscrollable/asScrollable.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/global/vendor/switchery/switchery.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/global/vendor/intro-js/introjs.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/global/vendor/slidepanel/slidePanel.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/global/vendor/flag-icon-css/flag-icon.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/global/vendor/waves/waves.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/examples/css/pages/login-v3.css">


	<!-- Fonts -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/global/fonts/material-design/material-design.min.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/global/fonts/brand-icons/brand-icons.min.css">
	<link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic'>

	<!-- Scripts -->
	<script src="<?php echo base_url() ?>assets/global/vendor/breakpoints/breakpoints.js"></script>
	<script>
		Breakpoints();
	</script>
</head>
<body class="animsition page-login-v3 layout-full">

	<!-- Page -->
	<div class="page vertical-align text-center" data-animsition-in="fade-in" data-animsition-out="fade-out">
		<div class="page-content vertical-align-middle">
			<div class="panel">
				<div class="panel-body">
					<div class="brand">
						<img class="brand-img" width="80px" src="<?php echo base_url() ?>assets/images/logo-dkp3.png" alt="...">
						<br><br><h2 class="brand-text font-size-18">SIPALSU</h2>
					</div>
					<div id="type_alert" class="alert dark alert-dismissible d-none notif">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<h5 id="text">Data Berhasil ditambahkan.</h5>
					</div>
					<form id="form" action="javascript:login()">
						<div class="form-group form-material floating" data-plugin="formMaterial">
							<input type="text" class="form-control" name="username" id="username" />
							<label class="floating-label">Username</label>
							<small id=er></small>
						</div>
						<div class="form-group form-material floating" data-plugin="formMaterial">
							<input type="password" class="form-control" name="password" id="password" />
							<label class="floating-label">Password</label>
							<small id=er></small>
						</div>
						<button id="login" type="submit" class="btn btn-primary btn-block btn-lg mt-40" onclick="">Login</button>
					</form>
				</div>
			</div>

			<footer class="page-copyright page-copyright-inverse">
				<p>WEBSITE TEMPLATE BY Bootstrap Themes</p>
				<p>© 2018. W A I - PINKYBEAR.</p>
			</footer>
		</div>
	</div>
	<!-- End Page -->


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
	<script>Config.set('assets', '<?php echo base_url() ?>assets');</script>

	<!-- Page -->
	<script src="<?php echo base_url() ?>assets/js/Site.js"></script>
	<script src="<?php echo base_url() ?>assets/global/js/Plugin/asscrollable.js"></script>
	<script src="<?php echo base_url() ?>assets/global/js/Plugin/slidepanel.js"></script>
	<script src="<?php echo base_url() ?>assets/global/js/Plugin/switchery.js"></script>
	<script src="<?php echo base_url() ?>assets/global/js/Plugin/jquery-placeholder.js"></script>
	<script src="<?php echo base_url() ?>assets/global/js/Plugin/material.js"></script>

	<script>
		(function(document, window, $){
			'use strict';

			var Site = window.Site;
			$(document).ready(function(){
				Site.run();
			});
		})(document, window, jQuery);

		function success()
		{		
			$('#er').html("");
			$('input').val('');
			$('#type_alert').attr('class', 'alert alert-dismissible mt-3 d-none');
			$('#icon').attr('class', '');
			$('#text').html('');
			$('#type_alert').removeClass('d-none');
		}

		function login() {

			$("#login").html("Processing...");
			$('#login').attr('disabled','disabled');

			var form_data = new FormData(); 
			form_data.append("username", $('#username').val());
			form_data.append("password", $('#password').val());
			$.ajax({
				url : "<?php echo base_url()?>login/datainput",
				type : 'POST',
				processData: false,
				contentType: false,
				dataType:'json',
				data : form_data,
				success: function(data){
					console.log(data);
					if (data.status=="validasi") {

						$.each(data, function(key, value) {
							$('#' + key).parents('.form-group').find('#er').addClass('text-danger').html(value);
						});

					} else if (data.status=="berhasil") {

						window.location = "<?php echo base_url() ?>"+data.page;

					} else {

						$('small').html('');
						success();
						$('#type_alert').addClass(data.type_alert);
						$('#icon').addClass(data.icon);
						$('#text').html(data.text);

					}
					$('#login').html('Login');
					$('#login').removeAttr('disabled');
				}
			});
		}
	</script>

</body>
</html>
