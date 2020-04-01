<div class="container">
    <?php if ($this->session->flashdata('flash-data')) : ?>
        <div class="row mt 4">
            <div class="col-md-6">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    Data Petugas Pajak <strong>Berhasil</strong> <?= $this->session->flashdata('flash-data'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <div class="row mt-3">
        <div class="col-md-6">
            <h2>Daftar Petugas Pajak</h2>
            <div class="row mt-3">
        <div class="col-md-6">
            <form action="" method="post">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Cari Data Petugas Pajak" name="keyword">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">Cari</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Nama Petugas</th>
                        <th scope="col">Alamat </th>
                        <th scope="col">Nomor Telepon</th>
                        <th scope="col">CRUD</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($petugaspajak as $ptgp) : ?>
                        <tr>
                            <th scope="col"> <?= $ptgp['namapetugas']; ?></th>
                            <th scope="col"> <?= $ptgp['alamat']; ?></th>
                            <td scope="col"> <?= $ptgp['notelp']; ?></th>
                            <th scope="col">
                                <a href="<?= base_url(); ?>petugaspajak/hapus/<?= $ptgp['idpetugas']; ?>" class="badge badge-danger float-right" onclick="return confirm('Yakin Data ini akan dihapus');">hapus</a>
                            </th>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <div class="row mt-4">
                <div class="col-md-6">
                    <a href="<?= base_url(); ?>petugaspajak/tambah" class="btn btn-primary"> Tambah Data Petugas Pajak</a>
                </div>
            </div>
        </div>
    </div>
</div>