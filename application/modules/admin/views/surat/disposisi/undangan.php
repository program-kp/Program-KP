
<!-- Page -->
<div class="page">
	<div class="page-header">
		<h1 class="page-title">Disposisi Undangan Masuk</h1>
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="<?php echo base_url()?>admin/dashboard">Home</a></li>
			<li class="breadcrumb-item"><a href="javascript:void(0)">Surat</a></li>
			<li class="breadcrumb-item active">Disposisi Undangan Masuk</li>
		</ol>
	</div>
	<div class="page-content container-fluid">
		<div class="panel">
			<!-- CHANGE -->
			<div class="panel-heading">
				<h3 class="panel-title">Disposisi Undangan Masuk
					<small>Berisi Data Disposisi Undangan Masuk yang ada di DKP3 Kota Banjarbaru</small>
				</h3>
			</div>
			
			<div class="panel-body">
				<div class="form-group row">
					<label class="col-sm-2 form-label">Filter Data</label>
					<div class="col-sm-4">
						<?php echo form_dropdown('bidang_filter',$ar_bidang,'',['class'=>'form-control', 'id' => 'bidang_filter']);?>
					</div>
				</div>
				<hr>
				<!-- <button id="notify">Tes</button> -->
				<table id="tabel" class="table table-hover dataTable table-striped table-bordered table-hover w-full">
					<thead>
						<tr>
							<th width="50px" style="text-align:center;">#</th>
							<th>Nomor Surat</th>
							<th>Tanggal Disposisi</th>
							<th>Bidang</th>
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
<div class="modal-dialog modal-simple modal-center">
	<div class="modal-content">
		<form action="#" id="form">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
				<h4 class="modal-title"><span id=judul>Tambah</span> Disposisi Undangan Masuk</h4>
			</div>
			<div class="modal-body">
				<input type="hidden" id="kode_disposisi">
				<input type="hidden" id="no_urut">
				<input type="hidden" id="no_surat_E">
				<div class="form-group row">
					<label class="col-sm-4 form-label">Nomor Surat<span required="">*</span></label>
					<div class="col-sm-8 data_input">
						<?php echo form_input('no_surat', '', ["class" => "form-control", 'id' => 'no_surat', 'disabled' => 'disabled']); ?>
						<small id=er>Validasi View</small>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-4 form-label">Tanggal Disposisi<span required="">*</span></label>
					<div class="col-sm-8 data_input">
						<?php echo form_input('tgl_disposisi', '', ["class" => "form-control", 'id' => 'tgl_disposisi']); ?>
						<small id=er>Validasi View</small>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-4 form-label">Tujuan Surat<span required="">*</span></label>
					<div class="col-sm-8 data_input">
						<?php echo form_dropdown('tujuan_surat', $ar_bidang, '', ["class" => "form-control input_data", 'id' => 'tujuan_surat']); ?>
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
				<h4 class="modal-title"><span id=judul>Hapus</span> Disposisi Surat Keluar</h4>
			</div>
			<div class="modal-body">
				<input type="hidden" id="id">
				<table id="tabel_hapus" class="table table-hover dataTable table-striped table-bordered table-hover w-full">
					<thead>
						<tr>
							<th style="width:150px">Nomor Surat</th>
							<th style="width:150px">Tanggal Disposisi</th>
							<th style="width:100px">Tujuan Surat</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td id="hapus_nosurat"></td>
							<td id="hapus_tgl"></td>
							<td id="hapus_tujuan"></td>
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

