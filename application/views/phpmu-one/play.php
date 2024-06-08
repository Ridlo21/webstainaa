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
				<a title="Universitas Indonesia Raya" href="#">Video</a> &gt; 
					<?php echo "$rows[jdl_video]"; ?>
			</div> <!-- .breadcrumb -->
									
						<h1 class="page-title"><?php echo "$rows[jdl_video]"; ?></h1>
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
						if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $rows['youtube'], $match)) {
					        echo "<iframe width='100%' height='390px' id='ytplayer' type='text/html'
					            src='https://www.youtube.com/embed/".$match[1]."?rel=0&showinfo=1&color=white&iv_load_policy=3'
					            frameborder='0' allowfullscreen></iframe>";
					    } 

					    echo "$rows[keterangan]";
					?>
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
						
					
