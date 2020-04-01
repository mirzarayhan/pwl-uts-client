<div class="container">
    <div class="row mt-3">
        <div class="col-md-10">
            <div class="row mt-3">
                <div class="col-md-6">
                    <form action="" method="post">
                        <div>
                            <h2>Daftar Pajak</h2>
                        </div>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Cari Data Objek Pajak" name="keyword">
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
                        <th scope="col" width="300px">Merek dan Tipe Kendaraan</th>
                        <th scope="col">Nomor Plat </th>
                        <th scope="col">Jenis Kendaraan</th>
                        <th scope="col" width="100px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($objekpajak as $objp) : ?>
                        <tr>
                            <th scope="col" width="200px"> <?= $objp['merk']; ?></th>
                            <th scope="col" width="200px"> <?= $objp['nomorplat']; ?></th>
                            <td scope="col"> <?= $objp['jeniskendaraan']; ?></th>
                            <td scope="col" width="200px">
                                <a href="<?= base_url(); ?>pajak/hapus/<?= $objp['idobjekpajak']; ?>" class="badge badge-danger float-right" onclick="return confirm('Yakin Data ini akan dihapus');">hapus</a>
                                <a href="<?= base_url(); ?>pajak/edit/<?= $objp['idobjekpajak']; ?>" class="badge badge-success float-right">edit</a>
                                <a href="<?= base_url(); ?>pajak/detail/<?= $objp['idobjekpajak']; ?>" class="badge badge-primary float-right">detail</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php if ($this->session->flashdata('flash-data')) : ?>
        <div class="row mt 4">
            <div class="col-md-6">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    Data Objek Pajak <strong>Berhasil</strong> <?= $this->session->flashdata('flash-data'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <div class="row mt-4">
        <div class="col-md-6">
            <a href="<?= base_url(); ?>pajak/tambah" class="btn btn-primary"> Tambah Data</a>
        </div>
    </div>
</div>