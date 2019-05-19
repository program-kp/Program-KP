
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
					<small>Berisi Data Surat Masuk yang ada di DKP3 Kota Banjarbaru</small>
				</h3>
			</div>
			
			<div class="panel-body">
				<div class="row">
					<div class="col-md-6"></div>
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
							<th>Nomor Surat</th>
							<th>Asal Surat</th>
							<th>Tanggal Terima</th>
							<th width="200px" style="text-align:center;">Aksi</th>
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


<!-- Modal Info -->
<div class="modal fade modal-fade-in-scale-up" id="modal_info" aria-hidden="true" aria-labelledby="exampleMultipleOne"
role="dialog" tabindex="-1">
<div class="modal-dialog modal-simple modal-center">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">×</span>
			</button>
			<h4 class="modal-title"><span id=judul>Info</span> Surat Masuk</h4>
		</div>
		<div class="modal-body">
			<input type="hidden" id="info">
			<table id="tabel_hapus" class="table table-hover dataTable table-striped table-bordered table-hover w-full">
				<tbody>
					<tr>
						<td align="right" style="width: 118px">Nomor Urut</td>
						<td align="center" style="width: 5px">:</td>
						<td id="info_nourut"></td>
					</tr>
					<tr>
						<td align="right">Nomor Surat</td>
						<td align="center">:</td>
						<td id="info_nosurat"></td>
					</tr>
					<tr>
						<td align="right">Asal Surat</td>
						<td align="center">:</td>
						<td id="info_asalsurat"></td>
					</tr>
					<tr>
						<td align="right">Perihal</td>
						<td align="center">:</td>
						<td id="info_perihal"></td>
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
		</div>
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
		$('td#nosurat').html($('#confirm'+no).data().nosurat);
		$('td#asal').html($('#confirm'+no).data().asal);
		$('td#tglsurat').html($('#confirm'+no).data().tgl_surat);
		$('td#tglterima').html($('#confirm'+no).data().tgl_terima);
		$('td#perihal').html($('#confirm'+no).data().perihal);
		$('#modal_hapus').modal('show');
	}

	function info(no)
	{
		success();
		var username = $('#info'+no).data().value;
		$.ajax({
			url : "<?php echo base_url()?>bidang/surat_masuk/dataedit/"+username,
			type : 'POST',
			dataType:'json',
			success: function(data){
				if (data.hasil=='error') {

					success();					
					notify(data.title, data.message, data.icon, data.type);

				} else {

					$('#modal_info').modal('show');

					tgl_terima = moment(new Date(data.tgl_terima)).format('DD-MM-YYYY');
					tgl_surat = moment(new Date(data.tgl_surat)).format('DD-MM-YYYY');

					$('#info').val(data.no_urut);
					$('#info_nourut').html(data.no_urut);
					$('#info_nosurat').html(data.no_surat);
					$('#info_asalsurat').html(data.asal_surat);
					$('#info_perihal').html(data.perihal);
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
			url : "<?php echo base_url()?>admin/surat_masuk/dataedit/"+nourut,
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

					tgl_terima = moment(new Date(data.tgl_terima)).format('DD-MM-YYYY');
					tgl_surat = moment(new Date(data.tgl_surat)).format('DD-MM-YYYY');

					$('#no_urut_L').val(data.no_urut);
					$('#no_urut').val(data.no_urut);
					$('#no_surat').val(data.no_surat);
					$('#asal_surat').val(data.asal_surat);
					$('textarea#perihal').val(data.perihal);
					$('#tgl_terima').val(tgl_terima);
					$('#tgl_surat').val(tgl_surat);
				}
			}
		});
	}
	

	function success()
	{
		$('#modal').modal('hide');
		$('#judul').html('Info');
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
				"url": '<?php echo base_url()?>bidang/surat_masuk/view_data/'+$date,
				"type": "POST",
			},
			"processing": true,
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
				"targets": [ 0, 2, 3, 4 ],
				"orderable": false,
				"searchable": false
			} ]
		});
	}

	$(document).ready(function(){

		var table;
		var nourut;
		var panel_manipulation = $('#panel').html();

		//Active Menu
		$('#surat').addClass('active open');
		$('#surat_masuk').addClass('active hover');

		$("#tgl_terima, #tgl_disposisi, #tgl_surat, #tgl_filter").keypress(function(event) {
			event.preventDefault();
		});

		$('#tgl_surat').datetimepicker({		
			format: "DD-MM-YYYY",
		});

		$('#tgl_terima, #tgl_disposisi, #tgl_surat, #tgl_filter').datetimepicker({		
			format: "DD-MM-YYYY",
			date: new Date()
		});

		dataTable($('#tgl_filter').val());

		$('#filter').click(function(){
			$('#tabel').dataTable().fnDestroy();
			dataTable($('#tgl_filter').val());
		});
	});
</script>
<!-- END SCRIPT -->


</div>
</div>
</div>
	<!-- End Page -->