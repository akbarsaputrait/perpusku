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
				<div class="col-md-2" role="tablist">
					<div class="list-group">
						<a data-toggle="tab" href="#profile" role="tab" class="list-group-item active">Profile</a>
						<a data-toggle="tab" href="#setting" role="tab" class="list-group-item">Account Setting</a>
						<a data-toggle="tab" href="#password" role="tab" class="list-group-item">Change Password</a>
					</div>
				</div>
				<div class="col-md-10">
					<div class="tab-content" style="border: none; color: black !important;">
						<div class="tab-pane fade show active" id="profile" role="tabpanel" style="padding: 0;">
							<div class="card">
								<div class="card-header bg-light">
									<div>Profile Information</div>
								</div>
								<div class="card-body">
									<div class="container">
										<div class="row mb-5">
											<div class="col-md-12 d-flex justify-content-center al-itm-cnt">
												<div class="profile"></div>
											</div>
										</div>
										<div class="row d-flex justify-content-center">
											<div class="col-md-6">
												<form id="form_admin">
													<div class="form-group row">
														<label for="" class="col-sm-4 col-form-label">Username</label>
														<div class="col-sm-8">
															<input type="text" readonly class="form-control" id="username">
														</div>
													</div>
													<div class="form-group row">
														<label for="" class="col-sm-4 col-form-label">Email</label>
														<div class="col-sm-8">
															<input type="email" readonly class="form-control" id="email">
														</div>
													</div>
													<div class="form-group row">
														<label for="" class="col-sm-4 col-form-label">Name</label>
														<div class="col-sm-8">
															<input type="text" readonly class="form-control" id="name">
														</div>
													</div>
												</form>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="tab-pane fade" id="setting" role="tabpanel" style="border: none; padding: 0;">
							<div class="card" id="profile">
								<div class="card-header bg-light">
									Account Setting
								</div>
								<div class="card-body">
									<div class="row mb-5">
										<div class="col-md-12">
											<form id="update_admin">
												<div class="form-group row">
													<label for="" class="col-sm-4 col-form-label">Username</label>
													<div class="col-sm-8">
														<input type="text" class="form-control" name="username" id="username1">
													</div>
												</div>
												<div class="form-group row">
													<label for="" class="col-sm-4 col-form-label">Email</label>
													<div class="col-sm-8">
														<input type="email" class="form-control" name="email" id="email1">
													</div>
												</div>
												<div class="form-group row">
													<label for="" class="col-sm-4 col-form-label">Name</label>
													<div class="col-sm-8">
														<input type="text" class="form-control" name="name" id="name1">
													</div>
												</div>
												<div class="form-group row">
													<div class="col-md-12">
														<button type="submit" class="btn btn-primary btn-block">Update</button>
													</div>
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="tab-pane fade" id="password" role="tabpanel" style="border: none; padding: 0;">
							<div class="card" id="profile">
								<div class="card-header bg-light">
									Change Password
								</div>
								<div class="card-body">
									<div class="row mb-5">
										<div class="col-md-12">
											<form id="change_password">
												<div class="form-group row">
													<label for="" class="col-sm-4 col-form-label">Current Pasword</label>
													<div class="col-sm-8">
														<input type="password" class="form-control" name="current_password">
													</div>
												</div>
												<div class="form-group row">
													<label for="" class="col-sm-4 col-form-label">New Password</label>
													<div class="col-sm-8">
														<input type="password" class="form-control" name="new_password">
													</div>
												</div>
												<div class="form-group row">
													<label for="" class="col-sm-4 col-form-label">Re-enter Password</label>
													<div class="col-sm-8">
														<input type="password" class="form-control" name="confirm_password">
													</div>
												</div>
												<div class="form-group row">
													<div class="col-md-12">
														<button type="submit" class="btn btn-primary btn-block">Update Password</button>
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
	</div>
</body>
<!-- Modal -->
<div class="modal fade" id="change_photo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document" style="position: relative; top: 6rem;">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Ganti Foto</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body" class="d-flex justify-content-center">
				<form action="" method="post" id="form_photo">
					<div class="form-row">
						<div class="col-md-12 d-flex justify-content-center">
							<div class="form-group">
								<label for="">Impor foto</label>
								<input type="file" name="photo_profile" id="img_profile" class="form-control" required>
								<small class="form-text text-muted">Lebar maksimal adalah 1200px.</small>
							</div>
						</div>
					</div>
					<div class="form-row">
						<div class="col-md-12 d-flex justify-content-center al-itm-cnt">
							<div class="form-group">
								<img id="img_preview" width="100" style="border-radius: 50px;">
							</div>
						</div>
					</div>
					<div class="form-row">
						<div class="col-md-12 d-flex justify-content-center">
							<div class="form-group" id="btn">
								<input type="submit" value="Save Change" class="btn btn-primary">
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<script src="<?php echo base_url() ?>assets/js/jquery.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/sweetalert.min.js"></script>

