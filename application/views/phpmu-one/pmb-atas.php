		<div id="pmb" class="block">
			<h2 id="pmb-block-title" class="block-title"><a href="#">Link Terkait dengan Kampus</a></h2>
			<ul class="pmb-list">
				<li id="pmb-informasi-program">
					<?php $a = $this->db->query("SELECT * FROM link_terkait where id_link_terkait='4'")->row_array(); ?>
					<a target='_BLANK' href="<?php echo "$a[link]"; ?>">
						<span class="pmb-title"><?php echo "$a[judul_menu]"; ?></span>
						<span class="pmb-desc"><?php echo "$a[detail_menu]"; ?></span>
					</a>
				</li>
				<li id="pmb-pendaftaran-online">
					<?php $b = $this->db->query("SELECT * FROM link_terkait where id_link_terkait='3'")->row_array(); ?>
					<a target='_BLANK' href="<?php echo "$b[link]"; ?>">
						<span class="pmb-title"><?php echo "$b[judul_menu]"; ?></span>
						<span class="pmb-desc"><?php echo "$b[detail_menu]"; ?></span>
					</a>
				</li>
				<li id="pmb-download-formulir">
					<?php $c = $this->db->query("SELECT * FROM link_terkait where id_link_terkait='2'")->row_array(); ?>
					<a target='_BLANK' href="<?php echo "$c[link]"; ?>">
						<span class="pmb-title"><?php echo "$c[judul_menu]"; ?></span>
						<span class="pmb-desc"><?php echo "$c[detail_menu]"; ?></span>
					</a>
				</li>
				<li id="pmb-pengumuman-hasil-seleksi">
					<?php $d = $this->db->query("SELECT * FROM link_terkait where id_link_terkait='1'")->row_array(); ?>
					<a target='_BLANK' href="<?php echo "$d[link]"; ?>">
						<span class="pmb-title"><?php echo "$d[judul_menu]"; ?></span>
						<span class="pmb-desc"><?php echo "$d[detail_menu]"; ?></span>
					</a>
				</li>	
			</ul>
		</div>