<div class="col-xs-6 col-sm-3 sidebar-offcanvas" role="navigation">
            <ul class="list-group panel">
                <li class="list-group-item" style="background-color : #E6E9ED;"><i class="glyphicon glyphicon-align-justify"></i> <b>MENU UTAMA</b></li>
                <!--<li class="list-group-item"><input type="text" class="form-control search-query" placeholder="Search Something"></li>-->
                <li class="list-group-item"><a href="<?php echo base_url()?>"><i class="glyphicon glyphicon-home"></i>Dashboard </a></li>
                
                <?php 
                if ($this->session->userdata('level') == '1') {
                 ?>
                <!--<li>
                  <a href="#demo1" class="list-group-item " data-toggle="collapse"><i class="glyphicon glyphicon-book"></i>Buku  <span class="glyphicon glyphicon-chevron-right"></span></a>
                  <li class="collapse" id="demo1">
                    <a href="buku_tamu" class="list-group-item ">Buku Tamu </a>
                    <a href="tamu_psb" class="list-group-item ">Buku PSB </a>
                  </li>
                </li>-->
                <li>
                  <a href="buku_tamu" class="list-group-item "><i class="glyphicon glyphicon-book"></i>Ekstrakulikuler </a>
                </li>
                <li>
                  <a href="#demo1" class="list-group-item" data-toggle="collapse"><i class="glyphicon glyphicon-home"></i>Delegasi<span class="glyphicon glyphicon-chevron-right"></span></a>
                  <li class="collapse" id="demo1">
                    <a href="room" class="list-group-item">Pengajuan</a>
                    <a href="room_kind" class="list-group-item"></a>
                  </li>
                </li>
                
                <li>
                  <a href="pengaduan" class="list-group-item "><i class="glyphicon glyphicon-comment"></i>Pengajuan Delegasi </a>
                </li>
                <li>
                  <a href="#" class="list-group-item "><i class="glyphicon glyphicon-signal"></i>Data Peserta Delegasi </a>
                </li>
                <li>
                  <a href="#" class="list-group-item "><i class="glyphicon glyphicon-signal"></i>Data Pendamping Delegasi </a>
                </li>
                <li>
                  <a href="#" class="list-group-item "><i class="glyphicon glyphicon-signal"></i>Data Biaya Delegasi </a>
                </li>
                <li>
                  <a href="#" class="list-group-item "><i class="glyphicon glyphicon-signal"></i>Data Laporan Delegasi </a>
                </li>
                
                <li>
                  <a href="users" class="list-group-item "><i class="glyphicon glyphicon-user"></i>Manajemen User </a>
                </li>
                <li class="list-group-item"><a href="<?php echo base_url()?>app/logout"><i class="glyphicon glyphicon-share"></i>Sign Out </a></li>

                <?php 
                } elseif ($this->session->userdata('level') == '2') {
                 ?>
                <!--<li>
                <a href="#demo1" class="list-group-item " data-toggle="collapse"><i class="glyphicon glyphicon-book"></i>Buku  <span class="glyphicon glyphicon-chevron-right"></span></a>
                  <li class="collapse" id="demo1">
                    <a href="buku_tamu" class="list-group-item ">Buku Tamu </a>
                    <a href="tamu_psb" class="list-group-item ">Buku PSB </a>
                  </li>
                </li>-->
                <li>
                  <a href="buku_tamu" class="list-group-item "><i class="glyphicon glyphicon-book"></i>Buku Tamu </a>
                </li>
                <li>
                  <a href="pengaduan" class="list-group-item "><i class="glyphicon glyphicon-comment"></i>Sistem Pengaduan </a>
                </li>
                <li>
                  <a href="#" class="list-group-item "><i class="glyphicon glyphicon-signal"></i>Sistem Poling Kepuasan </a>
                </li>
                <li>
                  <a href="change_pass" class="list-group-item "><i class="glyphicon glyphicon-user"></i>Manajemen User </a>
                </li>
                <li class="list-group-item"><a href="<?php echo base_url()?>app/logout"><i class="glyphicon glyphicon-share"></i>Sign Out </a></li>

                <?php } elseif ($this->session->userdata('level') == '3') {
                 ?>
                <!--<li>
                <a href="#demo1" class="list-group-item " data-toggle="collapse"><i class="glyphicon glyphicon-book"></i>Buku  <span class="glyphicon glyphicon-chevron-right"></span></a>
                  <li class="collapse" id="demo1">
                    <a href="buku_tamu" class="list-group-item ">Buku Tamu </a>
                    <a href="tamu_psb" class="list-group-item ">Buku PSB </a>
                  </li>
                </li>-->
                <li>
                  <a href="buku_tamu" class="list-group-item "><i class="glyphicon glyphicon-book"></i>Buku Tamu </a>
                </li>
                <li>
                  <a href="pengaduan" class="list-group-item "><i class="glyphicon glyphicon-comment"></i>Sistem Pengaduan </a>
                </li>
                <li>
                  <a href="#" class="list-group-item "><i class="glyphicon glyphicon-signal"></i>Sistem Poling Kepuasan </a>
                </li>
                <li>
                  <a href="change_pass" class="list-group-item "><i class="glyphicon glyphicon-user"></i>Manajemen User </a>
                </li>
                <li class="list-group-item"><a href="<?php echo base_url()?>app/logout"><i class="glyphicon glyphicon-share"></i>Sign Out </a></li>

                <?php } elseif ($this->session->userdata('level') == '4') {
                 ?>
                <!--<li>
                <a href="#demo1" class="list-group-item " data-toggle="collapse"><i class="glyphicon glyphicon-book"></i>Buku  <span class="glyphicon glyphicon-chevron-right"></span></a>
                  <li class="collapse" id="demo1">
                    <a href="buku_tamu" class="list-group-item ">Buku Tamu </a>
                    <a href="tamu_psb" class="list-group-item ">Buku PSB </a>
                  </li>
                </li>-->
                <li>
                  <a href="buku_tamu" class="list-group-item "><i class="glyphicon glyphicon-book"></i>Buku Tamu </a>
                </li>
                <li>
                  <a href="pengaduan" class="list-group-item "><i class="glyphicon glyphicon-comment"></i>Sistem Pengaduan </a>
                </li>
                <li>
                  <a href="#" class="list-group-item "><i class="glyphicon glyphicon-signal"></i>Sistem Poling Kepuasan </a>
                </li>
                <li>
                  <a href="change_pass" class="list-group-item "><i class="glyphicon glyphicon-user"></i>Manajemen User </a>
                </li>
                <li class="list-group-item"><a href="<?php echo base_url()?>app/logout"><i class="glyphicon glyphicon-share"></i>Sign Out </a></li>

                <?php } ?>

              </ul>
          </div>