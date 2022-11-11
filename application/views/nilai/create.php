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
			<h2 class="my-3">Tambah Mahasiswa</h2>
		</div>

		<div class="row">
			<div class="col-md-6">
				<form action="<?= base_url('mahasiswa/store') ?>" method="POST">
					<div class="form-group">
						<label for="nama">Nama</label>
						<input type="text" name="nama" class="form-control form-control-sm" required>
					</div>
					<div class="form-group">
						<label for="nim">NIM</label>
						<input type="number" name="nim" class="form-control form-control-sm" required>
					</div>
					<div class="form-group">
						<label for="jurusan">Jurusan</label>
						<select name="jurusan" id="jurusan" class="form-control" required>
							<option value="Sistem Informasi">Sistem Informasi</option>
							<option value="Teknik Informatika">Teknik Informatika</option>
							<option value="Sistem Komputer">Sistem Komputer</option>
						</select>
					</div>
					<div class="form-group">
						<label for="no_hp">No HP</label>
						<input type="number" name="no_hp" class="form-control form-control-sm" required>
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

	<script>
		$(document).ready(function() {
			$('table').DataTable();

			$('form').on('submit', function(e) {
				e.preventDefault();
				let form = $('form')[0];

				Swal.fire({
					title: 'Konfirmasi',
					text: "Apakah Anda yakin dengan data yang disimpan?",
					icon: 'question',
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
							data: new FormData(form),
							processData: false,
							contentType: false,
							success: function(response) {
								hideLoading();
								Swal.fire({
									title: 'Berhasil!',
									text: response.message,
									icon: 'success',
									confirmButtonColor: '#3085d6',
									confirmButtonText: 'Ya',
									timer: 3000,
								}).then(() => {
									window.location.href = '<?= base_url('mahasiswa') ?>';
								});
							},
							error: function(err, text) {
								hideLoading();
								showSwalError(err, err.responseJSON.message)
							}
						});
					}
				});
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
