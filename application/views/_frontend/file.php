<div class="home">
		<div class="breadcrumbs_container">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="breadcrumbs">
							<ul>
								<li><a href="<?= base_url()  ?>">Home</a></li>
								<li>Download</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>			
	</div>
	<div class="contact">
		<div class="contact_info_container">
			<div class="container" style="margin-top: -50px;">
				<div class="row">
					<div class="col-md-12 text-center">
						<h2>Download Area</h2><br>
					</div>
					<div class="col-md-12">
						<table id="myTable" class="table display">
							<thead>
								<tr>
									<td class="text-center text-dark" width="50px">No</td>
									<td class="text-dark">Keterangan File</td>
									<td width="100px" class="text-center text-dark">Download</td>
								</tr>
							</thead>
							<tbody>
								<?php $i = 1; foreach ($file as $value): ?>
									<tr>
										<td class="text-center text-dark"><?= $i++ ?></td>
										<td class="text-dark"><?= $value->ket_file ?></td>
										<td class="text-center  text-dark"><a class="btn btn-primary btn-sm" href="<?= base_url('assets/file/' . $value->nama_file)  ?>"><i class="fa fa-download fa-fw"></i> Download</a></td>
									</tr>
								<?php endforeach ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>

