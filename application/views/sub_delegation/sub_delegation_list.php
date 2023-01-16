<div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('sub_delegation/create'),'Create', 'class="btn btn-primary"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('sub_delegation/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('sub_delegation'); ?>" class="btn btn-default">Reset</a>
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
                <th>No Delegasi</th>
                <th>Unit</th>
                <th>Pembimbing</th>
                <th>Lomba</th>
                <th>Strata Pendidikan</th>
                <th>Jumlah Peserta</th>
                <th>Ekspektasi</th>
                <th>Tempat</th>
                <th>Waktu</th>
                <th>Action</th>
            </tr><?php
            foreach ($sub_del_data as $sub_del)
            {
            ?>
            <tr>
                <td><?php echo $sub_del->no_delegation ?></td>
                <td><?php echo $sub_del->id_unit ?></td>
                <td><?php echo $sub_del->choach ?></td>
                <td><?php echo $sub_del->no_contest ?></td>
                <td><?php echo $sub_del->edu_level ?></td>
                <td><?php echo $sub_del->amount_participant ?></td>
                <td><?php echo $sub_del->expectation ?></td>
                <td><?php echo $sub_del->place_delegation ?></td>
                <td><?php echo $sub_del->time_delegation ?></td>
                <td style="text-align:center" width="200px">
                <?php 
                
                echo anchor(site_url('sub_delegation/update/'.$sub_del->no_delegation),'Update'); 
                echo ' | '; 
                echo anchor(site_url('sub_delegation/delete/'.$sub_del->no_delegation),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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