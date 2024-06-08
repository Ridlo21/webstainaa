<div id="content-container" class="wrap">
    <div id="sidebar">
        <?php include "sidebar-artikel.php"; ?>
    </div>
    <div id="content-wrap">
        <div id="header-int">
            <?php $logo = $this->db->query("SELECT * FROM logo")->row_array(); ?>
            <img src="<?php echo base_url(); ?>asset/logo/<?php echo $logo['gambar']; ?>" alt="header-int" />
        </div>

        <div id="content">
            <div class="breadcrumb">
                <a title="Home" href="#">Home</a> &gt;
                <span typeof="v:Breadcrumb">
                    <a href="<?php echo "kategori-$record[id_kategori]-$record[kategori_seo].html"; ?>"><?php echo "$record[nama_kategori]"; ?></a>
                </span> &gt;
                <?php echo "$record[judul]"; ?>
            </div> .breadcrumb

            <h1 class="page-title"><?php echo "$record[judul]"; ?></h1>
            <div class="date"><?php echo "$record[hari], " . tgl_indo($record['tanggal']) . ", $record[jam] WIB - $record[dibaca] View"; ?></div>
            <div class="sosnet">
                <span>Share</span>
                <div class='addthis_toolbox addthis_default_style'>
                    <a class='addthis_button_preferred_1'></a>
                    <a class='addthis_button_preferred_2'></a>
                    <a class='addthis_button_preferred_3'></a>
                    <a class='addthis_button_preferred_4'></a>
                    <a class='addthis_button_compact'></a>
                    <a class='addthis_counter addthis_bubble_style'></a>
                </div>
                <script type='text/javascript' src='http://s7.addthis.com/js/250/addthis_widget.js#pubid=ra-4f8aab4674f1896a'></script>

            </div>
            <div class="clear"></div>

            <div class="post">
                <?php
                if ($record['gambar'] != '') {
                    echo "<img style='width:290px; float:left; margin-right:10px; margin-top:10px' src='" . base_url() . "asset/foto_berita/$record[gambar]' alt='$record[judul]' /></a>";
                }
                ?>
                <p><?php
                    echo "$record[isi_berita] ";
                    if ($record['youtube'] != '') {
                        echo "<div style='clear:both'></div><hr>
                        <b>Video Terkait :</b> <br><iframe width='100%' height='345' src='$record[youtube]?rel=0&amp;showinfo=0&amp;wmode=opaque' frameborder='0' allowfullscreen></iframe>";
                    }
                    ?></p>
                <div class="tags"></div>
            </div>
            <div class="clear"></div>
        </div>
    </div>
    <div class="clear"></div>
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