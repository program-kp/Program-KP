
<!-- Page -->
<div class="page">
	<div class="page-header">
		<h1 class="page-title">Undangan</h1>
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="<?php echo base_url()?>admin/dashboard">Home</a></li>
			<li class="breadcrumb-item"><a href="javascript:void(0)">Surat</a></li>
			<li class="breadcrumb-item active">Undangan</li>
		</ol>
	</div>
	<div class="page-content container-fluid">
		<div class="panel">
			<!-- CHANGE -->
			<div class="panel-heading">
				<h3 class="panel-title">Undangan
					<small>Berisi Data Undangan yang ditujukan ke DKP3 Kota Banjarbaru</small>
				</h3>
			</div>
			
			<div class="panel-body">
				<button type="button" class="btn btn-primary btn-sm tambah" data-toggle="modal" data-target="#modal">Tambah Undangan</button><hr>
				<!-- <button id="notify">Tes</button> -->
				<table id="tabel" class="table table-hover dataTable table-striped table-bordered table-hover w-full">
					<thead>
						<tr>
							<th width="50px" style="text-align:center;">#</th>
							<th>No. Urut</th>
							<th>No. Surat</th>
							<th>Tanggal Terima</th>
							<th>Tanggal Undangan</th>
							<th>Tempat Undangan</th>
							<th width="150px" style="text-align:center;">Aksi</th>
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

<!-- Modal -->
<div class="modal fade modal-fade-in-scale-up" id="modal" aria-hidden="true" aria-labelledby="exampleMultipleOne"
role="dialog" tabindex="-1">
<div class="modal-dialog modal-simple">
	<div class="modal-content">
		<form action="#" id="form">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
				<h4 class="modal-title"><span id=judul>Tambah</span> Undangan</h4>
			</div>
			<div class="modal-body">
				<input type="hidden" id="no_urut_L">
				<div class="form-group row">
					<label class="col-sm-4 form-label">No. Urut<span required="">*</span></label>
					<div class="col-sm-8 data_input">
						<?php echo form_input('no_urut', '', ["class" => "form-control", 'id' => 'no_urut']); ?>
						<small id=er>Validasi View</small>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-4 form-label">Nomor Surat<span required="">*</span></label>
					<div class="col-sm-8 data_input">
						<?php echo form_input('no_surat', '', ["class" => "form-control", 'id' => 'no_surat']); ?>
						<small id=er>Validasi View</small>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-4 form-label">Waktu Undangan<span required="">*</span></label>
					<div class="col-sm-8 data_input">
						<?php echo form_input('waktu_undangan', '', ["class" => "form-control", 'id' => 'waktu_undangan']); ?>
						<small id=er>Validasi View</small>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-4 form-label">Tempat Undangan<span required="">*</span></label>
					<div class="col-sm-8 data_input">
						<?php echo form_input('tempat_undangan', '', ["class" => "form-control", 'id' => 'tempat_undangan']); ?>
						<small id=er>Validasi View</small>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-4 form-label">Tanggal Terima<span required="">*</span></label>
					<div class="col-sm-8 data_input">
						<?php echo form_input('tgl_terima', '', ["class" => "form-control", 'id' => 'tgl_terima']); ?>
						<small id=er>Validasi View</small>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-sm btn-secondary batal" data-dismiss="modal">Batal</button>
				<button type="button" class="btn btn-sm btn-primary simpan" data-dismiss="modal" onclick="simpan()">Simpan</button>
			</div>
		</form>
	</div>
</div>
</div>
<!-- End Modal -->

<!-- Modal Hapus -->
<div class="modal fade modal-fade-in-scale-up" id="modal_hapus" aria-hidden="true" aria-labelledby="exampleMultipleOne"
role="dialog" tabindex="-1">
<div class="modal-dialog modal-simple modal-center">
	<div class="modal-content">
		<form action="#" id="form">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
				<h4 class="modal-title"><span id=judul>Hapus</span> Surat Keluar</h4>
			</div>
			<div class="modal-body">
				<input type="hidden" id="id">
				<table id="tabel_hapus" class="table table-hover dataTable table-striped table-bordered table-hover w-full">
					<thead>
						<tr>
							<th>No. Surat</th>
							<th>Waktu Undangan</th>
							<th>Tempat Undangan</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td id="hapus_nosurat"></td>
							<td id="hapus_waktu"></td>
							<td id="hapus_tempat"></td>
						</tr>
					</tbody>
				</table>
				<div id="konfirmasi">Yakin Ingin hapus data ?</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-sm btn-secondary batal" data-dismiss="modal">Batal</button>
				<button type="button" class="btn btn-sm btn-danger hapus" id="hapus_data" data-dismiss="modal" onclick="hapus()">Hapus</button>
			</div>
		</form>
	</div>
</div>
</div>
<!-- End Modal -->

<!-- END CHANGE -->


