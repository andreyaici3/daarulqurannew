<?php if ($type == 'list'): ?>
	<div class="content-wrapper">
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Data Guru <a href="guru/add" class="badge badge-primary badge-sm">Tambah</a></h1> 
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
            <h3 class="card-title">Daftar Guru Daarul Qur'an</h3>
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
                    <th>Nama Guru</th>
                    <th>NIP</th>
                    <th>Pendidikan</th>
                    <th>Detail</th>
                    <th>Aksi</th>
                  </tr>
              </thead>
              <tbody>
                <?php $i = 1; foreach ($list as $value): ?>
                <tr>
                  <td><?= $i++ ?></td>
                  <td><?= $value->nama_guru  ?></td>
                  <td><?= $value->nip  ?></td>
                  <td><?= $value->pendidikan  ?></td>
                  <td><a href="<?= base_url('admin/guru/detail/' . $this->mapel->encodeUrl($value->id_guru))  ?>">Lihat Detail</a></td>
                  <td align="center">
                    <span style="color: white">
                    	<a class="btn btn-sm btn-success" href="<?= base_url('admin/guru/edit/' . $this->mapel->encodeUrl($value->id_guru)) ?>"><i class="fas fa-edit" ></i></a>
                      <a class="btn btn-sm btn-danger hpsModalGuru" data-id="<?= $value->id_guru  ?>" data-toggle="modal" data-target="#modal-sm" data-key="<?= $this->mapel->encodeUrl($value->id_guru)  ?>" data-toggle="modal" data-target="#modal-sm"><i class="fas fa-trash" ></i></a>
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




<?php if ($type == 'detail'): ?>
   <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Profile Guru <a href="<?= base_url('admin/guru') ?>" class="badge badge-primary badge-sm">Back To List</a></h1>
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
        <div class="row">
          <div class="col-md-4 offset-4">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="<?= base_url('assets/images/guru/' . $guru->foto_guru     )  ?>"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center"><?= $guru->nama_guru  ?></h3>

                <p class="text-muted text-center"><?= $guru->nip  ?></p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Tempat Lahir</b> <a class="float-right"><?= $guru->tempat_lahir  ?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Tanggal Lahir</b> <a class="float-right"><?= date('D, d M Y', $guru->tanggal_lahir )  ?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Pendidikan</b> <a class="float-right"><?= $guru->pendidikan  ?></a>
                  </li>
                  <li class="list-group-item">
                    <b>Mata Pelajaran</b> <a class="float-right"><?= $guru->nama_mapel  ?></a>
                  </li>
                </ul>

                
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
    </section>
<?php endif ?>

<?php if ($type == 'add'): ?>
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Tambah Guru <a href="<?= base_url('admin/guru') ?>" class="badge badge-primary badge-sm">Back To List</a></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
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
            <h3 class="card-title">Tambah Guru </h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
          <?= form_open_multipart('admin/guru/add')  ?>
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>NIP</label>
                  <input class="form-control" name="nip" placeholder="NIP Guru ... " id="nip" type="number" value="<?= set_value('nip'); ?>">
                  <?= form_error('nip','<div style="color: red; font-size: 13px;">',"</div>")  ?>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Nama Lengkap</label>
                  <input class="form-control" name="nama_guru" placeholder="Nama Lengkap ... " id="nama_guru" type="text" value="<?= set_value('nama_guru'); ?>">
                  <?= form_error('nama_guru','<div style="color: red; font-size: 13px;">',"</div>")  ?>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                    <label>Tempat Lahir</label>
                    <input class="form-control" name="tempat_lahir" placeholder="Tempat Lahir " id="tempat_lahir" type="text" value="<?= set_value('tempat_lahir'); ?>">
                    <?= form_error('tempat_lahir','<div style="color: red; font-size: 13px;">',"</div>")  ?>
                </div>  
               </div>
              <div class="col-md-6">
                <div class="form-group">
                  <div class="form-group">
                  <label>Tanggal Lahir</label>
                    <div class="input-group date" id="reservationdate" data-target-input="nearest">
                        <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate" name="tanggal_lahir" placeholder="mm/dd/yyyy" value="<?= set_value('tanggal_lahir'); ?>" autocomplete="off" />
                        <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                    <?= form_error('tanggal_lahir','<div style="color: red; font-size: 13px;">',"</div>")  ?>
                </div>
                </div>  
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Mata Pelajaran</label>
                  <select name="mapel" class="form-control">
                    <option>--- Select Mapel ---</option>
                  <?php foreach ($mapel as $value): ?>
                    <option value="<?= $value->id ?>"><?= $value->kode_mapel ?></option>
                  <?php endforeach ?>
                      
                    
                  </select>
                </div>  
              </div>
              <div class="col-md-6">
                  <div class="form-group">
                    <label>Pendidikan</label>
                    <select name="pendidikan" class="form-control">
                      <option>--- Select Pendidikan ---</option>
                      <option value="D3">D3</option>
                      <option value="S1">S1</option>
                      <option value="S2">S2</option>
                      <option value="S3">S3</option>
                    </select>
                </div>  
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                 <div class="form-group">
                    <label for="exampleInputFile">Foto Guru</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile" name="foto_guru">
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

