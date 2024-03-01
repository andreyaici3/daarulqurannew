<div class="home">
		<div class="home_slider_container">
			<!-- Home Slider -->
			<div class="owl-carousel owl-theme home_slider">
				<!-- Home Slider Item1 -->
				<div class="owl-item">
					<div class="home_slider_background" style="background-image:url(<?= base_url() ?>assets/images/config/1_abah_umi.jpg"></div>
					<div class="home_slider_content">
						<div class="container">
							<div class="row">
								<div class="col text-center">
									<div class="home_slider_title" style="color: white; position: absolute; left: 15%; top: 320%;">Pengasuh Pondok Pesantren</div>
									<div class="home_slider_subtitle"></div>
									<div class="home_slider_form_container">
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- Home Slider Item1 -->
				<div class="owl-item">
					<div class="home_slider_background" style="background-image:url(<?= base_url() ?>assets/images/config/4.jpg"></div>
					<div class="home_slider_content">
						<div class="container">
							<div class="row">
								<div class="col text-center" style="margin-top: 100px;">
									<div class="home_slider_title" style="color: white; font-weight: bold;">Laboratorium Komputer</div>
									<div class="home_slider_subtitle" style="color: white; margin-top: -10px;">Dilengkapi dengan fasilitas laboratorium komputer untuk praktek </div>
									<div class="home_slider_form_container">
										
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- Home Slider Item1 -->
				<div class="owl-item">
					<div class="home_slider_background" style="background-image:url(<?= base_url() ?>assets/images/config/1.jpg"></div>
					<div class="home_slider_content">
						<div class="container">
							<div class="row">
								<div class="col text-center">
									<div class="home_slider_title" style="color: black;"></div>
									<div class="home_slider_subtitle"> </div>
									<div class="home_slider_form_container">
										
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Home Slider Nav -->
		<div class="home_slider_nav home_slider_prev"><i class="fa fa-angle-left" aria-hidden="true"></i></div>
		<div class="home_slider_nav home_slider_next"><i class="fa fa-angle-right" aria-hidden="true"></i></div>
	</div>

	<!-- logo logo -->
	<div class="features">
		<div class="container">
			<div class="row">
				<div class="col mb-4">
					<div class="section_title_container text-center">
						<h2 class="section_title">Selamat Datang di website Daarul Qur'an</h2>
						<div class="section_subtitle"><p>Berikut adalah pendidikan yang bisa ditempuh di yayasan kami</p></div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-3 mt-4">
					<img src="<?= base_url() ?>assets/images/config/pp1.png" alt="" class="card-img-top">
					<div class="card-body text-center">
						<h4 class="card-text">Ponpes - Daarul Qur'an</h4>
						<p class="card-text">Terbuka Untuk Umum</p>
					</div>
				</div>
				<div class="col-md-3 mt-4">
					<img src="<?= base_url() ?>assets/images/config/ra.png" alt="" class="card-img-top">
					<div class="card-body text-center">
						<h4 class="card-text">RA - Daarul Qur'an</h4>
						<p class="card-text">Pendidikan Sebelum SD</p>
					</div>
				</div>
				<div class="col-md-3 mt-4">
					<img src="<?= base_url() ?>assets/images/config/mts.png" alt="" class="card-img-top">
					<div class="card-body text-center">
						<h4 class="card-text">MTS - Daarul Qur'an</h4>
						<p class="card-text">Pendidikan Sebelum SMA / MA / SMK</p>
					</div>
				</div>
				<div class="col-md-3 mt-4">
					<img src="<?= base_url() ?>assets/images/config/ma1.png" alt="" class="card-img-top">
					<div class="card-body text-center">
						<h4 class="card-text">MA - Daarul Qur'an</h4>
						<p class="card-text">Pendidikan Sebelum Perguruan Tinggi</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end logo -->

	<!-- berita terbaru -->
	 <div class="courses">
		<div class="section_background parallax-window" data-parallax="scroll" data-image-src="<?= base_url() ?>assets/front/images/courses_background.jpg" data-speed="0.8"></div>
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="section_title_container text-center">
						<h2 class="section_title">Berita Terbaru</h2>
						<div class="section_subtitle"><p>Berikut adalah berita terbaru yang di posting oleh admin kami</p></div>
					</div>
				</div>
			</div>
			<div class="row courses_row">
				<?php foreach ($berita as $value): ?>
				<div class="col-md-4 mb-4 mt-4">
					<div class="course card-img-top">
						<div class="course_image image-fluid"><img src="<?= base_url() ?>assets/images/berita/<?= $value->gambar_berita  ?>" alt=""></div>
						<div class="course_body">
							<h3 class="course_title"><a href="<?= base_url($value->slug_berita) ?>"><?= substr($value->judul_berita, 0,25) . '..'  ?></a></h3>
							<div class="course_teacher">Author: <?= $value->name  ?></div>
							<div class="course_text">
								<?= substr(strip_tags($value->isi_berita),0,100)  ?>
							</div>
						</div>
						<div class="course_footer">
							<div class="course_footer_content d-flex flex-row align-items-center justify-content-start">
								<div class="course_info">
									<i class="fa fa-calendar" aria-hidden="true"></i>
									<span style="font-size: 10px;">Created: <?= date('d-m-Y', $value->tanggal_berita); ?></span>
								</div>				
								<div class="course_info">
									<i class="fa fa-calendar" aria-hidden="true"></i>
									<span style="font-size: 10px;">Last Update: <?= date('d-m-Y', $value->terakhir_diupdate) ?></span>
								</div>
							</div>
						</div>
					</div>
				</div>

				<?php endforeach ?>

				
			<div class="courses_button trans_200"><a href="<?= base_url() ?>berita">Lihat Semua Berita</a></div>
		</div>
	</div>
