
<!-- Page -->
<div class="page">
	<div class="page-header">
		<h1 class="page-title">Surat Masuk</h1>
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="<?php echo base_url()?>bidang/dashboard">Home</a></li>
			<li class="breadcrumb-item active">Surat Masuk</li>
		</ol>
	</div>
	<div class="page-content container-fluid">
		<div class="panel">


			<!-- CHANGE -->
			<div class="panel-heading">
				<h3 class="panel-title">Surat Masuk
					<small>Berisi Semua Data Surat yang Masuk ke DKP3</small>
				</h3>
			</div>
			
			<div class="panel-body">
				<!-- <button type="button" class="btn btn-primary btn-sm tambah" data-toggle="modal" data-target="#modal">Tambah Surat Masuk</button><hr> -->
				<!-- <div id="type_alert" class="alert alert-danger dark alert-dismissible notif">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<h4><i id="icon" class="fa fa-check"></i> Alert!</h4>
					<div id="text">Data Berhasil ditambahkan.</div>
				</div> -->
				<table id="tabel-masuk" class="table table-hover dataTable table-striped w-full">
					<thead>
						<tr>
							<th>No. Surat</th>
							<th>No. Urut</th>
							<th>Perihal</th>
							<th>Tgl. Terima</th>
						</tr>
					</thead>
					<tbody>
					</tbody>
				</table>
			</div>
		</div>
		<!-- End Panel Basic -->
	</div>
	<!-- End Page-Content -->
</div>


<!-- END CHANGE -->


<!-- SCRIPT -->
<script>
	$(document).ready(function(){

		//Active Menu
		// $('#surat').addClass('active open');
		$('#surat_masuk').addClass('active hover');

		//Tabel
		$('#tabel-masuk').dataTable({
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