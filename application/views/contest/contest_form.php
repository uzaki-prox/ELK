<form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="varchar">No Lomba <?php echo form_error('no_contest') ?></label>
            <input type="text" class="form-control" name="no_contest" id="no_contest" value="<?php echo $no_contest; ?>" readonly/>
        </div>
        <div class="form-group">
            <label for="varchar">Nama Lomba <?php echo form_error('name_contest') ?></label>
            <input type="date" class="form-control" name="name_contest" id="name_contest" placeholder="Tanggal" value="<?php echo $name_contest; ?>" />
        </div>
        <div class="form-group">
            <label for="int">Jenis Lomba <?php echo form_error('kind_contest') ?></label>
            <input type="text" class="form-control" name="kind_contest" id="kind_contest" placeholder="Nama Pengadu" value="<?php echo $kind_contest; ?>" />
        </div>
        <div class="form-group">
            <label for="int">Kouta Peserta <?php echo form_error('quota_partisipant') ?></label>
            <input type="text" class="form-control" name="quota_partisipant" id="quota_partisipant" placeholder="Kuota Peserta" value="<?php echo $quota_partisipant; ?>" />
        </div>
        <div class="form-group">
            <label for="int">Level Lomba <?php echo form_error('level_contest') ?></label>
            <input type="text" class="form-control" name="level_contest" id="level_contest" placeholder="Level Lomba" value="<?php echo $level_contest; ?>" />
        </div>
        <div class="form-group">
            <label for="int">Institusi <?php echo form_error('institution') ?></label>
            <textarea class="form-control" name="institution" id="institution" placeholder="Institusi"><?php echo $institution; ?></textarea>
        </div>
        <div class="form-group">
            <label for="int">Alamat <?php echo form_error('address') ?></label>
            <input type="text" class="form-control" name="address" id="address" placeholder="Alamat" value="<?php echo $address; ?>" />
        </div>
        <div class="form-group">
            <label for="int">Kontak Person <?php echo form_error('contact_person') ?></label>
            <input type="text" class="form-control" name="contact_person" id="contact_person" placeholder="Kontak Person" value="<?php echo $contact_person; ?>" />
        </div>
        <div class="form-group">
            <label for="int">Nomor Telp <?php echo form_error('tlp_cp') ?></label>
            <input type="text" class="form-control" name="tlp_cp" id="tlp_cp" placeholder="Nomor Telp" value="<?php echo $tlp_cp; ?>" />
        </div>
        <div class="form-group">
            <label for="int">Waktu Lomba <?php echo form_error('time_contest') ?></label>
            <input type="text" class="form-control" name="time_contest" id="time_contest" placeholder="Waktu Lomba" value="<?php echo $time_contest; ?>" />
        </div>
        <div class="form-group">
            <label for="int">Waktu TM <?php echo form_error('time_tm') ?></label>
            <input type="text" class="form-control" name="time_tm" id="time_tm" placeholder="Waktu TM" value="<?php echo $time_tm; ?>" />
        </div>
        <div class="form-group">
            <label for="int">Tempat Lomba <?php echo form_error('place_contest') ?></label>
            <input type="text" class="form-control" name="place_contest" id="place_contest" placeholder="Tempat Lomba" value="<?php echo $place_contest; ?>" />
        </div>
        <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
        <a href="<?php echo site_url('contest') ?>" class="btn btn-default">Cancel</a>
    </form>