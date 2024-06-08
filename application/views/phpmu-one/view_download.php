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
					Semua File Download
			</div> <!-- .breadcrumb -->
									
						<h1 class="page-title">Semua File Download</h1>
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
									<table class='table-download' border='' style='font-weight:bold;' width='100%'>
										<tr bgcolor="#82ee96">
											<th style='border:2px solid #fff; color:#000; padding-left:5px; padding-top:7px; padding-bottom:7px;'>No</th>
											<th style='border:2px solid #fff; color:#000; padding-left:5px;'>Nama File</th>
											<th style='border:2px solid #fff; color:#000; padding-left:5px; width:60px'>Hits</th>
											<th style='border:2px solid #fff; color:#000; padding-left:5px; width:60px'></th>
										</tr>
										
								<?php
											$no = $this->uri->segment(3)+1;
											foreach ($download->result_array() as $r){
											if(($no % 2)==0){ $warna="#ffffff";}
											else{ $warna="#dcfbe2"; }
											$tgl=tgl_indo($r['tgl_posting']);
												echo "<tr bgcolor=$warna><td style='border:2px solid #fff; padding-left:5px; padding-top:7px; padding-bottom:7px;'>$no</td>
													  <td style='border:2px solid #fff; padding-left:5px;'>$r[judul]</td>
													  <td style='border:2px solid #fff; padding-left:5px;'>$r[hits] Kali</td>
													  <td style='border:2px solid #fff; padding-left:5px;'><a href='".base_url()."download/file/$r[nama_file]'>Download</a></td></tr>";
											$no++;
											}
											
									echo "</table>";
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