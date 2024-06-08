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
				<a title="Universitas Indonesia Raya" href="#">Playlist</a> &gt; 
					<?php echo "$rows[jdl_playlist]"; ?>
			</div> <!-- .breadcrumb -->
									
						<h1 class="page-title"><?php echo "$rows[jdl_playlist]"; ?></h1>
						<div class="date">Posted by : Administrator</div>
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
					$col = 2;
					$no = $this->uri->segment(4)+1;
					echo "<table border='1' width=100%><tr>";
					$hitung = 0; 
					foreach ($detailplaylist->result_array() as $r) {	
					  	if ($hitung >= $col) {
							 echo "</tr><tr>";
							$hitung = 0;
						}
						$hitung++;
						  $lihat = $r['dilihat']+1;
						  $judull = substr($r['jdl_video'],0,33); 
						  $isi_berita =(strip_tags($r['keterangan'])); 
						  $isi = substr($isi_berita,0,280); 
						  $isi = substr($isi_berita,0,strrpos($isi," "));
						  echo "<td><h3 style='text-align:left'><a href='".base_url()."playlist/watch/$r[video_seo]' class='more'>$no. $r[jdl_video]</a></h3>";
									if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $r['youtube'], $match)) {
                                        echo "<iframe width='325px' height='210' id='ytplayer' type='text/html'
                                            src='https://www.youtube.com/embed/".$match[1]."?rel=0&showinfo=1&color=white&iv_load_policy=3'
                                            frameborder='0' allowfullscreen></iframe>";
                                    } 
						  echo "</td>";
						$no++;
					}

						echo "</tr></table>";
					?>

					<div class='wp-pagenavi'>
						<?php echo $this->pagination->create_links(); ?>
					</div>
					</div>
		</div>
	</div>
</div>
<div class="clear"></div>	

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
						