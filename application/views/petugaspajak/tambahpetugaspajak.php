<div class="container">
	<div class="row mt-3">
		<div class="col-md-6">
			<div class="card">
				<div class="card-header">
					Form Tambah Data Petugas Pajak
				</div>
				<div class="card-body">
					<?php if (validation_errors()):?>
						<div class="alert alert-danger" role="alert">
					<?= validation_errors();?>
				</div>
			<?php endif ?>
					<form action="" method="post">
						<div class="form-group">
							<label for="namapetugas">Nama</label>
							<input type="text" class="form-control" id="namapetugas"
							name="namapetugas">
						</div>
						<div class="form-group">
							<label for="alamat">Alamat</label>
							<input type="text" class="form-control" id="alamat" name="alamat">
						</div>
						<div class="form-group">
							<label for="notelp">No Telp</label>
							<input type="text" class="form-control" id="notelp" name="notelp">
						</div>
						<div class="form-group">
							<label for="password">Password</label>
							<input type="text" class="form-control" id="password" name="password">
						</div>
						<div class="form-group">
							<label for="level">Level</label>
							<input type="text" class="form-control" id="level" name="level">
						</div>
						<button type="submit" name="submit" class="btn btn-primary float-right"> Submit </button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>