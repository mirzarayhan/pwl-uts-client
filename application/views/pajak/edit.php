<div class="container">
	<div class="row mt-3">
		<div class="col-md-6">
			<div class="card">
				<div class="card-header">
					Form Edit Data Objek Pajak
				</div>
				<div class="card-body">
					<?php if (validation_errors()) : ?>
						<div class="alert alert-danger" role="alert">
							<?= validation_errors(); ?>
						</div>
					<?php endif ?>
					<form action="" method="post">
						<input type="hidden" name="idobjekpajak" value="<?= $objekpajak['idobjekpajak']; ?>">
						<div class="form-group">
							<label for="merk">Merk</label>
							<input type="text" class="form-control" id="merk" name="merk" value="<?= $objekpajak['merk']; ?>">
						</div>
						<div class="form-group">
							<label for="noplat">Nomor Plat</label>
							<input type="text" class="form-control" id="noplat" name="noplat" value="<?= $objekpajak['nomorplat']; ?>">
						</div>
						<div class="form-group">
							<label for="jeniskendaraan">jenis kendaraan</label>
							<select class="form-control" id="jeniskendaraan" name="jeniskendaraan">
								<?php foreach ($jeniskendaraan as $key) : ?>
									<?php if ($key == $objekpajak['jeniskendaraan']) : ?>
										<option value="<?= $key ?>" selected<?= $key ?>></option>
									<?php else : ?>
										<option value="<?= $key ?>"><?= $key ?></option>
									<?php endif; ?>
								<?php endforeach; ?>
								<!--<option selected>-----</option>
								<option value="kimia">Kimia</option>
								<option value="informatika">Informatika</option>
								<option value="mesin">Mesin</option> -->
							</select>
						</div>
						<div class="form-group">
							<label for="warna">Warna</label>
							<input type="text" class="form-control" id="warna" name="warna" value="<?= $objekpajak['warna']; ?>">
						</div>
						<div class="form-group">
							<label for="tahun">Tahun Manufaktur</label>
							<input type="text" class="form-control" id="tahun" name="tahun" value="<?= $objekpajak['tahun']; ?>">
						</div>
						<div class="form-group">
							<label for="masa_stnk">Masa STNK</label>
							<input type="text" class="form-control" id="masa_stnk" name="masa_stnk" value="<?= $objekpajak['masa_stnk']; ?>">
						</div>
						<div class="form-group">
							<label for="besarpajak">besar pajak</label>
							<input type="text" class="form-control" id="besarpajak" name="besarpajak" value="<?= $objekpajak['besarpajak']; ?>">
						</div>
						<button type="submit" name="submit" class="btn btn-primary float-right"> Submit </button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>