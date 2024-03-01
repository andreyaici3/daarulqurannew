<?php if (@$type == 'list'): ?>
	<div class="content-wrapper">
		<div class="content-header">
		  <div class="container-fluid">
		    <div class="row mb-2">
		      <div class="col-sm-6">
		        <h1 class="m-0 text-dark">Daftar File <a href="doc/add" class="badge badge-primary badge-sm">Tambah</a></h1> 
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
		            <table id="example1" class="table table-bordered table-striped" style="font-size: 13px;">
		              <thead>
		                  <tr>
		                    <th>No</th>
		                    <th>Deskripsi File</th>
		                    <th>Link</th>
		                    <th>Author</th>
		                    <th>Tanggal Upload</th>
		                    <th>Aksi</th>
		                  </tr>
		              </thead>
		              <tbody>
		               	<?php $i = 1; foreach ($list as $value): ?>
		               		<tr>
		               			<td><?= $i++  ?></td>
		               			<td><?= $value->ket_file  ?></td>
		               			<td><?= $value->nama_file  ?></td>
		               			<td><?= $value->name  ?></td>
		               			<td><?= date('d-m-Y', $value->waktu_upload)  ?></td>
		               			<td align="center">
				                    <span style="color: white">
				                    	<a class="btn btn-xs btn-success" href="<?= base_url('admin/doc/edit/' . $this->mapel->encodeUrl($value->id_file)) ?>"><i class="fas fa-edit" ></i></a>
				                      <a class="btn btn-xs btn-danger hpsModalFile" data-id="<?= $value->id_file  ?>" data-toggle="modal" data-target="#modal-sm" data-key="<?= $this->mapel->encodeUrl($value->id_file)  ?>" data-toggle="modal" data-target="#modal-sm"><i class="fas fa-trash" ></i></a>
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
	            <h1 class="m-0 text-dark">Tambah Document <a href="<?= base_url('admin/doc') ?>" class="badge badge-primary badge-sm">Back To List</a></h1>
	          </div>
	          <div class="col-sm-6">
	            <ol class="breadcrumb float-sm-right">
	              <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
	              <li class="breadcrumb-item"><a href="<?= base_url('admin/doc')  ?>"><?= $this->uri->segment(2)  ?></a></li>
	              <li class="breadcrumb-item active">Tambah Document</li>
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
			            <h3 class="card-title">Uploading Files</h3>
			            <div class="card-tools">
			              <button type="button" class="btn btn-tool" data-card-widget="collapse">
			                <i class="fas fa-minus"></i>
			              </button>
			              <button type="button" class="btn btn-tool" data-card-widget="remove">
			                <i class="fas fa-times"></i>
			              </button>
			            </div>
			          </div>
		          <?= form_open_multipart('admin/doc/add')  ?>
		          <div class="card-body pad">
		          	<div class="row">
		          		<div class="col-md">
		          			<div class="form-group">
		          				<label>Deskripsi File</label>
		          				<input class="form-control" name="des" placeholder="Deskripsi File... " type="text" value="<?= set_value('des'); ?>">
		          				<?= form_error('judul','<div style="color: red; font-size: 13px;">',"</div>")  ?>
		          			</div>
		          		</div>
		          	</div>
		          	<div class="row">
		          		<div class="col-md-6">
		          			<div class="form-group">
		          				<label for="exampleInputFile">File</label>
		          				<div class="input-group">
		          					<div class="custom-file">
		          						<input type="file" class="custom-file-input" id="exampleInputFile" name="doc">
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
	            <h1 class="m-0 text-dark">Edit Document <a href="<?= base_url('admin/doc') ?>" class="badge badge-primary badge-sm">Back To List</a></h1>
	          </div>
	          <div class="col-sm-6">
	            <ol class="breadcrumb float-sm-right">
	              <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
	              <li class="breadcrumb-item"><a href="<?= base_url('admin/doc')  ?>"><?= $this->uri->segment(2)  ?></a></li>
	              <li class="breadcrumb-item active">Edit Document</li>
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
			            <h3 class="card-title">Edit Deskripsi File</h3>
			            <div class="card-tools">
			              <button type="button" class="btn btn-tool" data-card-widget="collapse">
			                <i class="fas fa-minus"></i>
			              </button>
			              <button type="button" class="btn btn-tool" data-card-widget="remove">
			                <i class="fas fa-times"></i>
			              </button>
			            </div>
			          </div>
		          <?= form_open_multipart('admin/doc/edit/' . $this->uri->segment(4))  ?>
		          <div class="card-body pad">
		          	<div class="row">
		          		<div class="col-md">
		          			<div class="form-group">
		          				<label>Deskripsi File</label>
		          				<input class="form-control" name="des" placeholder="Deskripsi File... " type="text" value="<?= $list->ket_file ?>">
		          				<?= form_error('judul','<div style="color: red; font-size: 13px;">',"</div>")  ?>
		          			</div>
		          		</div>
		          	</div>
		          	<div class="row">
		          		<div class="col-md-6">
		          			<div class="form-group">
		          				<label style="color: red;" for="exampleInputFile"><i>Apabila Salah Upload File, Hapus File Lama Kemudian Upload Ulang</i></label>
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