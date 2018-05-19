<body>
	<div class="loader loader-default is-active"></div>
	<nav class="navbar navbar-expand-lg">
		<a class="navbar-brand" href="#">
			<nav class="navbar navbar-light">
				<a class="navbar-brand" href="<?php echo base_url() ?>">
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
				<div class="">
					<button class="btn btn-grp" id="refresh">
						<i class="fas fa-sync"></i> Refresh</button>
				</div>
				<div class="col-md-3">
					<div class="card p-4">
						<div class="card-body d-flex justify-content-between align-items-center">
							<div>
								<span class="h4 d-block font-weight-normal mb-2 total_siswa"></span>
								<span class="font-weight-light">Total Siswa</span>
							</div>

							<div class="h2 text-muted">
								<i class="fas fa-user"></i>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="card p-4">
						<div class="card-body d-flex justify-content-between align-items-center">
							<div>
								<span class="h4 d-block font-weight-normal mb-2 total_buku"></span>
								<span class="font-weight-light">Total Buku</span>
							</div>

							<div class="h2 text-muted">
								<i class="fas fa-book"></i>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="card p-4">
						<div class="card-body d-flex justify-content-between align-items-center">
							<div>
								<span class="h4 d-block font-weight-normal mb-2">10</span>
								<span class="font-weight-light">Total Peminjam</span>
							</div>

							<div class="h2 text-muted">
								<i class="fas fa-user"></i>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="card p-4">
						<div class="card-body d-flex justify-content-between align-items-center">
							<div>
								<span class="h4 d-block font-weight-normal mb-2">10</span>
								<span class="font-weight-light">Total Pengunjung</span>
							</div>

							<div class="h2 text-muted">
								<i class="fas fa-user"></i>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row mt-4 mb-3">
				<!-- <div class="col-md-8">
					<div class="card">
						<div class="card-header clr-blck">
							Total Users
						</div>

						<div class="card-body p-0">
							<div class="p-4">
								<canvas id="myChart" width="965" height="193" class="chartjs-render-monitor" style="display: block; width: 965px; height: 193px;"></canvas>
							</div>
						</div>
					</div>
				</div> -->
				<div class="col-md-6">
					<div class="card">
						<div class="card-header clr-blck">
							Pemberitahuan Peminjaman Buku
						</div>

						<div class="card-body news">
							<!-- <div class="alert alert-primary news">
								<strong>Akbar Anung Yudha Saputra</strong> telah meminjam buku berjudul "Menguasai PHP MySQL" pada Jumat, 12 April 2018.</div> -->
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="card">
						<div class="card-header clr-blck">
							Pemberitahuan Pengembalian Buku
						</div>

						<div class="card-body news1">
							<!-- <div class="alert alert-primary news">
								<strong>Akbar Anung Yudha Saputra</strong> telah meminjam buku berjudul "Menguasai PHP MySQL" pada Jumat, 12 April 2018.</div> -->
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
<script src="<?php echo base_url() ?>assets/js/jquery.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>
<script src="<?php echo base_url('assets/js/jquery.dataTables.min.js') ?>" charset="utf-8"></script>
<script src="<?php echo base_url('assets/js/dataTables.bootstrap4.min.js') ?>" charset="utf-8"></script>
<script src="<?php echo base_url('assets/js/dataTables.responsive.min.js') ?>" charset="utf-8"></script>
<script src="<?php echo base_url() ?>assets/js/Chart.bundle.js"></script>

<script>
	$(document).ready(function () {
		var base_url = '<?php echo base_url() ?>';

		// TOTAL SISWA
		$.ajax({
			url: base_url + 'dashboard/count_siswa',
			success: function (data) {
				$(".total_siswa").append(data);
			}
		});

		// TOTAL BUKU
		$.ajax({
			url: base_url + 'dashboard/count_buku',
			success: function (data) {
				$(".total_buku").append(data);
				$(".loader.loader-default.is-active").fadeOut(250);

			}
		});
		get_notif_peminjam();
		get_notif_pengembalian();

		// RANDOM ALERT
		function alert() {
			var possible = ["primary", "success", "danger", "warning", "info"];

			var item = possible[Math.floor(Math.random() * possible.length)];
			return item;
		}

		function get_notif_peminjam() {

			$.ajax({
				url: base_url + 'dashboard/get_news',
				success: function (data) {
					$(".loader.loader-default.is-active").fadeOut(250);
					if (data.status === 200) {
						$.each(data.data, function (index, value) {
							$(".news").append('<div class="alert alert-' + alert() + '"><b>' + value.nama +
								'</b> telah meminjam buku berjudul <b>"' + value.judul_buku + '"</b> dengan kode buku <b><i>' + value.kode_buku +
								'</i></b> pada <b>' + value.tgl_pinjam + '</b>.</div>');
						});
					} else if (data.status === 400) {
						$(".news").append('<div class="alert alert-danger">Tidak ada pemberitahuan.</div>');
					}
				}
			});
		}

		function get_notif_pengembalian() {
			$.ajax({
				url: base_url + 'dashboard/get_news1',
				success: function (data) {
					$(".loader.loader-default.is-active").fadeOut(250);
					if (data.status === 200) {
						$.each(data.data, function (index, value) {
							$(".news1").append('<div class="alert alert-' + alert() + '"><b>' + value.nama +
								'</b> telah mengembalikan buku berjudul <b>"' + value.judul_buku + '"</b> dengan kode buku <b><i>' +
								value.kode_buku +
								'</i></b> pada <b>' + value.tgl_pinjam + '</b>.</div>');
						});
					}
				}
			});
		}

		$("#refresh").click(function () {
			$(".loader.loader-default.is-active").fadeIn(5);
			$(".news, .news1").empty();
			get_notif_peminjam();
			get_notif_pengembalian();
		});

		$(document).ajaxComplete(function () {
			$(".loader.loader-default.is-active").fadeOut(250);
		});
	});
</script>

</html>