<?php if ($type == 'edit'): ?>
  <div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Edit Data Guru <a href="<?= base_url('admin/guru') ?>" class="badge badge-primary badge-sm">Back To List</a></h1>
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
            <h3 class="card-title">Edit Data Guru </h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
          <?= form_open_multipart('admin/guru/edit')  ?>
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>NIP</label>
                  <input class="form-control" name="nip" placeholder="NIP Guru ... " id="nip" type="number" value="<?= $guru->nip ?>">
                  <?= form_error('nip','<div style="color: red; font-size: 13px;">',"</div>")  ?>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Nama Lengkap</label>
                  <input class="form-control" name="nama_guru" placeholder="Nama Lengkap ... " id="nama_guru" type="text" value="<?= $guru->nama_guru ?>">
                  <?= form_error('nama_guru','<div style="color: red; font-size: 13px;">',"</div>")  ?>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                    <label>Tempat Lahir</label>
                    <input class="form-control" name="tempat_lahir" placeholder="Tempat Lahir " id="tempat_lahir" type="text" value="<?= $guru->tempat_lahir ?>">
                    <?= form_error('tempat_lahir','<div style="color: red; font-size: 13px;">',"</div>")  ?>
                </div>  
               </div>
              <div class="col-md-6">
                <div class="form-group">
                  <div class="form-group">
                  <label>Tanggal Lahir</label>
                    <div class="input-group date" id="reservationdate" data-target-input="nearest">
                        <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate" name="tanggal_lahir" placeholder="mm/dd/yyyy" value="<?= date('m/d/y', $guru->tanggal_lahir) ?>" autocomplete="off" />
                        <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                    <?= form_error('tanggal_lahir','<div style="color: red; font-size: 13px;">',"</div>")  ?>
                </div>
                </div>  
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Mata Pelajaran</label>
                  <select name="mapel" class="form-control">
                    <option>--- Select Mapel ---</option>
                  <?php foreach ($mapel as $value): ?>
                    <option 
                      <?php if ($value->id == $guru->mata_pelajaran): ?>
                        selected
                        <?php else: ?>
                      <?php endif ?>
                    value="<?= $value->id ?>"><?= $value->kode_mapel ?></option>
                  <?php endforeach ?>
                  </select>
                </div>  
              </div>
              <div class="col-md-6">
                  <div class="form-group">
                    <label>Pendidikan</label>
                    <select name="pendidikan" class="form-control">
                      <option>--- Select Pendidikan ---</option>
                      <option <?php if ($guru->pendidikan == "D3"){ echo "selected";} ?> value="D3">D3</option>
                      <option <?php if ($guru->pendidikan == "S1"){ echo "selected";} ?> value="S1">S1</option>
                      <option <?php if ($guru->pendidikan == "S2"){ echo "selected";} ?> value="S2">S2</option>
                      <option <?php if ($guru->pendidikan == "S3"){ echo "selected";} ?> value="S3">S3</option>
                    </select>
                </div>  
              </div>
            </div>
            <div class="row">
              <img src="<?= base_url('assets/images/guru/' . $guru->foto_guru)  ?>" class="img-circle" width="20%" style="float: left">
              <input type="hidden" name="foto_lama" value="<?= $guru->foto_guru  ?>">
              <input type="hidden" name="iden" value="<?= $guru->id_guru  ?>" >
              <div class="col-md-4 ml-4">
                 <div class="form-group">
                  <br><br>
                    <label for="exampleInputFile">Foto Guru</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile" name="foto_guru">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                    </div>
                  </div>
                   <button type="submit" class="btn btn-primary">Submit</button>
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