
<!-- Page -->
<div class="page">
	<div class="page-header">
		<h1 class="page-title">Undangan</h1>
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="<?php echo base_url()?>bidang/dashboard">Home</a></li>
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

	$('#surat_undangan').addClass('active hover');

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
				"url": '<?php echo base_url()?>bidang/undangan/view_data',
				"type": "POST",
			},
			serverside: true,
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