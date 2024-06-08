<h2 id="event-block-title" class="block-title">Agenda Terbaru dari Kampus</h2>
	<div class="cycle-slideshow event-wrap" data-cycle-slides="div" data-cycle-fx="carousel" data-cycle-timeout="5000" data-cycle-carousel-fluid="false" data-cycle-next="#event-next" data-cycle-prev="#event-prev">
					<?php  
						$sql = $this->db->query("SELECT * FROM agenda ORDER BY id_agenda DESC LIMIT 5");		 
						foreach ($sql->result_array() as $d){
							$tgl_posting = tgl_indo($d['tgl_posting']);
							$tgl_mulai   = tgl_indo($d['tgl_mulai']);
							$tgl_selesai = tgl_indo($d['tgl_selesai']);
							if (trim($d['isi_agenda'])==''){
								$isi = 'Maaf, Tidak Ada Keterangan Unutk agenda ini..'; 
							}else{
								$isi = substr($d['isi_agenda'],0,80); 
							}
							echo "<div class='event-item'>
									<ul>
										<li class='event-item-title'><a href='agenda/detail/$d[tema_seo]'>$d[tema]</a></li>
										<li style='color:orange' class='event-item-date'>$tgl_mulai s/d $tgl_selesai</li>						
										<li class='event-item-location'>".strip_tags($isi)."...</li>
									</ul>
								  </div>";
						}
					?>
	
	</div>