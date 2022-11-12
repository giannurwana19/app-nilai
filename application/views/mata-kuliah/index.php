<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">

	<title>Mahasiswa</title>

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
</head>

<body>
	<div id="cover-spin"></div>
	<?php $this->load->view('partials/navbar') ?>

	<div class="container">
		<div class="mb-3">
			<h2 class="my-3">Mata Kuliah</h2>
			<!-- <a href="<?= base_url('nilai/create') ?>" class="btn btn-primary btn-sm btn-swal">+ Mata Kuliah</a> -->
			<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#formCreateMataKuliah">
				+ Mata Kuliah
			</button>
		</div>


		<table class="table table-bordered table-hover" style="min-width: 100%;">
			<thead>
				<tr>
					<th>Kode mata kuliah</th>
					<th>Nama</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($all_mata_kuliah as $mata_kuliah) : ?>
					<tr>
						<td><?= $mata_kuliah['kode'] ?></td>
						<td><?= $mata_kuliah['nama'] ?></td>
						<td>
							<a href="#" class="btn btn-success btn-sm">Edit</a>
							<a href="#" class="btn btn-danger btn-sm btn-delete" data-id="<?= $mata_kuliah['id'] ?>">Hapus</a>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>


	<!-- Button trigger modal -->


	<!-- Modal -->
	<div class="modal fade" id="formCreateMataKuliah" tabindex="-1" aria-labelledby="formCreateMataKuliahLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="formCreateMataKuliahLabel">Tambah Mata Kuliah</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="<?= base_url('mata-kuliah/store') ?>" method="POST" id="createMataKuliah">
						<div class="form-group">
							<label for="kode">Kode Mata Kuliah</label>
							<input type="text" name="kode" class="form-control form-control-sm">
						</div>
						<div class="form-group">
							<label for="nama">Nama Mata Kuliah</label>
							<input type="text" name="nama" class="form-control form-control-sm">
						</div>

						<div class="mb-3">
							<button type="submit" class="btn btn-success btn-sm">Simpan</button>
						</div>
					</form>
				</div>
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

			$('#createMataKuliah').validate({
				rules: {
					nama: {
						required: true,
					},
					kode: {
						required: true,
					},
				},
				messages: {
					nama: {
						required: 'nama mata kuliah wajib diisi',
					},
					kode: {
						required: 'kode mata kuliah wajib diisi',
					},
				},
				submitHandler: function(form) {
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
									console.log(response);
									hideLoading();
									Swal.fire({
										title: 'Berhasil!',
										text: JSON.parse(response).message,
										icon: 'success',
										confirmButtonColor: '#3085d6',
										confirmButtonText: 'Ya',
										timer: 3000,
									}).then(() => {
										window.location.href = '<?= base_url('mata-kuliah') ?>';
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

			$('.btn-delete').on('click', function(e) {
				e.preventDefault();

				let id = $(this).data('id');
				Swal.fire({
					title: 'Konfirmasi',
					text: "Apakah Anda yakin dengan data yang dihapus?",
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
							type: 'GET',
							url: '<?= base_url('mata-kuliah/destroy/') ?>' + id,
							success: function(response) {
								hideLoading();
								Swal.fire({
									title: 'Berhasil!',
									text: JSON.parse(response).message,
									icon: 'success',
									confirmButtonColor: '#3085d6',
									confirmButtonText: 'Ya',
									timer: 3000,
								}).then(() => {
									window.location.href = '<?= base_url('mata-kuliah') ?>';
								});
							},
							error: function(err, text) {
								hideLoading();
								showSwalError(err, text)
							}
						});
					}
				});
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
