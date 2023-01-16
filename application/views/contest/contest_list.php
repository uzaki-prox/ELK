<div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('contest/create'),'&nbsp Add', 'class="btn btn-primary glyphicon-plus"'); ?>
                <?php echo anchor(site_url('contest/contest_excel'),'&nbsp Export to Excel', 'class="btn btn-danger"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 8px" id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-1 text-right">
            </div>
            <div class="col-md-3 text-right">
                <form action="<?php echo site_url('contest/index'); ?>" class="form-inline" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
                        <span class="input-group-btn">
                            <?php 
                                if ($q <> '')
                                {
                                    ?>
                                    <a href="<?php echo site_url('contest'); ?>" class="btn btn-default">Reset</a>
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
            <th>No Lomba</th>
            <th>Nama Lomba</th>
            <th>Jenis Lomba</th>
            <th>Kuota Peserta</th>
            <th>Level Lomba</th>
            <th>Institusi</th>
            <th>Alamat</th>
            <th>Kontak Person</th>
            <th>Nomor Telp</th>
            <th>Waktu Lomba</th>
            <th>Waktu TM</th>
            <th>Tempat Lomba</th>
            <th>Action</th>
        </tr>
        <?php
            foreach ($contest_data as $contest)
            {
                ?>
                <tr>
            <td><?php echo $contest->no_contest ?></td>
            <td><?php echo $contest->name_contest ?></td>
            <td><?php echo $contest->kind_contest ?></td>
            <td><?php echo $contest->quota_partisipant ?></td>
            <td><?php echo $contest->contest_level ?></td>
            <td><?php echo $contest->institution ?></td>
            <td><?php echo $contest->address ?></td>
            <td><?php echo $contest->contact_person ?></td>
            <td><?php echo $contest->tlp_cp ?></td>
            <td><?php echo $contest->time_contest ?></td>
            <td><?php echo $contest->time_tm ?></td>
            <td><?php echo $contest->place_contest ?></td>
            <td style="text-align:center" width="200px">
                <?php 
                echo anchor(site_url('contest/update/'.$contest->no_contest),'<i class="glyphicon glyphicon-edit" title="Edit"></i>','class="btn btn-xs btn-warning"'); 
                echo '&nbsp | &nbsp'; 
                echo anchor(site_url('contest/delete/'.$contest->no_contest),'<i class="glyphicon glyphicon-trash" title="Delete"></i>','class="btn btn-xs btn-danger"','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
                ?>
            </td>
        </tr>
                <?php
            }
            ?>
        </table>
        <div class="row">
            <div class="col-md-6">
                <a href="#" class="btn btn-primary">Total Record : <?php echo $total_rows ?></a>
        </div>
            <div class="col-md-6 text-right">
                <?php echo $pagination ?>
            </div>
        </div>