<!--<div class="fb-page" data-href="https://www.facebook.com/pehapemu/" data-tabs="timeline" data-width="248" data-small-header="true" data-adapt-container-width="false" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/pehapemu/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/pehapemu/">PHPMU.COM Security</a></blockquote></div>-->
<!--<div style='clear:both'></div><br><hr>-->
		<h2 id="lowongan-block-title" class="block-title">Daftar Link</h2>
			<ul>
				<?php 
					$random2 = $this->db->query("SELECT * FROM lowongan order by id_lowongan DESC LIMIT 15");
					foreach ($random2->result_array() as $r2){
					$tglr2 = tgl_indo($r2['tanggal_posting']);
						echo "<li><a href='lowongan/detail/$r2[judul_seo]' title='$r2[judul]'>$r2[judul]</a></li>";
					}
			echo "</ul>
				<h3 class='block-title-arsip'><a href='".base_url()."lowongan'>Daftar Link</a></h3>";
				?>