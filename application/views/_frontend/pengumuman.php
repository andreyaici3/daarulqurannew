<div class="home">
		<div class="breadcrumbs_container">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="breadcrumbs">
							<ul>
								<li><a href="<?= base_url()  ?>">Home</a></li>
								<li>Pengumuman</li>
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
				<div class="row">
					<div class="col-md-12 text-center">
						<h2>Informasi Pengumuman</h2><br>
					</div>
					<div class="col-md-12">
						<table id="myTable" class="table display">
							<thead>
								<tr>
									<td class="text-center text-dark" width="50px">No</td>
									<td class="text-dark">Judul Pengumuman</td>
									<td width="150px" class="text-dark text-center">Tanggal Dibuat</td>
									<td width="100px" class="text-center text-dark">Download</td>
								</tr>
							</thead>
							<tbody>
								<?php $i = 1; foreach ($pengumuman as $value): ?>
									<tr>
										<td class="text-center text-dark"><?= $i++ ?></td>
										<td class="text-dark"><?= $value->judul_pengumuman ?></td>
										<td class="text-dark text-center"><?= date('D, d-m-Y', $value->tanggal_pengumuman )  ?></td>
										<td class="text-center  text-dark"><a class="btn btn-primary btn-sm" href="<?= base_url('pengumuman/detail/' . $value->id_pengumuman)  ?>"><i class="fa fa-info fa-fw"></i> Lihat</a></td>
									</tr>
								<?php endforeach ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>

