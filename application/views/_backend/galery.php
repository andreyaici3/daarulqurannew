<?php if (@$type == 'list'): ?>
	<div class="content-wrapper">
		<div class="content-header">
		  <div class="container-fluid">
		    <div class="row mb-2">
		      <div class="col-sm-6">
		        <h1 class="m-0 text-dark">Data Galery <a href="album/add" class="badge badge-primary badge-sm">Tambah</a></h1> 
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
		            <h3 class="card-title">Daftar Album</h3>
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
		                    <th>Judul Album</th>
		                    <th>Jumlah</th>
		                    <th>Aksi</th>
		                  </tr>
		              </thead>
		              <tbody>
		                <?php $i=1; foreach ($list as $value): ?>
		                	<tr>
		                		<td><?= $i++  ?></td>
		                		<td><?= $value->judul_album  ?></td>
		                		<td align="center"><a href="<?= base_url('admin/album/foto/' . $this->mapel->encodeUrl($value->id_album) )  ?>"><i class="fas fa-image" ></i>&nbsp;<?= $value->jml  ?> Foto</a></td>
		                		<td align="center">
		                    <span style="color: white">
		                    	<a class="btn btn-sm btn-success" href="<?= base_url('admin/album/edit/' . $this->mapel->encodeUrl($value->id_album)) ?>"><i class="fas fa-edit" ></i></a>
		                      <a class="btn btn-sm btn-danger hpsModalAlbum" data-id="<?= $value->id_album  ?>" data-toggle="modal" data-target="#modal-sm" data-key="<?= $this->mapel->encodeUrl($value->id_album)  ?>" data-toggle="modal" data-target="#modal-sm"><i class="fas fa-trash" ></i></a>
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
	            <h1 class="m-0 text-dark">Tambah Album <a href="<?= base_url('admin/album') ?>" class="badge badge-primary badge-sm">Back To List</a></h1>
	          </div>
	          <div class="col-sm-6">
	            <ol class="breadcrumb float-sm-right">
	              <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
	              <li class="breadcrumb-item"><a href="<?= base_url('admin/album')  ?>"><?= $this->uri->segment(2)  ?></a></li>
	              <li class="breadcrumb-item active">Tambah Album</li>
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
			            <h3 class="card-title">Tambah Album</h3>
			            <div class="card-tools">
			              <button type="button" class="btn btn-tool" data-card-widget="collapse">
			                <i class="fas fa-minus"></i>
			              </button>
			              <button type="button" class="btn btn-tool" data-card-widget="remove">
			                <i class="fas fa-times"></i>
			              </button>
			            </div>
			          </div>
		          <?= form_open_multipart('admin/album/add')  ?>
		          <div class="card-body pad">
		          	<div class="row">
		          		<div class="col-md">
		          			<div class="form-group">
		          				<label>Album</label>
		          				<input class="form-control" name="judul" placeholder="Judul Berita ... " id="judul" type="text" value="<?= set_value('judul'); ?>">
		          				<?= form_error('judul','<div style="color: red; font-size: 13px;">',"</div>")  ?>
		          			</div>
		          		</div>
		          	</div>
		          	<div class="row">
		          		<div class="col-md-6">
		          			<div class="form-group">
		          				<label for="exampleInputFile">Sampul</label>
		          				<div class="input-group">
		          					<div class="custom-file">
		          						<input type="file" class="custom-file-input" id="exampleInputFile" name="sampul">
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
	            <h1 class="m-0 text-dark">Edit Album <a href="<?= base_url('admin/album') ?>" class="badge badge-primary badge-sm">Back To List</a></h1>
	          </div>
	          <div class="col-sm-6">
	            <ol class="breadcrumb float-sm-right">
	              <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
	              <li class="breadcrumb-item"><a href="<?= base_url('admin/album')  ?>"><?= $this->uri->segment(2)  ?></a></li>
	              <li class="breadcrumb-item">Edit Album</li>
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
			            <h3 class="card-title">Edit Album</h3>
			            <div class="card-tools">
			              <button type="button" class="btn btn-tool" data-card-widget="collapse">
			                <i class="fas fa-minus"></i>
			              </button>
			              <button type="button" class="btn btn-tool" data-card-widget="remove">
			                <i class="fas fa-times"></i>
			              </button>
			            </div>
			          </div>
		          <?= form_open_multipart('admin/album/edit/' . $this->mapel->encodeUrl($list->id_album))  ?>
		          <div class="card-body pad">
		          	<div class="row">
		          		<div class="col-md">
		          			<div class="form-group">
		          				<label>Album</label>
		          				<input class="form-control" name="judul" placeholder="Judul Berita ... " id="judul" type="text" value="<?= $list->judul_album ?>">
		          				<?= form_error('judul','<div style="color: red; font-size: 13px;">',"</div>")  ?>
		          			</div>
		          		</div>
		          	</div>
		          	<div class="row">
		          		<div class="col-md-3">
		          			<?php if ($list->sampul != 'default.jpg'): ?>
				                <img src="<?= base_url('assets/images/galery/' . $list->sampul)  ?>" class="img-thumbnail" style="float: left">
				                <?php else: ?>
				                   <img src="<?= base_url('assets/images/config/person.png') ?>" class="img-thumbnail" width="20%" style="float: left">
				             <?php endif ?>
		          		</div>
		          		<div class="col-md-6">
		          			<div class="form-group">
		          				<label for="exampleInputFile">Sampul</label>
		          				<div class="input-group">
		          					<div class="custom-file">
		          						<input type="file" class="custom-file-input" id="exampleInputFile" name="sampul">
		          						<input type="hidden" name="sampulLama" value="<?= $list->sampul  ?>">
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

