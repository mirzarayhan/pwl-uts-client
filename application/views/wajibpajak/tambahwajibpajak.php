<div class="container">
	<div class="row mt-3">
		<div class="col-md-6">
			<div class="card">
				<div class="card-header">
					Form Tambah Data Wajib Pajak
				</div>
				<div class="card-body">
					<?php if (validation_errors()) : ?>
						<div class="alert alert-danger" role="alert">
							<?= validation_errors(); ?>
						</div>
					<?php endif ?>
					<form action="" method="post">
						<div class="form-group">
							<label for="nama">nama</label>
							<input type="text" class="form-control" id="nama" name="nama">
						</div>
						<div class="form-group">
							<label for="idobjekpajakfk">ID Kendaraan</label>
							<input type="text" class="form-control" id="idobjekpajakfk" name="idobjekpajakfk">
						</div>
						<div class="form-group">
							<label for="namalengkap">Nama Lengkap</label>
							<input type="text" class="form-control" id="namalengkap" name="namalengkap">
						</div>
						<div class="form-group">
							<label for="alamat">Alamat</label>
							<input type="text" class="form-control" id="alamat" name="alamat">
						</div>
						<div class="form-group">
							<label for="notelp">No telp</label>
							<input type="text" class="form-control" id="notelp" name="notelp">
						</div>
						<div class="form-group">
							<label for="password">Password</label>
							<input type="text" class="form-control" id="password" name="password">
						</div>

						<button type="submit" name="submit" class="btn btn-primary float-right"> Submit </button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>