<!-- SCRIPT -->
<script>

	function confirm(no)
	{
		$('#id').val($('#confirm'+no).data().value);
		$('#hapus_nosurat').html($('#confirm'+no).data().nosurat);
		$('#hapus_waktu').html($('#confirm'+no).data().waktu);
		$('#hapus_tempat').html($('#confirm'+no).data().tempat);
		$('#hapus_tgl').html($('#confirm'+no).data().tanggal);
		$('#modal_hapus').modal('show');
	}

	function hapus()
	{
		var nourut = $('#id').val();
		
		$.ajax({
			url : "<?php echo base_url()?>admin/undangan/datahapus/"+nourut,
			type : 'POST',
			dataType:'json',
			success: function(data) {
				if (data.hasil == "berhasil") {
					success();
					notify(data.title, data.message, data.icon, data.type);
					table.ajax.reload( null, false );
				}
			}
		});
	}

	function edit(no)
	{
		success();
		var nourut = $('#edit'+no).data().value;
		$.ajax({
			url : "<?php echo base_url()?>admin/undangan/dataedit/"+nourut,
			type : 'POST',
			dataType:'json',
			success: function(data){
				if (data.hasil=='error') {

					success();					
					notify(data.title, data.message, data.icon, data.type);

				} else {

					$('input').val('');
					$('#modal').modal('show');
					$('#judul').html('Edit');

					$('#no_urut_L').val(data.no_urut);
					$('#no_urut').val(data.no_urut);
					$('#no_surat').val(data.no_surat);
					$('#waktu_undangan').val(data.waktu_undangan);
					$('#tempat_undangan').val(data.tempat_undangan);
					$('#tgl_terima').val(data.tgl_terima);
				}
			}
		});
	}

	function simpan()
	{
		$(".simpan").html("Processing...");
		$('.simpan').attr('disabled','disabled');

		var form_data = new FormData(); 
		form_data.append("no_urut_L", $('#no_urut_L').val());
		form_data.append("no_urut", $('#no_urut').val());
		form_data.append("no_surat", $('#no_surat').val());
		form_data.append("waktu_undangan", $('#waktu_undangan').val());
		form_data.append("tempat_undangan", $('#tempat_undangan').val());
		form_data.append("tgl_terima", $('#tgl_terima').val());
		$.ajax({
			url : "<?php echo base_url()?>admin/undangan/datainput",
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

				} else {
					success();
					notify(data.title, data.message, data.icon, data.type);

					table.ajax.reload( null, false );
				}
				$('.simpan').html('Simpan');
				$('.simpan').removeAttr('disabled');
			}
		});
	}	

	function success()
	{
		$('#modal').modal('hide');
		$('#judul').html('Tambah');
		$('small#er').html('');
		$('input').val('');
		$('select').val('');
	}

	function notify(title, message, icon, type)
	{
		$.notify({
			title: title,
			message: message,
		}, {
			allow_dismiss: false,
			placement: {
				from: 'bottom',
				align: 'right'
			},
			newest_on_top: true,
			delay: 3000,
			mouse_over: 'pause',
			animate: {
				enter: 'animated fadeInRight',
				exit: 'animated fadeOutRight'
			},
			icon_type: 'class',
			template: '<div class="alert dark alert-dismissible alert-'+type+'">'+
			'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>'+
			'<h4><i class="'+icon+'"></i>&nbsp;{1}</h4>'+
			'<div>{2}</div>'+
			'</div>'

			// {0} = type
			// {1} = title
			// {2} = message
			// {3} = url
			// {4} = target
		});
	}

	function dataTable()
	{
		table = $('#tabel').DataTable({
			"ajax": {
				"url": '<?php echo base_url()?>admin/undangan/view_data',
				"type": "POST",
			},
			serverside:true,
			responsive: true,
			oLanguage: {
				sProcessing: "<div style='margin-top: -10px'>Processing...</div>",
				sSearch: "Pencarian : ",
				sSearchPlaceholder: "",
				sInfo: "Menampilkan _START_ hingga _END_ dari _TOTAL_ data",
				sInfoEmpty: "Menampilkan 0 hingga 0 dari 0 data",
				sEmptyTable: "Tidak ada data",
				sLengthMenu: "Menampilkan _MENU_ data",
				sInfoFiltered: "(total _TOTAL_ data)",
				sZeroRecords: "Tidak ada data yang cocok",
				"oPaginate": {
					"sPrevious": "Previous", // This is the link to the previous page
					"sNext": "Next", // This is the link to the next page
				},
				searchPlaceholder: "Search..."
			},
			"columnDefs": [ {
				"targets": [ 0, 2, 3 ],
				"orderable": false,
				"searchable": false
			} ]
		});
	}

	$(document).ready(function(){

		var table;

		//Active Menu
		$('#surat').addClass('active open');
		$('#undangan').addClass('active hover');

		dataTable();


		$("#tgl_terima, #waktu_undangan").keypress(function(event) {
			event.preventDefault();
		});

		$('#waktu_undangan').datetimepicker({
			format: "DD/MM/YYYY HH:mm",
		});

		$('#tgl_terima').datetimepicker({			
			format: "DD/MM/YYYY",
		});

		$('.tambah').on('click', function(){

			$('#judul').html('Tambah');
			$('small#er').html('');
			$('input').val('');
			$('select').val('');
		})
	});
</script>
<!-- END SCRIPT -->


</div>
</div>
</div>
	<!-- End Page -->