<form action="<?php echo $action; ?>" method="post">
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
        <label for="varchar">Status Juara <?php echo form_error('champ_status') ?></label>
        <input type="text" class="form-control" name="champ_status" id="champ_status" placeholder="Status Juara" value="<?php echo $champ_status; ?>" />
    </div>
    <div class="form-group">
        <label for="varchar">Tempat Laporan <?php echo form_error('place_report') ?></label>
        <input type="text" class="form-control" name="place_report" id="place_report" placeholder="Tempat Laporan" value="<?php echo $place_report; ?>" />
    </div>
    <div class="form-group">
        <label for="varchar">Waktu Laporan <?php echo form_error('date_report') ?></label>
        <input type="text" class="form-control" name="date_report" id="date_report" placeholder="Waktu Laporan" value="<?php echo $date_report; ?>" />
    </div>

    <button type="submit" class="btn btn-primary"><?php echo $button; ?></button> 
    <a href="<?php echo site_url('report_delegation') ?>" class="btn btn-default">Cancel</a>
</form>