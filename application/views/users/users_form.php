<form action="<?php echo $action; ?>" method="post">
    <div class="form-group">
        <label for="varchar">NIY <?php echo form_error('niy') ?></label>
        <input type="text" class="form-control" name="niy" id="niy" placeholder="NIY" value="<?php echo $niy; ?>" />
    </div>
    <div class="form-group">
        <label for="varchar">Nama Lengkap <?php echo form_error('name') ?></label>
        <input type="text" class="form-control" name="name" id="name" placeholder="Nama Lengkap" value="<?php echo $name; ?>" />
    </div>
    <div class="form-group">
        <label for="varchar">Jenis Kelamin <?php echo form_error('gender') ?></label>
        <select name="gender" class="form-control">
            <option value="Laki-Laki">Laki-Laki</option>
            <option value="Perempuan">Perempuan</option>
        </select>
    </div>
    <div class="form-group">
        <label for="varchar">Unit <?php echo form_error('unit') ?></label>
        <select name="unit" class="form-control">
            <?php
            $sql1 = $this->db->get('unit');
            foreach ($sql1->result() as $row) { ?>
            <option value="<?php echo $row->id_unit ?>" <?php echo ($unit == $row->id_unit) ? 'selected' : '' ?>><?php echo $row->name_unit ?></option>
            <?php } ?>
        </select>
    </div>
    <div class="form-group">
        <label for="varchar">Hak Akses <?php echo form_error('role') ?></label>
        <select name="role" class="form-control">
            <?php
            $sql2 = $this->db->get('role');
            foreach ($sql2->result() as $row) { ?>
            <option value="<?php echo $row->id_role ?>" <?php echo ($role == $row->id_role) ? 'selected' : '' ?>><?php echo $row->name_role ?></option>
            <?php } ?>
        </select>
    </div>
    <div class="form-group">
        <label for="varchar">Pasword <?php echo form_error('password') ?></label>
        <input type="password" class="form-control" name="password" id="password" placeholder="Password" />
    </div>
    
    <button type="submit" class="btn btn-primary"><?php echo $button; ?></button> 
    <a href="<?php echo site_url('users') ?>" class="btn btn-default">Cancel</a>
</form>