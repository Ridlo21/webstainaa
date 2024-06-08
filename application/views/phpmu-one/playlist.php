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
				<a title="Universitas Indonesia Raya" href="#">Universitas Indonesia Raya</a> &gt; 
					Semua Playlist
			</div> <!-- .breadcrumb -->
									
						<h1 class="page-title">Semua Playlist</h1>
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
							$col = 3;
							$no = $this->uri->segment(3)+1;
							echo "<table border='1' width=100%><tr>";
							$hitung = 0;      
							foreach ($playlist->result_array() as $h) {	
							if ($hitung >= $col) {
								 echo "</tr><tr>";
								$hitung = 0;
							}
							$hitung++;
							$total_video = $this->model_utama->view_where('video',array('id_playlist' => $h['id_playlist']))->num_rows();
								echo "<td style='width:33%'>
										<div style='overflow:hidden; height:133px;'>";
												if ($h['gbr_playlist'] ==''){
													echo "<a class='hover-effect' href='".base_url()."playlist/detail/$h[playlist_seo]'><img style='width:100%; height:133px' src='".base_url()."asset/img_playlist/no-image.jpg' alt='no-image.jpg' /></a>";
												}else{
													echo "<a class='hover-effect' href='".base_url()."playlist/detail/$h[playlist_seo]'><img style='width:100%; height:133px' src='".base_url()."asset/img_playlist/$h[gbr_playlist]' alt='$h[gbr_playlist]' /></a>";
												}
										echo "</a>
										</div>
										<center>Ada $total_video Video<br>
											<a href='".base_url()."playlist/detail/$h[playlist_seo]'>$h[jdl_playlist]</a></center>
									  </td>";
							}
							echo "</tr></table>";
						?>
					<div class='wp-pagenavi'>
						<?php echo $this->pagination->create_links(); ?>
					</div>
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