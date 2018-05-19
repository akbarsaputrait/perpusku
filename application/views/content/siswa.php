<body>
	<div class="loader loader-default is-active"></div>
	<nav class="navbar navbar-expand-lg">
		<a class="navbar-brand" href="#">
			<nav class="navbar navbar-light">
				<a class="navbar-brand" href="#">
					<img src="<?php echo base_url() ?>assets/imgs/logo1.png" class="d-inline-block align-top" width="65" height="75" alt="">
				</a>
			</nav>
		</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
		aria-expanded="false" aria-label="Toggle navigation">
			<i class="fas fa-bars clr-wht"></i>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item active">
					<a class="nav-link" href="<?php echo base_url() ?>dashboard">Dashboard
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?php echo base_url() ?>siswa">Siswa</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?php echo base_url() ?>statistik">Statistik</a>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="bukuDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
					aria-expanded="false">
						Buku
					</a>
					<div class="dropdown-menu dropdown-menu-right" aria-labelledby="bukuDropdown">
						<a class="dropdown-item" href="<?php echo base_url() ?>buku/daftar">Daftar Buku</a>
						<a class="dropdown-item" href="<?php echo base_url() ?>buku/konfirmasi">Konfirmasi Buku</a>
						<a class="dropdown-item" href="<?php echo base_url() ?>buku/pengembalian">Pengembalian Buku</a>
					</div>
				</li>
			</ul>
			<div class="dp-inline my-2 my-lg-0">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
						aria-expanded="false">
							Admin
						</a>
						<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
							<a class="dropdown-item" href="<?php echo base_url() ?>admin/profile">Profile</a>
							<a class="dropdown-item" href="<?php echo base_url() ?>admin/logout">Logout</a>
						</div>
					</li>
				</ul>

			</div>
		</div>
	</nav>
	<div class="container-fluid">
		<div class="content">
			<div class="row">
				<div class="col-md-12 d-flex justify-content-center">
					<h4>Daftar Siswa</h4>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="row mb-3">
						<div class="col-md-12 d-flex justify-content-center">
							<div class="btn-group" role="group" aria-label="Basic example">
								<button type="button" class="btn btn-grp" data-toggle="modal" data-target="#tambahSiswa">Tambah Siswa</button>
								<button type="button" class="btn btn-grp" data-toggle="modal" data-target="#importSiswa">Import Siswa</button>
							</div>
						</div>
					</div>
					<div class="row mb-3">
						<div class="col-md-4"></div>
						<div class="col-md-4 d-flex justify-content-center">
							<input type="text" class="inpt" id="filter" placeholder="Search...">
						</div>
						<div class="col-md-4 d-flex justify-content-start">
							<button class="btn btn-wrp" id="refresh">
								<i class="fas fa-sync"></i> Refresh</button>
						</div>
					</div>
					<div class="row mb-3">
						<div class="col-md-12">
							<div class="table-responsive bg-white clr-blck p-4">
								<table cellpadding="1" cellspacing="1" id="daftar_siswa" class="display table table-bordered table-hover table-striped" width="100%">
									<thead>
										<tr>
											<th>Nomor Induk</th>
											<th>Nama</th>
											<th>Jenis Kelamin</th>
											<th>Kelas</th>
											<th>Jurusan</th>
											<th></th>
										</tr>
									</thead>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Tambah Satuan Siswa -->
	<div class="modal fade" id="tambahSiswa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-pinjam" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Tambah Siswa</h5>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-log-res register">
						<form id="tambah_siswa" method="post">
							<div class="form-row">
								<div class="col-md-6 form-group icn">
									<i class="fas fa-book"></i>
									<input type="text" name="nis" class="inpt-blck" placeholder="Nomor Induk Siswa">
								</div>
								<div class="col-md-6 form-group icn">
									<i class="fas fa-user"></i>
									<input type="text" name="nama_lengkap" class="inpt-blck" placeholder="Nama Lengkap">
								</div>
							</div>

							<div class="form-row">
								<div class="col-md-4 form-group icn">
									<select name="jkel" id="" class="slct-blck">
										<option value "">Jenis Kelamin</option>
										<option value="Laki-laki">Laki-laki</option>
										<option value="Perempuan">Perempuan</option>
									</select>
								</div>
								<div class="col-md-4 form-group">
									<select name="kelas" id="" class="slct-blck">
										<option value "">Kelas</option>
										<option value="X">X</option>
										<option value="XI">XI</option>
										<option value="XII">XII</option>
									</select>
								</div>
								<div class="col-md-4 form-group">
									<select name="jurusan" id="" class="slct-blck">
										<option value "">Jurusan</option>
										<optgroup label="Teknik Informatika">
											<option value="1">Rekayasa Perangkat Lunak</option>
											<option value="2">Teknik Komputer dan Jaringan</option>
											<option value="3">Multimedia</option>
										</optgroup>
										<optgroup label="Teknik Pertanian">
											<option value="4">Agribisnis Tanaman Pangan dan Horticultura</option>
											<option value="5">Teknik Pengolahan Hasil Pertanian</option>
										</optgroup>
										<optgroup label="Teknik Mesin">
											<option value="6">Teknik Las</option>
											<option value="7">Teknik Kendaraan Ringan</option>
											<option value="8">Teknik Perbaikan Body Otomotif</option>
											<option value="9">Teknik Pemesinan</option>
										</optgroup>
										<optgroup label="Elektro">
											<option value="10">Mekatronika</option>
										</optgroup>
									</select>
								</div>
							</div>
							<div class="form-row">
								<div class="col-md-6 form-group icn">
									<i class="fas fa-home"></i>
									<input type="text" name="tmpt_lahir" class="inpt-blck" placeholder="Tempat Lahir">
								</div>
								<div class="col-md-6 form-group icn">
									<i class="far fa-calendar-alt"></i>
									<div id="date">
										<input type="text" name="tgl_lahir" placeholder="Tanggal Lahir" class="inpt-blck">
									</div>
								</div>
							</div>
							<div class="form-row">
								<div class="col-md-12 form-group icn">
									<i class="fas fa-map-marker-alt"></i>
									<input type="text" name="alamat" class="inpt-blck" placeholder="Alamat">
								</div>
							</div>
							<div class="form-row">
								<div class="col-md-6">
									<button type="submit" class="bttn btn-block btn-dtl-prim tambah-siswa">Tambah</button>
								</div>
								<div class="col-md-6">
									<button type="button" class="bttn btn-block btn-dtl-scnd" data-dismiss="modal">Batal</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Import Banyak Siswa -->
	<div class="modal fade" id="importSiswa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-konfirmasi" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Import Siswa</h5>
					</button>
				</div>
				<div class="modal-body">
					<h2>Syarat dan Ketentuan</h2>
					<div class="row">
						<div class="col-md-6">
							<h5>Ketentuan file :</h5>
							<ol>
								<li>
									File berformat
									<i>.xls</i>,
									<i>.xlsx</i>,
									<i>.csv</i>,
									<i>.ods</i>, atau
									<i>.ots</i>
								</li>
								<li>
									Data yang diperlukan :
									<ul>
										<li>
											Nomor Induk Siswa
										</li>
										<li>
											Nama Lengkap
										</li>
										<li>
											Jenis Kelamin (Laki-laki / Perempuan)
										</li>
										<li>
											Kelas (X / XI / XII)
										</li>
										<li>
											Jurusan (Kode Jurusan)
										</li>
										<li>
											Tempat Lahir
										</li>
										<li>
											Tanggal Lahir (31-12-2000)
										</li>
										<li>
											Alamat
										</li>
									</ul>
								</li>
								<li>
									Urutan baris tabel harus sesuai dengan data yang diperlukan.
								</li>
							</ol>
						</div>
						<div class="col-md-6">
							<h5>Kode Jurusan</h5>
							<ol>
								<li>Rekayasa Perangkat Lunak</li>
								<li>Teknik Komputer dan Jaringan</li>
								<li>Multimedia</li>
								<li>Agribisnis Tanaman Pangan dan Horticultura</li>
								<li>Teknik Pengolahan Hasil Pertanian</li>
								<li>Teknik Las</li>
								<li>Teknik Kendaraan Ringan</li>
								<li>Teknik Perbaikan Body Otomotif</li>
								<li>Teknik Pemesinan</li>
								<li>Mekatronika</li>
							</ol>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="form-log-res register">
								<form method="post" id="import" class="wi-100">
									<div class="row mb-3">
										<div class="col-md-12">
											<input name="import_siswa" type="file" placeholder="" required/>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<button type="button" class="bttn btn-block btn-dtl-prim import">Import</button>
										</div>
										<div class="col-md-6">
											<button type="button" class="bttn btn-block btn-dtl-scnd" data-dismiss="modal">Batal</button>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Detail Siswa -->
	<div class="modal fade" id="detailSiswa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-pinjam" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Detail Siswa</h5>
				</div>
				<div class="modal-body">
					<form id="detail_siswa">
						<div class="form-row">
							<div class="form-group col-md-12 d-flex justify-content-center al-itm-cnt">
								<img id="img_preview" width="100" alt="" style="border-radius: 50px;">
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-md-3">
								<label>
									<b>NIS</b>
								</label>
								<input type="text" class="inpt-blck" name="detail_siswa_nis" id="detail_siswa_nis">
							</div>
							<div class="form-group col-md-6">
								<label>
									<b>Nama Lengkap</b>
								</label>
								<input type="text" class="inpt-blck" name="detail_siswa_nama" id="detail_siswa_nama">
							</div>
							<div class="form-group col-md-3">
								<label>
									<b>Jenis Kelamin</b>
								</label>
								<select name="detail_siswa_jkel" id="" class="inpt-blck">
									<option>Jenis Kelamin</option>
									<option value="Laki-laki">Laki-laki</option>
									<option value="Perempuan">Perempuan</option>
								</select>
								<!-- <input type="text" class="inpt-blck" name="detail_siswa_jkel" id="detail_siswa_jkel"> -->
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-md-2">
								<label>
									<b>Kelas</b>
								</label>
								<select name="detail_siswa_kelas" id="" class="inpt-blck">
									<option>Kelas</option>
									<option value="X">X</option>
									<option value="XI">XI</option>
									<option value="XII">XII</option>
								</select>
								<!-- <input type="text" class="inpt-blck" name="detail_siswa_kelas" id="detail_siswa_kelas"> -->
							</div>
							<div class="form-group col-md-5">
								<label>
									<b>Jurusan</b>
								</label>
								<select name="detail_siswa_jurusan" class="inpt-blck">
									<option>Jurusan</option>
									<optgroup label="Teknik Informatika">
										<option value="1">Rekayasa Perangkat Lunak</option>
										<option value="2">Teknik Komputer dan Jaringan</option>
										<option value="3">Multimedia</option>
									</optgroup>
									<optgroup label="Teknik Pertanian">
										<option value="4">Agribisnis Tanaman Pangan dan Horticultura</option>
										<option value="5">Teknik Pengolahan Hasil Pertanian</option>
									</optgroup>
									<optgroup label="Teknik Mesin">
										<option value="6">Teknik Las</option>
										<option value="7">Teknik Kendaraan Ringan</option>
										<option value="8">Teknik Perbaikan Body Otomotif</option>
										<option value="9">Teknik Pemesinan</option>
									</optgroup>
									<optgroup label="Elektro">
										<option value="10">Mekatronika</option>
									</optgroup>
								</select>
							</div>
							<div class="form-group col-md-5">
								<label>
									<b>Alamat</b>
								</label>
								<input type="text" class="inpt-blck" name="detail_siswa_alamat" id="detail_siswa_alamat">
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-md-6">
								<label>
									<b>Tempat Lahir</b>
								</label>
								<input type="text" class="inpt-blck" name="detail_siswa_tmpt_lahir" id="detail_siswa_tmpt_lahir">
							</div>
							<div class="form-group col-md-6">
								<label>
									<b>Tanggal Lahir</b>
								</label>
								<div id="date">
									<input type="text" name="detail_siswa_tgl_lahir" class="inpt-blck">
								</div>
								<input type="hidden" name="id" id="detail_siswa_id">
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-md-12 news">
								<label>
									<b>Status Terbaru</b>
								</label>
							</div>
						</div>
						<div class="form-row">
							<div class="col-md-6">
								<button type="submit" class="bttn btn-block btn-dtl-prim">Perbarui</button>
							</div>
							<div class="col-md-6">
								<button type="button" class="bttn btn-block btn-dtl-scnd" data-dismiss="modal">Batal</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<script src="<?php echo base_url() ?>assets/js/jquery.min.js"></script>
	<script src="<?php echo base_url() ?>assets/js/jquery-ui.min.js"></script>
	<script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url() ?>assets/js/jquery.dataTables.min.js" charset="utf-8"></script>
	<script src="<?php echo base_url() ?>assets/js/dataTables.bootstrap4.min.js" charset="utf-8"></script>
	<script src="<?php echo base_url() ?>assets/js/dataTables.responsive.min.js" charset="utf-8"></script>
	<script src="<?php echo base_url() ?>assets/js/sweetalert.min.js"></script>
	<script src="<?php echo base_url() ?>assets/js/notify.min.js"></script>

	<script>
		$(document).ready(function () {
			var base_url = '<?php echo base_url() ?>';

			$('div#date input').datepicker({
				changeMonth: true,
				changeYear: true,
				yearRange: '1990:2018', //set the range of years
				dateFormat: 'dd-mm-yy' //set the format of the date
			}).val();
			// $('div#date input').datepicker({ changeYear: true });

			function readURL(input) {
				if (input.files && input.files[0]) {
					var reader = new FileReader();

					reader.onload = function (e) {
						$('#img_preview').attr('src', e.target.result);
					}

					reader.readAsDataURL(input.files[0]);
				}
			}

			// DATATABLE SISWA
			var siswa = $('#daftar_siswa').DataTable({
				dom: "ltp",
				select: true,
				lengthChange: true,
				searching: true,
				processing: true,
				responsive: true,
				serverSide: true,
				ajax: {
					url: base_url + "siswa/get_all_siswa/",
					type: 'POST'
				},
				order: [
					[0, 'asc'],
					[1, 'asc']
				],
				columns: [{
						'data': 'nis'
					},
					{
						'data': 'nama'
					},
					{
						'data': 'jkel'
					},
					{
						'data': 'kelas'
					},
					{
						'data': 'jurusan'
					},
					{
						'data': 'id',
						'render': function (data, type, row) {
							return '<button type="button" id="button_show" class="btn btn-primary mr-2" data-id="' +
								data +
								'" data-toggle="modal" data-target="#detailSiswa"><i class="fas fa-edit"></i></button><button type="button" id="button_delete" data-id="' +
								data +
								'" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>';
						}
					}
				],
				columnDefs: [{
						targets: 0,
						width: "120px"
					},
					{
						targets: 1,
						width: "350px"
					},
					{
						targets: 2,
						width: "120px"
					},
					{
						targets: 3,
						width: "50px"
					},
					{
						targets: 4,
						width: "200px"
					},
					{
						targets: 5,
						width: "100px"
					}
				]
			});


			// TAMBAH DATA SISWA
			$(document).on('submit', '#tambah_siswa', function (event) {
				event.preventDefault();
				var data = $(this).serialize();

				swal({
						title: "Anda yakin untuk menambahkan siswa?",
						icon: "info",
						buttons: ["Tidak", "Iya"],
					})
					.then((isConfirm) => {
						if (!isConfirm) return;

						$(".loader.loader-default.is-active").fadeIn(5);

						$.ajax({
							type: "POST",
							url: base_url + "siswa/post_siswa/",
							data: data,
							success: function (data) {
								$(".loader.loader-default.is-active").fadeOut(250);
								if (data.status === 400) {
									$.notify(data.error, "error");
								} else if (data.status === 200) {
									swal(
										"Data siswa berhasil ditambahkan", {
											icon: "success",
											buttons: false,
											timer: 2500,
										}).then((success) => {
										$("#tambahSiswa").modal('hide');
										siswa.ajax.reload(null, false);
									});
								}
							}
						});
					});
			});

			// IMPORT EXCEL DATA SISWA
			$(document).on('click', '.import', function (event) {
				event.preventDefault();

				var form = $('#import')[0];
				var data = new FormData(form);

				swal({
						title: "Anda yakin untuk import data siswa?",
						icon: "info",
						buttons: ["Tidak", "Iya"],
					})
					.then((isConfirm) => {
						if (!isConfirm) return;

						$(".loader.loader-default.is-active").fadeIn(5);

						$.ajax({
							type: "POST",
							url: base_url + "siswa/import_excel/",
							data: data,
							processData: false,
							contentType: false,
							success: function (data) {
								$(".loader.loader-default.is-active").fadeOut(250);
								if (data.status === 200) {
									swal(
										"Data siswa berhasil ditambahkan", {
											icon: "success",
											buttons: false,
											timer: 2000,
										}).then((success) => {
										$("#importSiswa").modal('hide');
										siswa.ajax.reload(null, false);
									});
								} else if (data.status === 400) {
									$.notify(data.error, "error");
								}
							}
						});
					});
			});

			// SHOW DETAIL DATA SISWA
			$(document).on('show.bs.modal', '#detailSiswa', function (event) {
				var button = $(event.relatedTarget),
					$modal = $(this),
					id = button.data('id');

				$(".loader.loader-default.is-active").fadeIn(5);

				$.ajax({
					type: 'GET',
					url: base_url + 'siswa/get_data_siswa/' + id,
					success: function (data) {
						$.each(data.data, function (index, value) {
							if (value.photo == null) {
								$("#img_preview").attr('src', base_url + 'assets/imgs/male.png');
							} else {
								$("#img_preview").attr('src', base_url + 'upload/images/photo_profile/' + value.photo);
							}
							$('[name="detail_siswa_nis"]').val(value.nis);
							$('[name="detail_siswa_nama"]').val(value.nama);
							$('[name="detail_siswa_tmpt_lahir"]').val(value.tmpt_lahir);
							$('[name="detail_siswa_tgl_lahir"]').val(value.date);
							$('[name="detail_siswa_alamat"]').val(value.alamat);
							$('[name="id"]').val(value.id);
							$('[name=detail_siswa_jkel] option').filter(function () {
								return ($(this).text() == value.jkel);
							}).prop('selected', true);

							$('[name=detail_siswa_kelas] option').filter(function () {
								return ($(this).text() == value.kelas);
							}).prop('selected', true);

							$('[name=detail_siswa_jurusan] option').filter(function () {
								return ($(this).text() == value.jurusan);
							}).prop('selected', true);
						});
					}
				});


				$.ajax({
					type: 'GET',
					url: base_url + 'siswa/get_news/' + id,
					success: function (data) {
						$(".news").empty();

						if (data.status === 200) {
							$.each(data.data, function (index, value) {
								$(".news").append('<div class="alert alert-' + alert() + '"><b>' + value.nama +
									'</b> telah meminjam buku berjudul "' + value.judul_buku + '" dengan kode buku <i>' + value.kode_buku +
									'</i> pada ' + value.tgl_pinjam + '.</div>');
							});
						} else if (data.status === 400) {
							$(".news").append('<div class="alert alert-' + alert() + '">Tidak terdapat berita baru.</div>')
						}
						$(".loader.loader-default.is-active").fadeOut(250);
					}
				});

			});

			// UPDATE DATA SISWA
			$(document).on('submit', '#detail_siswa', function (event) {
				event.preventDefault();

				var update = $('#detail_siswa').serialize();
				var id = $('[name="id"]').val();

				$(".loader.loader-default.is-active").fadeIn(5);

				$.ajax({
					type: 'POST',
					url: base_url + 'siswa/update_siswa',
					data: update,
					success: function (data) {
						$(".loader.loader-default.is-active").fadeOut(250);
						console.log(data);
						if (data.status === 200) {
							swal("Data berhasil diperbarui!", {
								icon: "success",
								buttons: false,
								timer: 1500,
							}).then((success) => {
								siswa.ajax.reload(null, false);
								$("#detailSiswa").modal('hide');
							});
						} else if (data.status === 400) {
							$.notify(data.error, "error");
						}
					}
				});
			});

			// DELETE DATA SISWA
			$(document).on('click', '#button_delete', function () {
				var id = $(this).data('id');

				swal({
						title: "Anda yakin untuk menghapus?",
						icon: "error",
						buttons: ["Tidak", "Iya"],
						dangerMode: true,
					})
					.then((isConfirm) => {
						if (!isConfirm) return;

						$(".loader.loader-default.is-active").fadeIn(5);

						$.ajax({
							url: base_url + 'siswa/delete_siswa/' + id,
							type: "GET",
							success: function (data) {
								$(".loader.loader-default.is-active").fadeOut(250);
								if (data.status === 200) {
									swal("Data berhasil terhapus!", {
										icon: "success",
										buttons: false,
										timer: 1500,
									}).then((success) => {
										siswa.ajax.reload(null, false);
									});
								} else if (data.status === 400) {
									swal(
										"Data siswa gagal dihapus", {
											icon: "warning",
											buttons: false,
											timer: 2500,
										});
								}
							}
						});
					});
			});

			$(document).on('hide.bs.modal', '#importSiswa', function () {
				$('[name="import_siswa"]').val('');
			});


			$(document).on('hide.bs.modal', '#tambahSiswa', function () {
				$("#tambah_siswa").trigger("reset");
			});

			// RANDOM ALERT
			function alert() {
				var possible = ["success", "danger", "info", "warning"];

				var item = possible[Math.floor(Math.random() * possible.length)];
				return item;
			}

			$('#filter').keyup(function () {
				siswa.search($(this).val()).draw();
			})

			$("#refresh").click(function () {
				$(".loader.loader-default.is-active").fadeIn(5);
				siswa.ajax.reload(null, false);
			});

			$(document).ajaxComplete(function () {
				$(".loader.loader-default.is-active").fadeOut(250);
			});
		});

	</script>
</body>

</html>