</div>
<!-- end berita terbaru -->

<!-- team -->
<!-- Team -->
	<div class="team">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="section_title_container text-center">
						<h2 class="section_title">Kontributor Mahasiswa</h2>
						<div class="section_subtitle"><p>berikut adalah mahasiswa yang telah berkontribusi dengan Daarul Qur'an</p></div>
					</div>
				</div>
			</div>
			<div class="row team_row">
				<!-- Team Item -->
				<div class="col-lg-3 col-md-6 team_col">
					<div class="team_item">
						<div class="team_image"><img class="img-thumbnail img-responsive" src="<?= base_url(); ?>assets/images/config/deni.png" alt=""></div>
						<div class="team_body">
							<div class="team_title"><a href="#">Deni Agusta</a></div>
							<div class="team_subtitle">Web Developer & IT Support</div>
							<div class="social_list">
								<ul>
									<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
									<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
									<li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<!-- Team Item -->
				<div class="col-lg-3 col-md-6 team_col">
					<div class="team_item">
						<div class="team_image"><img class="img-thumbnail img-responsive" src="<?= base_url(); ?>assets/images/config/dini.png" alt=""></div>
						<div class="team_body">
							<div class="team_title"><a href="#">Puang Andini</a></div>
							<div class="team_subtitle">Design & Editing</div>
							<div class="social_list">
								<ul>
									<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
									<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
									<li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<!-- Team Item -->
				<div class="col-lg-3 col-md-6 team_col">
					<div class="team_item">
						<div class="team_image"><img class="img-thumbnail img-responsive" src="<?= base_url(); ?>assets/images/config/riki.png" alt=""></div>
						<div class="team_body">
							<div class="team_title"><a href="#">Riki Permana</a></div>
							<div class="team_subtitle">Multimedia</div>
							<div class="social_list">
								<ul>
									<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
									<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
									<li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<!-- Team Item -->
				<div class="col-lg-3 col-md-6 team_col">
					<div class="team_item">
						<div class="team_image"><img class="img-thumbnail img-responsive" src="<?= base_url(); ?>assets/images/config/tahrul.png" alt=""></div>
						<div class="team_body">
							<div class="team_title"><a href="#">Tahrul Muttaqin</a></div>
							<div class="team_subtitle">Siswa MA Daarul Quran</div>
							<div class="social_list">
								<ul>
									<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
									<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
									<li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<!-- end team -->

<!-- sponsor	 -->
<div class="team">
		<div class="team_background parallax-window" data-parallax="scroll" data-image-src="<?= base_url() ?>assets/front/images/team_background.jpg" data-speed="0.8"></div>
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="section_title_container text-center">
						<h2 class="section_title">Sponsor</h2>
						<div class="section_subtitle"><p>Berikut ini adalah pihak pihak yang telah telah bekerja sama dengan daarul Qur'an</p></div>
					</div>
				</div>
			</div>
			<div class="row team_row">
				<h3 class="section_title_container">Sorry, Sponsor Under Construction</h3>
				<!-- <div class="col-lg-3 col-md-6 team_col">
					<div class="team_item">
						<div class="team_image"><img src="<?= base_url() ?>assets/front/images/team_1.jpg" alt=""></div>
						<div class="team_body">
							<div class="team_title"><a href="#">Jacke Masito</a></div>
							<div class="team_subtitle">Marketing & Management</div>
							<div class="social_list">
								<ul>
									<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
									<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
									<li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
								</ul>
							</div>
						</div>
					</div>
				</div> -->
			</div>
		</div>
	</div>
<!-- end sponsor -->

<!-- latest -->
<div class="news">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="section_title_container text-center">
						<h2 class="section_title">Pengumuman</h2>
						<div class="section_subtitle"><p>Majalah Online Tempat Berita</p></div>
					</div>
				</div>
			</div>
			<div class="row news_row">
				<div class="col-lg-7 news_col">
					
					<!-- News Post Large -->
					<div class="news_post_large_container">
						<div class="news_post_large">
							<div class="news_post_image"><img src="<?= base_url('assets/'); ?>images/config/4.jpg" alt=""></div>
							<div class="news_post_large_title"><a href="<?= base_url('home/pengumuman'); ?>">Sering - seringlah membuka halaman ini</a></div>
							<div class="news_post_meta">
								<ul>
									<li><a href="#">admin</a></li>
									
								</ul>
							</div>
							<div class="news_post_text">
								<p>Halaman ini berisi informasi seluruh tugas, dan juga agenda kegiatan yang akan datang. jadi saya mohon untuk siswa / siswi yang sedang menempuh pendidikan di Daarul Qur'an sering sering lah membuka halaman ini, agar tidak ketinggalan informasi.</p>
							</div>
							<div class="news_post_link"><a href="<?= base_url('pengumuman')  ?>">read more</a></div>
						</div>
					</div>
				</div>
				<div class="col-lg-5 news_col">
					<div class="news_posts_small">
						<?php foreach ($pengumuman as $value): ?>
							<div class="news_post_small">
								<div class="news_post_small_title"><a href="<?= base_url('pengumuman/detail/' . $value->id_pengumuman) ?>"><?= $value->judul_pengumuman ?></a>
								</div>
								<div class="news_post_meta">
									<ul>
										<li><a href="#">admin</a></li>
										<li><a href="#"><?= $value->tanggal_pengumuman ?></a></li>
									</ul>
								</div>
							</div>
						<?php endforeach ?>
					</div>
				</div>
			</div>
		</div>
	</div>
<!-- end latest -->