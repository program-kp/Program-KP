
<!-- Page -->
<div class="page">
	<div class="page-content container-fluid">




		<!-- CHANGE -->
		<div class="row" data-plugin="matchHeight" data-by-row="true">

			<div class="col-xl-3 col-md-6">
				<!-- Widget Linearea One-->
				<div class="card card-shadow" id="widgetLineareaOne">
					<div class="card-block p-20 pt-10">
						<div class="clearfix">
							<div class="grey-800 float-left py-10">
								<i class="icon fa fa-envelope-o grey-600 font-size-24 vertical-align-bottom mr-5"></i>
								Surat Masuk
							</div>
							<span class="float-right grey-700 font-size-30"><?php echo $suratmasuk_now; ?></span>
						</div>
						<div class="mb-20 grey-500">
							<i class="icon <?php echo $suratmasuk_icon ?> font-size-16"></i>&nbsp;<?php echo $suratmasuk_selisih ?> surat dari hari sebelumnya
						</div>
					</div>
				</div>
				<!-- End Widget Linearea One -->
			</div>

			<div class="col-xl-3 col-md-6">
				<!-- Widget Linearea One-->
				<div class="card card-shadow" id="widgetLineareaOne">
					<div class="card-block p-20 pt-10">
						<div class="clearfix">
							<div class="grey-800 float-left py-10">
								<i class="icon fa fa-envelope-o grey-600 font-size-24 vertical-align-bottom mr-5"></i>
								Surat Keluar
							</div>
							<span class="float-right grey-700 font-size-30"><?php echo $suratkeluar_now; ?></span>
						</div>
						<div class="mb-20 grey-500">
							<i class="icon <?php echo $suratkeluar_icon ?> font-size-16"></i>&nbsp;<?php echo $suratkeluar_selisih ?> surat dari hari sebelumnya
						</div>
					</div>
				</div>
				<!-- End Widget Linearea One -->
			</div>

			<div class="col-xl-3 col-md-6">
				<!-- Widget Linearea One-->
				<div class="card card-shadow" id="widgetLineareaOne">
					<div class="card-block p-20 pt-10">
						<div class="clearfix">
							<div class="grey-800 float-left py-10">
								<i class="icon fa fa-envelope-o grey-600 font-size-24 vertical-align-bottom mr-5"></i>
								Undangan
							</div>
							<span class="float-right grey-700 font-size-30"><?php echo $undangan_now; ?></span>
						</div>
						<div class="mb-20 grey-500">
							<i class="icon <?php echo $undangan_icon ?> font-size-16"></i>&nbsp;<?php echo $undangan_selisih ?> surat dari hari sebelumnya
						</div>
					</div>
				</div>
				<!-- End Widget Linearea One -->
			</div>

			<div class="col-xl-3 col-md-6">
				<!-- Widget Linearea One-->
				<div class="card card-shadow" id="widgetLineareaOne">
					<div class="card-block p-20 pt-10">
						<div class="clearfix">
							<div class="grey-800 float-left py-10">
								<i class="icon fa fa-mail-forward grey-600 font-size-24 vertical-align-bottom mr-5"></i>
								Disposisi
							</div>
							<span class="float-right grey-700 font-size-30"><?php echo $disposisi_now; ?></span>
						</div>
						<div class="mb-20 grey-500">
							<i class="icon <?php echo $disposisi_icon ?> font-size-16"></i>&nbsp;<?php echo $disposisi_selisih ?> surat dari hari sebelumnya
						</div>
					</div>
				</div>
				<!-- End Widget Linearea One -->
			</div>
			<div class="col-md-12">
				<div class="panel">
					<div class="panel-heading">
						<h3 class="panel-title">Jadwal Undangan
						</h3>
					</div>
					<div class="panel-body">
						<!-- <button id="notify">Tes</button> -->
						<table id="tabel_jadwal" class="table table-hover table-striped table-bordered table-hover w-full">
							<thead>
								<tr>
									<th width="50px" style="text-align:center;">#</th>
									<th>Waktu Undangan</th>
									<th>Tempat</th>
									<th>Uraian</th>
									<th>Keterangan</th>
								</tr>
							</thead>
							<tbody>

							</tbody>
						</table>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="panel">
					<div class="panel-heading">
						<h3 class="panel-title">Disposisi Surat Masuk
						</h3>
					</div>
					<div class="panel-body">
						<!-- <button id="notify">Tes</button> -->
						<table id="tabel_surat" class="table table-hover table-striped table-bordered table-hover w-full">
							<thead>
								<tr>
									<th width="50px" style="text-align:center;">#</th>
									<th>Nomor Surat</th>
									<th>Asal Surat</th>
									<th>Disposisi</th>
								</tr>
							</thead>
							<tbody>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="panel">
					<div class="panel-heading">
						<h3 class="panel-title">Disposisi Undangan Masuk
						</h3>
					</div>
					<div class="panel-body">
						<!-- <button id="notify">Tes</button> -->
						<table id="tabel_undangan" class="table table-hover table-striped table-bordered table-hover w-full">
							<thead>
								<tr>
									<th width="50px" style="text-align:center;">#</th>
									<th>Nomor Surat</th>
									<th>Tempat Undangan</th>
									<th>Disposisi</th>
								</tr>
							</thead>
							<tbody>

							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>

		<!-- Modal Info Surat -->
		<div class="modal fade modal-fade-in-scale-up" id="modal_info_surat" aria-hidden="true" aria-labelledby="exampleMultipleOne"
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
								<td id="info_nourut_s"></td>
							</tr>
							<tr>
								<td align="right">Nomor Surat</td>
								<td align="center">:</td>
								<td id="info_nosurat_s"></td>
							</tr>
							<tr>
								<td align="right">Asal Surat</td>
								<td align="center">:</td>
								<td id="info_asalsurat_s"></td>
							</tr>
							<tr>
								<td align="right">Perihal</td>
								<td align="center">:</td>
								<td id="info_perihal_s"></td>
							</tr>
							<tr>
								<td align="right">Tanggal Terima</td>
								<td align="center">:</td>
								<td id="info_tglterima_s"></td>
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

	<!-- Modal Info Undangan -->
	<div class="modal fade modal-fade-in-scale-up" id="modal_info_undangan" aria-hidden="true" aria-labelledby="exampleMultipleOne"
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
							<td id="info_nourut_u"></td>
						</tr>
						<tr>
							<td align="right">No Surat</td>
							<td align="center">:</td>
							<td id="info_nosurat_u"></td>
						</tr>
						<tr>
							<td align="right">Tempat Undangan</td>
							<td align="center">:</td>
							<td id="info_tempatundangan_u"></td>
						</tr>
						<tr>
							<td align="right">Waktu Undangan</td>
							<td align="center">:</td>
							<td id="info_waktuundangan_u"></td>
						</tr>
						<tr>
							<td align="right">Tanggal Terima</td>
							<td align="center">:</td>
							<td id="info_tglterima_u"></td>
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

