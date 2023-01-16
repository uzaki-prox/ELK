<form action="<?php echo $action; ?>" method="post">
    <div class="form-group">
        <label for="varchar">ID Pendidikan <?php echo form_error('id_edu') ?></label>
        <input type="text" class="form-control" name="id_edu" id="id_edu" placeholder="ID Pendidikan" value="<?php echo $id_edu; ?>" />
    </div>
    <div class="form-group">
        <label for="varchar">Nama Pendidikan <?php echo form_error('name_edu') ?></label>
        <input type="text" class="form-control" name="name_edu" id="name_edu" placeholder="Nama pendidikan" value="<?php echo $name_edu; ?>" />
    </div>
    
    <button type="submit" class="btn btn-primary"><?php echo $button; ?></button> 
    <a href="<?php echo site_url('edu') ?>" class="btn btn-default">Cancel</a>
</form>