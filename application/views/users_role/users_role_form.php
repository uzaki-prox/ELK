<form action="<?php echo $action; ?>" method="post">
    <div class="form-group">
        <label for="varchar">Hak Akses <?php echo form_error('id_role') ?></label>
        <input type="text" class="form-control" name="id_role" id="id_role" placeholder="Hak Akses" value="<?php echo $id_role; ?>" />
    </div>
    <div class="form-group">
        <label for="varchar">Nama Akses <?php echo form_error('name_role') ?></label>
        <input type="text" class="form-control" name="name_role" id="name_role" placeholder="Nama Akses" value="<?php echo $name_role; ?>" />
    </div>
    
    <button type="submit" class="btn btn-primary"><?php echo $button; ?></button> 
    <a href="<?php echo site_url('users_role') ?>" class="btn btn-default">Cancel</a>
</form>