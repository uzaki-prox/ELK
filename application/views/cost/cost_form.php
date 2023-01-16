<form action="<?php echo $action; ?>" method="post">
    <div class="form-group">
        <label for="varchar">No Tagihan <?php echo form_error('no_bill') ?></label>
        <input type="text" class="form-control" name="no_bill" id="no_bill" placeholder="No Tagihan" value="<?php echo $no_bill; ?>" />
    </div>
    <div class="form-group">
        <label for="varchar">No Delegasi <?php echo form_error('no_delegation') ?></label>
        <select name="no_delegation" class="form-control">
            <?php
            $sql1 = $this->db->get('sub_delegation');
            foreach ($sql1->result() as $row) { ?>
            <option value="<?php echo $row->no_delegation ?>" <?php echo ($no_delegation == $row->no_delegation) ? 'selected' : '' ?>><?php echo $row->no_delegation ?></option>
            <?php } ?>
        </select>
    </div>
    <div class="form-group">
        <label for="varchar">Pembimbing <?php echo form_error('choach') ?></label>
        <select name="choach" class="form-control">
            <?php
            $sql2 = $this->db->get('users');
            foreach ($sql2->result() as $row) { ?>
            <option value="<?php echo $row->choach ?>" <?php echo ($choach == $row->niy) ? 'selected' : '' ?>><?php echo $row->name ?></option>
            <?php } ?>
        </select>
    </div>
    <div class="form-group">
        <label for="varchar">Detail <?php echo form_error('detail') ?></label>
        <input type="text" class="form-control" name="detail" id="detail" placeholder="Detail" value="<?php echo $detail; ?>" />
    </div>
    <div class="form-group">
        <label for="varchar">Jumlah <?php echo form_error('amount') ?></label>
        <input type="text" class="form-control" name="amount" id="amount" placeholder="Jumlah" value="<?php echo $amount; ?>" />
    </div>
    <div class="form-group">
        <label for="varchar">Keterangan <?php echo form_error('descript') ?></label>
        <input type="text" class="form-control" name="descript" id="descript" placeholder="Keterangan" value="<?php echo $descript; ?>" />
    </div>

    <button type="submit" class="btn btn-primary"><?php echo $button; ?></button> 
    <a href="<?php echo site_url('companion') ?>" class="btn btn-default">Cancel</a>
</form>