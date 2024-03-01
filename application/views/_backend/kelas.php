<?php if ($type == 'list'): ?>
  <div class="content-wrapper">
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Kelas <a href="kelas/add" class="badge badge-primary badge-sm">Tambah</a></h1> 
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
            <h3 class="card-title">Daftar Kelas Daarul Qur'an</h3>
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
                    <th width="50">No</th>
                    <th>Kelas</th>
                    <th width="150">Aksi</th>
                  </tr>
              </thead>
              <tbody>
                <?php $i = 1; foreach ($list as $value): ?>
                <tr>
                  <td><?= $i++ ?></td>
                  <td><?= $value->kelas  ?></td>
                  <td align="center">
                    <span style="color: white">
                      <a class="btn btn-sm btn-danger hpsModalKelas" data-id="<?= $value->id_kelas  ?>" data-toggle="modal" data-target="#modal-sm" data-key="<?= $this->mapel->encodeUrl($value->id_kelas)  ?>"><i class="fas fa-trash" ></i></a>
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
          <h1 class="m-0 text-dark">Tambah Kelas <a href="<?= base_url('admin/kelas') ?>" class="badge badge-primary badge-sm">Back To List</a></h1>
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
            <h3 class="card-title">Tambah Kelas </h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
          <?= form_open('admin/kelas/add')  ?>
          <div class="card-body">
            <div class="form-group">
              <label>Kelas</label>
              <input type="text" class="form-control" placeholder="Kelas" name="kelas">
              <?= form_error('kelas','<div style="color: red; font-size: 13px;">',"</div>")  ?>
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

