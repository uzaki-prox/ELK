<form action="<?php echo $action; ?>" method="post">
    <div class="form-group">
        <label for="varchar">No Delegasi <?php echo form_error('no_delegation') ?></label>
        <input type="text" class="form-control" name="no_delegation" id="no_delegation" value="<?php echo $no_delegation; ?>" readonly />
    </div>
    <div class="form-group">
        <label for="varchar">Unit <?php echo form_error('id_unit') ?></label>
        <select name="unit" class="form-control">
            <?php
            $sql1 = $this->db->get('unit');
            foreach ($sql1->result() as $row) { ?>
            <option value="<?php echo $row->id_unit ?>" <?php echo ($id_unit == $row->id_unit) ? 'selected' : '' ?>><?php echo $row->name_unit ?></option>
            <?php } ?>
        </select>
    </div>
    <div class="form-group">
        <label for="varchar">Pembimbing <?php echo form_error('choach') ?></label>
        <select name="choach" class="form-control">
            <?php
            $sql2 = $this->db->get('users');
            foreach ($sql2->result() as $row) { ?>
            <option value="<?php echo $row->niy ?>" <?php echo ($choach == $row->niy) ? 'selected' : '' ?>><?php echo $row->name ?></option>
            <?php } ?>
        </select>
    </div>
    <div class="form-group">
        <label for="varchar">Lomba <?php echo form_error('no_contest') ?></label>
        <select name="no_contest" class="form-control">
            <?php
            $sql3 = $this->db->get('contest');
            foreach ($sql3->result() as $row) { ?>
            <option value="<?php echo $row->no_contest ?>" <?php echo ($no_contest == $row->no_contest) ? 'selected' : '' ?>><?php echo $row->name_contest ?></option>
            <?php } ?>
        </select>
    </div>
    <div class="form-group">
        <label for="varchar">Strata Pendidikan <?php echo form_error('edu_level') ?></label>
        <input type="text" class="form-control" name="edu_level" id="edu_level" placeholder="Strata Pendidikan" value="<?php echo $edu_level; ?>" />
    </div>
    <div class="form-group">
        <label for="varchar">Jumlah Peserta <?php echo form_error('amount_participant') ?></label>
        <input type="text" class="form-control" name="amount_participant" id="amount_participant" placeholder="Jumlah Peserta" value="<?php echo $amount_participant; ?>" />
    </div>
    <div class="form-group">
        <label for="varchar">Ekspektasi <?php echo form_error('expectation') ?></label>
        <input type="text" class="form-control" name="expectation" id="expectation" placeholder="Ekspektasi" value="<?php echo $expectation; ?>" />
    </div>
    <div class="form-group">
        <label for="varchar">Tempat <?php echo form_error('place_delegation') ?></label>
        <input type="text" class="form-control" name="place_delegation" id="place_delegation" placeholder="Tempat" value="<?php echo $place_delegation; ?>" />
    </div>
    <div class="form-group">
        <label for="varchar">Waktu <?php echo form_error('time_delegation') ?></label>
        <input type="text" class="form-control" name="time_delegation" id="time_delegation" placeholder="Waktu" value="<?php echo $time_delegation; ?>" />
    </div>
    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
    <a href="<?php echo site_url('sub_delegation') ?>" class="btn btn-default">Cancel</a>
</form>