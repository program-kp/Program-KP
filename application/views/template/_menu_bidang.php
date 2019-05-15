<ul class="site-menu" data-plugin="menu">
	<li class="site-menu-category">General</li>
	<li class="site-menu-item" id="dashboard">
		<a class="animsition-link" href="<?php echo base_url()?>bidang/dashboard">
			<i class="site-menu-icon fa fa-dashboard" aria-hidden="true"></i>
			<span class="site-menu-title">Dashboard</span>
		</a>
	</li>
	<li class="site-menu-item" id="surat_masuk">
		<a class="animsition-link" href="<?php echo base_url()?>bidang/surat">
			<i class="site-menu-icon fa fa-envelope-o" aria-hidden="true"></i>
			<span class="site-menu-title">Surat Masuk</span>
		</a>
	</li>
	<li class="site-menu-item" id="surat_keluar">
		<a class="animsition-link" href="<?php echo base_url()?>bidang/surat/surat_keluar">
			<i class="site-menu-icon fa fa-envelope-o" aria-hidden="true"></i>
			<span class="site-menu-title">Surat Keluar</span>
		</a>
	</li>
	<li class="site-menu-item" id="surat_undangan">
		<a class="animsition-link" href="<?php echo base_url()?>bidang/surat/undangan">
			<i class="site-menu-icon fa fa-envelope-o" aria-hidden="true"></i>
			<span class="site-menu-title">Surat Undangan</span>
		</a>
	</li>
	<li class="site-menu-item" id="disposisi">
		<a class="animsition-link" href="<?php echo base_url()?>bidang/surat/disposisi">
			<i class="site-menu-icon fa fa-mail-forward" aria-hidden="true"></i>
			<span class="site-menu-title">Disposisi</span>
		</a>
	</li>
	<li class="site-menu-item" id="logout">
		<a class="animsition-link" href="javascript:logout()">
			<i class="site-menu-icon fa fa-sign-out" aria-hidden="true"></i>
			<span class="site-menu-title">Logout</span>
		</a>
	</li>
</ul>

<script>
	function logout()
	{
		bootbox.confirm({
			// size: "small",
			centerVertical: true,
			message: "Anda yakin untuk keluar dari aplikasi ini ?",
			buttons: {
				confirm: {
					label: 'Ya',
					className: 'btn-danger',
				},
				cancel: {
					label: 'Tidak',
					className: 'btn-default',

				}
			},
			callback: function (result) {
				if (result==true) {
					window.location = "<?php echo base_url() ?>login/logout";
				}
			}
		}).find('.modal-dialog').css({
			'width' : '450px'
		}).find('.modal-content').css({
			'font-size': '20px',
			'margin-top': function (){
				var w = $( window ).height();
				var b = $(".modal-dialog").height();
        		// should not be (w-h)/2
        		var h = (w-b)/3;
        		return h+"px";
        	}
        });
	}
</script>