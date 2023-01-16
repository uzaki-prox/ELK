<form action="<?php echo $action; ?>" method="post">
    <div class="form-group">
        <label for="varchar">No Ekskul <?php echo form_error('no_excul') ?></label>
        <input type="text" class="form-control" name="no_excul" id="no_excul" placeholder="No Ekskul" value="<?php echo $no_excul; ?>" readonly />
    </div>
    <div class="form-group">
        <label for="varchar">Nama Ekstrakulikuler <?php echo form_error('name_excul') ?></label>
        <input type="date" class="form-control" name="name_excul" id="name_excul" placeholder="Nama Ekstrakulikuler" value="<?php echo $name_excul; ?>" />
    </div>
    <div class="form-group">
        <label for="varchar">Pembimbing <?php echo form_error('choach') ?></label>
        <input type="text" class="form-control" name="choach" id="choach" placeholder="Pembimbing" value="<?php echo $choach; ?>" />
    </div>
    <div class="form-group">
        <label for="varchar">Keterangan <?php echo form_error('descript') ?></label>
        <input type="text" class="form-control" name="descript" id="descript" placeholder="Keterangan" value="<?php echo $descript; ?>" />
    </div>
    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
    <a href="<?php echo site_url('excul') ?>" class="btn btn-default">Cancel</a>
</form>