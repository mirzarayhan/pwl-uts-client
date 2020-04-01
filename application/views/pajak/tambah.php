<div class="container">
	<div class="row mt-3">
		<div class="col-md-6">
			<div class="card">
				<div class="card-header">
					Form Tambah Data Objek Pajak
				</div>
				<div class="card-body">
					<?php if (validation_errors()):?>
						<div class="alert alert-danger" role="alert">
					<?= validation_errors();?>
				</div>
			<?php endif ?>
					<form action="" method="post">
						<div class="form-group">
							<label for="merk">Merk</label>
							<input type="text" class="form-control" id="merk"
							name="merk">
						</div>
						<div class="form-group">
							<label for="noplat">Nomor Plat</label>
							<input type="text" class="form-control" id="noplat" name="noplat">
						</div>
						<div class="form-group">
							<label for="jeniskendaraan">Jenis Kendaraan</label>
							<select class="form-control" id="jeniskendaraan" name="jeniskendaraan">
							<?php foreach($jeniskendaraan as $key): ?>
                                    <option 
									value="<?= $key ?>" 
                                    selected><?= $key ?>
									</option>
                                <?php endforeach; ?>
							</select>
						</div>
						<div class="form-group">
							<label for="warna">Warna</label>
							<input type="text" class="form-control" id="warna" name="warna">
						</div>
						<div class="form-group">
							<label for="tahun">Tahun Manufaktur</label>
							<input type="text" class="form-control" id="tahun" name="tahun">
						</div>
						<div class="form-group">
							<label for="masa_stnk">Masa STNK</label>
							<input type="text" class="form-control" id="masa_stnk" name="masa_stnk">
						</div>
						<div class="form-group">
							<label for="besarpajak">Besar Pajak</label>
							<input type="text" class="form-control" id="besarpajak" name="besarpajak">
						</div>
						<button type="submit" name="submit" class="btn btn-primary float-right"> Submit </button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>