<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">

	<style>
		.is-invalid+.select2-container--bootstrap4 .select2-selection--single {
			border: 2px solid #dc3545 !important;
		}

		#cover-spin {
			position: fixed;
			width: 100%;
			left: 0;
			right: 0;
			top: 0;
			bottom: 0;
			background-color: rgba(255, 255, 255, 0.7);
			z-index: 9999;
			display: none;
		}

		@-webkit-keyframes spin {
			from {
				-webkit-transform: rotate(0deg);
			}

			to {
				-webkit-transform: rotate(360deg);
			}
		}

		@keyframes spin {
			from {
				transform: rotate(0deg);
			}

			to {
				transform: rotate(360deg);
			}
		}

		#cover-spin::after {
			content: '';
			display: block;
			position: absolute;
			left: 48%;
			top: 40%;
			width: 40px;
			height: 40px;
			border-style: solid;
			border-color: black;
			border-top-color: transparent;
			border-width: 4px;
			border-radius: 50%;
			-webkit-animation: spin .8s linear infinite;
			animation: spin .8s linear infinite;
			z-index: 999;
		}
	</style>

	<title>Mahasiswa</title>
</head>

<body>
	<div id="cover-spin"></div>
	<?php $this->load->view('partials/navbar') ?>

	<div class="container">
		<div class="mb-3">
			<h2 class="my-3">Nilai Mahasiswa</h2>
		</div>

		<div class="row">
			<div class="col-md-6">
				<form action="<?= base_url('nilai/store') ?>" method="POST">
					<div class="form-group">
						<label for="id_mahasiswa">Nama Mahasiswa</label>
						<select name="id_mahasiswa" id="id_mahasiswa" class="form-control form-control-sm">
							<option value="">Pilih Mahasiswa</option>
							<?php foreach ($all_mahasiswa as $mahasiswa) : ?>
								<option value="<?= $mahasiswa['id'] ?>"><?= $mahasiswa['nama'] ?></option>
							<?php endforeach ?>
						</select>
					</div>

					<div class="form-group">
						<label for="id_mahasiswa">Mata Kuliah</label>
						<select name="id_mata_kuliah" id="id_mata_kuliah" class="form-control form-control-sm">
							<option value="">Pilih Mata Kuliah</option>
							<?php foreach ($all_mata_kuliah as $mata_kuliah) : ?>
								<option value="<?= $mata_kuliah['id'] ?>"><?= $mata_kuliah['nama'] ?></option>
							<?php endforeach ?>
						</select>
					</div>

					<div class="form-group">
						<label for="kehadiran">Kehadiran</label> <small class="text-danger font-weight-bold" style="font-size: 10px">* (dari 14 pertemuan)</small>
						<input type="number" name="kehadiran" class="form-control form-control-sm">
					</div>

					<div class="form-group">
						<label for="nilai_tugas">Nilai Tugas</label>
						<input type="number" name="nilai_tugas" class="form-control form-control-sm">
					</div>
					<div class="form-group">
						<label for="nilai_uts">Nilai UTS</label>
						<input type="number" name="nilai_uts" class="form-control form-control-sm">
					</div>

					<div class="form-group">
						<label for="nilai_uas">Nilai UAS</label>
						<input type="number" name="nilai_uas" class="form-control form-control-sm">
					</div>

					<button type="submit" class="btn btn-primary btn-sm">Simpan</button>
				</form>
			</div>
		</div>
	</div>

	<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
	<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>

	<script>
		$(document).ready(function() {
			$('table').DataTable();

			$('form').validate({
				rules: {
					kehadiran: {
						required: true,
					},
					nilai_tugas: {
						required: true,
					},
					nilai_uts: {
						required: true,
					},
					nilai_uas: {
						required: true
					}
				},
				messages: {
					kehadiran: {
						required: 'kehadiran wajib diisi',
					},
					nilai_tugas: {
						required: 'nilai tugas wajib diisi',
					},
					nilai_uts: {
						required: 'nilai UTS wajib diisi',
					},
					nilai_uas: {
						required: 'nilai UAS wajib diisi'
					}
				},
				submitHandler: function(form) {
					let id_mahasiswa = $('[name=id_mahasiswa]').val();
					let id_mata_kuliah = $('[name=id_mata_kuliah]').val();
					let raw_kehadiran = parseInt($('[name=kehadiran]').val() ?? 0);
					let raw_nilai_tugas = parseInt($('[name=nilai_tugas]').val() ?? 0);
					let raw_nilai_uts = parseInt($('[name=nilai_uts]').val() ?? 0);
					let raw_nilai_uas = parseInt($('[name=nilai_uas]').val() ?? 0);
					let kehadiran = (parseInt($('[name=kehadiran]').val() ?? 0) / 14) * 100 * 0.1;
					let nilai_tugas = parseInt($('[name=nilai_tugas]').val() ?? 0) * 0.2;
					let nilai_uts = parseInt($('[name=nilai_uts]').val() ?? 0) * 0.3;
					let nilai_uas = parseInt($('[name=nilai_uas]').val() ?? 0) * 0.4;
					let nilai_akhir = Math.round(kehadiran + nilai_tugas + nilai_uts + nilai_uas);
					let title = 'Konfirmasi';
					let text = 'Apakah anda yakin dengan data nilai yang disimpan?';
					let icon = 'question';

					if (nilai_akhir >= 80 && nilai_akhir <= 100) {
						grade = 'A';
					} else if (nilai_akhir >= 70 && nilai_akhir <= 79) {
						grade = 'B';
					} else if (nilai_akhir >= 60 && nilai_akhir <= 69) {
						grade = 'C';
						title = 'Perhatian!';
						text = `Grade nilai anda ${grade}, yakin simpan?`;
						icon = 'warning';
					} else if (nilai_akhir >= 50 && nilai_akhir <= 59) {
						grade = 'D';
						title = 'Perhatian!';
						text = `Grade nilai anda ${grade}, yakin simpan?`;
						icon = 'warning';
					} else if (nilai_akhir >= 0 && nilai_akhir <= 49) {
						grade = 'E';
						title = 'Perhatian!';
						text = `Grade nilai anda ${grade}, yakin simpan?`;
						icon = 'warning';
					} else {
						grade = 'E';
						title = 'Perhatian!';
						text = `Grade nilai anda ${grade}, yakin simpan?`;
						icon = 'warning';
					}

					let formData = {
						id_mahasiswa,
						id_mata_kuliah,
						kehadiran: raw_kehadiran,
						nilai_tugas: raw_nilai_tugas,
						nilai_uts: raw_nilai_uts,
						nilai_uas: raw_nilai_uas,
						nilai_akhir,
						grade
					};

					Swal.fire({
						title,
						text,
						icon,
						showCancelButton: true,
						confirmButtonColor: '#3085d6',
						confirmButtonText: 'Ya',
						cancelButtonColor: '#d33',
						cancelButtonText: 'Tidak',
					}).then((result) => {
						if (result.value) {
							showLoading();
							$.ajax({
								type: form.method,
								url: form.action,
								data: formData,
								dataType: 'json',
								success: function(response) {
									hideLoading();
									Swal.fire({
										title: 'Berhasil!',
										text: response.message,
										icon: 'success',
										confirmButtonColor: '#3085d6',
										confirmButtonText: 'Ya',
									}).then(() => {
										window.location.href = '<?= base_url('nilai') ?>';
									});
								},
								error: function(err, text) {
									hideLoading();
									showSwalError(err, err.responseJSON.message)
								}
							});
						}
					});
				},
				errorElement: 'span',
				errorPlacement: function(error, element) {
					error.addClass('invalid-feedback');
					element.closest('.form-group').append(error);
				},
				highlight: function(element, errorClass, validClass) {
					$(element).addClass('is-invalid');
				},
				unhighlight: function(element, errorClass, validClass) {
					$(element).removeClass('is-invalid');
				}
			});

			$('.btn-swal').on('click', function() {
				Swal.fire({
					title: 'Error!',
					text: 'Do you want to continue',
					icon: 'error',
					confirmButtonText: 'Cool'
				})
			});
		});
	</script>

	<script>
		function showLoading() {
			$('#cover-spin').show();
		}

		function hideLoading() {
			$('#cover-spin').hide();
		}

		function showSwalError(err, text) {
			console.log(err, text)
			Swal.fire({
				icon: 'error',
				title: 'Opss...',
				text: text ?? 'Gagal memproses data, terjadi kesalahan',
				showConfirmButton: true,
				timer: 3000,
			});
		}
	</script>
</body>

</html>
