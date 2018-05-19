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
							<a class="dropdown-item" href="<?php echo base_url() ?>admin/profile">Profil</a>
							<a class="dropdown-item" href="<?php echo base_url() ?>admin/">Logout</a>
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
					<h4>Daftar Buku</h4>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="row mb-3">
						<div class="col-md-12 d-flex justify-content-center">
							<div class="btn-group" role="group" aria-label="Basic example">
								<button type="button" class="btn btn-grp" data-toggle="modal" data-target="#tambahBuku">Tambah Buku</button>
								<button type="button" class="btn btn-grp" data-toggle="modal" data-target="#importBuku">Import Buku</button>
							</div>
						</div>
					</div>
					<div class="row mb-3">
						<div class="col-md-4"></div>
						<div class="col-md-4 d-flex justify-content-center">
							<input type="text" class="inpt" id="filter" placeholder="Search...">
						</div>
						<div class="col-md-4">
							<button class="btn btn-grp" id="refresh">
								<i class="fas fa-sync"></i> Refresh</button>
						</div>
					</div>
					<div class="row mb-5">
						<div class="col-md-12">
							<div class="table-responsive bg-white clr-blck p-4">
								<table cellpadding="1" cellspacing="1" id="daftar_buku" class="display table table-bordered table-hover table-striped" width="100%">
									<thead>
										<tr>
											<th>Cover Buku</th>
											<th>Judul</th>
											<th>Pengarang</th>
											<th>Penerbit</th>
											<th>Jumlah</th>
											<th>Sisa</th>
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
	<!-- Tambah Satuan Buku -->
	<div class="modal fade" id="tambahBuku" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-info" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Tambah Buku</h5>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-log-res register">
						<form id="tambah_buku" method="post">
							<div class="form-row">
								<div class="col-md-3 form-group">
									<!-- <i class="fas fa-book"></i> -->
									<input type="text" name="kategori" class="inpt-blck" placeholder="Kategori">
								</div>
								<div class="col-md-5 form-group icn">
									<i class="fas fa-book"></i>
									<input type="text" name="judul_buku" class="inpt-blck" placeholder="Judul Buku">
								</div>
								<div class="col-md-4 form-group icn">
									<i class="fas fa-user"></i>
									<input type="text" name="pengarang" class="inpt-blck" placeholder="Pengarang">
								</div>
							</div>
							<div class="form-row">
								<div class="col-md-3 form-group icn">
									<i class="fas fa-users"></i>
									<input type="text" name="penerbit" class="inpt-blck" placeholder="Penerbit">
								</div>
								<div class="col-md-3 form-group">
									<input type="text" name="bulan_terbit" class="inpt-blck" placeholder="Bulan Terbit">
								</div>
								<div class="col-md-3 form-group">
									<input type="text" name="tahun_terbit" class="inpt-blck" placeholder="Tahun Terbit">
								</div>
								<div class="col-md-3 form-group">
									<input type="text" name="jumlah_hal" class="inpt-blck" placeholder="Jumlah Halaman">
								</div>
							</div>
							<div class="form-row">
								<div class="col-md-3 form-group">
									<input type="text" name="jumlah_buku" class="inpt-blck" placeholder="Jumlah">
								</div>
								<div class="col-md-3 form-group">
									<input type="text" name="kode_buku" class="inpt-blck" placeholder="Kode Buku">
								</div>
								<div class="col-md-3 form-group">
									<input type="text" name="no_isbn" class="inpt-blck" placeholder="Nomor ISBN">
								</div>
								<div class="col-md-3 form-group icn">
									<i class="fas fa-compass"></i>
									<input type="text" name="lokasi" class="inpt-blck" placeholder="Lokasi">
								</div>
							</div>
							<div class="form-row">
								<div class="col-md-12 form-group">
									<textarea name="keterangan" id="editor2" rows="10" cols="80"></textarea>
								</div>
							</div>
							<div class="form-row">
								<div class="col-md-12 form-group icn">
									<input type="file" placeholder="Add Cover Book" id="cover_buku" name="cover_buku" />
								</div>
							</div>
							<div class="form-row mb-3">
								<div class="col-md-12 d-flex justify-content-center al-itm-cnt">
									<img src="<?php echo base_url() ?>assets/imgs/cover_buku.png" width="250" alt="" id="preview_cover">
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col-md-6">
									<button type="submit" class="bttn btn-block btn-dtl-prim">Tambah</button>
								</div>
								<div class="form-group col-md-6">
									<button type="button" class="bttn btn-block btn-dtl-scnd" data-dismiss="modal">Batal</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Import Banyak Buku -->
	<div class="modal fade" id="importBuku" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-info" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Import Buku</h5>
					</button>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-md-12">
							<h2>Syarat dan Ketentuan</h2>
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
											Kategori
										</li>
										<li>
											Pengarang
										</li>
										<li>
											Penerbit
										</li>
										<li>
											Lokasi
										</li>
										<li>
											Kode
										</li>
										<li>
											Judul Buku
										</li>
										<li>
											Nomor ISBN
										</li>
										<li>
											Bulan Terbit
										</li>
										<li>
											Tahun Terbit
										</li>
										<li>
											Jumlah Buku
										</li>
										<li>
											Sisa Buku
										</li>
										<li>
											Jumlah Halaman
										</li>
									</ul>
								</li>
								<li>
									Urutan baris tabel harus sesuai dengan data yang diperlukan.
								</li>
								<li>
									Apabila ada data yang kosong, isikan dengan " - " (tanpa tanda petik).
								</li>
							</ol>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<form method="post" id="import_buku" class="wi-100">
								<div class="form-row">
									<div class="form-group col-md-12">
										<input name="import_buku" class="excelBuku" type="file" placeholder="Add File Excel" />
									</div>
								</div>
								<div class="form-row">
									<div class="form-group col-md-6">
										<button type="submit" class="bttn btn-block btn-dtl-prim import">Import</button>
									</div>
									<div class="form-group col-md-6">
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
	<!-- Info Buku -->
	<div class="modal fade" id="infobukuModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-info" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5>Detail Buku</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form id="detail_buku">
						<div class="row">
							<div class="col-md-4">
								<div class="d-flex justify-content-center al-itm-cnt">
									<img class="cover-book img-fluid" id="update_detail_cover" width="250" alt="">
								</div>
								<div class="">
									<input type="file" name="detail_cover" id="detail_cover" class="">
								</div>
							</div>
							<div class="col-md-8">
								<div class="form-row">
									<div class="form-group col-md-4">
										<label>
											<b>Kategori</b>
										</label>
										<input type="text" class="inpt-blck" name="detail_kategori">
									</div>
									<div class="form-group col-md-8">
										<label>
											<b>Judul Buku</b>
										</label>
										<input type="text" class="inpt-blck" name="detail_judul_buku">
									</div>
								</div>
								<div class="form-row">
									<div class="form-group col-md-3">
										<label>
											<b>Kode Buku</b>
										</label>
										<input type="text" class="inpt-blck" name="detail_nomor_buku">
									</div>
									<div class="form-group col-md-4">
										<label>
											<b>Nomor ISBN</b>
										</label>
										<input type="text" class="inpt-blck" name="detail_nomor_isbn">
									</div>
									<div class="form-group col-md-3">
										<label>
											<b>Jumlah Halaman</b>
										</label>
										<input type="text" name="detail_jumlah_hal" class="inpt-blck">
									</div>
									<div class="form-group col-md-2">
										<label>
											<b>Lemari</b>
										</label>
										<input type="text" class="inpt-blck" name="detail_lokasi">
									</div>
								</div>
								<div class="form-row">
									<div class="form-group col-md-6">
										<label>
											<b>Pengarang</b>
										</label>
										<input type="text" class="inpt-blck" name="detail_pengarang">
									</div>
									<div class="form-group col-md-6">
										<label>
											<b>Penerbit</b>
										</label>
										<input type="text" class="inpt-blck" name="detail_penerbit">
									</div>
								</div>
								<div class="form-row">
									<div class="form-group col-md-3">
										<label>
											<b>Tahun</b>
										</label>
										<input type="text" class="inpt-blck" name="detail_tahun_terbit">
									</div>
									<div class="form-group col-md-3">
										<label>
											<b>Bulan</b>
										</label>
										<input type="text" class="inpt-blck" name="detail_bulan_terbit">
									</div>
									<div class="form-group col-md-3">
										<label>
											<b>Jumlah</b>
										</label>
										<input type="text" class="inpt-blck" name="detail_jumlah">
									</div>
									<div class="form-group col-md-3">
										<label>
											<b>Sisa</b>
										</label>
										<input type="text" class="inpt-blck" name="detail_sisa">
									</div>
								</div>
								<div class="form-row">
									<div class="form-group col-md-12">
										<label>
											<b>Keterangan</b>
										</label>
										<textarea name="detail_keterangan" id="editor1" rows="10" cols="80"></textarea>
										<input type="hidden" name="id" id="detail_id">
									</div>
								</div>
								<div class="form-row">
									<div class="form-group col-md-6">
										<button type="submit" class="bttn btn-block btn-dtl-prim">Perbarui</button>
									</div>
									<div class="form-group col-md-6">
										<button type="button" class="bttn btn-block btn-dtl-scnd" data-dismiss="modal">Batal</button>
									</div>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
