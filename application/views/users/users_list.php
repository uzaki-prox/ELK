<div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('users/create'),'Create', 'class="btn btn-primary"'); ?>
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
        <th>NIY</th>
        <th>Nama</th>
        <th>Jenis Kelamin</th>
        <th>Unit</th>
        <th>Hak Akses</th>
        <th>Action</th>
            </tr><?php
            foreach ($users_data as $users)
            {
                ?>
                <tr>
            <td width="80px"><?php echo ++$start ?></td>
            <td><?php echo $users->niy ?></td>
            <td><?php echo $users->name ?></td>
            <td><?php echo $users->gender ?></td>
            <td><?php echo $users->unit ?></td>
            <td><?php echo $users->role ?></td>
            <td style="text-align:center" width="200px">
            <?php 
            echo anchor(site_url('users/update/'.$users->niy),'<i class="glyphicon glyphicon-edit" title="Edit"></i>','class="btn btn-xs btn-warning"'); 
            echo '&nbsp | &nbsp'; 
            echo anchor(site_url('users/delete/'.$users->niy),'<i class="glyphicon glyphicon-trash" title="Delete"></i>','class="btn btn-xs btn-danger"','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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