<div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('report_delegation/create'),'Create', 'class="btn btn-primary"'); ?>
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
        <th>No Delegasi</th>
        <th>Status Juara</th>
        <th>Tempat Laporan</th>
        <th>Waktu Laporan</th>
        <th>Action</th>
            </tr><?php
            foreach ($report_delegation_data as $report_delegation)
            {
                ?>
                <tr>
            <td width="80px"><?php echo ++$start ?></td>
            <td><?php echo $report_delegation->no_delegation ?></td>
            <td><?php echo $report_delegation->champ_status ?></td>
            <td><?php echo $report_delegation->place_report ?></td>
            <td><?php echo $report_delegation->date_report ?></td>
            <td style="text-align:center" width="200px">
            <?php 
            echo anchor(site_url('report_delegation/update/'.$report_delegation->no_delegation),'<i class="glyphicon glyphicon-edit" title="Edit"></i>','class="btn btn-xs btn-warning"'); 
            echo '&nbsp | &nbsp'; 
            echo anchor(site_url('report_delegation/delete/'.$report_delegation->no_delegation),'<i class="glyphicon glyphicon-trash" title="Delete"></i>','class="btn btn-xs btn-danger"','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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