<!-- Modal Info Dis Undangan -->
<div class="modal fade modal-fade-in-scale-up" id="modal_info_undangan_dis" aria-hidden="true" aria-labelledby="exampleMultipleOne"
role="dialog" tabindex="-1">
<div class="modal-dialog modal-simple modal-center">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">×</span>
			</button>
			<h4 class="modal-title"><span id=judul>Info</span> Disposisi Undangan Masuk</h4>
		</div>
		<div class="modal-body">
			<input type="hidden" id="info">
			<table id="tabel_undangan_dis" class="table table-hover dataTable table-striped table-bordered table-hover w-full">
				<thead>
					<tr>
						<th width="50px" style="text-align:center;">#</th>
						<th>Nomor Surat</th>
						<th>Bidang</th>
						<th>Tanggal Disposisi</th>
					</tr>
				</thead>
				<tbody>

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

<!-- Modal Info Dis Surat -->
<div class="modal fade modal-fade-in-scale-up" id="modal_info_surat_dis" aria-hidden="true" aria-labelledby="exampleMultipleOne"
role="dialog" tabindex="-1">
<div class="modal-dialog modal-simple modal-center">
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">×</span>
			</button>
			<h4 class="modal-title"><span id=judul>Info</span> Disposisi Surat Masuk</h4>
		</div>
		<div class="modal-body">
			<input type="hidden" id="info">
			<table id="tabel_surat_dis" class="table table-hover dataTable table-striped table-bordered table-hover w-full">
				<thead>
					<tr>
						<th width="50px" style="text-align:center;">#</th>
						<th>Nomor Surat</th>
						<th>Bidang</th>
						<th>Tanggal Disposisi</th>
					</tr>
				</thead>
				<tbody>

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

	function dataTableJadwal()
	{
		table_jadwal = $('#tabel_jadwal').DataTable({
			"ajax": {
				"url": '<?php echo base_url()?>admin/dashboard/view_jadwal/',
				"type": "POST",
				"cache": true,
			},
			"dom": 'tip',
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
					"sPrevious": "Previous",
					"sNext": "Next",
				},
				searchPlaceholder: "Search..."
			},
			"searchable": false
		});
	}

	function info_surat_dis(no)
	{		
		var nourut_surat = $('#info_surat_dis'+no).data().value;
		$('#tabel_surat_dis').dataTable().fnDestroy();
		dataTableSuratDis(nourut_surat);
		$('#modal_info_surat_dis').modal('show');
	}

	function dataTableSuratDis($nourut)
	{
		table_surat_dis = $('#tabel_surat_dis').DataTable({
			"ajax": {
				"url": '<?php echo base_url()?>admin/dashboard/view_surat_dis/'+$nourut,
				"type": "POST",
				"cache": true,
			},
			"dom": 'ltip',
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
					"sPrevious": "Previous",
					"sNext": "Next",
				},
				searchPlaceholder: "Search..."
			},
			"columnDefs": [ {
				"targets": [ 0, 2, 3],
				"orderable": false,
				"searchable": false
			} ],
			"searchable": false
		});
	}

	function info_undangan_dis(no)
	{		
		var nourut_undangan = $('#info_undangan_dis'+no).data().value;
		$('#tabel_undangan_dis').dataTable().fnDestroy();
		dataTableUndanganDis(nourut_undangan);
		$('#modal_info_undangan_dis').modal('show');
	}

	function dataTableUndanganDis($nourut)
	{
		table_undangan_dis = $('#tabel_undangan_dis').DataTable({
			"ajax": {
				"url": '<?php echo base_url()?>admin/dashboard/view_undangan_dis/'+$nourut,
				"type": "POST",
				"cache": true,
			},
			"dom": 'ltip',
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
					"sPrevious": "Previous",
					"sNext": "Next",
				},
				searchPlaceholder: "Search..."
			},
			"columnDefs": [ {
				"targets": [ 0, 2, 3],
				"orderable": false,
				"searchable": false
			} ],
			"searchable": false
		});
	}

	function dataTableSurat()
	{
		table_surat = $('#tabel_surat').DataTable({
			"ajax": {
				"url": '<?php echo base_url()?>admin/dashboard/view_surat',
				"type": "POST",
				"cache": true,
			},
			"dom": 'ltip',
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
					"sPrevious": "Previous",
					"sNext": "Next",
				},
				searchPlaceholder: "Search..."
			},
			"columnDefs": [ {
				"targets": [ 0, 2, 3],
				"orderable": false,
				"searchable": false
			} ],
			"searchable": false
		});
	}

	function dataTableUndangan()
	{
		table_undangan = $('#tabel_undangan').DataTable({
			"ajax": {
				"url": '<?php echo base_url()?>admin/dashboard/view_undangan',
				"type": "POST",
				"cache": true,
			},
			"dom": 'ltip',
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
					"sPrevious": "Previous",
					"sNext": "Next",
				},
				searchPlaceholder: "Search..."
			},
			"columnDefs": [ {
				"targets": [ 0, 2, 3],
				"orderable": false,
				"searchable": false
			} ],
			"searchable": false
		});
	}


	function info_undangan(no)
	{
		var nourut = $('#info_undangan'+no).data().value;
		$.ajax({
			url : "<?php echo base_url()?>admin/undangan/dataedit/"+nourut,
			type : 'POST',
			dataType:'json',
			cache: true,
			success: function(data){
				if (data.hasil=='error') {
					
					notify(data.title, data.message, data.icon, data.type);

				} else {
					$('#modal_info_undangan').modal('show');

					waktu_undangan = "Jam <b>"+moment(new Date(data.waktu_undangan)).format('HH:mm')+"</b>, Tanggal <b>"+moment(new Date(data.waktu_undangan)).format('DD-MM-YYYY')+"</b>";
					tgl_terima = moment(new Date(data.tgl_terima)).format('DD-MM-YYYY');

					$('#info').val(data.no_urut);
					$('#info_nourut_u').html(data.no_urut);
					$('#info_nosurat_u').html(data.no_surat);
					$('#info_waktuundangan_u').html(waktu_undangan);
					$('#info_tempatundangan_u').html(data.tempat_undangan);
					$('#info_tglterima_u').html(tgl_terima);
				}
			}
		});
	}

	function info_surat(no)
	{
		var nourut = $('#info_surat'+no).data().value;
		$.ajax({
			url : "<?php echo base_url()?>admin/surat_masuk/dataedit/"+nourut,
			type : 'POST',
			dataType:'json',
			cache: true,
			success: function(data){
				if (data.hasil=='error') {
					
					notify(data.title, data.message, data.icon, data.type);

				} else {

					$('#modal_info_surat').modal('show');

					tgl_terima = moment(new Date(data.tgl_terima)).format('DD-MM-YYYY');

					$('#info').val(data.no_urut);
					$('#info_nourut_s').html(data.no_urut);
					$('#info_nosurat_s').html(data.no_surat);
					$('#info_asalsurat_s').html(data.asal_surat);
					$('#info_perihal_s').html(data.perihal);
					$('#info_tglterima_s').html(tgl_terima);
				}
			}
		});
	}

	$(document).ready(function(){
		var table_surat;
		var table_undangan;
		var table_surat_dis;
		var table_undangan_dis;
		var table_jadwal;
				//Active Menu
				$('#dashboard').addClass('active hover');

				dataTableSurat();
				dataTableUndangan();
				dataTableUndanganDis('');
				dataTableSuratDis('');
				dataTableJadwal();

			});
		</script>



	</div>
</div>
	<!-- End Page -->