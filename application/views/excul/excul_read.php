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
        <h2 style="margin-top:0px">Ekstrakulikuler Read</h2>
        <table class="table">
	    <tr><td>No Ekskul</td><td><?php echo $no_excul; ?></td></tr>
        <tr><td>Nama Ekstrakulikuler</td><td><?php echo $name_excul; ?></td></tr>
	    <tr><td>Pembimbing</td><td><?php echo $choach; ?></td></tr>
	    <tr><td>Keterangan</td><td><?php echo $descript; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('excul') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>