<div class="home">
	<div class="breadcrumbs_container">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="breadcrumbs">
						<ul>
							<li><a href="<?= base_url() ?>">Home</a></li>
							<li><a href="<?= base_url('pengumuman') ?>">Pengumuman</a></li>
							<li><?= $pengumuman[0]->judul_pengumuman  ?></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>			
</div>
<div class="blog">
	<div class="container">
		<div class="row">
			<!-- Blog Content -->
			<div class="col-lg-8">
				<div class="blog_content">
					<div class="blog_title"><?= $pengumuman[0]->judul_pengumuman  ?></div>
					<div class="blog_meta">
						<ul>
							<li>Post on <a href="#"><?= date('D, M Y', $pengumuman[0]->tanggal_pengumuman)  ?></a></li>
							<li>By <a href="#">Admin</a></li>
						</ul>
					</div>

						<p><?= htmlspecialchars_decode(htmlspecialchars_decode($pengumuman[0]->isi_pengumuman)) ?></p>
						
				</div>
				<div class="blog_extra d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-start">
					<div class="blog_tags">
						<!-- <span>Tags: </span> -->
						
					</div>
					<div class="blog_social ml-lg-auto">
						<span>Share: </span>
						<ul>
							<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
							<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
							<li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
							<li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
							<li><a href="#"><i class="fa fa-envelope" aria-hidden="true"></i></a></li>
						</ul>
					</div>
				</div>
			</div> 
		</div>
	</div>
</div>
