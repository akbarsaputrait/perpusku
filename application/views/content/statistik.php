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

    var dataFirst = {
        label: "Perempuan",
        data: [0, 59, 75, 20, 20, 55, 40],
        lineTension: 0.3,
        borderColor: 'rgba(255,99,132,1)',
        backgroundColor: 'rgba(255, 99, 132, 0.2)'
        // Set More Options
    };

    var dataSecond = {
        label: "Laki-laki",
        data: [20, 15, 60, 60, 65, 30, 70],
        borderColor: 'rgba(75, 192, 192, 1)',
        backgroundColor: 'rgba(75, 192, 192, 0.2)'
        // Set More Options
    };

    var speedData = {
        labels: ["0s", "10s", "20s", "30s", "40s", "50s", "60s"],
        datasets: [dataFirst, dataSecond],
    };

    var chartOptions = {
        legend: {
            display: true,
            position: 'top',
            labels: {
                boxWidth: 80,
                fontColor: 'black'
            }
        },
        responsive: true
    };

    var lineChart = new Chart(speedCanvas, {
        type: 'line',
        data: speedData,
        options: chartOptions
    });
</script>

</html>