<script type="text/javascript">
	$(document).ready(function () {
		var base_url = '<?php echo base_url() ?>',
			id_admin = '<?php echo $this->session->userdata("id") ?>';

		function readURL(input) {
			if (input.files && input.files[0]) {
				var reader = new FileReader();

				reader.onload = function (e) {
					$('#img_preview').attr('src', e.target.result);
				}

				reader.readAsDataURL(input.files[0]);
			}
		}

		function readURL(input, field) {
			if (input.files && input.files[0]) {
				var reader = new FileReader();

				reader.onload = function (e) {
					$(field).attr('src', e.target.result);
				}

				reader.readAsDataURL(input.files[0]);
			}
		}

		$(document).on('change', '#img_profile', function () {
			readURL(this, '#img_preview');
		});

		$(document).on('submit', '#form_photo', function (event) {
			event.preventDefault();

			var form = new FormData(this);

			$.ajax({
				type: 'POST',
				url: base_url + 'profile/post_photo/' + id_admin,
				data: form,
				processData: false,
				contentType: false,
				cache: false,
				async: false,
				success: function (data) {
					if (data.status === 200) {
						swal(
							"Photo berhasil diperbarui", {
								icon: "success",
								buttons: false,
								timer: 2500,
							});
							$("#change_photo").modal('hide');
							get_data_admin();
					} else if (data.status === 400) {
						swal(
							"Photo gagal diperbarui", {
								icon: "warning",
								buttons: false,
								timer: 2500,
							});
					}
				}
			});
		});

		$(document).on('hide.bs.modal', '#change_photo', function () {
			$("#img_profile").val('');
		});

 		get_data_admin();
		function get_data_admin() {
			$('#img_preview').attr('src', '');
			$("#username").val('');
			$("#email").val('');
			$("#name").val('');
			$(".profile").empty();
			$("#username1").val('');
			$("#email1").val('');
			$("#name1").val('');
			$.ajax({
				type: 'GET',
				url: base_url + 'profile/get_admin/' + id_admin,
				success: function (data) {
					$("#username").val(data.data.username);
					$("#email").val(data.data.email);
					$("#name").val(data.data.nama);

					$('#img_preview').attr('src', base_url + 'upload/images/photo_profile/' + data.data.photo_profile);
					$(".profile").append('<a href="" data-toggle="modal" data-target="#change_photo"><img src="' + base_url +
						'upload/images/photo_profile/' + data.data.photo_profile +
						'" width="100" alt="" style="border-radius: 50px;"></a>')

					$("#username1").val(data.data.username);
					$("#email1").val(data.data.email);
					$("#name1").val(data.data.nama);
				}
			});
		}

		var form_update = $("#update_admin");

		form_update.on('submit', function (event) {
			event.preventDefault();

			$.ajax({
				type: 'POST',
				url: base_url + 'profile/update_data/' + id_admin,
				data: form_update.serialize(),
				success: function (data) {
					if (data.status === 200) {
						swal(
							"Data berhasil diperbarui", {
								icon: "success",
								buttons: false,
								timer: 2500,
							});
					} else if (data.status === 400) {
						swal(
							"Data gagal diperbarui", {
								icon: "warning",
								buttons: false,
								timer: 2500,
							});
					}
				}
			});
		});

		var change_password = $("#change_password");

		change_password.on('submit', function (event) {
			event.preventDefault();

			$.ajax({
				url: base_url + 'profile/update_password/' + id_admin,
				type: 'POST',
				data: change_password.serialize(),
				success: function (data) {
					if (data.status === 200) {
						swal(
							"Password berhasil diperbarui", {
								icon: "success",
								buttons: false,
								timer: 2500,
							});
						change_password.trigger("reset");
					} else if (data.status === 401) {
						swal(
							"Password yang dimasukan tidak sama.", {
								icon: "warning",
								buttons: false,
								timer: 2500,
							});
					} else if (data.status === 400) {
						swal(
							"Password gagal diperbarui.", {
								icon: "warning",
								buttons: false,
								timer: 2500,
							});
					} else if (data.status === 409) {
						swal(
							"Password yang anda masukan salah.", {
								icon: "warning",
								buttons: false,
								timer: 2500,
							});
					}
				}
			});
		});

	});
</script>

</html>