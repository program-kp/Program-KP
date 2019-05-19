
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
				<div class="row">
					<div class="col-md-4">
						<button type="button" class="btn btn-sm btn-primary btn-md tambah" data-toggle="modal" data-target="#modal">Tambah Undangan</button>
					</div>
					<div class="col-md-2"></div>
					<label class="col-md-1 form-label" style="margin-top: 5px">Tanggal</label>
					<div class="col-md-4 col-sm-12">
						<input type="text" class="form-control" id="tgl_filter">
					</div>
					<div class="col-md-1 col-sm-12">
						<button class="btn btn-sm btn-primary" id="filter">Filter</button>
					</div>
				</div>
				<hr>
				<!-- <button id="notify">Tes</button> -->
				<table id="tabel" class="table table-hover dataTable table-striped table-bordered table-hover w-full">
					<thead>
						<tr>
							<th width="50px" style="text-align:center;">#</th>
							<th>No. Surat</th>
							<th>Waktu Undangan</th>
							<th>Tempat Undangan</th>
							<th width="70px" style="text-align:center;">Disposisi</th>
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
<div class="modal-dialog modal-simple modal-center modal-lg">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">×</span>
			</button>
			<h4 class="modal-title"><span id=judul>Tambah</span> Undangan</h4>
		</div>
		<div class="modal-body">
			<input type="hidden" id="no_urut_L">
			<div class="form-group row">
				<label class="col-sm-2 form-label">No. Urut<span required="">*</span></label>
				<div class="col-sm-4 data_input">
					<?php echo form_input('no_urut', '', ["class" => "form-control", 'id' => 'no_urut']); ?>
					<small id=er>Validasi View</small>
				</div>
				<label class="col-sm-2 form-label">Nomor Surat<span required="">*</span></label>
				<div class="col-sm-4 data_input">
					<?php echo form_input('no_surat', '', ["class" => "form-control", 'id' => 'no_surat']); ?>
					<small id=er>Validasi View</small>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 form-label">Asal Surat<span required="">*</span></label>
				<div class="col-sm-4 data_input">
					<?php echo form_input('asal_surat', '', ["class" => "form-control", 'id' => 'asal_surat', 'autocomplate' => 'off']); ?>
					<small id=er>Validasi View</small>
				</div>
				<label class="col-sm-2 form-label">Waktu Undangan<span required="">*</span></label>
				<div class="col-sm-4 data_input">
					<?php echo form_input('waktu_undangan', '', ["class" => "form-control", 'id' => 'waktu_undangan', 'autocomplate' => 'off']); ?>
					<small id=er>Validasi View</small>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 form-label">Tempat Undangan<span required="">*</span></label>
				<div class="col-sm-4 data_input">
					<textarea name="" id="tempat_undangan" rows="3" class="form-control"></textarea>
					<small id=er>Validasi View</small>
				</div>
				<label class="col-sm-2 form-label">Uraian<span required="">*</span></label>
				<div class="col-sm-4 data_input">
					<textarea name="" id="uraian" rows="3" class="form-control"></textarea>
					<small id=er>Validasi View</small>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 form-label">Tanggal Surat<span required="">*</span></label>
				<div class="col-sm-4 data_input">
					<?php echo form_input('tgl_surat', '', ["class" => "form-control", 'id' => 'tgl_surat', 'autocomplate' => 'off']); ?>
					<small id=er>Validasi View</small>
				</div>
				<label class="col-sm-2 form-label">Tanggal Terima<span required="">*</span></label>
				<div class="col-sm-4 data_input">
					<?php echo form_input('tgl_terima', '', ["class" => "form-control", 'id' => 'tgl_terima', 'autocomplate' => 'off']); ?>
					<small id=er>Validasi View</small>
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

<!-- Modal Hapus -->
<div class="modal fade modal-fade-in-scale-up" id="modal_hapus" aria-hidden="true" aria-labelledby="exampleMultipleOne"
role="dialog" tabindex="-1">
<div class="modal-dialog modal-simple modal-center">
	<div class="modal-content">
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
						<th>Asal Surat</th>
						<th>Waktu Undangan</th>
						<th>Tempat Undangan</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td id="hapus_nosurat"></td>
						<td id="hapus_asalsurat"></td>
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
	</div>
</div>
</div>
<!-- End Modal -->

