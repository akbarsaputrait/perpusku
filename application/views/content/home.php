<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Perpusku | Home</title>
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/style.css">
</head>

<body>
	<div class="loader loader-default is-active"></div>
	<div class="container">
		<div class="header">
			<div class="row">
				<div class="col-md-12 d-flex justify-content-center al-itm-cnt mt-4">
					<img src="<?php echo base_url() ?>assets/imgs/logo1.png" class="img-responsive" width="125" alt="">
				</div>
			</div>
			<div class="row">
				<div class="col-md-6 d-flex justify-content-center mt-4">
					<button type="button" class="bttn btn-lgt-blck" data-id='<?php echo $this->session->userdata("id") ?>' id="profil" data-toggle="modal"
					    data-target="#detailSiswa">Profil</button>
				</div>
				<div class="col-md-6 d-flex justify-content-center mt-4">
					<button type="button" class="bttn btn-lgt" id="logout">Logout</button>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12 d-flex justify-content-center form-group icn mt-4">
					<input type="text" name="item_search" id="" class="search inpt" placeholder="Cari judul buku, pengarang, penerbit, kategori, dan lainnya">
				</div>
			</div>
		</div>
		<div class="content mt-4 mb-4">
			<div class="row" id="list_buku">
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
									<img class="cover-book img-fluid" width="250" alt="">
								</div>
							</div>
							<div class="col-md-8">
								<div class="form-row">
									<div class="form-group col-md-4">
										<label>
											<b>Kategori</b>
										</label>
										<input type="text" class="inpt-blck" name="detail_kategori" readonly>
									</div>
									<div class="form-group col-md-8">
										<label>
											<b>Judul Buku</b>
										</label>
										<input type="text" class="inpt-blck" name="detail_judul_buku" readonly>
									</div>
								</div>
								<div class="form-row">
									<div class="form-group col-md-4">
										<label>
											<b>Kode Buku</b>
										</label>
										<input type="text" class="inpt-blck" name="detail_nomor_buku" readonly>
									</div>
									<div class="form-group col-md-5">
										<label>
											<b>Nomor ISBN</b>
										</label>
										<input type="text" class="inpt-blck" name="detail_nomor_isbn" readonly>
									</div>
									<div class="col-md-3 form-group">
										<label>
											<b>Jumlah Halaman</b>
										</label>
										<input type="text" name="detail_jumlah_hal" class="inpt-blck" readonly>
									</div>
								</div>
								<div class="form-row">
									<div class="form-group col-md-4">
										<label>
											<b>Pengarang</b>
										</label>
										<input type="text" class="inpt-blck" name="detail_pengarang" readonly>
									</div>
									<div class="form-group col-md-4">
										<label>
											<b>Penerbit</b>
										</label>
										<input type="text" class="inpt-blck" name="detail_penerbit" readonly>
									</div>
									<div class="form-group col-md-4">
										<label>
											<b>Tahun Terbit</b>
										</label>
										<input type="text" class="inpt-blck" name="detail_tahun_terbit" readonly>
									</div>
								</div>
								<div class="form-row">
									<div class="form-group col-md-4">
										<label>
											<b>Jumlah</b>
										</label>
										<input type="text" class="inpt-blck" name="detail_jumlah" readonly>
									</div>
									<div class="form-group col-md-4">
										<label>
											<b>Sisa</b>
										</label>
										<input type="text" class="inpt-blck" name="detail_sisa" readonly>
									</div>
									<div class="form-group col-md-4">
										<label>
											<b>Lemari</b>
										</label>
										<input type="text" class="inpt-blck" name="detail_lokasi" readonly>
									</div>
								</div>
								<div class="form-row">
									<div class="form-group col-md-12">
										<label>
											<b>Keterangan</b>
										</label>
										<div class="keterangan"></div>
									</div>
								</div>
								<div class="form-row">
									<div class="form-group col-md-12">
										<button type="button" class="bttn btn-block btn-dtl-scnd" data-dismiss="modal">Hide</button>
									</div>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- Pinjam -->
	<div class="modal fade" id="pinjamModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-pinjam" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Data Pinjaman</h5>
				</div>
				<div class="modal-body">
					<form id="pinjam_buku" method="post">
						<div class="form-row">
							<div class="col-md-6 form-group icn">
								<i class="fas fa-user"></i>
								<input type="text" name="pinjam_nama" class="inpt-blck disabled" placeholder="Nama Lengkap" readonly>
							</div>
							<div class="col-md-6 form-group icn">
								<i class="fas fa-graduation-cap"></i>
								<input type="text" name="pinjam_nis" class="inpt-blck disabled" placeholder="Nomor Induk Siswa" readonly>
							</div>
						</div>

						<div class="form-row">
							<div class="col-md-6 form-group">
								<input type="text" name="pinjam_kls" class="inpt-blck disabled" placeholder="Kelas" readonly>
							</div>
							<div class="col-md-6 form-group">
								<input type="text" name="pinjam_jurusan" class="inpt-blck disabled" placeholder="Jurusan" readonly>
							</div>
						</div>

						<div class="form-row">
							<div class="col-md-6 form-group icn">
								<i class="fas fa-book"></i>
								<input type="text" name="pinjam_judul" value="" placeholder="Judul Buku" class="inpt-blck disabled" readonly>
							</div>
							<div class="col-md-6 form-group">
								<input type="text" name="pinjam_kode" value="" placeholder="Nomor Buku" class="inpt-blck disabled" readonly>
							</div>
						</div>

						<div class="form-row">
							<div class="col-md-6 form-group icn">
								<i class="far fa-calendar-alt"></i>
								<div id="date">
									<input placeholder="Tanggal Peminjaman" name="pinjam_tgl_pinjam" class="inpt-blck" type="text" required>
								</div>
							</div>
							<div class="col-md-6 form-group icn">
								<i class="far fa-calendar-alt"></i>
								<div id="date">
									<input placeholder="Tanggal Pengembalian" name="pinjam_tgl_kembali" class="inpt-blck" type="text" required>
								</div>
							</div>
							<input type="hidden" name="pinjam_id_buku" value="" placeholder="Nomor Buku" class="inpt-blck disabled" readonly>
						</div>

						<div class="form-row">
							<div class="col-md-6 form-group">
								<button type="submit" class="bttn btn-block btn-dtl-prim">Pinjam</button>
							</div>
							<div class="col-md-6 form-group">
								<button type="button" class="bttn btn-block btn-dtl-scnd" data-dismiss="modal">Batal</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>

