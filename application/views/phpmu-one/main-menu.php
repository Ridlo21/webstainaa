        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              hbghbhubububhbhubybybybubbybybu
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
          </div>
          <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <?php
              $botm = $this->model_menu->bottom_menu();
              foreach ($botm->result_array() as $row) {
                $dropdown = $this->model_menu->dropdown_menu($row['id_menu'])->num_rows();
                if ($dropdown == 0) {
                  echo "<li><a href='" . base_url() . "$row[link]'>$row[nama_menu]</a></li>";
                } else {
                  echo "<li class='dropdown'>
                            <a href='" . base_url() . "$row[link]' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-haspopup='true' aria-expanded='false'>$row[nama_menu] 
                            <span class='caret'></span></a>
                            <ul class='dropdown-menu'>";
                  $dropmenu = $this->model_menu->dropdown_menu($row['id_menu']);
                  foreach ($dropmenu->result_array() as $row) {
                    echo "<li><a href='" . base_url() . "$row[link]'>$row[nama_menu]</a></li>";
                  }
                  echo "</ul>
                          </li>";
                }
              }
              ?>
            </ul>

            <ul class="nav navbar-nav navbar-right">
              <?php if ($this->session->level == '') { ?>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Pendaftaran <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="<?php echo base_url(); ?>auth/users">Users</a></li>
                    <li><a href="<?php echo base_url(); ?>auth/penulis">Penulis</a></li>
                  </ul>
                </li>
                <li><a href="<?php echo base_url(); ?>auth/login">Login</a></li>
              <?php } else { ?>
                <li><a href="<?php echo base_url(); ?>auth/logout">Logout</a></li>
              <?php } ?>
            </ul>

          </div>
          <!--/.nav-collapse -->
        </div>