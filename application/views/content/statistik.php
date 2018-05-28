<body>
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
    <div class="container">
        <div class="content mb-4">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header clr-blck">
                            Statistik Pengunjung
                            <br/>
                            <spam class="text-muted">Laki - laki dan Perempuan</spam>
                        </div>

                        <div class="card-body p-0">
                            <div class="p-4">
                                <canvas id="speedChart" class="chartjs-render-monitor stats"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="<?php echo base_url() ?>assets/js/jquery.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/Chart.bundle.js"></script>
<script>
    var speedCanvas = document.getElementById("speedChart");
    var base_url = '<?php echo base_url() ?>';

    function laki() {
        $.ajax({
            type: 'GET',
            url: base_url + 'statistik/laki',
            success: function (data) {
                var jkel = [];
                var jumlah = [];

                for (var i in data) {
                    jkel.push(data[i].jkel);
                    jumlah.push(parseFloat(data[i].jumlah));
                }

                var stats_app = new Chart("speedChart", {
				type: 'pie',
				data: {
					labels: jkel,
					datasets: [{
						label: 'Aplikasi',
						data: jumlah,
						backgroundColor: [
							'rgba(255, 99, 132, 0.2)',
							'rgba(54, 162, 235, 0.2)',
							'rgba(255, 206, 86, 0.2)',
							'rgba(75, 192, 192, 0.2)',
							'rgba(153, 102, 255, 0.2)'
						],
						borderColor: [
							'rgba(255,99,132,1)',
							'rgba(54, 162, 235, 1)',
							'rgba(255, 206, 86, 1)',
							'rgba(75, 192, 192, 1)',
							'rgba(153, 102, 255, 1)'
						]
					}]
				}
			});
            }
        });
    }

    laki();
</script>

</html>