		<div class="wrap">
			<div id="about">
                            <img src="<?php echo base_url();?>asset/logo/logo_naa.png" style="width: 48px"/>
				<?php 
					$identitas = $this->db->query("SELECT * FROM identitas")->row_array();
					echo "$identitas[keterangan]"; 
				?>
			</div>
			
			<span id="copy">&copy; <?php echo date('Y'); ?> Pondok Pesantren Nurul Abror Al Robbaniyin</span>
			<span id="social">
				Follow Pon Pes Nurul Abror Al Robbaniyin : 
				<a href="#" target="_blank"><img src="<?php echo base_url();?>asset/images/fb.png" alt="Facebook" width="16" height="16"></a>
				<a href="#" target="_blank"><img src="<?php echo base_url();?>asset/images/tw.png" alt="Twitter" width="16" height="16"></a>
				<a href="#" target="_blank"><img src="<?php echo base_url();?>asset/images/linkedin.png" alt="Linked" width="16" height="16"></a>
				<a href="#" target="_blank"><img src="<?php echo base_url();?>asset/images/yt.png" alt="Youtube" width="16" height="16"></a>
			</span>
			<div class="clear"></div>
		</div>