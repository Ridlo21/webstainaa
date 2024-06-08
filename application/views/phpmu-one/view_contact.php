<script type="text/javascript">
	function validasi(form){
		if (form.nama.value == ""){
			alert("Anda belum mengisikan Nama");
			form.nama.focus();
			return (false);
		}
												 
		if (form.emailr.value == ""){
			alert("Anda belum mengisikan Email");
			form.emailr.focus();
			return (false);
		}
											
		if (form.pesan.value == ""){
			alert("Anda belum mengisikan Pesan / Message!!!");
			form.pesan.focus();
			return (false);
		}
											
		if (form.kode.value == ""){
			alert("Anda belum mengisikan Kode!!!");
			form.kode.focus();
			return (false);
		}
	return (true);
	}
</script>
<?php $identitas = $this->db->query("SELECT * FROM identitas")->row_array(); ?>
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
				<a title="Universitas Dharma Andalas" href="#">Universitas Indonesia Raya</a> &gt; 
				<span typeof="v:Breadcrumb">
					<a href="#">Hubungi Kami</a>
				</span>
			</div> <!-- .breadcrumb -->
									
						<h1 class="page-title">Silahkan Hubungi kami melalui Form dibawah ini</h1>
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
				<p>
				<iframe width="100%" height="330" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="<?php echo "$identitas[maps]"; ?>"></iframe>
					<div class="wpcf7" id="wpcf7-f10460-p5865-o1" lang="en-US" dir="ltr">
					<div class="screen-reader-response"></div>
					<?php 
						$attributes = array('id' => 'formku','novalidate'=>'novalidate','class'=>'wpcf7-form','onSubmit'=>'return validasi(this)');
						echo form_open('contact',$attributes);  
					?>
					<div class="field"><label>Nama <span class="req">*</span></label> 
						<span class="wpcf7-form-control-wrap nama">
						<input type="text" name="a" value="" size="40" aria-required="true" aria-invalid="false">
						</span>
					</div>
					<div class="field"><label>Email <span class="req">*</span></label> 
						<span class="wpcf7-form-control-wrap email">
						<input type="email" name="b" value="" size="40"  aria-required="true" aria-invalid="false">
						</span>
					</div>
					<div class="field"><label>Subjek <span class="req">*</span></label> 
						<span class="wpcf7-form-control-wrap email">
						<input type="email" name="c" value="" size="40"  aria-required="true" aria-invalid="false">
						</span>
					</div>
					<div class="field"><label>Pesan anda <span class="req">*</span></label> 
						<span class="wpcf7-form-control-wrap detail-pertanyaan">
						<textarea name="d" style='height:100px'  aria-required="true" aria-invalid="false"></textarea>
						</span>
					</div>
					<input type="hidden" name='cek' value=''>
					<div class="field"><label>&nbsp;</label> 
					<input type="submit" value="Kirim" name='submit' class="wpcf7-form-control wpcf7-submit">
					</div>
					<div class="wpcf7-response-output wpcf7-display-none"></div></form></div>
				</p>
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
</body>