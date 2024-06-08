  <a class="toggleMenu" href="#">Menu</a>
  <div id="hero" class="wrap">
    <?php include "menu-kiri.php"; ?>
    <div id="header">
      <?php include "header-slide.php"; ?>
    </div>
    <div class="clear"></div>
  </div>

  <!--  <div style='background:#fff' class="wrap">
    <div id="a_middle">
    <?php
    $bottom_menu = $this->db->query("SELECT * FROM group_menu ORDER BY id_group_menu");
    foreach ($bottom_menu->result_array() as $b) {
      echo "<div  class='col_42'>
                <h2 style='margin-bottom:5px'>$b[nama_group_menu]</h2>
                    <ul class='list_menu'>";
      $sub_bottom_menu = $this->db->query("SELECT * FROM group_menu_list where id_group_menu='$b[id_group_menu]' ORDER BY id_group_menu_list");
      foreach ($sub_bottom_menu->result_array() as $bs) {
        echo "<li><a href='$bs[link]'>$bs[nama]</a></li>";
      }
      echo "</ul>
                </div>";
    }
    ?>
    </div>
    
    <div style='clear:both'></div>
      <div id="event" class="block">
        <div class="event-nav">
            <a href=# id="event-prev">Prev</a>
            <a href=# id="event-next">Next</a>
        </div>
        <?php include "agenda-atas.php"; ?>
        <div class="clear"></div>
      </div>

      <?php include "pmb-atas.php"; ?>
  </div>-->

  <!-- content start -->
  <div id="content-container" class="wrap">
    <?php include "berita-home.php"; ?>

    <div id="pengumuman" class="block">
      <?php include "sidebar-pengumuman.php"; ?>
    </div>

    <div id="lowongan" class="block">
      <?php include "sidebar-lowongan.php"; ?>
    </div>
  </div>

  <div id="footer-banner">
    <?php include "banner-footer.php"; ?>
  </div>

  <div id="credit">
    <?php include "info-footer.php"; ?>
  </div>
  <script type="text/javascript">
    jQuery(document).ready(function($) {
      $("#rotator").cycle({
        fx: 'fade',
        timeout: 3000,
        speed: 1000,
        pause: 1,
        fit: 1
      });
    });
  </script>