<div class="form-group-inner">
    <div class="row">
        <div class="col-lg-3">
            <label class="login2 pull-right pull-right-pro">Produk <?php echo $id ?></label>
        </div>
        <div class="col-lg-3 text-left">
            <select name="produk[<?php echo $id ?>][fk_produk]" class="form-control">
                <?php foreach ($this->db->get('produk')->result() as $key => $value): ?>
                <option value="<?php echo $value->id ?>"><?php echo $value->c_produk." : ".$value->merk." - ".$value->tipe." STOK:".$value->stok ?></option>
            <?php endforeach ?>
        </select>
    </div>
    <div class="col-lg-3 text-left">
        <input type="number" name="produk[<?php echo $id ?>][jumlah]" class="form-control">
    </div>
    <div class="col-lg-3 text-left">
        <button type="button" onclick="$(this).parents('.form-group-inner').remove()" class="btn btn-sm btn-danger">X</button>
    </div>
</div>
</div>