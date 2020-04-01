<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Registrasi
                </div>
                <div class="card-body">
                    <form action="" method="post" action="<?= base_url('login_control/registration') ?>">
                        <div class="form-group">
                            <label for="nama">nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" value="<?= set_value("nama") ?>">
                            <?= form_error('nama', '<small class="text-danger pl-1",>', '</small>') ?>
                        </div>
                        <div class="form-group">
                            <label for="alamat">alamat</label>
                            <input type="text" class="form-control" id="alamat" name="alamat" value="<?= set_value("alamat") ?>">
                            <?= form_error('alamat', '<small class="text-danger pl-1",>', '</small>') ?>
                        </div>
                        <div class="form-group">
                            <label for="notelp">no telp</label>
                            <input type="text" class="form-control" id="notelp" name="notelp" value="<?= set_value("notelp") ?>">
                            <?= form_error('notelp', '<small class="text-danger pl-1",>', '</small>') ?>
                        </div>
                        <div class="form-group">
                            <label for="notelp">password</label>
                            <input type="password" class="form-control" id="password1" name="password1">
                        </div>
                        <div class="form-group">
                            <label for="notelp">repeat password</label>
                            <input type="password" class="form-control" id="password2" name="password2">
                            <?= form_error('password2', '<small class="text-danger pl-1",>', '</small>') ?>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary float-right"> Submit </button>
                        <div class="text-left">
                            <a class="small" href="<?= base_url('login_control/index'); ?> "> Already have an Account? Login!</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>