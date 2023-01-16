<div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('cost/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            
        </div>
        <table class="table table-bordered" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
        <th>No Tagihan</th>
        <th>No Delegasi</th>
        <th>Pembimbing</th>
        <th>Detail</th>
        <th>Jumlah</th>
        <th>Keterangan</th>
        <th>Action</th>
            </tr><?php
            foreach ($cost_data as $cost)
            {
                ?>
                <tr>
            <td width="80px"><?php echo ++$start ?></td>
            <td><?php echo $cost->no_bill ?></td>
            <td><?php echo $cost->no_delegation ?></td>
            <td><?php echo $cost->choach ?></td>
            <td><?php echo $cost->detail ?></td>
            <td><?php echo $cost->amount ?></td>
            <td><?php echo $cost->descript ?></td>
            <td style="text-align:center" width="200px">
            <?php 
            echo anchor(site_url('cost/update/'.$cost->no_bill),'<i class="glyphicon glyphicon-edit" title="Edit"></i>','class="btn btn-xs btn-warning"'); 
            echo '&nbsp | &nbsp'; 
            echo anchor(site_url('cost/delete/'.$cost->no_bill),'<i class="glyphicon glyphicon-trash" title="Delete"></i>','class="btn btn-xs btn-danger"','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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