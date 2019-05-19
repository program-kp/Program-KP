
<!-- Page -->
<div class="page">
	<div class="page-header">
		<h1 class="page-title">Surat Keluar</h1>
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="<?php echo base_url()?>bidang/dashboard">Home</a></li>
			<li class="breadcrumb-item active">Surat Keluar</li>
		</ol>
	</div>
	<div class="page-content container-fluid">
		<div class="panel">


			<!-- CHANGE -->
			<div class="panel-heading">
				<h3 class="panel-title">Surat Keluar
					<small>Berisi Data Surat Keluar yang ada di DKP3 Kota Banjarbaru</small>
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
				<table id="tabel-keluar" class="table table-hover dataTable table-striped table-bordered table-hover w-full">
					<thead>
						<tr>
							<th width="50px" style="text-align:center;">#</th>
							<th>Nomor Surat</th>
							<th>Tanggal Surat</th>
							<th>Tujuan Surat</th>
							<th width="160px" style="text-align:center;">Aksi</th>
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
		<form action="#" id="form">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
				<h4 class="modal-title"><span id=judul>Info</span> Surat Keluar</h4>
			</div>
			<div class="modal-body">
				<input type="hidden" id="id">
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
							<td align="right">Tgl Surat</td>
							<td align="center">:</td>
							<td id="info_tglsurat"></td>
						</tr>
						<tr>
							<td align="right">Perihal</td>
							<td align="center">:</td>
							<td id="info_perihal"></td>
						</tr>
						<tr>
							<td align="right">Tujuan Surat</td>
							<td align="center">:</td>
							<td id="info_tujuan"></td>
						</tr>
						<tr>
							<td align="right">Keterangan</td>
							<td align="center">:</td>
							<td id="info_ket"></td>
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
		$('#nourut').html($('#confirm'+no).data().nourut);
		$('#unit').html($('#confirm'+no).data().unit);
		$('#nosurat').html($('#confirm'+no).data().nosurat);
		$('#modal_hapus').modal('show');
	}


	function info(no)
	{
		success();
		var no_urut = $('#info'+no).data().value;
		$.ajax({
			url : "<?php echo base_url()?>bidang/surat_keluar/dataedit/"+no_urut,
			type : 'POST',
			dataType:'json',
			success: function(data){
				if (data.hasil=='error') {

					success();					
					notify(data.title, data.message, data.icon, data.type);

				} else {

					$('#modal_info').modal('show');

					tgl_surat = moment(new Date(data.tgl_surat)).format('DD-MM-YYYY');
					tgl_terima = moment(new Date(data.tgl_terima)).format('DD-MM-YYYY');

					$('#info_nourut').html(data.no_urut);
					$('#info_nosurat').html(data.no_surat);
					$('#info_unit').html(data.unit_pengolah);
					$('#info_tglsurat').html(tgl_surat);
					$('#info_tglterima').html(tgl_terima);
					$('#info_perihal').html(data.perihal);
					$('#info_tujuan').html(data.tujuan_surat);
					$('#info_ket').html(data.keterangan);
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
		table = $('#tabel-keluar').DataTable({
			"ajax": {
				"url": '<?php echo base_url()?>bidang/surat_keluar/view_data/'+$date,
				"type": "POST",
			},
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
		$('#surat_keluar').addClass('active hover');

		$("#tgl_surat, #tgl_filter").keypress(function(event) {
			event.preventDefault();
		});

		$('#tgl_surat').datetimepicker({		
			format: "DD-MM-YYYY",
		});

		$('#tgl_terima, #tgl_filter').datetimepicker({		
			format: "DD-MM-YYYY",
			date: new Date()
		});	

		dataTable($('#tgl_filter').val());	

		$('#filter').click(function(){
			$('#tabel-keluar').dataTable().fnDestroy();
			dataTable($('#tgl_filter').val());
		});	

	});
</script>
<!-- END SCRIPT -->
