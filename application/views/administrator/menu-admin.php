        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="<?php echo base_url(); ?>/asset/foto_user/<?= $this->session->foto ?>" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <?php
              $usr = $this->db->query("SELECT * FROM users where username='" . $this->session->username . "'")->row_array();
              echo "<p>$usr[nama_lengkap]</p>";
              ?>

              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>

          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header" style='color:#fff; text-transform:uppercase; border-bottom:2px solid #00c0ef'>MENU ADMIN</li>
            <li><a href="<?php echo base_url(); ?>administrator/home"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
            <li class="treeview">
              <a href="#"><i class="glyphicon glyphicon-th-list"></i> <span>Menu Utama</span><i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="<?php echo base_url(); ?>administrator/identitaswebsite"><i class="fa fa-circle-o"></i> Identitas Website</a></li>
                <li><a href="<?php echo base_url(); ?>administrator/idn"><i class="fa fa-circle-o"></i> Menu Identitas</a></li>
                <!-- <li><a href="<?php echo base_url(); ?>administrator/menuwebsite"><i class="fa fa-circle-o"></i> Menu Website</a></li> -->
                <!--<li><a href="<?php echo base_url(); ?>administrator/menugroup"><i class="fa fa-circle-o"></i> Menu Group</a></li>-->
                <!--<li><a href="<?php echo base_url(); ?>administrator/menugrouplist"><i class="fa fa-circle-o"></i> Menu Group List</a></li>-->
                <!--<li><a href="<?php echo base_url(); ?>administrator/halamanbaru"><i class="fa fa-circle-o"></i> Halaman Baru</a></li>-->
              </ul>
            </li>
            <li class="treeview">
              <a href="#"><i class="glyphicon glyphicon-pencil"></i> <span>Modul Berita</span><i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="<?php echo base_url(); ?>administrator/listberita"><i class="fa fa-circle-o"></i> List Berita</a></li>
                <!--<li><a href="<?php echo base_url(); ?>administrator/kategoriberita"><i class="fa fa-circle-o"></i> Kategori Berita</a></li>-->
                <!--<li><a href="<?php echo base_url(); ?>administrator/tagberita"><i class="fa fa-circle-o"></i> Tag Berita</a></li>-->
              </ul>
            </li>

            <li class="treeview">
              <a href="#"><i class="glyphicon glyphicon-picture"></i> <span>Modul Gallery</span><i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href='<?php echo base_url(); ?>administrator/album'><i class='fa fa-circle-o'></i> Album</a></li>
                <li><a href='<?php echo base_url(); ?>administrator/gallery'><i class='fa fa-circle-o'></i> Gallery</a></li>
              </ul>
            </li>

            <li class="treeview">
              <a href="#"><i class="glyphicon glyphicon-play"></i> <span>Modul Video</span><i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <!--<li><a href='<?php echo base_url(); ?>administrator/playlist'><i class='fa fa-circle-o'></i> Playlist Video</a></li>-->
                <li><a href='<?php echo base_url(); ?>administrator/video'><i class='fa fa-circle-o'></i> Video</a></li>
                <!--<li><a href='<?php echo base_url(); ?>administrator/tagvideo'><i class='fa fa-circle-o'></i> Tag Video</a></li>-->
              </ul>
            </li>

            <li class="treeview">
              <a href="#"><i class="glyphicon glyphicon-object-align-left"></i> <span>Modul Web</span><i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <!--<li><a href="<?php echo base_url(); ?>administrator/logowebsite"><i class="fa fa-circle-o"></i> Logo Website</a></li>-->
                <!--<li><a href="<?php echo base_url(); ?>administrator/lowker"><i class="fa fa-circle-o"></i> Info Lowker</a></li>-->
                <!--<li><a href="<?php echo base_url(); ?>administrator/download"><i class="fa fa-circle-o"></i> File Download</a></li>-->
                <li><a href="<?php echo base_url(); ?>administrator/agenda"><i class="fa fa-circle-o"></i> List Agenda</a></li>
                <!--<li><a href="<?php echo base_url(); ?>administrator/linkterkait"><i class="fa fa-circle-o"></i> Link Terkait</a></li>-->
                <!--<li><a href="<?php echo base_url(); ?>administrator/pesanmasuk"><i class="fa fa-circle-o"></i> Pesan Masuk</a></li>-->
              </ul>
            </li>
            <li class="treeview">
              <a href="#"><i class="fa fa-cog"></i> <span>Modul Users</span><i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="<?php echo base_url(); ?>administrator/manajemenuser"><i class="fa fa-circle-o"></i> Manajemen User</a></li>
              </ul>
            </li>

            <li class="treeview">
              <a href="#"><i class="fa fa-calculator"></i> <span>Modul Struktur</span><i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="<?php echo base_url(); ?>administrator/jabatan"><i class="fa fa-circle-o"></i> Jabatan</a></li>
                <li><a href="<?php echo base_url(); ?>administrator/struktur"><i class="fa fa-circle-o"></i> Struktur</a></li>
              </ul>
            </li>

            <li class="treeview">
              <a href="#"><i class="fa fa-book"></i> <span>Modul Tentang</span><i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="<?php echo base_url(); ?>Administrator/visi_misi"><i class="fa fa-circle-o"></i> Visi Misi</a></li>
                <li><a href="<?php echo base_url(); ?>Administrator/tujuan"><i class="fa fa-circle-o"></i> Tujuan</a></li>
                <li><a href="<?php echo base_url(); ?>Administrator/sejarah"><i class="fa fa-circle-o"></i> Sejarah</a></li>
              </ul>
            </li>
            <li>
              <a href="#"><i class="fa fa-users"></i> <span>Modul Artikel</span><i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="<?php echo base_url(); ?>Administrator/himpunan"><i class="fa fa-circle-o"></i> Himpunan</a></li>
                <li><a href="<?php echo base_url(); ?>Administrator/artikel"><i class=" fa fa-circle-o"></i> Artikel</a></li>
              </ul>
            </li>
            <li><a href="<?php echo base_url(); ?>Administrator/dosen_tetap"><i class="fa fa-user-md"></i> <span>Dosen Tetap</span></a></li>


            <li><a href="<?php echo base_url(); ?>administrator/slide_fotos"><i class="fa fa-camera"></i> <span>Slide Fotos</span></a></li>
            <li><a href="<?php echo base_url(); ?>administrator/akreditasi"><i class="fa fa-th"></i> <span>Akreditasi</span></a></li>
            <li><a href="<?php echo base_url(); ?>administrator/edit_manajemenuser/<?php echo $this->session->username; ?>"><i class="fa fa-user"></i> <span>Edit Profile</span></a></li>
            <li><a href="<?php echo base_url(); ?>administrator/logout"><i class="fa fa-power-off"></i> <span>Logout</span></a></li>
          </ul>
        </section>