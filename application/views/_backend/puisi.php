<?php if (@$type == 'list'): ?>
	<div class="content-wrapper">
		<div class="content-header">
		  <div class="container-fluid">
		    <div class="row mb-2">
		      <div class="col-sm-6">
		        <h1 class="m-0 text-dark">Data Karya Puisi <a href="puisi/add" class="badge badge-primary badge-sm">Tambah</a></h1> 
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
		            <h3 class="card-title">Daftar Puisi</h3>
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
                            <th>Kode Puisi</th>
                            <th>Judul Puisi</th>
		                    <th>Aksi</th>
		                  </tr>
		              </thead>
		              <tbody>
		                <?php $i = 1; foreach ($list as $value): ?>
		                <tr>
                          <td><?= $i++ ?></td>
                          <td><?= $value->id_puisi?></td>
		                  <td><?= $value->judul_puisi ?></td>
		                  <td align="center">
		                    <span style="color: white">
		                    	<a class="btn btn-sm btn-primary" target="_blank" href="<?= base_url($value->slug_puisi )  ?>"><i class="fas fa-eye" ></i></a>
		                    	<a class="btn btn-sm btn-success" href="<?= base_url('admin/puisi/edit/' . $this->mapel->encodeUrl($value->slug_puisi)) ?>"><i class="fas fa-edit" ></i></a>
		                      <a class="btn btn-sm btn-danger hpsModalpuisi" data-id="<?= $value->id_puisi  ?>" data-toggle="modal" data-target="#modal-sm" data-key="<?= $this->mapel->encodeUrl($value->id_puisi)  ?>" data-toggle="modal" data-target="#modal-sm"><i class="fas fa-trash" ></i></a>
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
    
    <!-- jQuery -->
    <script src="<?= base_url('assets/back/')  ?>plugins/jquery/jquery.min.js"></script>
    <script>
        $('.hpsModalpuisi').on('click', function(){
            const id = $(this).data('id');
            const key = $(this).data('key');
            const urlN = id + '/' + key;
            // const urlN = 'https://daarulquran.sch.id';
            $('#myModalLabel').html('Yakin Ingin Menghapus Data Puisi.?');
            $('.modal-footer button[type=submit]').html('Hapus');
            $('.modal-footer button[type=submit]').attr('class','btn btn-danger');
            $('.bd').html('Jika Anda mengklik tombol hapus, maka puisi Yang Dipilih akan terhapus');
            $('.body-modal form').attr('action', 'puisi/' + urlN );
        });
    </script>
<?php endif ?>

<?php if (@$type == 'add'): ?>
	<div class="content-wrapper">
	    <div class="content-header">
	      <div class="container-fluid">
	        <div class="row mb-2">
	          <div class="col-sm-6">
	            <h1 class="m-0 text-dark">Tambah Puisi <a href="<?= base_url('admin/puisi') ?>" class="badge badge-primary badge-sm">Back To List</a></h1>
	          </div>
	          <div class="col-sm-6">
	            <ol class="breadcrumb float-sm-right">
	              <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
	              <li class="breadcrumb-item"><a href="<?= base_url('admin/puisi')  ?>"><?= $this->uri->segment(2)  ?></a></li>
	              <li class="breadcrumb-item active">Tambah Puisi</li>
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
			            <h3 class="card-title">Tambah Puisi</h3>
			            <div class="card-tools">
			              <button type="button" class="btn btn-tool" data-card-widget="collapse">
			                <i class="fas fa-minus"></i>
			              </button>
			              <button type="button" class="btn btn-tool" data-card-widget="remove">
			                <i class="fas fa-times"></i>
			              </button>
			            </div>
			          </div>
		          <?= form_open_multipart('admin/puisi/add')  ?>
		          <div class="card-body pad">
		          	<div class="row">
		          		<div class="col-md">
		          			<div class="form-group">
		          				<label>Judul Puisi</label>
		          				<input class="form-control" name="judul" placeholder="Judul Puisi ... " id="judul" type="text" value="<?= set_value('judul'); ?>">
		          				<?= form_error('judul','<div style="color: red; font-size: 13px;">',"</div>")  ?>
		          			</div>
		          		</div>
		          	</div>
		          	<div class="row">
		          		<div class="col-md">
		          			<div class="form-group">
		          				<label>Isi Puisi</label>
		          				<div class="mb-3">
					                <textarea class="textarea" placeholder="Place some text here" name="isi" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
					              </div>
		          			</div>
		          		</div>
		          	</div>
		          	<div class="row">
		          		<div class="col-md-6">
		          			<div class="form-group">
		          				<label for="exampleInputFile">Thumbnail Puisi</label>
		          				<div class="input-group">
		          					<div class="custom-file">
		          						<input type="file" class="custom-file-input" id="exampleInputFile" name="gambar_puisi">
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


<?php if (@$type == 'edit') : ?>
	<div class="content-wrapper">
	    <div class="content-header">
	      <div class="container-fluid">
	        <div class="row mb-2">
	          <div class="col-sm-6">
	            <h1 class="m-0 text-dark">Edit Puisi <a href="<?= base_url('admin/puisi') ?>" class="badge badge-primary badge-sm">Back To List</a></h1>
	          </div>
	          <div class="col-sm-6">
	            <ol class="breadcrumb float-sm-right">
	              <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
	              <li class="breadcrumb-item"><a href="<?= base_url('admin/puisi')  ?>"><?= $this->uri->segment(2)  ?></a></li>
	              <li class="breadcrumb-item active">Edit Puisi</li>
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
			            <h3 class="card-title">Edit Puisi <?= $list->id_puisi ?></h3>
			            <div class="card-tools">
			              <button type="button" class="btn btn-tool" data-card-widget="collapse">
			                <i class="fas fa-minus"></i>
			              </button>
			              <button type="button" class="btn btn-tool" data-card-widget="remove">
			                <i class="fas fa-times"></i>
			              </button>
			            </div>
			          </div>
		          <?= form_open_multipart('admin/puisi/edit/' . $this->uri->segment(4))  ?>
		          <div class="card-body pad">
		          	<div class="row">
		          		<div class="col-md">
		          			<div class="form-group">
		          				<label>Judul Puisi</label>
		          				<input class="form-control" name="judul" id="judul" type="text" value="<?= $list->judul_puisi ?>">
		          				<?= form_error('judul','<div style="color: red; font-size: 13px;">',"</div>")  ?>
		          			</div>
		          		</div>
		          	</div>
		          	<div class="row">
		          		<div class="col-md">
		          			<div class="form-group">
		          				<label>Isi Puisi</label>
		          				<div class="mb-3">
					                <textarea class="textarea" placeholder="Place some text here" name="isi" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?= htmlspecialchars_decode($list->isi_puisi) ?></textarea>
					              </div>
		          			</div>
		          		</div>
		          	</div>
					<div class="row">
						<div class="col-md-6">
							<img  class="img-thumbnail" width="20%" src="<?= base_url('assets/images/puisi/' . $list->thumbnail_puisi) ?>">
						</div>
					</div>
		          	<div class="row">
		          		<div class="col-md-6">
		          			<div class="form-group">
		          				<label for="exampleInputFile">Thumbnail Puisi</label>
		          				<div class="input-group">
		          					<div class="custom-file">
		          						<input type="file" class="custom-file-input" id="exampleInputFile" name="gambar_puisi">
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