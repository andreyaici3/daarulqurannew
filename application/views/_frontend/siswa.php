<div class="home">
	<div class="breadcrumbs_container">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="breadcrumbs">
						<ul>
							<li><a href="<?= base_url() ?>">Home</a></li>
							<li>Siswa</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>			
</div>
<!-- Team -->
	<div class="team">
		<div class="team_background parallax-window" data-parallax="scroll" data-image-src="images/team_background.jpg" data-speed="0.8"></div>
		<div class="container" style="margin-top: -50px;">
			<div class="row">
				<div class="col">
					<div class="section_title_container text-center">
						<h2 class="section_title">Siswa Daarul  Qur'an</h2>
						<div class="section_subtitle"><p>Halaman Daftar Seluruh Siswa Siswi Terbaik Daarul Qur'an</p></div>
					</div>
				</div>
			</div>
			<div class="row team_row">
				<?php foreach ($siswa as $value): ?>
				<div class="col-lg-3 col-md-6 team_col">
					<div class="card" style="border: none;">
						<div class="team_item">
							<div class="team_image">
								<?php $a = $value->foto_siswa ?>
								<?php if ($a != 'default.jpg'): ?>
									<img src="<?= base_url('assets/images/siswa/' . $a) ?>" alt="" class="card-top-img">
									<?php else: ?>
										<img src="<?= base_url('assets/images/config/person.png') ?>" alt="" class="card-top-img">
								<?php endif ?>
								

							</div>
							<div class="team_body">
								<center>
									<table>
										
											<tr>
												<td align="center"><div class="team_title"><a href="#"><?= $value->nama_siswa  ?></a></div></td>
											</tr>
											<tr>
												<td align="center"><div class="team_subtitle"><?= $value->kelas  ?></div></td>
											</tr>
											<tr>
												<td align="center"><div class="team_subtitle"><?= $value->tempat_lahir . ', ' . date('d - M - Y', $value->tanggal_lahir )  ?></div></td>
											</tr>
											<tr>
												<td align="center"><div class="team_subtitle" style="margin-right: 10px; margin-left: 10px;"><i>"<?= $value->quote  ?>"</i></div></td>
											</tr>
											<tr>
												<td></td>
											</tr>
											<tr>
												<td align="center">
													<div class="social_list">
														<ul>
															<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
															<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
															<li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
														</ul>
													</div>
												</td>
											</tr>
									</table>
								</center>
							</div>
						</div>
					</div>
				</div>	
				<?php endforeach ?>
			</div>
		</div>
	</div>