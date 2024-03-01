<div class="home">
	<div class="breadcrumbs_container">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="breadcrumbs">
						<ul>
							<li><a href="<?= base_url() ?>">Home</a></li>
							<li>Galery</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>			
</div>
<!-- Features -->
<div class="features">
	<div class="container" style="margin-top: -50px;">
		<div class="row">
			<div class="col">
				<div class="section_title_container text-center">
					<h2 class="section_title">Welcome To Album Daarul Qur'an</h2>
					<div class="section_subtitle"><p>Ini adalah halman galery kegiatan yang telah dilaksanakan oleh Daarul Qur'an, baik dalam kegiatan Pondok Pesantren, TK/RA, Madrasah Tsanawiyah, dan juga Madrasah Aliyah.</p></div>
				</div>
			</div>
		</div>
		<div class="row features_row">
			<?php foreach ($album as $value): ?>
				<div class="col-md-3 feature_col">
					<div class="card" style="border: none;">
						<div class="feature text-center trans_400">
							<div class=""><a href="<?= base_url('galery/detail/' . $value->id_album) ?>"><img src="<?= base_url('assets/images/galery/' . $value->sampul)  ?>" alt="" class="card-img-top"></a></div>
							<div class="card-body">
								<h4 class=""><?= substr(strip_tags($value->judul_album),0,24); ?> .. </h4>
								<div class=""><p>Dalam Album ini terdapat<br><?= $value->jml ?> foto</p></div>
							</div>
						</div>
					</div>
				</div>	
			<?php endforeach ?>
		</div>
	</div>
</div>


