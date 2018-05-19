<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Perpusku</title>
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/style.css">
</head>

<body>
	<div class="container">
		<div class="row he-100">
			<div class="col-md-6 d-flex justify-content-center al-itm-cnt logo">
				<img src="<?php echo base_url() ?>assets/imgs/logo1.png" class="img-responsive logos" alt="">
			</div>
			<div class="col-md-6 al-sf-cnt">
				<div class="login">
					<div class="title d-flex justify-content-center">
						<i style="font-size: 0.9rem;" class="mb-3">Apabila tidak memiliki akun, silahkan mendaftar terlbih dahulu.</i>
					</div>
					<form action="" method="post" class="" id="login">
						<div class="form-row">
							<div class="col-md-12 form-group icn">
								<i class="fas fa-address-card"></i>
								<input type="text" name="nisn" id="" class="inpt" placeholder="Nomor Induk Siswa">
							</div>
						</div>
						<div class="form-row">
							<div class="col-md-6 form-group">
								<button type="submit" class="bttn bttn-prim btn-block">Masuk</button>
							</div>
							<div class="col-md-6 form-group">
								<button type="button" id="btn-register" class="bttn bttn-scnd btn-block">Daftar</button>
							</div>
						</div>
					</form>
				</div>
				<div class="form-log-res register">
					<form id="register">
						<div class="row">
							<div class="col-md-12">
								<div class="form-row">
									<div class="form-group col-md-3 icn">
										<i class="fas fa-address-card"></i>
										<input type="text" class="inpt" name="register_nis" id="detail_siswa_nis" placeholder="NIS">
									</div>
									<div class="form-group col-md-5 icn">
										<i class="fas fa-user"></i>
										<input type="text" class="inpt" name="register_nama" id="detail_siswa_nama" placeholder="Nama Lengkap">
									</div>
									<div class="form-group col-md-4">
										<select name="register_jkel" id="" class="inpt">
											<option>Jenis Kelamin</option>
											<option value="Laki-laki">Laki-laki</option>
											<option value="Perempuan">Perempuan</option>
										</select>
									</div>
								</div>
								<div class="form-row">
									<div class="form-group col-md-2">
										<select name="register_kelas" id="" class="inpt">
											<option>Kelas</option>
											<option value="X">X</option>
											<option value="XI">XI</option>
											<option value="XII">XII</option>
										</select>
										<!-- <input type="text" class="inpt" name="detail_siswa_kelas" id="detail_siswa_kelas"> -->
									</div>
									<div class="form-group col-md-5">
										<select name="register_jurusan" class="inpt">
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
									<div class="form-group col-md-5 icn">
										<i class="fas fa-location-arrow"></i>
										<input type="text" class="inpt" name="register_alamat" id="detail_siswa_alamat" placeholder="Alamat">
									</div>
								</div>
								<div class="form-row">
									<div class="form-group col-md-6 icn">
										<i class="fas fa-map-marker-alt"></i>
										<input type="text" class="inpt" name="register_tmpt_lahir" id="detail_siswa_tmpt_lahir" placeholder="Tempat Lahir">
									</div>
									<div class="form-group col-md-6 icn">
										<i class="fas fa-calendar-alt"></i>
										<div id="date">
											<input type="text" name="register_tgl_lahir" class="inpt" placeholder="Tanggal Lahir">
										</div>
									</div>
								</div>
								<div class="form-row">
									<div class="col-md-6 form-group">
										<button type="submit" class="bttn bttn-prim btn-block">Daftar</button>
									</div>
									<div class="col-md-6 form-group">
										<button type="button" id="btn-register" class="bttn bttn-scnd btn-block back">Kembali</button>
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
<script src="<?php echo base_url() ?>assets/js/jquery-ui.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/sweetalert.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/bootstrap-notify.min.js"></script>


<script>
	$(document).ready(function () {

		var base_url = '<?php echo base_url(); ?>';

		$('div#date input').datepicker({
			changeMonth: true,
			changeYear: true,
			yearRange: '1990:2018', //set the range of years
			dateFormat: 'dd-mm-yy' //set the format of the date
		}).val();

		$(".register").hide();

		$("#btn-register").on('click', function () {
			$(".login").fadeOut(200, function () {
				$(".register").show();
			});
		});

		$(".back").on('click', function () {
			$(".register").fadeOut(200, function () {
				$(".login").show();
			});
		});

		// FORM LOGIN
		$(document).on('submit', '#login', function (event) {
			event.preventDefault();

			$.ajax({
				url: base_url + 'user/login',
				type: 'POST',
				data: $(this).serialize(),
				success: function (data) {
					if (data.status === 400) {
						swal(
							"Nomor Induk Siswa salah. Silahkan coba lagi.", {
								icon: "warning",
								buttons: false,
								timer: 3000,
							});
						$("#login").trigger('reset');
					} else {
						swal(
							'Selamat datang ' + data.nama + '.', {
								icon: "success",
								buttons: false,
								timer: 2250,
							}).then((success) => {
							window.location = base_url + "home"
						});
					}
				}
			});
		});

		$(document).on('submit', '#register', function (event) {
			event.preventDefault();

			$.ajax({
				type: 'POST',
				url: base_url + 'user/register',
				data: $(this).serialize(),
				success: function (data) {
					if (data.status === 400) {
						$.notify({
							message: data.error
						}, {
							type: 'danger',
							animate: {
								enter: 'animated fadeInDown',
								exit: 'animated fadeOutUp'
							},
						});
					} else {
						swal(
							"Berhasil! Silahkan login.", {
								icon: "success",
								buttons: false,
								timer: 3000,
							});
						$("#register").trigger('reset');
						$(".register").fadeOut(300, function () {
							$(".login").show();
						});
					}
				}
			})
		});
	});
</script>

</html>