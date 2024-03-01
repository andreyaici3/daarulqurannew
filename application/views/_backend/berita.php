<?php if (@$type == 'list'): ?>
	<div class="content-wrapper">
		<div class="content-header">
		  <div class="container-fluid">
		    <div class="row mb-2">
		      <div class="col-sm-6">
		        <h1 class="m-0 text-dark">Data Berita <a href="berita/add" class="badge badge-primary badge-sm">Tambah</a></h1> 
		      </div>
		      <div class="col-sm-6">
		        <ol class="breadcrumb float-sm-right">
		          <li class="breadcrumb-item"><a href="<?= base_url('admin')  ?>">Dashboard</a></li>
		          <li class="breadcrumb-item active"><?= $this->uri->segment(2)  ?></li>
		        </ol>
		      </div>
		    </div>
		  </div>
		  <hr>
		</div>
		<section class="content">
		  <div class="container-fluid">
		    <?=  $this->session->flashdata('msgi') ?>
		    <div class="row">
		      <div class="col-md">
		        <div class="card">
		          <div class="card-header">
		            <h3 class="card-title">Daftar Berita</h3>
		            <div class="card-tools">
		              <button type="button" class="btn btn-tool" data-card-widget="collapse">
		                <i class="fas fa-minus"></i>
		              </button>
		              <button type="button" class="btn btn-tool" data-card-widget="remove">
		                <i class="fas fa-times"></i>
		              </button>
		            </div>
		          </div>
		          <div class="card-body">
		            <table id="example1" class="table table-bordered table-striped">
		              <thead>
		                  <tr>
		                    <th>No</th>
		                    <th>Judul Berita</th>
		                    <th>Aksi</th>
		                  </tr>
		              </thead>
		              <tbody>
		                <?php $i = 1; foreach ($list as $value): ?>
		                <tr>
		                  <td><?= $i++ ?></td>
		                  <td><?= $value->judul_berita ?></td>
		                  <td align="center">
		                    <span style="color: white">
		                    	<a class="btn btn-sm btn-primary" target="_blank" href="<?= base_url('berita/post/' . $value->slug_berita )  ?>"><i class="fas fa-eye" ></i></a>
		                    	<a class="btn btn-sm btn-success" href="<?= base_url('admin/berita/edit/' . $this->mapel->encodeUrl($value->slug_berita)) ?>"><i class="fas fa-edit" ></i></a>
		                      <a class="btn btn-sm btn-danger hpsModalBerita" data-id="<?= $value->id_berita  ?>" data-toggle="modal" data-target="#modal-sm" data-key="<?= $this->mapel->encodeUrl($value->id_berita)  ?>" data-toggle="modal" data-target="#modal-sm"><i class="fas fa-trash" ></i></a>
		                    </span>
		                  </td>
		                </tr>                
		                <?php endforeach ?>
		              </tbody>
		            </table>  
		          </div>
		        </div>
		      </div>
		    </div>
		  </div>
		</section>
	</div>
<?php endif ?>

<?php if (@$type == 'add'): ?>
	<div class="content-wrapper">
	    <div class="content-header">
	      <div class="container-fluid">
	        <div class="row mb-2">
	          <div class="col-sm-6">
	            <h1 class="m-0 text-dark">Tambah Berita <a href="<?= base_url('admin/berita') ?>" class="badge badge-primary badge-sm">Back To List</a></h1>
	          </div>
	          <div class="col-sm-6">
	            <ol class="breadcrumb float-sm-right">
	              <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
	              <li class="breadcrumb-item"><a href="<?= base_url('admin/berita')  ?>"><?= $this->uri->segment(2)  ?></a></li>
	              <li class="breadcrumb-item active">Tambah Berita</li>
	            </ol>
	          </div>
	        </div>
	      </div>
	      <hr>
	    </div>
	    <section class="content">
		  <div class="container-fluid">
		    <div class="row">
		      <div class="col-md">
		          <div class="card">
			          <div class="card-header">
			            <h3 class="card-title">Tambah Berita</h3>
			            <div class="card-tools">
			              <button type="button" class="btn btn-tool" data-card-widget="collapse">
			                <i class="fas fa-minus"></i>
			              </button>
			              <button type="button" class="btn btn-tool" data-card-widget="remove">
			                <i class="fas fa-times"></i>
			              </button>
			            </div>
			          </div>
		          <?= form_open_multipart('admin/berita/add')  ?>
		          <div class="card-body pad">
		          	<div class="row">
		          		<div class="col-md">
		          			<div class="form-group">
		          				<label>Judul Berita</label>
		          				<input class="form-control" name="judul" placeholder="Judul Berita ... " id="judul" type="text" value="<?= set_value('judul'); ?>">
		          				<?= form_error('judul','<div style="color: red; font-size: 13px;">',"</div>")  ?>
		          			</div>
		          		</div>
		          	</div>
		          	<div class="row">
		          		<div class="col-md">
		          			<div class="form-group">
		          				<label>Isi Berita</label>
		          				<div class="mb-3">
					                <textarea class="textarea" placeholder="Place some text here" name="isi" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
					              </div>
		          			</div>
		          		</div>
		          	</div>
		          	<div class="row">
		          		<div class="col-md-6">
		          			<div class="form-group">
		          				<label for="exampleInputFile">Gambar Berita</label>
		          				<div class="input-group">
		          					<div class="custom-file">
		          						<input type="file" class="custom-file-input" id="exampleInputFile" name="gambar_berita">
		          						<label class="custom-file-label" for="exampleInputFile">Choose file</label>
		          					</div>
		          				</div>
		          			</div>
		          		</div>
		          	</div>
		            <button type="submit" class="btn btn-primary">Submit</button>
		          </div>
		          <?= form_close();  ?>
		        </div>
		      </div>
		    </div>
		  </div>
		</section>
	</div>
