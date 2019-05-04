
<!-- Page -->
<div class="page">
	<div class="page-header">
		<h1 class="page-title">Surat Masuk</h1>
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="<?php echo base_url()?>admin/dashboard">Home</a></li>
			<li class="breadcrumb-item"><a href="javascript:void(0)">Surat</a></li>
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
				<button type="button" class="btn btn-primary btn-sm tambah" data-toggle="modal" data-target="#modal">Tambah Surat Masuk</button><hr>
				<div id="type_alert" class="alert alert-danger dark alert-dismissible notif">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<h4><i id="icon" class="fa fa-check"></i> Alert!</h4>
					<div id="text">Data Berhasil ditambahkan.</div>
				</div>
				<table id="tabel" class="table table-hover dataTable table-striped w-full">
					<thead>
						<tr>
							<th>Name</th>
							<th>Position</th>
							<th>Office</th>
							<th>Age</th>
							<th>Date</th>
							<th>Salary</th>
						</tr>
					</thead>
					<tfoot>
						<tr>
							<th>Name</th>
							<th>Position</th>
							<th>Office</th>
							<th>Age</th>
							<th>Date</th>
							<th>Salary</th>
						</tr>
					</tfoot>
					<tbody>
						<tr>
							<td>Damon</td>
							<td>5516 Adolfo Green</td>
							<td>Littelhaven</td>
							<td>85</td>
							<td>2014/06/13</td>
							<td>$553,536</td>
						</tr>
						<tr>
							<td>Torrey</td>
							<td>1995 Richie Neck</td>
							<td>West Sedrickstad</td>
							<td>77</td>
							<td>2014/09/12</td>
							<td>$243,577</td>
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
				<h4 class="modal-title">Input Data Surat Masuk</h4>
			</div>
			<div class="modal-body">
				<input type="hidden" id="id_login">
				<div class="form-group row">
					<label class="col-sm-4 form-label">Asal Surat Masuk<span required="">*</span></label>
					<div class="col-sm-8">
						<?php echo form_input('asal_surat', '', ["class" => "form-control", 'id' => 'asal_surat']); ?>
						<small id=er></small>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-4 form-label">Nomor Surat<span required="">*</span></label>
					<div class="col-sm-8">
						<?php echo form_input('nomor_surat', '', ["class" => "form-control", 'id' => 'nomor_surat']); ?>
						<small id=er></small>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-4 form-label">Tanggal Surat<span required="">*</span></label>
					<div class="col-sm-8">
						<?php echo form_input('tgl_surat', '', ["class" => "form-control", 'id' => 'tgl_surat']); ?>
						<small id=er></small>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-4 form-label">Perihal<span required="">*</span></label>
					<div class="col-sm-8">
						<?php echo form_textarea('perihal', '', ["class" => "form-control", 'id' => 'perihal', 'rows' => '3']); ?>
						<small id=er></small>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-4 form-label">Diteruskan Kepada<span required="">*</span></label>
					<div class="col-sm-8">
						<?php echo form_dropdown('diteruskan', '', '', ["class" => "form-control", 'id' => 'diteruskan']); ?>
						<small id=er></small>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-4 form-label">Tanggal Diteruskan<span required="">*</span></label>
					<div class="col-sm-8">
						<?php echo form_input('tgl_diteruskan', '', ["class" => "form-control", 'id' => 'tgl_diteruskan']); ?>
						<small id=er></small>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-4 form-label">Tanggal Diterima<span required="">*</span></label>
					<div class="col-sm-8">
						<?php echo form_input('tgl_diterima', '', ["class" => "form-control", 'id' => 'tgl_diterima']); ?>
						<small id=er></small>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-sm btn-secondary batal" data-dismiss="modal">Batal</button>
				<button type="button" class="btn btn-sm btn-primary simpan" data-dismiss="modal" onclick="simpan()">Simpan</button>
				<button type="button" class="btn btn-primary" data-target="#exampleMultipleTwo"
				data-toggle="modal" data-dismiss="modal">Disposisi</button>
			</div>
		</div>
	</div>
</div>
<!-- End Modal -->

<!-- Modal -->
<div class="modal fade modal-fade-in-scale-up" id="exampleMultipleTwo" aria-hidden="false" role="dialog"
tabindex="-1">
	<div class="modal-dialog modal-simple">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
				<h4 class="modal-title">Modal #2</h4>
			</div>
			<div class="modal-body">
				<p>To be continue...</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-sm btn-secondary batal" data-dismiss="modal">Batal</button>
				<button type="button" class="btn btn-sm btn-primary simpan" onclick="simpan()">Simpan</button>
			</div>
		</div>
	</div>
</div>
<!-- End Modal -->
<!-- End Example Multiple Modals -->

<!-- END CHANGE -->


<!-- SCRIPT -->
<script>
	$(document).ready(function(){

		//Active Menu
		$('#surat').addClass('active open');
		$('#surat_masuk').addClass('active hover');

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