<!-- Modal Info -->
<div class="modal fade modal-fade-in-scale-up" id="modal_info" aria-hidden="true" aria-labelledby="exampleMultipleOne"
role="dialog" tabindex="-1">
<div class="modal-dialog modal-simple modal-center">
	<div class="modal-content">
		<form action="#" id="form">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
				<h4 class="modal-title"><span id=judul>Info</span> Undangan Masuk</h4>
			</div>
			<div class="modal-body">
				<input type="hidden" id="info">
				<table id="tabel_hapus" class="table table-hover dataTable table-striped table-bordered table-hover w-full">
					<tbody>
						<tr>
							<td align="right" style="width: 118px">No Urut</td>
							<td align="center" style="width: 5px">:</td>
							<td id="info_nourut"></td>
						</tr>
						<tr>
							<td align="right">No Surat</td>
							<td align="center">:</td>
							<td id="info_nosurat"></td>
						</tr>
						<tr>
							<td align="right">Tempat Undangan</td>
							<td align="center">:</td>
							<td id="info_tempatundangan"></td>
						</tr>
						<tr>
							<td align="right">Waktu Undangan</td>
							<td align="center">:</td>
							<td id="info_waktuundangan"></td>
						</tr>
						<tr>
							<td align="right">Tanggal Terima</td>
							<td align="center">:</td>
							<td id="info_tglterima"></td>
						</tr>
					</tbody>
				</table>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-sm btn-secondary batal" data-dismiss="modal">Tutup</button>
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
		$('#hapus_tgl').html($('#confirm'+no).data().tgl);
		$('#hapus_tujuan').html($('#confirm'+no).data().tujuan);
		$('#modal_hapus').modal('show');
	}

	function hapus()
	{
		var nourut = $('#id').val();
		
		$.ajax({
			url : "<?php echo base_url()?>admin/disposisi/datahapus/"+nourut,
			type : 'POST',
			dataType:'json',
			success: function(data) {
				// console.log(data);
				if (data.hasil == "berhasil") {
					success();
					notify(data.title, data.message, data.icon, data.type);
					table.ajax.reload( null, false );
				} else {
					success();
					notify(data.title, data.message, data.icon, data.type);
				}
			}
		});
	}

	function info(no)
	{
		success();
		var nourut = $('#info'+no).data().value;
		$.ajax({
			url : "<?php echo base_url()?>admin/undangan/dataedit/"+nourut,
			type : 'POST',
			dataType:'json',
			success: function(data){
				if (data.hasil=='error') {

					success();					
					notify(data.title, data.message, data.icon, data.type);

				} else {
					$('#modal_info').modal('show');

					waktu_undangan = "Jam <b>"+moment(new Date(data.waktu_undangan)).format('HH:mm')+"</b>, Tanggal <b>"+moment(new Date(data.waktu_undangan)).format('DD-MM-YYYY')+"</b>";
					tgl_terima = moment(new Date(data.tgl_terima)).format('DD-MM-YYYY');

					$('#info').val(data.no_urut);
					$('#info_nourut').html(data.no_urut);
					$('#info_nosurat').html(data.no_surat);
					$('#info_waktuundangan').html(waktu_undangan);
					$('#info_tempatundangan').html(data.tempat_undangan);
					$('#info_tglterima').html(tgl_terima);
				}
			}
		});
	}

	function edit(no)
	{
		success();
		var kode_disposisi = $('#edit'+no).data().value;
		$.ajax({
			url : "<?php echo base_url()?>admin/disposisi/dataedit/"+kode_disposisi,
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

					tgl_disposisi = moment(new Date(data.tgl_disposisi)).format('DD-MM-YYYY');

					$('#kode_disposisi').val(data.kode_disposisi);
					$('#no_surat').val(data.no_surat);
					$('#no_surat_E').val(data.no_surat);
					$('#no_urut').val(data.no_urut_undangan);
					$('#tgl_disposisi').val(tgl_disposisi);
					$('#tujuan_surat').val(data.tujuan_surat);
				}
			}
		});
	}

	function simpan()
	{
		$(".simpan").html("Processing...");
		$('.simpan').attr('disabled','disabled');

		var form_data = new FormData(); 
		form_data.append("kode_disposisi", $('#kode_disposisi').val());
		form_data.append("tgl_disposisi", $('#tgl_disposisi').val());
		form_data.append("tujuan_surat", $('#tujuan_surat').val());
		form_data.append("no_surat_E", $('#no_surat_E').val());
		form_data.append("no_urut", $('#no_urut').val());
		$.ajax({
			url : "<?php echo base_url()?>admin/disposisi/edit",
			type : 'POST',
			processData: false,
			contentType: false,
			dataType:'json',
			data : form_data,
			success: function(data){
				console.log(data);
				if (data.status=="validasi") {
					$.each(data, function(key, value) {
						$('#' + key).parents('.data_input').find('#er').addClass('text-danger').html(value);
					});

				} else {
					var tujuan = $('#tujuan_surat').val();
					success();
					notify(data.title, data.message, data.icon, data.type);

					if (tujuan==$('#bidang_filter').val())
						table.ajax.reload( null, false );
					else {
						$('#tabel').dataTable().fnDestroy();
						dataTable($('#tujuan_surat').val());

						$('#bidang_filter').val(tujuan);
					}
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
		$('select#tujuan_surat').val('');
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

	function dataTable($bidang = null)
	{
		table = $('#tabel').DataTable({
			"ajax": {
				"url": '<?php echo base_url()?>admin/disposisi/view_data_undangan/'+$bidang,
				"type": "POST",
			},
			responsive: true,
			oLanguage: {
				sProcessing: "<div style='margin-top: -10px'>Processing...</div>",
				sSearch: "Pencarian : ",
				sSearchPlaceholder: "Nama Bidang",
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
		$('#disposisi').addClass('active open');
		$('#dis_undangan').addClass('active hover');

		dataTable('');

		$("#tgl_disposisi").keypress(function(event) {
			event.preventDefault();
		});

		$('#tgl_disposisi').datetimepicker({		
			format: "DD-MM-YYYY",
		});	

		$('.tambah').on('click', function(){

			$('#judul').html('Tambah');
			$('er').html('');
			$('small').html('');
			$('input').val('');
			$('select').val('');
			$('textarea').val('');
		});

		$('#bidang_filter').on('change', function(){
			$('#tabel').dataTable().fnDestroy();
			dataTable($('#bidang_filter').val());
		});
	});
</script>
<!-- END SCRIPT -->


</div>
</div>
</div>
	<!-- End Page -->