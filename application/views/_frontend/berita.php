<div class="home">
	<div class="breadcrumbs_container">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="breadcrumbs">
						<ul>
							<li><a href="<?= base_url() ?>">Home</a></li>
							<li><a href="<?= base_url('berita') ?>"></a>Berita</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>			
</div>

<div class="courses" style="margin-top: -50px;">
	<div class="container">
		<div class="row">
			<div class="col-lg-8">
				<div class="courses_search_container">
					<h2>Berita</h2>
				</div>
				<div class="courses_container">
					<div class="row courses_row">
						<?php foreach ($berita as $value): ?>
						<div class="col-lg-6 course_col">
							<div class="course">
								<div class="course_image" style="overflow: hidden;">
									
										<img src="<?= base_url('assets/images/berita/') . $value->gambar_berita?>" height="170px" width="100%" alt="">
									
								</div>
								<div class="course_body">
									<h3 class="course_title"><a href="<?= base_url($value->slug_berita)  ?>"><?= substr(strip_tags($value->judul_berita),0,24); ?> ..</a></h3>
									<div class="course_teacher">Author: <?= $value->name  ?></div>
									<div class="course_text">
										<?= htmlspecialchars_decode(htmlspecialchars_decode(substr(strip_tags($value->isi_berita),0,100)))  ?> ... <a href="<?= base_url($value->slug_berita)  ?>">Read More</a> 
									</div>
								</div>
								<div class="course_footer">
									<div class="course_footer_content d-flex flex-row align-items-center justify-content-start">
										<div class="course_info">
											<i class="fa fa-calendar" aria-hidden="true"></i>
											<span style="font-size: 10px;">Created: 20-04-2020</span>
										</div>				
										<div class="course_info">
											<i class="fa fa-calendar" aria-hidden="true"></i>
											<span style="font-size: 10px;">Last Update: 20-04-2020</span>
										</div>
									</div>
								</div>
							</div>
						</div>	
						<?php endforeach ?>												
					</div>
					<div class="row pagination_row">
						<div class="col">
							 <?= $page ?>
								<div class="courses_show_container ml-auto clearfix">
									<div class="courses_show_text">Showing <span class="courses_showing">1-6</span> of <span class="courses_total">26</span> results</div>
								</div>
							</div> 
						</div>
							
						</div>
				</div>
			<!-- </div> -->

			<!-- Courses Sidebar -->
			<div class="col-lg-4">
				<div class="sidebar">
					<div class="sidebar_section">
						<div class="sidebar_section_title">Berita Terbaru</div>
						<div class="sidebar_latest">
							<?php foreach ($latestBerita as $value): ?>
								
							
							<!-- Latest Course -->
								<div class="latest d-flex flex-row align-items-start justify-content-start">
									<div class="latest_image"><div><img src="<?= base_url('assets/images/berita/') . $value->gambar_berita?>" alt=""></div></div>
									<div class="latest_content">
										<div class="latest_title"><a href="<?= base_url($value->slug_berita) ?>"><?= $value->judul_berita ?></a></div>
										<div class="latest_date"><?= date('M d, Y', $value->tanggal_berita)  ?></div>
									</div>
								</div>	
							<?php endforeach ?>						
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>



