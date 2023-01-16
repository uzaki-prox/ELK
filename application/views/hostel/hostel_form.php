<form action="<?php echo $action; ?>" method="post">
    <div class="form-group">
        <label for="varchar">ID Asrama <?php echo form_error('id_hostel') ?></label>
        <input type="text" class="form-control" name="id_hostel" id="id_hostel" placeholder="ID Asrama" value="<?php echo $id_hostel; ?>" />
    </div>
    <div class="form-group">
        <label for="varchar">Nama Asrama <?php echo form_error('name_hostel') ?></label>
        <input type="text" class="form-control" name="name_hostel" id="name_hostel" placeholder="Nama Asrama" value="<?php echo $name_hostel; ?>" />
    </div>
    <div class="form-group">
        <label for="varchar">Penanggungjawab <?php echo form_error('responsible') ?></label>
        <input type="text" class="form-control" name="responsible" id="responsible" placeholder="Penanggungjawab" value="<?php echo $responsible; ?>" />
    </div>

    <button type="submit" class="btn btn-primary"><?php echo $button; ?></button> 
    <a href="<?php echo site_url('hostel') ?>" class="btn btn-default">Cancel</a>
</form>