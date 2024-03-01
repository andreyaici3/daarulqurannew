<?php if ($type == 'list'): ?>
<div class="content-wrapper">
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Data Siswa<a href="siswa/add" class="badge badge-primary badge-sm">Tambah</a></h1> 
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
            <h3 class="card-title">Daftar Siswa Daarul Qur'an</h3>
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
            <table id="example1" class="table table-bordered table-striped" cellpadding="0" cellspacing="0">
              <thead>
                  <tr>
                    <th>No</th>
                    <th>NIS</th>
                    <th>Nama Siswa</th>
                    <th>Tempat Lahir</th>
                    <th>Tanggal Lahir</th>
                    <th>Kelas</th>
                    <th>Aksi</th>
                  </tr>
              </thead>
              <tbody>
                <?php $i=1; foreach ($list as $value): ?>
                  <tr>
                    <td><?= $i++ ?></td>
                    <td><?= $value->nis  ?></td>
                    <td><?= $value->nama_siswa  ?></td>
                    <td><?= $value->tempat_lahir  ?></td>
                    <td><?= date('d - M - y', $value->tanggal_lahir)  ?></td>
                    <td><?= $value->kelas  ?></td>
                    <td align="center">
                      <span style="color: white">
                        <a class="btn btn-sm btn-success" href="<?= base_url('admin/siswa/edit/' . $this->mapel->encodeUrl($value->id_siswa)) ?>"><i class="fas fa-edit" ></i></a>
                        <a class="btn btn-sm btn-danger hpsModalSiswa" data-toggle="modal" data-target="#modal-sm" data-id="<?= $value->id_siswa  ?>" data-key="<?= $this->mapel->encodeUrl($value->id_siswa)  ?>"><i class="fas fa-trash" ></i></a>
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

<?php if ($type == 'add'): ?>
  <div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Tambah Siswa <a href="<?= base_url('admin/siswa') ?>" class="badge badge-primary badge-sm">Back To List</a></h1>
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
            <h3 class="card-title">Tambah Siswa </h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
          <?= form_open_multipart('admin/siswa/add')  ?>
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>NIS</label>
                  <input class="form-control" name="nis" placeholder="Nomor Induk Siswa ... " id="nis" type="number" value="<?= set_value('nis'); ?>">
                  <?= form_error('nip','<div style="color: red; font-size: 13px;">',"</div>")  ?>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Nama Lengkap</label>
                  <input class="form-control" name="nama_siswa" placeholder="Nama Lengkap ... " id="nama_siswa" type="text" value="<?= set_value('nama_siswa'); ?>">
                  <?= form_error('nama_siswa','<div style="color: red; font-size: 13px;">',"</div>")  ?>
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
                  <label>Kelas</label>
                  <select name="id_kelas" class="form-control">
                    <option value="">--- Select Kelas ---</option>
                    <?php foreach ($list as $value): ?>
                      <option value="<?= $value->id_kelas  ?>"><?= $value->kelas  ?></option>
                    <?php endforeach ?>
                  </select>
                </div>  
              </div>
              <div class="col-md-6">
                 <div class="form-group">
                    <label for="exampleInputFile">Foto Siswa</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile" name="foto_siswa">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                    </div>
                  </div>

              </div>

            </div>
            <div class="row">
              <div class="col-md">
                <div class="form-group">
                    <label>Quote</label>
                    <input class="form-control" name="quote" placeholder="Isikan Quote " id="quote" type="text" value="<?= set_value('quote'); ?>">
                    <?= form_error('tempat_lahir','<div style="color: red; font-size: 13px;">',"</div>")  ?>
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
          <h1 class="m-0 text-dark">Edit Data Siswa <a href="<?= base_url('admin/siswa') ?>" class="badge badge-primary badge-sm">Back To List</a></h1>
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
    <div class="row">
      <div class="col-md">
          <div class="card">
          <div class="card-header">
            <h3 class="card-title">Edit Data Siswa </h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
          <?= form_open_multipart('admin/siswa/edit')  ?>
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>NIS</label>
                  <input class="form-control" name="nis" placeholder="Nomor Induk Siswa ... " id="nis" type="number" value="<?= $list->nis ?>">
                  <?= form_error('nip','<div style="color: red; font-size: 13px;">',"</div>")  ?>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Nama Lengkap</label>
                  <input class="form-control" name="nama_siswa" placeholder="Nama Lengkap ... " id="nama_siswa" type="text" value="<?= $list->nama_siswa ?>">
                  <?= form_error('nama_siswa','<div style="color: red; font-size: 13px;">',"</div>")  ?>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                    <label>Tempat Lahir</label>
                    <input class="form-control" name="tempat_lahir" placeholder="Tempat Lahir " id="tempat_lahir" type="text" value="<?= $list->tempat_lahir ?>">
                    <?= form_error('tempat_lahir','<div style="color: red; font-size: 13px;">',"</div>")  ?>
                </div>  
               </div>
              <div class="col-md-6">
                <div class="form-group">
                  <div class="form-group">
                  <label>Tanggal Lahir</label>
                    <div class="input-group date" id="reservationdate" data-target-input="nearest">
                        <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate" name="tanggal_lahir" placeholder="mm/dd/yyyy" value="<?= date('m-d-Y', $list->tanggal_lahir)  ?>" autocomplete="off" />
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
                  <label>Kelas</label>
                  <select name="id_kelas" class="form-control">
                    <option value="">--- Select Kelas ---</option>
                    <?php foreach ($lists as $value): ?>
                      <option <?php if ($value->id_kelas == $list->id_kelas) { echo "selected"; } ?> value="<?= $value->id_kelas  ?>"><?= $value->kelas  ?></option>
                    <?php endforeach ?>
                  </select>
                </div>  
              </div>
               <div class="col-md">
                <div class="form-group">
                    <label>Quote</label>
                    <input class="form-control" name="quote" placeholder="Isikan Quote " id="quote" type="text" value="<?=  $list->quote  ?>">
                    <?= form_error('tempat_lahir','<div style="color: red; font-size: 13px;">',"</div>")  ?>
                </div>  
              </div>

            </div>
            <div class="row">
             
             <?php if ($list->foto_siswa != 'default.jpg'): ?>
                <img src="<?= base_url('assets/images/siswa/' . $list->foto_siswa)  ?>" class="img-circle" width="20%" style="float: left">
                <?php else: ?>
                   <img src="<?= base_url('assets/images/config/person.png') ?>" class="img-circle" width="20%" style="float: left">
             <?php endif ?>
              <input type="hidden" name="foto_lama" value="<?= $list->foto_siswa  ?>">
              <input type="hidden" name="iden" value="<?= $list->id_siswa  ?>" >
              <div class="col-md-4 ml-4">
                 <div class="form-group">
                  <br><br>
                    <label for="exampleInputFile">Foto Siswa</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile" name="foto_siswa">
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