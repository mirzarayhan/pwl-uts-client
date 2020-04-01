<?= form_open('login_control/proses_login'); ?>


<div class="container py-5">
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-6 mx-auto">
                    <!-- form card login -->
                    <div class="card rounded-0">
                        <div class="card-header">
                            <h3 class="mb-0">Login</h3>
                        </div>
                        <?= $this->session->flashdata('message'); ?>
                        <div class="card-body">
                            <form class="form" role="form" autocomplete="off" id="formlogin" novalidate="" method="POST">
                                <div class="form-group">
                                    <label for="uname1">Nama</label>
                                    <input type="text" name="nama" id="nama" class="form-control form-control-lg rounded-0" required="">
                                    <div class="invalid-feedback">Oops, you missed this one.</div>
                                </div>
                                <div class="form-group">
                                    <label for="pwd1">Password</label>
                                    <input type="password" name="pass" id="pass" class="form-control form-control-lg rounded-0" required="" autocomplete="new-password">
                                    <div class="invalid-feedback">Enter your password too.</div>
                                </div>
                                <button type="submit" class="btn btn-success btn-lg float-right" id="btnLogin">Login</button>
                                <div class="text-left">
                                    <a class="small" href="<?= base_url('login_control/registration'); ?> "> Create an Account </a>
                                </div>
                            </form>
                        </div>
                        <!-- /card-block -->
                    </div>
                    <!-- /form card login -->
                    <!-- cek pesan -->
                    <div class="alert alert-info" role="alert">
                        <?php
                        if (isset($pesan)) {
                            echo $pesan;
                        } else {
                            echo "Masukkan nama dan password anda.";
                        }

                        ?>
                    </div>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /col -->
    </div>
    <!-- row -->
</div>
<!-- /container -->
<?= form_close(); ?>