<!-- Modal Info -->
<div class="modal fade modal-fade-in-scale-up" id="modal_info" aria-hidden="true" aria-labelledby="exampleMultipleOne"
role="dialog" tabindex="-1">
<div class="modal-dialog modal-simple modal-center">
	<div class="modal-content">
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
						<td align="right">Asal Surat</td>
						<td align="center">:</td>
						<td id="info_asalsurat"></td>
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
						<td align="right">Uraian</td>
						<td align="center">:</td>
						<td id="info_uraian"></td>
					</tr>
					<tr>
						<td align="right">Tanggal Surat</td>
						<td align="center">:</td>
						<td id="info_tglsurat"></td>
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
			<button type="button" class="btn btn-sm btn-primary modal_disposisi" data-dismiss="modal" data-toggle="modal" data-target="#modal_disposisi">Disposisi</button>
		</div>
	</div>
</div>
</div>
<!-- End Modal -->

<!-- Modal Disposisi -->
<div class="modal fade modal-fade-in-scale-up" id="modal_disposisi" aria-hidden="true" aria-labelledby="exampleMultipleOne"
role="dialog" tabindex="-1">
<div class="modal-dialog modal-simple modal-center">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">×</span>
			</button>
			<h4 class="modal-title"><span id=judul>Disposisi</span> Surat Masuk</h4>
		</div>

		<div class="modal-body">

			<form action="#" id="form_disposisi">
				<div class="form-group row">
					<label class="col-sm-4 form-label">Tanggal Disposisi<span required="">*</span></label>
					<div class="col-sm-4 data_input">
						<input type="hidden" name="nourut_disposisi" id="nourut_disposisi">
						<?php echo form_input('tgl_disposisi', '', ["class" => "form-control", 'id' => 'tgl_disposisi', 'autocomplate' => 'off']); ?>
						<small id=er>Validasi View</small>
					</div>
					<div class="col-sm-4">
						<a style="color: white" class="btn btn-primary btn-sm float-right add_disposisi"><i class="fa fa-plus"></i></a>
					</div>
				</div>
				<div class="panel-group panel-group-continuous m-0 " id="exampleAccrodion1" aria-multiselectable="true" role="tablist">
					<hr>
					<div class="panel" id="panel">
						<div class="panel-heading" id="add_panel">
							<div class="form-group row">
								<label class="col-sm-4 form-label">Tujuan Surat</label>
								<div class="col-sm-8 data_input">
									<?php echo form_dropdown('tujuan[]', $ar_bidang, '', ['class' => 'form-control input_data', 'id' => 'tujuan']); ?>
								</div>
							</div>
							<hr>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-sm btn-secondary batal" data-dismiss="modal">Tutup</button>
				<button type="button" class="btn btn-sm btn-primary" data-dismiss="modal" onclick="cetak_disposisi()">Cetak Disposisi</button>
				<button type="button" class="btn btn-sm btn-primary disposisi" id="disposisi_data" onclick="disposisi()">Simpan Disposisi</button>
			</div>
		</form>
	</div>
</div>
</div>
<!-- End Modal -->

<!-- END CHANGE -->


