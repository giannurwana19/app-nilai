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
	<?php $this->load->view('partials/navbar') ?>

	<div class="container">
		<div class="mb-3">
			<h2 class="my-3">Daftar Mahasiswa</h2>
			<a href="<?= base_url('mahasiswa/create') ?>" class="btn btn-primary btn-sm">+ Mahasiswa</a>
		</div>

		<table class="table table-bordered" style="min-width: 100%;">
			<thead>
				<tr>
					<th>No</th>
					<th>Nama</th>
					<th>Jurusan</th>
					<th>No Hp</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($all_mahasiswa as $mahasiswa) : ?>
					<tr>
						<td><?= $mahasiswa['nama'] ?></td>
						<td><?= $mahasiswa['nim'] ?></td>
						<td><?= $mahasiswa['jurusan'] ?></td>
						<td><?= $mahasiswa['no_hp'] ?></td>
						<td>
							<a href="#" class="btn btn-success btn-sm">Edit</a>
							<a href="#" class="btn btn-danger btn-sm">Hapus</a>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>

	<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
	<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

	<script>
		$(document).ready(function() {
			$('table').DataTable();

			$('.btn-swal').on('click', function() {
				Swal.fire({
					title: 'Error!',
					text: 'Do you want to continue',
					icon: 'error',
					confirmButtonText: 'Cool'
				})
			})
		});
	</script>
</body>

</html>
