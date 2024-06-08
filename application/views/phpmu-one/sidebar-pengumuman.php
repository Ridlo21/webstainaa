<?php
$r = $this->db->query("SELECT * FROM kategori where sidebar='1'")->row_array(); 
echo "<h2 id='pengumuman-block-title' class='block-title'>$r[nama_kategori]</h2>
	<ul class='block-list'>";
		$random2 = $this->db->query("SELECT * FROM berita 
												left join users on berita.username=users.username
													left join kategori on berita.id_kategori=kategori.id_kategori
														where berita.id_kategori='$r[id_kategori]' order by id_berita DESC LIMIT 14");
		foreach ($random2->result_array() as $r2){
		$tglr2 = tgl_indo($r2['tanggal']);
			echo "<li><a href='berita/detail/$r2[judul_seo]' title='$r2[judul]'>$r2[judul]</a></li>";
		}
	echo "</ul>
	<h3 class='block-title-arsip'><a href='".base_url()."berita/kategori/$r[kategori_seo]'>Arsip Pengumuman</a></h3>";
?>