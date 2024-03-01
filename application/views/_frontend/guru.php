<div class="home">
	<div class="breadcrumbs_container">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="breadcrumbs">
						<ul>
							<li><a href="<?= base_url() ?>">Home</a></li>
							<li>Guru</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>			
</div>
<div class="contact">
	<div class="contact_info_container">
		<div class="container">
			<div class="row" style="margin-top: -50px;">
				<div class="col-md-12 text-center">
					<h2>Tenaga Pendidik </h2><br><br>
				</div>
				<?php foreach ($guru as $value): ?>
					<div class="col-lg-3 col-md-6 team_col">
						<div class="team_item">
							<div class="team_image"><img src="<?= base_url('assets/images/guru/' . $value->foto_guru) ?>" alt=""></div>
							<div class="team_body">
								<center>
									<table>
											<tr>
												<td align="center"><div class="team_title"><a href="#"><?= $value->nama_guru  ?></a></div></td>
											</tr>
											<tr>
												<td align="center"><div class="team_subtitle"><?= $value->nip?></div></td>
											</tr>
											<tr>
												<td align="center"><div class="team_subtitle"><?= $value->tempat_lahir . ', ' . $value->tanggal_lahir  ?></div></td>
											</tr>
											<tr>
												<td align="center"><div class="team_subtitle" style="margin-right: 10px; margin-left: 10px;"><i>"<?= $value->nama_mapel  ?>"</i></div></td>
											</tr>
											<tr>
												<td align="center"><div class="team_subtitle" style="margin-right: 10px; margin-left: 10px;"><i>"<?= $value->pendidikan  ?>"</i></div></td>
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
				<?php endforeach ?>
			</div>
		</div>
	</div>
</div>
