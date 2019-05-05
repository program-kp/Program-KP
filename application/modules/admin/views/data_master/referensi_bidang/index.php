
<!-- Page -->
<div class="page">
	<div class="page-header">
		<h1 class="page-title">Referensi Bidang</h1>
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="<?php echo base_url()?>admin/dashboard">Home</a></li>
			<li class="breadcrumb-item"><a href="javascript:void(0)">Data Master</a></li>
			<li class="breadcrumb-item active">Referensi Bidang</li>
		</ol>
	</div>
	<div class="page-content container-fluid">
		<div class="panel">


			<!-- CHANGE -->
			<div class="panel-heading">
				<h3 class="panel-title">Referensi Bidang
					<small>Berisi Data Bidang yang ada di DKP3 Kota Banjarbaru</small>
				</h3>
			</div>
			
			<div class="panel-body">
				<button type="button" class="btn btn-primary btn-sm tambah" data-toggle="modal" data-target="#modal">Tambah Referensi Bidang</button><hr>
				<!-- <button id="notify">Tes</button> -->
				<table id="tabel" class="table table-hover dataTable table-striped table-bordered table-hover w-full">
					<thead>
						<tr>
							<th width="50px" style="text-align:center;">#</th>
							<th>Nama Bidang</th>
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
				<h4 class="modal-title"><span id=judul>Tambah</span> Referensi Bidang</h4>
			</div>
			<div class="modal-body">
				<input type="hidden" id="id_bidang">
				<div class="form-group row">
					<label class="col-sm-4 form-label">Nama Bidang<span required="">*</span></label>
					<div class="col-sm-8">
						<?php echo form_input('nama_bidang', '', ["class" => "form-control", 'id' => 'nama_bidang']); ?>
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
				<h4 class="modal-title"><span id=judul>Hapus</span> Referensi Bidang</h4>
			</div>
			<div class="modal-body">
				<input type="hidden" id="id">
				<table id="tabel_hapus" class="table table-hover dataTable table-striped table-bordered table-hover w-full">
					<thead>
						<tr>
							<th>Nama Bidang</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td id="nama"></td>
						</tr>
					</tbody>
				</table>
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
		$('#nama').html($('#confirm'+no).data().nama);
		$('#modal_hapus').modal('show');
	}

	function hapus()
	{
		var id_bidang = $('#id').val();
		
		$.ajax({
			url : "<?php echo base_url()?>admin/referensi_bidang/datahapus/"+id_bidang,
			type : 'POST',
			dataType:'json',
			success: function(data) {
				console.log(data);
				if (data.hasil == "berhasil") {
					$('#tabel').DataTable().destroy();
					dataTable();
				}
				success();
				notify(data.title, data.message, data.icon, data.type);
			}
		});
	}

	function edit(no)
	{
		var id_bidang = $('#edit'+no).data().value;
		$.ajax({
			url : "<?php echo base_url()?>admin/referensi_bidang/dataedit/"+id_bidang,
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
					$('#id_bidang').val(data.id_bidang);
					$('#nama_bidang').val(data.nama_bidang);
				}
			}
		});
	}

	function simpan()
	{
		$(".simpan").html("Processing...");
		$('.simpan').attr('disabled','disabled');

		var form_data = new FormData(); 
		form_data.append("id_bidang", $('#id_bidang').val());
		form_data.append("nama_bidang", $('#nama_bidang').val());
		$.ajax({
			url : "<?php echo base_url()?>admin/referensi_bidang/datainput",
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

					$('#tabel').DataTable().destroy();
					dataTable();
				}
				$('.simpan').html('Simpan');
				$('.simpan').removeAttr('disabled');
			}
		});
	}	

	function success()
	{		
		$('#er').html("");
		$('input').val('');
		$('#modal').modal('hide');
		$('#type_alert').attr('class', 'alert alert-dismissible mt-3 hide');
		$('#icon').attr('class', '');
		$('#text').html('');
		$('#type_alert').removeClass('hide');
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
		$('#tabel').dataTable({
			"ajax": {
				"url": '<?php echo base_url()?>admin/referensi_bidang/view_data',
				"type": "POST",
			},
			// "order": [ [1, "asc"] ],
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
				"targets": [ 0, 2 ],
				"orderable": false,
				"searchable": false
			} ]
		});
	}

	$(document).ready(function(){

		//Active Menu
		$('#data_master').addClass('active open');
		$('#referensi_bidang').addClass('active hover');

		dataTable();		

		$('.tambah').on('click', function(){
			$('#judul').html('Tambah');
			$('er').html('');
			$('small').html('');
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