<!-- SCRIPT -->
<script>

    function cetak_disposisi()
    {
        location.href = '<?php echo base_url() ?>admin/disposisi/getword_undangan/'+$('#nourut_disposisi').val();
    }

	function disposisi()
	{
		$(".disposisi").html("Processing...");
		$('.disposisi').attr('disabled','disabled');

		$.ajax({
			url : "<?php echo base_url()?>admin/disposisi/datainput_undangan",
			type : 'POST',
			dataType:'json',  
			data:$('#form_disposisi').serialize(),  
			success: function(data){
				if (data.status=="validasi") {
					$.each(data, function(key, value) {
						$('#' + key).parents('.data_input').find('#er').addClass('text-danger').html(value);
					});

				} else {

					$('#modal_disposisi').modal('hide');
					$('small#er').html('');
					$('#tujuan').val('');

					table.ajax.reload( null, false );
					notify(data.title, data.message, data.icon, data.type);
				}

				$('.disposisi').html('Simpan');
				$('.disposisi').removeAttr('disabled');
			}
		});
	}

	function confirm(no)
	{
		$('#id').val($('#confirm'+no).data().value);
		$('#hapus_nosurat').html($('#confirm'+no).data().nosurat);
		$('#hapus_asalsurat').html($('#confirm'+no).data().asalsurat);
		$('#hapus_waktu').html($('#confirm'+no).data().waktu);
		$('#hapus_tempat').html($('#confirm'+no).data().tempat);
		$('#hapus_tglsurat').html($('#confirm'+no).data().tglsurat);
		$('#hapus_tglterima').html($('#confirm'+no).data().tglterima);
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
					tgl_surat = moment(new Date(data.tgl_surat)).format('DD-MM-YYYY');

					$('#info').val(data.no_urut);
					$('#info_nourut').html(data.no_urut);
					$('#info_nosurat').html(data.no_surat);
					$('#info_asalsurat').html(data.asal_surat);
					$('#info_waktuundangan').html(waktu_undangan);
					$('#info_tempatundangan').html(data.tempat_undangan);
					$('#info_uraian').html(data.uraian);
					$('#info_tglterima').html(tgl_terima);
					$('#info_tglsurat').html(tgl_surat);
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

					waktu_undangan = moment(new Date(data.waktu_undangan)).format('DD-MM-YYYY HH:mm');
					tgl_terima = moment(new Date(data.tgl_terima)).format('DD-MM-YYYY');
					tgl_surat = moment(new Date(data.tgl_surat)).format('DD-MM-YYYY');

					$('#no_urut_L').val(data.no_urut);
					$('#no_urut').val(data.no_urut);
					$('#no_surat').val(data.no_surat);
					$('#asal_surat').val(data.asal_surat);
					$('#waktu_undangan').val(waktu_undangan);
					$('#tempat_undangan').val(data.tempat_undangan);
					$('#uraian').val(data.uraian);
					$('#tgl_terima').val(tgl_terima);
					$('#tgl_surat').val(tgl_surat);
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
		form_data.append("asal_surat", $('#asal_surat').val());
		form_data.append("waktu_undangan", $('#waktu_undangan').val());
		form_data.append("tempat_undangan", $('#tempat_undangan').val());
		form_data.append("uraian", $('#uraian').val());
		form_data.append("tgl_terima", $('#tgl_terima').val());
		form_data.append("tgl_surat", $('#tgl_surat').val());
		$.ajax({
			url : "<?php echo base_url()?>admin/undangan/datainput",
			type : 'POST',
			processData: false,
			contentType: false,
			dataType:'json',
			data : form_data,
			success: function(data){
				if (data.status=="validasi") {
					$.each(data, function(key, value) {
						$('#' + key).parents('.data_input').find('#er').addClass('text-danger').html(value);
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
		$('input:not(#tgl_filter)').val('');
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

	function dataTable($date = null)
	{
		table = $('#tabel').DataTable({
			"ajax": {
				"url": '<?php echo base_url()?>admin/undangan/view_data/'+$date,
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
		var nourut;
		var panel_manipulation = $('#panel').html();

		$('.modal_disposisi').on('click', function(){
			$('#panel').html(panel_manipulation);
			$('#nourut_disposisi').val($('#info').val());
			$('#tgl_disposisi').attr('autocomplate','off');
		});

		//Active Menu
		$('#surat').addClass('active open');
		$('#undangan').addClass('active hover');

		$("#tgl_terima, #waktu_undangan, #tgl_disposisi, #tgl_surat, #tgl_filter").keypress(function(event) {
			event.preventDefault();
		});

		$('#waktu_undangan').datetimepicker({
			format: "HH:mm DD-MM-YYYY",
		});

		$('#tgl_surat').datetimepicker({			
			format: "DD-MM-YYYY"
		});

		$('#tgl_terima, #tgl_disposisi, #tgl_filter').datetimepicker({			
			format: "DD-MM-YYYY",
			date: new Date()
		});


		$('.tambah').on('click', function(){

			$('#judul').html('Tambah');
			$('small#er').html('');
			$('input:not(#tgl_filter)').val('');
			$('select').val('');
			$('textarea').val('');
		});

		dataTable($('#tgl_filter').val());

		$('#filter').click(function(){
			$('#tabel').dataTable().fnDestroy();
			dataTable($('#tgl_filter').val());
		});

		$('.add_disposisi').click(function(){
			$('#panel').append($('#add_panel').html());
		});
	});
</script>
<!-- END SCRIPT -->


</div>
</div>
</div>
	<!-- End Page -->