<?php if (@$type == 'foto'): ?>
	<div class="content-wrapper">
		<div class="content-header">
		  <div class="container-fluid">
		    <div class="row mb-2">
		      <div class="col-sm-6">
		        <h1 class="m-0 text-dark">Tambah Foto Album : <?= $list['galery'][0]->judul_album  ?></h1>
		      </div>
		      <div class="col-sm-6">
		        <ol class="breadcrumb float-sm-right">
		          <li class="breadcrumb-item"><a href="<?= base_url('admin')  ?>">Dashboard</a></li>
		          <li class="breadcrumb-item"><a href="<?= base_url('admin/album')  ?>"><?= $this->uri->segment(2)  ?></a></li>
		          <li class="breadcrumb-item active"><?= $list['galery'][0]->judul_album  ?></li>
		        </ol>
		      </div>
		    </div>
		  </div>
		  <hr>
		</div>
		 <section class="content">

		  <div class="container-fluid">
			  	<div class="row">
			  		<div class="col">
			  			<?= $this->session->flashdata('msgi')  ?>
			  		</div>
			  </div>
		    <div class="row">
		      <div class="col-md">
		          <div class="card">
			          <div class="card-header">
			            <h3 class="card-title">Tambah Foto</h3>
			            <div class="card-tools">
			              <button type="button" class="btn btn-tool" data-card-widget="collapse">
			                <i class="fas fa-minus"></i>
			              </button>
			              <button type="button" class="btn btn-tool" data-card-widget="remove">
			                <i class="fas fa-times"></i>
			              </button>
			            </div>
			          </div>
		          <?= form_open_multipart('admin/album/foto/' . $this->mapel->encodeUrl($list['galery'][0]->id_album))  ?>
		          <div class="card-body pad">
		          	<div class="row">
		          		<div class="col-md-5">
		          			<div class="form-group">
		          				<label>Keterangan</label>
		          				<input class="form-control" name="ket" placeholder="Keterangan Foto " id="ket" type="text" value="<?= set_value('judul'); ?>">
		          				<?= form_error('judul','<div style="color: red; font-size: 13px;">',"</div>")  ?>
		          			</div>
		          		</div>
		          		<div class="col-md-5">
		          			<div class="form-group">
		          				<label for="exampleInputFile">Sampul</label>
		          				<div class="input-group">
		          					<div class="custom-file">
		          						<input type="file" class="custom-file-input" id="exampleInputFile" name="sampul">
		          						<label class="custom-file-label" for="exampleInputFile">Choose file</label>
		          					</div>
		          				</div>		          				
		          			</div>
		          		</div>
		          		<div class="col-md">
		          			<div class="form-group">
		          				<label>&nbsp;</label><br>
		          				<button type="submit" class="btn btn-primary">Submit</button>
		          			</div>
		          		</div>
		          	</div>		            
		          </div>
		          <?= form_close();  ?>
		        </div>
		      </div>
		    </div>
		    <br><br>
		    <div class="row">
		    	<div class="col-md text-center">
		    		<h3>Daftar Foto Dalam Album <?= $list['galery'][0]->judul_album  ?></h3>
		    		<hr>
		    	</div>
		    </div>
		    <div class="row">
		    	<?php foreach ($list['foto'] as $value): ?>
		    	<div class="col-md-3">
		    		<div class="card">
			          <div class="card-header">
			            <h3 class="card-title"><small><?= $value->ket_foto  ?></small></h3>
			            <div class="card-tools">
			              <button type="button" class="btn btn-tool" data-card-widget="collapse">
			                <i class="fas fa-minus"></i>
			              </button>
			              <button type="button" class="btn btn-tool" data-card-widget="remove">
			                <i class="fas fa-times"></i>
			              </button>
			            </div>
			          </div>
		          <div class="card-body pad text-center">
		         		<img src="<?= base_url('assets/images/galery/' . $value->foto)  ?>" class="img-thumbnail" style="height: 160px;">
		          </div>
		          <div class="card-footer">
		          	<a onclick="return confirm('Yakin Ingin Menghapus.?')" href="<?= base_url('admin/album/foto/delete/' . $this->mapel->encodeUrl($value->id_foto))  ?>" class="btn btn-danger form-control"><i class="fa fa-trash fas-fw"></i></a>
		          </div>
		        </div>
		    	</div>
		    	<?php endforeach ?>
		    </div>
		  </div>
		</section>
	</div>
<?php endif ?>