<script src="<?php echo base_url() ?>assets/js/jquery.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/jquery.dataTables.min.js" charset="utf-8"></script>
<script src="<?php echo base_url() ?>assets/js/dataTables.bootstrap4.min.js" charset="utf-8"></script>
<script src="<?php echo base_url() ?>assets/js/dataTables.responsive.min.js" charset="utf-8"></script>
<script src="<?php echo base_url() ?>assets/js/sweetalert.min.js"></script>
<script src="<?php echo base_url() ?>assets/ckeditor/ckeditor.js"></script>
<script src="<?php echo base_url() ?>assets/js/notify.min.js"></script>

<script>
	var base_url = '<?php echo base_url() ?>';

	$(document).ready(function () {

		CKEDITOR.replace('detail_keterangan');
		CKEDITOR.replace('keterangan');

		function readURL(input, field) {
			if (input.files && input.files[0]) {
				var reader = new FileReader();

				reader.onload = function (e) {
					$(field).attr('src', e.target.result);
				}

				reader.readAsDataURL(input.files[0]);
			}
		}

		$(document).on('change', '#detail_cover', function () {
			readURL(this, '#update_detail_cover');
		});

		$(document).on("change", '#cover_buku', function () {
			readURL(this, '#preview_cover');
		});

		$(document).on('hide.bs.modal', '#importBuku', function () {
			$('[name="import_buku"]').val('');
		});

		$(document).on('hide.bs.modal', '#tambahBuku', function () {
			var form = $("#tambah_buku"),
				file = $('[type=file]');

			$("#preview_cover").attr('src', base_url + 'assets/imgs/cover_buku.png');
			file.val('');
			form[0].reset();
			CKEDITOR.instances.editor2.setData('');
		});

		$("#delete").on('click', function () {
			swal({
					title: "Anda yakin untuk menghapus?",
					icon: "error",
					buttons: ["Tidak", "Iya"],
					dangerMode: true,
				})
				.then((logout) => {
					if (logout) {
						swal("Berhasil menghapus!", {
							icon: "success",
							buttons: false,
							timer: 1500,
						}).then((success) => {
							window.location = "<?php echo base_url() ?>dashboard";
						});
					} else {
						return;
					}
				});
		});


		// Load daftar buku
		var buku = $('#daftar_buku').DataTable({
			dom: "ltp",
			select: true,
			pageLength: 5,
			lengthChange: true,
			searching: true,
			processing: true,
			responsive: true,
			serverSide: true,
			ajax: {
				url: base_url + "buku/get_datatables/",
				type: 'POST'
			},
			columns: [{
					'data': 'cover_buku',
					'render': function (data, type, row) {
						if (data === null) {
							return '<img src="' + base_url +
								'assets/imgs/cover_buku.1.png" width="100" class="img-fluid">';
						} else {
							return '<img src="' + base_url + 'upload/images/cover_buku/' + data +
								'" class="img-fluid" width="100">';
						}
					}
				},
				{
					'data': 'judul_buku'
				},
				{
					'data': 'pengarang'
				},
				{
					'data': 'penerbit'
				},
				{
					'data': 'jumlah_buku'
				},
				{
					'data': 'sisa_buku'
				},
				{
					'data': 'id',
					'render': function (data, type, row) {
						return '<div class="d-flex justify-content-center"><button type="button" class="btn btn-primary mr-1" data-id="' +
							data +
							'" data-toggle="modal" data-target="#infobukuModal"><i class="fas fa-edit"></i></button><button type="button" class="btn btn-danger" data-id="' +
							data +
							'" id="delete_buku"><i class="fas fa-trash-alt"></i></button></div>'
					}
				}
			],
			columnDefs: [{
				target: 0,
				search: false
			}]
		});

		// TAMBAH BUKU
		$(document).on('submit', '#tambah_buku', function (event) {
			event.preventDefault();

			swal({
				title: "Anda yakin untuk menambahkan buku?",
				icon: "info",
				buttons: ["Tidak", "Iya"],
			}).then((isConfirm) => {
				if (!isConfirm) return;

				$(".loader.loader-default.is-active").fadeIn(5);

				var keterangan = CKEDITOR.instances.editor2.getData();
				var form = new FormData(this);

				form.append('keterangan', keterangan);

				$.ajax({
					type: 'POST',
					url: base_url + 'buku/post_buku',
					data: form, //penggunaan FormData
					processData: false,
					contentType: false,
					cache: false,
					async: false,
					success: function (data) {
						$(".loader.loader-default.is-active").fadeOut(250);
						if (data.status === 200) {
							swal(
								"Data buku berhasil ditambahkan", {
									icon: "success",
									buttons: false,
									timer: 2500,
								}).then((success) => {
								$("#tambahBuku").modal('hide');
								buku.ajax.reload(null, false);
							});
						} else if (data.status === 409) {
							swal(
								"Data buku gagal ditambahkan", {
									icon: "warning",
									buttons: false,
									timer: 2500,
								});
						} else if (data.status === 400) {
							swal(
								"Anda tidak menambahkan cover buku", {
									icon: "warning",
									buttons: false,
									timer: 2500,
								});
						}
					}
				});
			});
		});


		// IMPORT EXCEL DATA BUKU
		$(document).on('submit', '#import_buku', function (event) {
			event.preventDefault();

			swal({
					title: "Anda yakin untuk import data buku?",
					icon: "info",
					buttons: ["Tidak", "Iya"],
				})
				.then((isConfirm) => {
					if (!isConfirm) return;

					$(".loader.loader-default.is-active").fadeIn(5);

					$.ajax({
						type: "POST",
						url: base_url + "buku/import_buku",
						data: new FormData(this),
						processData: false,
						contentType: false,
						success: function (data) {
							$(".loader.loader-default.is-active").fadeOut(250);

							if (data.status === 200) {
								swal(
									"Data buku berhasil ditambahkan", {
										icon: "success",
										buttons: false,
										timer: 2500,
									}).then((success) => {
									$("#importBuku").modal('hide');
									buku.ajax.reload(null, false);
								});
							} else if (data.status === 409) {
								$.notify(data.error, "error");
							}
						}
					});
				});
		});

		// SHOW DETAIL DATA BUKU
		$(document).on('show.bs.modal', '#infobukuModal', function (event) {
			var button = $(event.relatedTarget),
				$modal = $(this),
				id = button.data('id');

			$(".loader.loader-default.is-active").fadeIn(5);

			$.ajax({
				type: 'POST',
				url: base_url + 'buku/get_buku',
				data: {
					id: id
				},
				success: function (data) {
					$.each(data.data, function (index, value) {
						if (value.cover_buku == null) {
							$(".cover-book").attr('src', base_url +
								'assets/imgs/cover_buku.1.png');
						} else {
							$(".cover-book").attr('src', base_url +
								'upload/images/cover_buku/' + value.cover_buku);
						}
						$('[name="detail_kategori"]').val(value.kategori);
						$('[name="detail_judul_buku"]').val(value.judul_buku);
						$('[name="detail_nomor_buku"]').val(value.nomor_buku);
						$('[name="detail_pengarang"]').val(value.pengarang);
						$('[name="detail_penerbit"]').val(value.penerbit);
						$('[name="detail_tahun_terbit"]').val(value.tahun_terbit);
						$('[name="detail_bulan_terbit"]').val(value.bulan_terbit);
						$('[name="detail_jumlah"]').val(value.jumlah_buku);
						$('[name="detail_sisa"]').val(value.sisa_buku);
						$('[name="detail_nomor_isbn"]').val(value.nomor_isbn);
						$('[name="detail_jumlah_hal"]').val(value.halaman);
						$('[name="detail_lokasi"]').val(value.lokasi);
						$('[name="id"]').val(value.id);
						CKEDITOR.instances.editor1.setData(value.keterangan);
					});
					$(".loader.loader-default.is-active").fadeOut(250);
				}
			});
		});

		$(document).on('hide.bs.modal', '#infobukuModal', function () {
			$("#detail_buku").trigger('reset');
		});


		// UPDATE BUKU
		$(document).on('submit', '#detail_buku', function (event) {
			event.preventDefault();

			swal({
				title: "Anda yakin untuk memperbarui data buku?",
				icon: "info",
				buttons: ["Tidak", "Iya"],
			}).then((isConfirm) => {
				if (!isConfirm) return;

				$(".loader.loader-default.is-active").fadeIn(5);

				var form = new FormData(this);
				var detail_keterangan = CKEDITOR.instances.editor1.getData();
				var detail_id = $("#detail_id").val();

				form.append('detail_keterangan', detail_keterangan);
				form.append('detail_id', detail_id);

				$.ajax({
					type: 'POST',
					url: base_url + 'buku/update_buku',
					data: form,
					processData: false,
					contentType: false,
					cache: false,
					async: false,
					success: function (data) {
						$(".loader.loader-default.is-active").fadeOut(250);

						if (data.status === 200) {
							swal(
								"Data buku berhasil diperbarui", {
									icon: "success",
									buttons: false,
									timer: 2500,
								}).then((success) => {
								buku.ajax.reload(null, false);
								$("#infobukuModal").modal('hide');
							});
						} else if (data.status === 409) {
							swal(
								"Data buku gagal diperbarui", {
									icon: "warning",
									buttons: false,
									timer: 2500,
								});
						}
					}
				});
			});
		});

		// DELETE DATA BUKU
		$(document).on('click', '#delete_buku', function () {
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
						url: base_url + 'buku/delete_buku/' + id,
						type: "GET",
						success: function (data) {
							$(".loader.loader-default.is-active").fadeOut(250);
							if (data.status === 200) {
								swal("Data berhasil terhapus!", {
									icon: "success",
									buttons: false,
									timer: 1500,
								}).then((success) => {
									buku.ajax.reload(null, false);
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

		$('#filter').keyup(function () {
			buku.search($(this).val()).draw();
		})

		$("#refresh").click(function () {
			$(".loader.loader-default.is-active").fadeIn(5);
			buku.ajax.reload(null, false);
		});

		$(document).ajaxComplete(function () {
			$(".loader.loader-default.is-active").fadeOut(250);
		});
	});
</script>

</html>