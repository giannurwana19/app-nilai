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
</head>

<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light mb-3">
		<div class="container">
			<a class="navbar-brand" href="#">APP Nilai</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
				<div class="navbar-nav">
					<a class="nav-link active" href="#">Mahasiswa</span></a>
					<a class="nav-link" href="#">Mata Kuliah</a>
					<a class="nav-link" href="#">Nilai</a>
				</div>
			</div>
		</div>
	</nav>

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
				alert('oke');
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
</body>

</html>
