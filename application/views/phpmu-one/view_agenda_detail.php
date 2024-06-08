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
			<?php		  
				$tgl_posting   = tgl_indo($record['tgl_posting']);
				$tgl_mulai   = tgl_indo($record['tgl_mulai']);
				$tgl_selesai = tgl_indo($record['tgl_selesai']);
				$isi_agenda=$record['isi_agenda'];
				 $baca = $record['dibaca']+1;
				 if (trim($record['tempat'])==''){
				 	$tempat = 'Universitas Dharma Andalas Padang';
				 }else{
				 	$tempat = $record['tempat'];
				 }
				 
					echo "<h1 class='page-title'><a href='#'>$record[tema]</a></h1>
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
					</div>
					<span style='float:right'>Posted by Administrator, $tgl_posting</span>
					<div class='post'>
						<div class='wpcf7' id='wpcf7-f10460-p5865-o1' lang='en-US' dir='ltr'>
							<div class='field'><label>Nama Tempat </label> :  
								<span class='wpcf7-form-control-wrap nama'>
									$tempat
								</span>
							</div>
							<div class='field'><label>Waktu </label> : 
								<span class='wpcf7-form-control-wrap nama'>
									$tgl_mulai s/d $tgl_selesai, $record[jam]
								</span>
							</div>
							<div class='field'><span class='wpcf7-form-control-wrap email'>
									$isi_agenda
								</span>
							</div>";
							if (trim($record['gambar'])!=''){
								echo "<div class='field'><span class='wpcf7-form-control-wrap email'>
										<center><img style='width:100%' src='".base_url()."asset/foto_agenda/$record[gambar]' border='0' ><center>
									</span>
								</div>";
							}
						echo "</div>
					</div>
					<div class='clear'></div>";		  
				
			?>
			
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