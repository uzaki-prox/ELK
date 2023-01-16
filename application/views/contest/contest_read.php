<!doctype html>
<html>
    <head>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
    <h2 style="margin-top:0px">LOMBA</h2>
        <table class="table">
	    <tr><td>No Lomba</td><td><?php echo $no_contest; ?></td></tr>
        <tr><td>Nama Lomba</td><td><?php echo $name_contest; ?></td></tr>
	    <tr><td>Jenis Lomba</td><td><?php echo $kind_contest; ?></td></tr>
	    <tr><td>Kuota Peserta</td><td><?php echo $quota_participant; ?></td></tr>
	    <tr><td>Level Lomba</td><td><?php echo $level_contest; ?></td></tr>
        <tr><td>Institusi</td><td><?php echo $institution; ?></td></tr>
        <tr><td>Alamat</td><td><?php echo $address; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('contest') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>