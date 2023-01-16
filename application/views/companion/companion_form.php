<form action="<?php echo $action; ?>" method="post">
    <div class="form-group">
        <label for="varchar">ID Pembimbing <?php echo form_error('id_companion') ?></label>
        <input type="text" class="form-control" name="id_companion" id="id_companion" placeholder="ID Pembimbing" value="<?php echo $id_companion; ?>" />
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
        <label for="varchar">Lomba <?php echo form_error('no_contest') ?></label>
        <select name="no_contest" class="form-control">
            <?php
            $sql2 = $this->db->get('contest');
            foreach ($sql2->result() as $row) { ?>
            <option value="<?php echo $row->no_contest ?>" <?php echo ($no_contest == $row->no_contest) ? 'selected' : '' ?>><?php echo $row->name_contest ?></option>
            <?php } ?>
        </select>
    </div>
    <div class="form-group">
        <label for="varchar">Nama Pembimbing <?php echo form_error('niy') ?></label>
        <select name="niy" class="form-control">
            <?php
            $sql3 = $this->db->get('users');
            foreach ($sql3->result() as $row) { ?>
            <option value="<?php echo $row->niy ?>" <?php echo ($niy == $row->niy) ? 'selected' : '' ?>><?php echo $row->name ?></option>
            <?php } ?>
        </select>
    </div>
    <div class="form-group">
        <label for="varchar">Keterangan <?php echo form_error('descript') ?></label>
        <input type="text" class="form-control" name="descript" id="descript" placeholder="Keterangan" value="<?php echo $descript; ?>" />
    </div>

    <button type="submit" class="btn btn-primary"><?php echo $button; ?></button> 
    <a href="<?php echo site_url('companion') ?>" class="btn btn-default">Cancel</a>
</form>