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
	<div class="container he-100">
		<div class="wi-100 he-100 d-flex justify-content-center content">
			<div class="row" id="body-login">
				<div class="col-md-6 d-flex justify-content-center al-itm-cnt logo">
					<img src="<?php echo base_url() ?>assets/imgs/logo1.png" class="img-responsive logos" alt="">
				</div>
				<div class="col-md-6 al-sf-cnt mb-5">
					<div class="body-form">
						<div class="form-log-res login">
							<form action="" method="post" class="wi-100" id="login">
								<div class="form-row">
									<div class="col-md-12 form-group icn">
										<i class="fas fa-address-card"></i>
										<input type="text" name="username" id="" class="inpt" placeholder="Username atau Email">
									</div>
								</div>
								<div class="form-row">
									<div class="col-md-12 form-group icn">
										<i class="fas fa-unlock-alt"></i>
										<input type="password" name="password" id="" class="inpt" placeholder="Kata Sandi">
									</div>
								</div>
								<div class="form-row">
									<div class="col-md-6">
										<button type="submit" class="bttn bttn-prim btn-block">Masuk</button>
									</div>
									<div class="col-md-6">
										<button type="button" id="btn-register" class="bttn bttn-scnd btn-block">Daftar</button>
									</div>
								</div>
							</form>
						</div>
						<div class="form-log-res register">
							<div class="row">
								<div class="col-md-12">
									<form id="register" method="post">
										<div class="form-row">
											<div class="col-md-12 form-group icn">
												<i class="fas fa-user"></i>
												<input type="text" name="name" class="inpt" placeholder="Nama Lengkap">
											</div>
										</div>
										<div class="form-row">
											<div class="col-md-5 form-group icn">
												<i class="fas fa-address-card"></i>
												<input type="text" name="username" class="inpt" placeholder="Nama Pengguna">
											</div>
											<div class="col-md-7 form-group icn">
												<i class="fas fa-at"></i>
												<input type="email" name="email" class="inpt" placeholder="Email">
											</div>
										</div>
										<div class="form-row">
											<div class="col-md-12  form-group icn">
												<i class="fas fa-phone"></i>
												<input type="text" name="notelp" class="inpt" placeholder="Nomor Telepon">
											</div>
										</div>
										<div class="form-row">
											<div class="col-md-5 form-group icn">
												<i class="fas fa-unlock-alt"></i>
												<input type="password" name="password" id="password" class="inpt" placeholder="Kata sandi">
											</div>
											<div class="col-md-5 form-group icn">
												<i class="fas fa-unlock-alt"></i>
												<input type="password" name="confirm_password" id="confirm_password" class="inpt" placeholder="Masukan Kembali">
											</div>
											<div class="col-md-2 form-group icn">
												<button type="button" class="showp otln-0" id="showpass">
													<i class="fas fa-eye-slash"></i>
												</button>
											</div>
										</div>
										<div class="form-row">
											<div class="col-md-6">
												<button type="submit" id="btn-register-post" class="bttn bttn-prim btn-block">Daftar</button>
											</div>
											<div class="col-md-6">
												<button type="button" id="btn-register-post" class="bttn bttn-scnd btn-block back">Kembali</button>
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
	</div>
	</div>
</body>
<script src="<?php echo base_url() ?>assets/js/jquery.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/sweetalert.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/bootstrap-notify.min.js"></script>


<script>
	$(document).ready(function () {
		var base_url = '<?php echo base_url() ?>';

		// SHOW HIDE PASSWORD
		function show() {
			var p = $('#password');
			p.attr('type', 'text');

			var c = $('#confirm_password');
			c.attr('type', 'text');

			var s = $("#showpass");
			s.html('<i class="fas fa-eye"></i>');
		}

		function hide() {
			var p = $('#password');
			p.attr('type', 'password');

			var c = $('#confirm_password');
			c.attr('type', 'password');

			var s = $("#showpass");
			s.html('<i class="fas fa-eye-slash"></i>');
		}

		var pwShown = 0;

		$("#showpass").on('click', function () {
			$(this).toggleClass('focus');
			if (pwShown == 0) {
				pwShown = 1;
				show();
			} else {
				pwShown = 0;
				hide();
			}
		});

		$(".register").hide();

		$("#btn-register").on('click', function () {
			$(".login").fadeOut(300, function () {
				$(".register").show();
			});
		});

		$(".back").on('click', function () {
			$(".register").fadeOut(300, function () {
				$(".login").show();
			});
		});

		// FORM LOGIN
		var login = $("#login");

		login.on('submit', function (e) {
			e.preventDefault();

			$.ajax({
				url: base_url + 'admin/login',
				type: 'POST',
				data: login.serialize(),
				success: function (data) {
					$.each(data, function (index, value) {
						if (value.status === 400) {
							swal(
								"Username atau Email salah. Silahkan coba lagi.", {
									icon: "warning",
									buttons: false,
									timer: 2000,
								});
						} else if (value.status === 401) {
							swal(
								"Password anda salah. Silahkan coba lagi", {
									icon: "warning",
									buttons: false,
									timer: 2000,
								});
						} else {
							swal(
								'Berhasil! Selamat datang ' + value.name + '.', {
									icon: "success",
									buttons: false,
									timer: 2500,
								}).then((success) => {
								window.location = base_url + "dashboard"
							});
						}
					});
					login[0].reset();
				}
			});
		});

		// FORM REGISTER
		var register = $("#register");

		register.on('submit', function (e) {
			e.preventDefault();

			$.ajax({
				url: base_url + 'admin/register',
				type: 'POST',
				data: register.serialize(),
				success: function (data) {
					$.each(data, function (index, value) {
						if (value.status === 400) {
							$.notify({
								message: value.validation
							}, {
								type: 'danger',
								animate: {
									enter: 'animated fadeInDown',
									exit: 'animated fadeOutUp'
								},
							});
						} else {
							$.notify({
								message: 'Berhasil! Silahkan masuk terlebih dahulu',
								icon: 'fas fa-check-circle'
							}, {
								type: 'success',
								animate: {
									enter: 'animated fadeInDown',
									exit: 'animated fadeOutUp'
								}
							});

							$(".register").fadeOut(300, function () {
								$(".login").show();
							});
						}
					});
				}
			});
		});
	});
</script>

</html>