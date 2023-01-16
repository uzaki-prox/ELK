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
        <h2 style="margin-top:0px">DELEGASI</h2>
        <table class="table">
	    <tr><td>No Delegasi</td><td><?php echo $no_delegation; ?></td></tr>
        <tr><td>Unit</td><td><?php echo $id_unit; ?></td></tr>
	    <tr><td>Pembimbing</td><td><?php echo $choach; ?></td></tr>
	    <tr><td>Lomba</td><td><?php echo $no_contest; ?></td></tr>
	    <tr><td>Jumlah Peserta</td><td><?php echo $amount_participant; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('sub_delegation') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>