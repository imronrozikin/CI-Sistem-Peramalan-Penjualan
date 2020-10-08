<div class="form-group-inner">
    <div class="row produk_data">
        <div class="col-lg-3">
            <label class="login2 pull-right pull-right-pro">Produk <?php echo $id ?></label>
        </div>
        <div class="col-lg-3 text-left">
            <select name="produk[<?php echo $id ?>][fk_produk]" class="form-control form-produk" onchange="reset_harga()">
                <?php foreach ($this->db->get('produk')->result() as $key => $value) : ?>
                    <option value="<?php echo $value->id ?>" data-harga="<?php echo $value->harga ?>"><?php echo $value->c_produk . " : " . $value->merk . " - " . $value->tipe . " STOK:" . $value->stok . "| RP." . $value->harga ?></option>
                <?php endforeach ?>
            </select>
        </div>
        <div class="col-lg-3 text-left">
            <input type="number" name="produk[<?php echo $id ?>][jumlah]" class="form-control form-jumlah" onchange="reset_harga()">
        </div>
        <div class="col-lg-3 text-left">
            <button type="button" onclick="$(this).parents('.form-group-inner').remove()" class="btn btn-sm btn-danger">X</button>
        </div>
    </div>
</div>