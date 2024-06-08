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
					<a href="#">Semua Berita</a>
				</span>
			</div> 

			<?php
			echo "<h1 class='post-title'>$title</h1>";
							  foreach ($berita->result_array() as $r){
							  $tgl = tgl_indo($r['tanggal']);
							  $isi_berita =(strip_tags($r['isi_berita'])); 
							  $isi = substr($isi_berita,0,340); 
							  $isi = substr($isi_berita,0,strrpos($isi," "));
									echo "<div class='berita-item'>
											<h3><a href='".base_url()."berita/detail/$r[judul_seo]' title='$r[judul]'>$r[judul]</a></h3>
											<div class='date'> $r[hari], $tgl, $r[jam] WIB - $r[dibaca] View 
												  <div style='float:right' class='addthis_toolbox addthis_default_style'>
												  <a class='addthis_button_preferred_1'></a>
												  <a class='addthis_button_preferred_2'></a>
												  <a class='addthis_button_preferred_3'></a>
												  <a class='addthis_button_preferred_4'></a>
												  <a class='addthis_button_compact'></a>
												  <a class='addthis_counter addthis_bubble_style'></a>
												  </div>
												  <script type='text/javascript' src='http://s7.addthis.com/js/250/addthis_widget.js#pubid=ra-4f8aab4674f1896a'></script>
												 
											</div>
											<div class='post'>
												<p>$isi &hellip;</p>
											</div>
											<div class='clear'></div>
										  </div>";
							  }  
			?>
			<div class='wp-pagenavi'>
				<?php echo $this->pagination->create_links(); ?>
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
</body>