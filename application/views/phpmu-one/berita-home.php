<div id="berita" class="block">
			<h2 id="event-block-title" class="block-title">Berita Utama</h2>
			<br>
			<?php 
				foreach ($utama->result_array() as $r){
					$tgl = tgl_indo($r['tanggal']);	
					$isi_berita =(strip_tags($r['isi_berita'])); 
					$isi = substr($isi_berita,0,155); 
					$isi = substr($isi_berita,0,strrpos($isi," ")); 
					if (trim($isi)==''){
						$isi_artikel = 'Maaf, Tidak Ada ditemukan Informasi Datam bentuk Teks, Silahkan Melihat Detail Informasi..';
					}else{
						$isi_artikel = $isi;
					}
					echo "<div class='berita-item'>
							<h4><a href='".base_url()."berita/detail/$r[judul_seo]' title='$r[judul]'>$r[judul]</a></h4>
							<div class='date'> $r[hari], $tgl, $r[jam] WIB - $r[dibaca] View</div>
							<div class='post'>		
								<div class='thumb'>";
									if ($r['gambar'] == ''){
										echo "<img width='100' height='100' src='".base_url()."asset/foto_berita/small_no-image.jpg' alt='no-image.jpg' /></a>";
									}else{
										echo "<div style='height:100px; margin-bottom:4px; overflow:hidden'><img width='100' height='100' src='".base_url()."asset/foto_berita/$r[gambar]' alt='$r[gambar]' /></div></a>";
									}
							echo "</div>								
								<p>$isi_artikel &hellip;</p>
							</div>
							<div class='clear'></div>
						</div>";
				}
			?>		
			<div class='wp-pagenavi'>
				<?php echo $this->pagination->create_links(); ?>
			</div>				
		</div>