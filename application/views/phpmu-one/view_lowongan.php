<div id="content-container" class="wrap">
	<div id="sidebar">
		<?php include "sidebar-artikel.php"; ?>
	</div>
	
	<div id="content-wrap">
		<div id="header-int">
            <?php $logo = $this->db->query("SELECT * FROM logo")->row_array(); ?>
            <img src="<?php echo base_url(); ?>asset/logo/<?php echo $logo['gambar']; ?>" alt="header-int" />
        </div>

		<div id="content">	<br>
			<h1 class='page-title'><a  href='#'><?php echo $title; ?></a></h1>
			<div class='sosnet'>
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
					</div><div class='clear'></div><br><br>

			<?php	  
				foreach ($lowongan->result_array() as $record){
					$tgl_posting = tgl_indo($record['tanggal_posting']);
					$deadline = tgl_indo($record['deadline']);
					$posisi = nl2br($record['posisi']);
					$keterangan = nl2br($record['keterangan']);
						echo "<div class='clear'></div><b style='float:right'>Deadline : 	<span style='color:red'>$deadline</span></b>
							  <h1 style='font-size:18px; margin-bottom:15px; padding-bottom:0px;' class='page-title'><a style='color:#8a8a8a' href='".base_url()."lowongan/detail/$record[judul_seo]'>$record[judul]</a></h1>
							  <div class='clear'></div>";	
				}
			?>
			<div class='wp-pagenavi'>
				<?php echo $this->pagination->create_links(); ?>
			</div>	
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