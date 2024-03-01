
<div class="home">
	<div class="breadcrumbs_container">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="breadcrumbs">
						<ul>
							<li><a href="<?= base_url() ?>">Home</a></li>
							<li><a href="<?= base_url('puisi') ?>"></a>Puisi</li>
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
					<h2>Karya Sastra Puisi</h2>
				</div>
				<div class="courses_container">
					<div class="row courses_row">
						<?php foreach ($berita as $value): ?>
						<div class="col-lg-6 course_col">
							<div class="course">
								<div class="course_image" style="overflow: hidden;">
                                    <?php if ($value->thumbnail_puisi != 'default.jpg') { ?>
										<a href="<?= base_url($value->slug_puisi)  ?>"><img src="<?= base_url('assets/images/puisi/') . $value->thumbnail_puisi?>" height="" width="100%" alt=""></a>
                                    <?php } else { ?>
                                        <a href="<?= base_url($value->slug_puisi)  ?>"><img style="size: cover;" src="https://upload.wikimedia.org/wikipedia/commons/0/0a/No-image-available.png" height="170px" width="100%" alt=""></a>
                                    <?php } ?> 
                                        
                                        
									
								</div>
								<div class="course_body">
									<h3 class="course_title">
                                        <?php if (strlen($value->judul_puisi) >= 24) { ?>
                                        <a href="<?= base_url($value->slug_puisi)  ?>">
                                            <?= substr(strip_tags($value->judul_puisi),0,24); ?> ..
                                        </a>
                                        <?php } else { ?> 
                                        <a href="<?= base_url($value->slug_puisi)  ?>">
                                            <?= strip_tags($value->judul_puisi) ?>
                                        </a>
                                        <?php } ?>
                                    </h3>
									<!-- <div class="course_teacher">Author: <?= $value->name  ?></div> -->
									<div class="course_text">
                                        <style>
                                            p {
                                                margin-bottom: 1px;
                                            }
                                        </style>
                                        
										<?= htmlspecialchars_decode(htmlspecialchars_decode(substr(strip_tags($value->isi_puisi),0,120)))  ?> 
                                        <br><a class="btn" style="float: right; height: 10%;" href="<?= base_url($value->slug_puisi)  ?>">
                                         Read More ...</a> 
                                         <div style="clear: both;"></div>
									</div>
								</div>
								<div class="course_footer">
									<div class="course_footer_content d-flex flex-row align-items-center justify-content-start">
										<div class="course_info">
											<i class="fa fa-calendar" aria-hidden="true"></i>
											<span style="font-size: 10px;">Created: <?= date('d-m-Y', $value->date_created_puisi) ?></span>
										</div>				
										<div class="course_info">
											<i class="fa fa-calendar" aria-hidden="true"></i>
											<span style="font-size: 10px;">Last Update: <?= date('d-m-Y', $value->date_updated_puisi) ?></span>
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
						<div class="sidebar_section_title">Puisi Terbaru</div>
						<div class="sidebar_latest">
							<?php foreach ($latestBerita as $value): ?>
								
							
							<!-- Latest Course -->
								<div class="latest d-flex flex-row align-items-start justify-content-start">
									<div class="latest_image">
                                        <div>
                                            <?php if ($value->thumbnail_puisi != 'default.jpg') { ?>
                                                <img src="<?= base_url('assets/images/puisi/') . $value->thumbnail_puisi?>">
                                            <?php } else { ?>
                                                <img style="size: cover;" src="https://upload.wikimedia.org/wikipedia/commons/0/0a/No-image-available.png">
                                            <?php } ?> 
                                        </div>
                                    </div>
									<div class="latest_content">
										<div class="latest_title"><a href="<?= base_url($value->slug_puisi) ?>"><?= $value->judul_puisi ?></a></div>
										<div class="latest_date"><?= date('M d, Y', $value->date_created_puisi)  ?></div>
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