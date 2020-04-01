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
            <h2>Daftar Wajib Pajak</h2>
            <div class="row mt-3">
                <div class="col-md-6">
                    <form action="" method="post">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Cari Data Wajib Pajak" name="keyword">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit">Cari</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- alert -->
            <?php if (empty($wajibpajak)) : ?>
                <div class="alert alert-danger" role="alert">
                    Data Wajib Pajak Tidak Ditemukan
                </div>
            <?php endif; ?>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Nama</th>
                        <th scope="col">Id Objek Pajak </th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($wajibpajak as $wjbp) : ?>
                        <tr>
                            <th scope="col"> <?= $wjbp['nama']; ?></th>
                            <th scope="col"> <?= $wjbp['idobjekpajakfk']; ?></th>
                            <th scope="col">
                                <a href="<?= base_url(); ?>wajibpajak/hapus/<?= $wjbp['idnpwp']; ?>" class="badge badge-danger float-right" onclick="return confirm('Yakin Data ini akan dihapus');">hapus</a>
                                <a href="<?= base_url(); ?>wajibpajak/detail/<?= $wjbp['idnpwp']; ?>" class="badge badge-primary float-right">detail</a>
                            </th>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <div class="row mt-4">
                <div class="col-md-6">
                    <a href="<?= base_url(); ?>wajibpajak/tambah" class="btn btn-primary"> Tambah Data Wajib Pajak</a>
                </div>
            </div>

        </div>
    </div>
</div>