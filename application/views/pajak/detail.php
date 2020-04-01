<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Detail Data Objek Pajak
                </div>
                <div class="card-body">
                    <h5 class="card-title"><?= $objekpajak['merk']; ?></h5>
                    <p class="card-text">
                        <label for=""><b> Nomor Plat    : </b></label>
                        <?= $objekpajak['nomorplat']; ?></p>
                    <p class="card-text">
                        <label for=""><b> Jenis Kendaraan   : </b></label>
                        <?= $objekpajak['jeniskendaraan']; ?></p>
                    <p class="card-text">
                        <label for=""><b> Warna     : </b></label>
                        <?= $objekpajak['warna']; ?></p>
                    <p class="card-text">
                        <label for=""><b> Tahun Manufaktur  : </b></label>
                        <?= $objekpajak['tahun']; ?></p>
                    <p class="card-text">
                        <label for=""><b> Masa STNK     : </b>Rp.</label>
                        <?= $objekpajak['masa_stnk']; ?></p>
                    <p class="card-text">
                        <label for=""><b> Besar pajak   : </b></label>
                        <?= $objekpajak['besarpajak']; ?></p>
                    <a href="<?= base_url(); ?>pajak" class="btn btn-primary">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>