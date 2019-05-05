
<!-- Page -->
<div class="page">
	<div class="page-header">
		<h1 class="page-title">Data Admin</h1>
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="<?php echo base_url()?>admin/dashboard">Home</a></li>
			<li class="breadcrumb-item"><a href="javascript:void(0)">Data Master</a></li>
			<li class="breadcrumb-item active">Data Admin</li>
		</ol>
	</div>
	<div class="page-content container-fluid">
		<div class="panel">


			<!-- CHANGE -->
			<div class="panel-heading">
				<h3 class="panel-title">Data Admin
					<small>Berisi Data orang yg berhak membuat mengelola Surat-surat yg ada di Sistem</small>
				</h3>
			</div>
			
			<div class="panel-body">
				<button type="button" class="btn btn-primary btn-sm tambah" data-toggle="modal" data-target="#modal">Tambah Data Admin</button><hr>
				<div id="type_alert" class="alert alert-danger dark alert-dismissible notif">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<h4><i id="icon" class="fa fa-check"></i> Alert!</h4>
					<div id="text">Data Berhasil ditambahkan.</div>
				</div>
				<table id="tabel" class="table table-hover dataTable table-striped w-full">
					<thead>
						<tr>
							<th width="50px" style="text-align:center;">#</th>
							<th>Nama</th>
							<th>username</th>
							<th width="150px" style="text-align:center;">Aksi</th>
						</tr>
					</thead>
					<tbody>						
						<tr>
							<td style="text-align:center;">10</td>
							<td>Nama</td>
							<td>username</td>
							<td>
								<button type="button" class="btn btn-sm btn-secondary batal" data-dismiss="modal"><i class="fa fa-envelope-o" aria-hidden="true"></i>&ensp;Batal</button>
								<button type="button" class="btn btn-sm btn-primary simpan" data-dismiss="modal" onclick="simpan()"><i class="fa fa-envelope-o" aria-hidden="true"></i>&ensp;Simpan</button>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
		<!-- End Panel Basic -->
	</div>
	<!-- End Page-Content -->
</div>

<!-- Modal -->
<div class="modal fade modal-fade-in-scale-up" id="modal" aria-hidden="true" aria-labelledby="exampleMultipleOne"
role="dialog" tabindex="-1">
	<div class="modal-dialog modal-simple modal-center">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
				<h4 class="modal-title">Input Data Admin</h4>
			</div>
			<div class="modal-body">
				<input type="hidden" id="id_login">
				<div class="form-group row">
					<label class="col-sm-4 form-label">Nama Lengkap<span required="">*</span></label>
					<div class="col-sm-8">
						<?php echo form_input('nama_lengkap', '', ["class" => "form-control", 'id' => 'nama_lengkap']); ?>
						<small id=er></small>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-4 form-label">Username<span required="">*</span></label>
					<div class="col-sm-8">
						<?php echo form_input('username', '', ["class" => "form-control", 'id' => 'username']); ?>
						<small id=er></small>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-4 form-label">Password<span required="">*</span></label>
					<div class="col-sm-8">
						<?php echo form_password('password', '', ["class" => "form-control", 'id' => 'password']); ?>
						<small id=er></small>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-sm btn-secondary batal" data-dismiss="modal">Batal</button>
				<button type="button" class="btn btn-sm btn-primary simpan" data-dismiss="modal" onclick="simpan()">Simpan</button>
			</div>
		</div>
	</div>
</div>
<!-- End Modal -->

<!-- END CHANGE -->


<!-- SCRIPT -->
<script>
	$(document).ready(function(){

		//Active Menu
		$('#data_master').addClass('active open');
		$('#data_admin').addClass('active hover');

		//Tabel
		$('#tabel').dataTable({
			responsive: true,
			oLanguage: {
				sProcessing: "<div style='margin-top: -10px'>Processing...</div>",
				sSearch: "Pencarian : ",
				sInfo: "Menampilkan _START_ hingga _END_ dari _TOTAL_ data",
				sInfoEmpty: "Menampilkan 0 hingga 0 dari 0 data",
				sEmptyTable: "Tidak ada data",
				sLengthMenu: "Menampilkan _MENU_ data",
				sInfoFiltered: "(total _TOTAL_ data)",
				sZeroRecords: "Tidak ada data yang cocok",
				"oPaginate": {
					"sPrevious": "Previous", // This is the link to the previous page
					"sNext": "Next", // This is the link to the next page
				}
			},
		});
	});
</script>
<!-- END SCRIPT -->


</div>
</div>
</div>
	<!-- End Page -->