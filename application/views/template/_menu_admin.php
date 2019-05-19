<ul id="menu-navigation" class="site-menu" data-plugin="menu">
	<li class="site-menu-category">General</li>
	<li class="site-menu-item" id="dashboard">
		<a class="animsition-link" href="<?php echo base_url()?>admin/dashboard">
			<i class="site-menu-icon fa fa-dashboard" aria-hidden="true"></i>
			<span class="site-menu-title">Dashboard</span>
		</a>
	</li>
	<li class="site-menu-item has-sub" id="surat">
		<a href="javascript:void(0)">
			<i class="site-menu-icon fa fa-book" aria-hidden="true"></i>
			<span class="site-menu-title">Surat</span>
			<span class="site-menu-arrow"></span>
		</a>
		<ul class="site-menu-sub">
			<li class="site-menu-item" id="surat_masuk">
				<a class="animsition-link" href="<?php echo base_url()?>admin/surat/surat_masuk">
					<span class="site-menu-title"><i class="fa fa-envelope-o" aria-hidden="true"></i>&ensp;Surat Masuk</span>
				</a>
			</li>
			<li class="site-menu-item" id="undangan">
				<a class="animsition-link" href="<?php echo base_url()?>admin/surat/undangan">
					<span class="site-menu-title"><i class="fa fa-envelope-o" aria-hidden="true"></i>&ensp;Undangan Masuk</span>
				</a>
			</li>
			<li class="site-menu-item" id="surat_keluar">
				<a class="animsition-link" href="<?php echo base_url()?>admin/surat/surat_keluar">
					<span class="site-menu-title"><i class="fa fa-envelope-o" aria-hidden="true"></i>&ensp;Surat Keluar</span>
				</a>
			</li>
		</ul>
	</li>	
	<li class="site-menu-item has-sub" id="disposisi">
		<a href="javascript:void(0)">
			<i class="site-menu-icon fa fa-mail-forward" aria-hidden="true"></i>
			<span class="site-menu-title">Disposisi</span>
			<span class="site-menu-arrow"></span>
		</a>
		<ul class="site-menu-sub">
			<li class="site-menu-item" id="dis_surat">
				<a class="animsition-link" href="<?php echo base_url()?>admin/disposisi/surat_masuk">
					<span class="site-menu-title"><i class="fa fa-envelope-o" aria-hidden="true"></i>&ensp;Surat Masuk</span>
				</a>
			</li>
			<li class="site-menu-item" id="dis_undangan">
				<a class="animsition-link" href="<?php echo base_url()?>admin/disposisi/undangan">
					<span class="site-menu-title"><i class="fa fa-envelope-o" aria-hidden="true"></i>&ensp;Undangan Masuk</span>
				</a>
			</li>
		</ul>
	</li>
	<li class="site-menu-item has-sub" id="data_master">
		<a href="javascript:void(0)">
			<i class="site-menu-icon fa fa-gear" aria-hidden="true"></i>
			<span class="site-menu-title">Data Master</span>
			<span class="site-menu-arrow"></span>
		</a>
		<ul class="site-menu-sub">
			<li class="site-menu-item" id="referensi_bidang">
				<a class="animsition-link" href="<?php echo base_url()?>admin/master/referensi_bidang">
					<span class="site-menu-title"><i class="fa fa-share-alt" aria-hidden="true"></i>&ensp;Data Referensi</span>
				</a>
			</li>
			<li class="site-menu-item" id="user_bidang">
				<a class="animsition-link" href="<?php echo base_url()?>admin/master/user_bidang">
					<span class="site-menu-title"><i class="fa fa-users" aria-hidden="true"></i>&ensp;User Bidang</span>
				</a>
			</li>
		</ul>
	</li>
	<!-- <li class="site-menu-item">
		<a class="animsition-link" id="logout">
			<i class="site-menu-icon fa fa-sign-out" aria-hidden="true"></i>
			<span class="site-menu-title">Logout</span>
		</a>
	</li> -->
</ul>


<!-- <ul id="menu-navigation" class="site-menu" data-plugin="menu">
	<li class="site-menu-category">General</li>
	<li class="site-menu-item" id="dashboard">
		<a class="animsition-link" href="#dashboard" v-bind:class="{active: isActive[0]}" v-on:click="navigate('dashboard',0)">
			<i class="site-menu-icon fa fa-dashboard" aria-hidden="true"></i>
			<span class="site-menu-title">Dashboard</span>
		</a>
	</li>
	<li class="site-menu-item has-sub" id="surat">
		<a href="javascript:void(0)">
			<i class="site-menu-icon fa fa-book" aria-hidden="true"></i>
			<span class="site-menu-title">Surat</span>
			<span class="site-menu-arrow"></span>
		</a>
		<ul class="site-menu-sub">
			<li class="site-menu-item" id="surat_masuk">
				<a class="animsition-link" href="#surat_masuk" v-bind:class="{active: isActive[1]}" v-on:click="navigate('surat_masuk',1)">
					<span class="site-menu-title"><i class="fa fa-envelope-o" aria-hidden="true"></i>&ensp;Surat Masuk</span>
				</a>
			</li>
			<li class="site-menu-item" id="undangan_masuk">
				<a class="animsition-link" href="#undangan_masuk" v-bind:class="{active: isActive[2]}" v-on:click="navigate('undangan_masuk',2)">
					<span class="site-menu-title"><i class="fa fa-envelope-o" aria-hidden="true"></i>&ensp;Undangan Masuk</span>
				</a>
			</li>
			<li class="site-menu-item" id="surat_keluar">
				<a class="animsition-link" href="#surat_keluar" v-bind:class="{active: isActive[3]}" v-on:click="navigate('surat_keluar',3)">
					<span class="site-menu-title"><i class="fa fa-envelope-o" aria-hidden="true"></i>&ensp;Surat Keluar</span>
				</a>
			</li>
			<li class="site-menu-item" id="disposisi">
				<a class="animsition-link" href="#disposisi" v-bind:class="{active: isActive[4]}" v-on:click="navigate('disposisi',4)">
					<span class="site-menu-title"><i class="fa fa-mail-forward" aria-hidden="true"></i>&ensp;Disposisi</span>
				</a>
			</li>
		</ul>
	</li>
	<li class="site-menu-item has-sub" id="data_master">
		<a href="javascript:void(0)">
			<i class="site-menu-icon fa fa-cogs" aria-hidden="true"></i>
			<span class="site-menu-title">Data Master</span>
			<span class="site-menu-arrow"></span>
		</a>
		<ul class="site-menu-sub">
			<li class="site-menu-item" id="data_admin">
				<a class="animsition-link" href="#data_admin" v-bind:class="{active: isActive[5]}" v-on:click="navigate('data_admin',5)">
					<span class="site-menu-title"><i class="fa fa-user-o" aria-hidden="true"></i>&ensp;Data Admin</span>
				</a>
			</li>
			<li class="site-menu-item" id="data_bidang">
				<a class="animsition-link" href="#data_bidang" v-bind:class="{active: isActive[6]}" v-on:click="navigate('data_bidang',6)">
					<span class="site-menu-title"><i class="fa fa-share-alt" aria-hidden="true"></i>&ensp;Data Bidang</span>
				</a>
			</li>
		</ul>
	</li>
	<li class="site-menu-item">
		<a class="animsition-link" href="#logout" v-bind:class="{active: isActive[7]}" v-on:click="navigate('logout',7)">
			<i class="site-menu-icon fa fa-sign-out" aria-hidden="true"></i>
			<span class="site-menu-title">Logout</span>
		</a>
	</li>
</ul> -->