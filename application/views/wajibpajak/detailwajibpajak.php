<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Detail Data Wajib Pajak
                </div>
                <div class="card-body">
                    <h5 class="card-title"><?= $wajibpajak['nama']; ?></h5>
                    <p class="card-text">
                        <label for=""><b> Nama Lengkap : </b></label>
                        <?= $wajibpajak['namalengkap']; ?></p>
                    <p class="card-text">
                        <label for=""><b> Alamat : </b></label>
                        <?= $wajibpajak['alamat']; ?></p>
                    <p class="card-text">
                        <label for=""><b> No Telp : </b></label>
                        <?= $wajibpajak['notelp']; ?></p>
                    <p class="card-text">
                        <label for=""><b> Id Objek Pajak: </b></label>
                        <?= $wajibpajak['idobjekpajakfk']; ?></p>
                    
                    <a href="<?= base_url(); ?>wajibpajak/indexwajibpajak" class="btn btn-primary">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>