<div id="mainnav">
  <div class="menu-main-nav-container">
    <ul id="menu-main-nav" class="sf-menu sf-vertical">
      f6tf6rftftftft
      <?php
      $menukiri = $this->db->query("SELECT * FROM menu where aktif='Ya' and position='Bottom' and id_parent = '0' ORDER BY urutan ASC");
      foreach ($menukiri->result_array() as $row) {
        $dropdown = $this->db->query("SELECT * FROM menu WHERE id_parent='$row[id_menu]' and  aktif='Ya' ORDER BY urutan ASC")->num_rows();
        if ($dropdown == 0) {
          echo "<li><a href='$row[link]'>$row[nama_menu]</a></li>";
        } else {
          echo "<li class='dropdown'>
                            <a href='" . base_url() . "$row[link]' class='dropdown-toggle' data-toggle='dropdown'>$row[nama_menu] <span class='nav-line'></span></a>
                            <ul class='sub-menu'>";
          $dropmenu = $this->model_menu->dropdown_menu($row['id_menu']);
          foreach ($dropmenu->result_array() as $row) {
            echo "<li><a href='$row[link]'>$row[nama_menu]</a></li>";
          }
          echo "</ul>
                          </li>";
        }
      }
      ?>
    </ul>
  </div>
</div>