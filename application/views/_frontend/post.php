<!-- Home -->
	<div class="home">
		<div class="breadcrumbs_container">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="breadcrumbs">
							<ul>
								<li><a href="<?= base_url() ?>">Home</a></li>
								<li><a href="<?= base_url('berita') ?>">Berita</a></li>
								<li><?= substr(strip_tags($berita[0]->judul_berita),0,50) . '..'; ?></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>			
	</div>
	<!-- Blog -->
	<!-- Blog -->

	<div class="blog" >
		<div class="container">
			<div class="row" style="margin-top: -50px;">
				<!-- Blog Content -->
				<div class="col-lg-8">
					<div class="blog_content">
						<div class="blog_title"><?= $berita[0]->judul_berita  ?></div>
						<div class="blog_meta">
							<ul>
								<li>Post on <a href="#"><?= date('M d, Y', $berita[0]->tanggal_berita) ?></a></li>
								<li>By <a href="#"><?= $berita[0]->name  ?></a></li>
							</ul>
						</div>
						<div class="blog_image"><img src="<?= base_url('assets/images/berita/') . $berita[0]->gambar_berita?>" alt=""></div>
							
								<?= htmlspecialchars_decode(htmlspecialchars_decode($berita[0]->isi_berita))  ?>
						
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
					<!-- Comments -->
					<!--<div class="comments_container">
						 <div class="comments_title"><span>0</span> Comments</div> 
						<div class="add_comment_container">
							<div class="add_comment_title">Write a comment</div>
							<div class="add_comment_text">Your email address will not be published. Required fields are marked *</div>
							<form action="#" class="comment_form">
								<div>
									<div class="form_title">Review*</div>
									<textarea class="comment_input comment_textarea" required="required"></textarea>
								</div>
								<div class="row">
									<div class="col-md-6 input_col">
										<div class="form_title">Name*</div>
										<input type="text" class="comment_input" required="required">
									</div>
									<div class="col-md-6 input_col">
										<div class="form_title">Email*</div>
										<input type="text" class="comment_input" required="required">
									</div>
								</div>
								<div class="comment_notify">
									<input type="checkbox" id="checkbox_notify" name="regular_checkbox" class="regular_checkbox checkbox_account" checked>
									<label for="checkbox_notify"><i class="fa fa-check" aria-hidden="true"></i></label>
									<span>Notify me of new posts by email</span>
								</div>
								<div>
									<button type="submit" class="comment_button trans_200">submit</button>
								</div>
							</form>
						</div>
					</div>-->
				</div> 

				<!-- Blog Sidebar -->
				<div class="col-lg-4">
					<div class="sidebar">
						<!-- Latest News -->
						<div class="sidebar_section">
							<div class="sidebar_section_title">Berita Terbaru</div>
							<div class="sidebar_latest">

								<!-- Latest Course -->
								<?php foreach ($latestBerita as $value): ?>
								<div class="latest d-flex flex-row align-items-start justify-content-start">
									<div class="latest_image"><div><img src="<?= base_url('assets/images/berita/') . $value->gambar_berita?>" alt=""></div></div>
									<div class="latest_content">
										<div class="latest_title"><a href="<?= base_url('berita/post/' . $value->slug_berita) ?>"><?= $value->judul_berita ?></a></div>
										<div class="latest_date"><?= date('M d, Y', $value->tanggal_berita)  ?></div>
									</div>
								</div>
								<?php endforeach ?>	
							</div>
						</div>

						<!-- Banner -->
						<!-- <div class="sidebar_section">
							<div class="sidebar_banner d-flex flex-column align-items-center justify-content-center text-center">
								<div class="sidebar_banner_background" style="background-image:url(images/banner_1.jpg)"></div>
								<div class="sidebar_banner_overlay"></div>
								<div class="sidebar_banner_content">
									<div class="banner_title">Free Book</div>
									<div class="banner_button"><a href="#">download now</a></div>
								</div>
							</div>
						</div> -->

					</div>
				</div>
			</div>
		</div>
	</div>