<?php endif ?>

<?php if (@$type == 'edit'): ?>
	<div class="content-wrapper">
	    <div class="content-header">
	      <div class="container-fluid">
	        <div class="row mb-2">
	          <div class="col-sm-6">
	            <h1 class="m-0 text-dark">Edit Berita <a href="<?= base_url('admin/berita') ?>" class="badge badge-primary badge-sm">Back To List</a></h1>
	          </div>
	          <div class="col-sm-6">
	            <ol class="breadcrumb float-sm-right">
	              <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
	              <li class="breadcrumb-item"><a href="<?= base_url('admin/berita')  ?>"><?= $this->uri->segment(2)  ?></a></li>
	              <li class="breadcrumb-item">Edit Berita</li>
	              <li class="breadcrumb-item active"><?= substr($list->judul_berita, 0,7) . " ... "  ?></li>
	            </ol>
	          </div>
	        </div>
	      </div>
	      <hr>
	    </div>
	    <section class="content">
		  <div class="container-fluid">
		    <div class="row">
		      <div class="col-md">
		          <div class="card">
			          <div class="card-header">
			            <h3 class="card-title">Edit Berita</h3>
			            <div class="card-tools">
			              <button type="button" class="btn btn-tool" data-card-widget="collapse">
			                <i class="fas fa-minus"></i>
			              </button>
			              <button type="button" class="btn btn-tool" data-card-widget="remove">
			                <i class="fas fa-times"></i>
			              </button>
			            </div>
			          </div>
		          <?= form_open_multipart('admin/berita/edit/' . $this->mapel->encodeUrl($list->slug_berita))  ?>
		          <div class="card-body pad">
		          	<div class="row">
		          		<div class="col-md">
		          			<div class="form-group">
		          				<label>Judul Berita</label>
		          				<input class="form-control" name="judul" placeholder="Judul Berita ... " id="judul" type="text" value="<?= $list->judul_berita; ?>">
		          				<?= form_error('judul','<div style="color: red; font-size: 13px;">',"</div>")  ?>
		          			</div>
		          		</div>
		          	</div>
		          	<div class="row">
		          		<div class="col-md">
		          			<div class="form-group">
		          				<label>Isi Berita</label>
		          				<div class="mb-3">
					                <textarea class="textarea" placeholder="Place some text here" name="isi" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?= $list->isi_berita  ?></textarea>
					              </div>
		          			</div>
		          		</div>
		          	</div>
		          	<div class="row">
		          		<div class="col-md-3">
		          			<?php if ($list->gambar_berita != 'default.jpg'): ?>
				                <img src="<?= base_url('assets/images/berita/' . $list->gambar_berita)  ?>" class="img-thumbnail" style="float: left">
				                <?php else: ?>
				                   <img src="<?= base_url('assets/images/config/person.png') ?>" class="img-thumbnail" width="20%" style="float: left">
				             <?php endif ?>
		          		</div>
		          		<div class="col-md-5">
		          			<div class="form-group">
		          				<label for="exampleInputFile">Gambar Berita</label>
		          				<div class="input-group">
		          					<div class="custom-file">
		          						<input type="file" class="custom-file-input" id="exampleInputFile" name="gambar_berita">
		          						<input type="hidden" name="gambar_lama" value="<?= $list->gambar_berita  ?>">
		          						<label class="custom-file-label" for="exampleInputFile">Choose file</label>
		          					</div>
		          				</div>
		          			</div>
		          			<div class="form-group">
		          				<button type="submit" class="btn btn-primary">Submit</button>
		          			</div>
		          		</div>
		          	</div>
		          </div>
		          <?= form_close();  ?>
		        </div>
		      </div>
		    </div>
		  </div>
		</section>
	</div>
<?php endif ?>