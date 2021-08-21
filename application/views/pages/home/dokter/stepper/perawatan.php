<div class="card">
    <div class="mx-4">
        <h4 class="mt-4">Perawatan</h4>
        <div class="line my-3"></div>
        <div class="form-group">
            <label for="perawatan">Perawatan / Tindakan</label>
            <div class="row bg-light py-2 mb-1">
                <div class="col"><b>Elemen Gigi</b></div>
                <div class="col"><b>Tindakan</b></div>
                <div class="col"><b>Detail Tindakan</b></div>
                <div class="col"><b>Jumlah</b></div>
                <div class="col"><b>Harga Satuan</b></div>
                <div class="col"><b>Subtotal</b></div>
            </div>
            <div class="row">
                <div class="col">
                    <input type="text" name="elemen_gigi" id="" class="form-control">
                </div>
                <div class="col">
                    <select class="select2bs4" name="tindakan" id="tindakan" style="width: 100%;">
                        <option><?= "Pilih Tindakan" ?></option>
                        <?php foreach ($layanan as $l) : ?>
                            <option value="<?= $l['harga']; ?>" data-id="<?= $l['id_layanan'];?>">
                                <?= $l['layanan']; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <input type="hidden" name="id-layanan" id="id-layanan">
                </div>
                <div class="col">
                    <input type="text" name="detail-layanan" id="" class="form-control" autocomplete="off">
                </div>
                <div class="col">
                    <input type="text" name="jml-gigi" id="jml-gigi" class="form-control" placeholder="Jumlah Gigi">
                </div>
                <div class="col">
                    <span class="satuan">Rp. 0,-</span>
                </div>
                <div class="col">
                    <span class="subtotal">Rp. 0.-</span>
                </div>
            </div>
            <div class="row bg-light py-2 my-1">
                <div class="col-2"><b>Total</b></div>
                <div class="col-8"></div>
                <div class="col-2"><b class="subtotal">0</b></div>
                <input type="hidden" name="subtotal" class="subtotal">
            </div>
            <div class="row mt-3">
                <div class="col-2">
                    <b>Discount / Coupon</b>
                </div>
                <div class="col-5">
                    <select class="select2bs4" name="diskon" id="diskon" style="width: 100%;">
                        <option><?= "Pilih Discount" ?></option>
                        <?php foreach ($diskon as $d) : ?>
                            <option value="<?= $d['nilai_diskon']; ?>"><?= $d['nama_diskon']; ?> </option>
                        <?php endforeach; ?>
                    </select>
                    <input type="hidden" name="id-diskon" id="id-diskon">
                </div>
                <div class="col-3"></div>
                <div class="col-2"><b>-</b><b class="nilai-diskon">0</b></div>
            </div>
            <div class="row bg-danger py-3 mt-2">
                <div class="col-2"><b>Grand Total</b></div>
                <div class="col-8"></div>
                <div class="col-2"><b class="grandtotal">0</b></div>
                <input type="hidden" name="grandtotal" class="grandtotal">
            </div>
        </div>
    </div>
</div>
<button type="button" class="btn btn-secondary" onclick="stepper.previous()">Back</button>
<button type="button" class="btn btn-primary btn-hitung-bayar" onclick="stepper.next()" disabled>Next</button>