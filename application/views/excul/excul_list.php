<div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('excul/create'),'&nbsp Add', 'class="btn btn-primary glyphicon-plus"'); ?>
                <?php echo anchor(site_url('excul/tamu_excel'),'&nbsp Export to Excel', 'class="btn btn-danger"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('excul/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('excul'); ?>" class="btn btn-default">Reset</a>
                                    <?php
                                }
                            ?>
                          <button class="btn btn-primary" type="submit">Search</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
        <table class="table table-bordered" style="margin-bottom: 10px">
            <tr>
                <th>No< Ekskul/th>
                <th>Nama Ekstrakulikuler</th>
                <th>Pembimbing</th>
                <th>Keterangan</th>
                <th>Action</th>
            </tr><?php
            foreach ($excul_data as $excul)
            {
            ?>
            <tr>
                <td><?php echo $excul->no_excul ?></td>
                <td><?php echo $excul->name_excul ?></td>
                <td><?php echo $excul->choach ?></td>
                <td><?php echo $excul->descript ?></td>
                <td style="text-align:center" width="200px">
                <?php 
                
                echo anchor(site_url('excul/update/'.$excul->no_excul),'<i class="glyphicon glyphicon-edit" title="Edit"></i>','class="btn btn-xs btn-warning"'); 
                echo '&nbsp | &nbsp'; 
                echo anchor(site_url('excul/delete/'.$excul->no_excul),'<i class="glyphicon glyphicon-trash" title="Delete"></i>','class="btn btn-xs btn-danger"','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
                ?>
                </td>
            </tr>
            <?php
            }
            ?>
        </table>
        <div class="row">
            <div class="col-md-6">
            <div class="btn btn-primary">
                Total Record : <?php echo $total_rows ?>
            </div>
               
        </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>