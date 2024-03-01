<div class="home">
	<div class="breadcrumbs_container">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="breadcrumbs">
						<ul>
							<li><a href="<?= base_url() ?>">Home</a></li>
							<li><a href="<?= base_url('galery') ?>"></a>Galery</li>
							<li><?= $detail['galery'][0]->judul_album ?></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>			
</div>
<div class="features">
	<div class="container" style="margin-top: -50px;">
		<div class="row">
			<div class="col">
				<div class="section_title_container text-center">
					<h2 class="section_title">Welcome To Album Daarul Qur'an <br><hr> <h3><?= $detail['galery'][0]->judul_album ?></h3></h2>
					<div class="section_subtitle"><p>Ini adalah halaman galery kegiatan yang telah dilaksanakan oleh Daarul Qur'an, baik dalam kegiatan Pondok Pesantren, TK/RA, Madrasah Tsanawiyah, dan juga Madrasah Aliyah.</p></div>
				</div>
				
			</div>
		</div>
		<div class="row features_row">
			<?php foreach ($detail['foto'] as $value): ?>
				<div class="col-md-3 feature_col">
					<div class="card" style="border: none;">
						<div class="feature text-center trans_400">
							<div><a href="<?= base_url('assets/images/galery/' . $value->foto) ?>"><img src="<?= base_url('assets/images/galery/' . $value->foto)  ?>" alt="" class="card-img-top"></a></div>
							<div class="card-body">
								<h4><?= $value->ket_foto ?></h4>
							</div>
						</div>
					</div>
				</div>					
			<?php endforeach ?>
		</div>	
	</div>
</div>