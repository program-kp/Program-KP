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
	<li class="site-menu-item has-sub" id="disposisi">
		<a class="animsition-link" href="javascript:void(0)">
			<i class="site-menu-icon fa fa-mail-forward" aria-hidden="true"></i>
			<span class="site-menu-title">Disposisi</span>
			<span class="site-menu-arrow"></span>
		</a>
		<ul class="site-menu-sub">
			<li class="site-menu-item" id="dis_surat">
				<a class="animsition-link" href="<?php echo base_url()?>bidang/disposisi/surat_masuk">
					<span class="site-menu-title">Surat Masuk</span>
				</a>
			</li>
			<li class="site-menu-item" id="dis_undangan">
				<a class="animsition-link" href="<?php echo base_url()?>bidang/disposisi/undangan">
					<span class="site-menu-title">Undangan Masuk</span>
				</a>
			</li>
		</ul>
		</li>
	</li>
	<li class="site-menu-item" id="logout">
		<a class="animsition-link" id="logout">
			<i class="site-menu-icon fa fa-sign-out" aria-hidden="true"></i>
			<span class="site-menu-title">Logout</span>
		</a>
	</li>
</ul>

<script>
	$(document).ready(function(){
		$('#logout').on('click', function(){
			$('#modal_logout').modal('show');
		})
	});
	
	function logout()
	{
		window.location = "<?php echo base_url() ?>login/logout";
	}
</script>