<!-- Detail Siswa -->
<div class="modal fade" id="detailSiswa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-pinjam" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Detail Siswa</h5>
				</button>
			</div>
			<div class="modal-body">
				<form id="detail_siswa">
					<div class="form-row">
						<div class="form-group col-md-12 d-flex justify-content-center al-itm-cnt">
							<img id="img_preview" width="100" style="border-radius: 50px;">
						</div>
						<div class="form-group col-md-12 d-flex justify-content-center al-itm-cnt">
							<input name="photo_profile" type="file" id="photo_profile"/>
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
<script src="<?php echo base_url() ?>assets/js/sweetalert.all.js"></script>
<script src="<?php echo base_url() ?>assets/js/aos.js"></script>
<script src="<?php echo base_url() ?>assets/ckeditor/ckeditor.js"></script>
<script src="<?php echo base_url() ?>assets/js/bootstrap-notify.min.js"></script>

<script type="text/javascript">
	$(document).ready(function () {
		AOS.init();

		var base_url = '<?php echo base_url(); ?>';
		var id_siswa = '<?php echo $this->session->userdata("id") ?>';

		function readURL(input, field) {
			if (input.files && input.files[0]) {
				var reader = new FileReader();

				reader.onload = function (e) {
					$(field).attr('src', e.target.result);
				}
				reader.readAsDataURL(input.files[0]);
			}
		}


		$(document).on("change", '#photo_profile', function () {
			readURL(this, '#img_preview');
		});

		$('div#date input').datepicker({
			changeMonth: true,
			changeYear: true,
			yearRange: '1990:2018', //set the range of years
			dateFormat: 'dd-mm-yy' //set the format of the date
		}).val();

		get_all_buku();

		function get_all_buku() {
			$.ajax({
				type: 'GET',
				url: base_url + 'home/get_all_book',
				success: function (data) {
					$("#list_buku").empty();
					$.each(data.data, function (index, value) {
						$("#list_buku").append(
							'<div data-aos="fade-up" class="col-md-4 mb-4"><div class="card"><div class="cover-book"><img src="' +
							base_url + 'upload/images/cover_buku/' + value.cover_buku +
							'" class="img-fluid" width="100" id="cover"></div><div class="card-body"><h5 class="card-title text-center">' +
							value.judul_buku +
							'</h5><div class="info"><table><tr><td><b>Pengarang</b></td><td>:</td><td>' +
							value.pengarang +
							'</td></tr><tr><td><b>Penerbit</b></td><td>:</td><td>' + value.penerbit +
							'</td></tr><tr><td><b>Tahun</b></td><td>:</td><td>' + value.tahun_terbit +
							'</td></tr><tr><td><b>Halaman</b></td><td>:</td><td>' + value.halaman +
							'</td></tr></table></div></div><div class="card-footer"><button type="button" class="bttn btn-block btn-dtl-prim" data-toggle="modal" data-id="' +
							value.id +
							'" data-target="#infobukuModal">Lihat Detail</button><button type="button" class="bttn btn-block btn-dtl-scnd pinjam" data-toggle="modal" data-target="#pinjamModal" data-id="' +
							value.id + '">Meminjam</button></div></div></div>'
						);
					});
				}
			});
		}

		// LIHAT DETAIL BUKU
		$(document).on('show.bs.modal', '#infobukuModal', function (event) {
			var button = $(event.relatedTarget),
				$modal = $(this),
				id_buku = button.data('id');

			$(".loader.loader-default.is-active").fadeIn(5);
			$(".keterangan").empty();
			// DATA BUKU
			$.ajax({
				type: 'GET',
				url: base_url + 'home/get_buku/' + id_buku,
				success: function (data) {
					$(".loader.loader-default.is-active").fadeOut(250);
					$.each(data.data, function (index, value) {
						if (value.cover_buku == null) {
							$(".cover-book").attr('src', base_url +
								'upload/images/cover_buku/cover_buku.png');
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
						$(".keterangan").append(value.keterangan);
					});
				}
			});
		});

		// UPDATE DATA SISWA
		$(document).on('submit', '#detail_siswa', function (event) {
			event.preventDefault();

			$(".loader.loader-default.is-active").fadeIn(5);

			$.ajax({
				type: 'POST',
				url: base_url + 'home/update_siswa/' + id_siswa,
				data: new FormData(this),
				processData: false,
				contentType: false,
				success: function (data) {
					$(".loader.loader-default.is-active").fadeOut(250);
					console.log(data);
					if (data.status === 200) {
						swal({
							text: 'Data berhasil diperbarui',
							type: 'success',
							showCancelButton: false,
							confirmButtonColor: '#2ecc71',
							confirmButtonText: 'OK'
						})
						$("#detailSiswa").modal('hide');
					} else if (data.status === 400) {
						$.notify(data.error, "error");
					}
				}
			});
		});

		// DATA PINJAMAN
		$(document).on('show.bs.modal', '#pinjamModal', function (event) {
			var button = $(event.relatedTarget),
				$modal = $(this),
				id_buku = button.data('id'),
				form_pinjam = $("#pinjam_buku").serialize();


			$(".loader.loader-default.is-active").fadeIn(5);

			// DATA SISWA
			$.ajax({
				type: 'GET',
				url: base_url + 'home/get_data_siswa/' + id_siswa,
				success: function (data) {
					$(".loader.loader-default.is-active").fadeOut(250);
					$.each(data.data, function (index, value) {
						$('[name="pinjam_nis"]').val(value.nis);
						$('[name="pinjam_nama"]').val(value.nama);
						$('[name="pinjam_kls"]').val(value.kelas);
						$('[name="pinjam_jurusan"]').val(value.jurusan);
					});
				}
			});

			// DATA BUKU
			$.ajax({
				type: 'GET',
				url: base_url + 'home/get_buku/' + id_buku,
				success: function (data) {
					$.each(data.data, function (index, value) {
						$('[name="pinjam_judul"]').val(value.judul_buku);
						$('[name="pinjam_kode"]').val(value.nomor_buku);
						$('[name="pinjam_id_buku"]').val(value.id);
					});
				}
			});
		});

		$(document).on('hide.bs.modal', '#pinjamModal', function () {
			$('[name="pinjam_tgl_kembali"]').val('');
			$('[name="pinjam_tgl_pinjam"]').val('');
		});


		$(document).on('submit', '#pinjam_buku', function (event) {
			event.preventDefault();

			$(".loader.loader-default.is-active").fadeIn(5);

			var id_buku = $('[name="pinjam_id_buku"]').val(),
				tgl_pinjam = $('[name="pinjam_tgl_pinjam"]').val(),
				tgl_kembali = $('[name="pinjam_tgl_kembali"]').val();


			$.ajax({
				type: 'POST',
				url: base_url + 'home/post_data_pinjam',
				data: {
					id_siswa: id_siswa,
					id_buku: id_buku,
					tgl_pinjam: tgl_pinjam,
					tgl_kembali: tgl_kembali
				},
				success: function (data) {
					$(".loader.loader-default.is-active").fadeOut(250);
					if (data.status === 200) {
						swal({
							html: '<p class="text-center">Simpan kode ini untuk konfirmasi pengambilan buku!</p>' +
								'<h3><h1><span class="badge badge-dark">' + data.kode +
								'</span></h1>',
							type: 'success',
							showCancelButton: false,
							confirmButtonColor: '#2ecc71',
							confirmButtonText: 'OK'
						}).then((result) => {
							if (result.value) {
								swal(
									'Selamat membaca!',
									'Terima kasih.',
									'success'
								);
								$('#pinjamModal').modal('hide');
							}
						})
					} else if (data.status === 400) {
						$('#pinjamModal').modal('hide');
						$.notify({
								message: data.error
							}, {
								type: 'danger',
								animate: {
									enter: 'animated fadeInDown',
									exit: 'animated fadeOutUp'
								},
							});
					}
				}
			});
		});


		$("#logout").on('click', function () {
			swal({
					title: "Anda yakin untuk keluar?",
					icon: "error",
					buttons: ["Tidak", "Iya"],
					dangerMode: true,
				})
				.then((isConfirm) => {
					if (!isConfirm) return;

					window.location = base_url + 'user/logout/';
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
				url: base_url + 'home/get_siswa/' + id,
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
		});

		$(document).on('keyup', '[name="item_search"]', function () {

			var item_search = $(this).val();

			if (item_search.length >= 3) {

				$.ajax({
					type: 'POST',
					url: base_url + 'home/search_buku',
					data: {
						item_search: item_search
					},
					success: function (data) {
						if (data.status === 200) {
							$("#list_buku").empty();
							$.each(data.data, function (index, value) {
								$("#list_buku").append(
									'<div data-aos="zoom-in" data-aos-delay="300" class="col-md-4 mb-4"><div class="card"><div class="cover-book"><img src="' +
									base_url + 'upload/images/cover_buku/' + value.cover_buku +
									'" class="img-fluid" width="100" id="cover"></div><div class="card-body"><h5 class="card-title text-center">' +
									value.judul_buku +
									'</h5><div class="info"><table><tr><td><b>Pengarang</b></td><td>:</td><td>' +
									value.pengarang +
									'</td></tr><tr><td><b>Penerbit</b></td><td>:</td><td>' + value.penerbit +
									'</td></tr><tr><td><b>Tahun</b></td><td>:</td><td>' + value.tahun_terbit +
									'</td></tr><tr><td><b>Halaman</b></td><td>:</td><td>' + value.halaman +
									'</td></tr></table></div></div><div class="card-footer"><button type="button" class="bttn btn-block btn-dtl-prim" data-toggle="modal" data-id="' +
									value.id +
									'" data-target="#infobukuModal">Lihat Detail</button><button type="button" class="bttn btn-block btn-dtl-scnd pinjam" data-toggle="modal" data-target="#pinjamModal" data-id="' +
									value.id + '">Meminjam</button></div></div></div>'
								);
							});
						}
						 else if (data.status === 404) {
							$("#list_buku").empty();
							$("#list_buku").append('<div class="col-md-12 d-flex justify-content-center"><span data-aos="fade-up"  class="alert alert-danger">Maaf buku yang ada cari tidak ditemukan. Silahkan mencari buku yang lain.</span></div>');
						}
					}
				});
			} else if (item_search == '') {
				get_all_buku();
			}
		});

		$(document).ajaxComplete(function () {
			$(".loader.loader-default.is-active").fadeOut(250);
		});
	});
</script>

</html>