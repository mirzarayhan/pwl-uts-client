<div class="container">
	<div class="row mt-3">
		<div class="col-md-6">
			<div class="card">
				<div class="card-header">
					Form Edit Data Petugas Pajak
				</div>
				<div class="card-body">
					<?php if (validation_errors()):?>
						<div class="alert alert-danger" role="alert">
					<?= validation_errors();?>
				</div>
			<?php endif ?>
					<form action="" method="post">
                    <input type="hidden" name="idpetugas" value="<?= $petugaspajak['idpetugas']; ?>">
						<div class="form-group">
							<label for="namapetugas">nama petugas</label>
							<input type="text" class="form-control" 
                            id="namapetugas"
							name="namapetugas"
                            value="<?= $petugaspajak['namapetugas'];?>">
						</div>
						<div class="form-group">
							<label for="alamat">alamat</label>
							<input type="text" class="form-control" id="alamat" name="alamat"
                            value="<?= $petugaspajak['alamat'];?>">
						</div>
						<div class="form-group">
							<label for="notelp">no telp</label>
							<input type="text" class="form-control" id="notelp" name="notelp"
                            value="<?= $petugaspajak['notelp'];?>">
						</div>
						<div class="form-group">
							<label for="password">Password</label>
							<input type="password" class="form-control" id="password" name="password"
							value="<?= $petugaspajak['password']?>">
						</div>
						<div class="form-group">
							<label for="level">Level</label>
							<input type="text" class="form-control" id="level" name="level"
							value="<?= $petugaspajak['password']?>">
						</div>
						<button type="submit" name="submit" class="btn btn-primary float-right"> Submit </button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>