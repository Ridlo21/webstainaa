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
				$tgl_posting = tgl_indo($record['tanggal_posting']);
				$deadline = tgl_indo($record['deadline']);
				$posisi = nl2br($record['posisi']);
				$keterangan = nl2br($record['keterangan']);
					echo "<h1 class='page-title'><a href='lihat-lowongan-$record[judul_seo].html'>$record[judul]</a></h1>
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
					<b style='float:right'>Posted : 	<span style='color:red'>$tgl_posting</span></b>
					<div class='post'>
							<div class='lowongan-fieldset'>
								<div class='lowongan-label'>Nama Perusahaan:</div> <div class='lowongan-field'>$record[nama_perusahaan]</div>
							</div>
							<div class='lowongan-fieldset'>
								<div class='lowongan-label'>Deskripsi Perusahaan:</div> <div class='lowongan-field'><p>$record[deskripsi_perusahaan]</p></div>
							</div>
							<div class='lowongan-fieldset'>
								<div class='lowongan-label'>Posisi yang Ditawarkan:</div> <div class='lowongan-field'><p>$posisi</p></div>
							</div>
							<div class='lowongan-fieldset'>
								<div class='lowongan-label'>Deadline:</div> <div class='lowongan-field'>$deadline</div>
							</div>
							<div class='lowongan-fieldset'>
								<div class='lowongan-label'>Keterangan:</div> <div class='lowongan-field'><p>$keterangan</p></div>
							</div>
							<div class='lowongan-fieldset'>
								<div class='lowongan-label'>File Pendukung:</div> <div class='lowongan-field'><a href='".base_url()."lowongan/file/$record[file_pendukung]' class='lowongan-attach'>Download</a></div>
							</div>
					</div><div class='clear'></div>";		  
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