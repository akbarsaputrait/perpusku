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
					<h4>Konfrimasi Peminjaman Buku</h4>
				</div>
			</div>
			<div class="row mb-3">
				<div class="col-md-4"></div>
				<div class="col-md-4 d-flex justify-content-center">
					<input type="text" class="inpt" id="filter" placeholder="Search...">
				</div>
				<div class="col-md-4"></div>
			</div>
			<div class="row mb-5">
				<div class="col-md-12">
					<div class="table-responsive bg-white clr-blck p-4">
						<table cellpadding="1" cellspacing="1" id="daftar_peminjam" class="display table table-bordered table-hover table-striped"
						width="100%">
							<thead>
								<tr>
									<th>Kode Peminjaman</th>
									<th>Nama</th>
									<th>Judul Buku</th>
									<th>Tanggal Peminjaman</th>
									<th>Tanggal Pengembalian</th>
									<th></th>
								</tr>
							</thead>
						</table>
					</div>
				</div>
			</div>
			<div class="rlt">
				<button type="button" class="btn btn-grp" name="button" id="refresh">
					<i class="fas fa-sync"></i> Refresh
				</button>
			</div>
		</div>
	</div>

	<!-- Buku Kembali -->
	<div class="modal fade" id="konfirmasiBuku" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-konfirmasi" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Data Peminjaman</h5>
					</button>
				</div>
				<div class="modal-body data_peminjam"></div>
			</div>
		</div>
	</div>
</body>
<script src="<?php echo base_url() ?>assets/js/jquery.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>
<script src="<?php echo base_url('assets/js/jquery.dataTables.min.js') ?>" charset="utf-8"></script>
<script src="<?php echo base_url('assets/js/dataTables.bootstrap4.min.js') ?>" charset="utf-8"></script>
<script src="<?php echo base_url('assets/js/dataTables.responsive.min.js') ?>" charset="utf-8"></script>
<script src="<?php echo base_url() ?>assets/js/sweetalert.min.js"></script>



<script>
	var base_url = '<?php echo base_url(); ?>';

	$(document).ready(function () {

		// DATATABLE SISWA
		var peminjam = $('#daftar_peminjam').DataTable({
			dom: 'ltp',
			select: true,
			lengthChange: true,
			searching: true,
			processing: true,
			responsive: true,
			serverSide: true,
			ajax: {
				url: base_url + "buku/get_peminjam/",
				type: 'POST'
			},
			order: [
				[0, 'asc'],
				[1, 'asc']
			],
			columns: [{
					'data': 'kode',
					'render': function (data, type, row) {
						return '<h3><span class="badge badge-' + badge() + '">' + data + '</span></h3>'
					}
				},
				{
					'data': 'nama'
				},
				{
					'data': 'judul_buku'
				},
				{
					'data': 'tgl_pinjam'
				},
				{
					'data': 'tgl_kembali'
				},
				{
					'data': 'id',
					'render': function (data, type, row) {
						return '<button type="button" id="button_show" class="btn btn-success btn-block" data-id="' +
							data +
							'" data-toggle="modal" data-target="#konfirmasiBuku"><i class="fas fa-check"></i></button>';
					}
				}
			]
		});

		$(document).on('show.bs.modal', '#konfirmasiBuku', function (event) {
			$(".loader.loader-default.is-active").fadeIn(5);

			$(".data_peminjam").empty();
			var button = $(event.relatedTarget),
				$modal = $(this),
				id = button.data('id');

			$.ajax({
				type: 'GET',
				url: base_url + 'buku/get_data_peminjam/' + id,
				success: function (data) {
					$(".data_peminjam").empty();
					if (data.status === 200) {
						$.each(data.data, function (index, value) {
							$(".data_peminjam").append(
								'<div class="row"><div class="col-md-12 text-center p-4"><h3><span class="badge badge-dark">' + value
								.kode_pinjaman +
								'</span></h3><h1>' + value.nama +
								'</h1></h1><h6 class="text-muted">' + value.kelas + ' ' + value.jurusan + '</h6><h4 class="mb-5">"' + value.judul + '"</h4><div class="row"><div class="col-md-6"><h1>' +
								value.tgl_pinjam +
								'</h1><p class="text-small">TANGGAL PINJAM</p></p></div><div class="col-md-6"><h1>' + value.tgl_kembali +
								'</h1><p class="text-small">TANGGAL KEMBALI</p></div></div></div></div><div class="row"><div class="col-md-6 d-flex justify-content-center form-group"><button type="button" id="button_confirm" data-id="' +
								value.id +
								'" class="bttn btn-block btn-dtl-prim">Konfirmasi</button></div><div class="col-md-6 d-flex justify-content-center"><button type="button" class="bttn btn-block btn-dtl-scnd" data-dismiss="modal">Batal</button></div></div>'
							);
						});
					}
				}
			});
		});

		$(document).on('click', '#refresh', function () {
			$(".loader.loader-default.is-active").fadeIn(5);
			peminjam.ajax.reload(null, false);
		});

		$(document).on('keyup', '#filter', function () {
			peminjam.search($(this).val()).draw();
		});

		$(document).on('click', '#button_confirm', function () {
			var id_peminjam = $(this).data('id');

			$.ajax({
				type: 'POST',
				url: base_url + 'buku/konfirmasi_peminjaman/',
				data: {
					id_peminjam:id_peminjam
				},
				success: function (data) {
					if (data.status === 200) {
						swal(
							"Berhasil!", {
								icon: "success",
								buttons: false,
								timer: 1000,
							});
						peminjam.ajax.reload(null, false);
					} else {
						swal(
							"Gagal! Silahkan coba lagi.", {
								icon: "error",
								buttons: false,
								timer: 1000,
							});
					}
					$("#konfirmasiBuku").modal('hide');
				}
			});
		});

		function badge() {
			var possible = ["primary", "secondary", "success", "danger", "warning", "info", "light", "dark"];

			var item = possible[Math.floor(Math.random() * possible.length)];
			return item;
		}

		$(document).ajaxComplete(function () {
			$(".loader.loader-default.is-active").fadeOut(250);
		});
	});

</script>

</html>
