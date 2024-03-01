<?php if ($type == 'add'): ?>
  <div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Tambah Mata Pelajaran <a href="<?= base_url('admin/mapel') ?>" class="badge badge-primary badge-sm">Back To List</a></h1>
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
            <h3 class="card-title">Tambah Mata Pelajaran </h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
          <?= form_open('admin/mapel/add')  ?>
          <div class="card-body">
            <?= $this->session->flashdata('msgi')  ?>
            <div class="form-group">
              <label for="exampleInputEmail1">Kode Mata Pelajaran</label>
              <div class="input-group">
                <div class="input-group-append">
                        <span class="input-group-text" id="">DQ-</span>
                </div>
                <input type="text" class="form-control" placeholder="Kode Mata Pelajaran" name="kode">
              </div>
              <?= form_error('kode','<div style="color: red; font-size: 13px;">',"</div>")  ?>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Nama Mata Pelajaran</label>
              <input type="text" class="form-control" placeholder="Mata Pelajaran" name="mapel">
              <?= form_error('mapel','<div style="color: red; font-size: 13px;">',"</div>")  ?>
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
            <h1 class="m-0 text-dark">Edit Mata Pelajaran <a href="<?= base_url('admin/mapel') ?>" class="badge badge-primary badge-sm">Back To List</a></h1>
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
            <h3 class="card-title">Edit Mata Pelajaran </h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
          <?= form_open('admin/mapel/edit')  ?>
          <div class="card-body">
            <div class="form-group">
              <label for="exampleInputPassword1">Kode Mata Pelajaran</label>
              <input type="text" class="form-control" placeholder="Mata Pelajaran" name="kode" value="<?= $list->kode_mapel  ?>">
              <?= form_error('kode','<div style="color: red; font-size: 13px;">',"</div>")  ?>
            </div>
            <input type="hidden" name="key" value="<?= $this->mapel->encodeUrl($list->id)  ?>">
            <div class="form-group">
              <label for="exampleInputPassword1">Nama Mata Pelajaran</label>
              <input type="text" class="form-control" placeholder="Mata Pelajaran" name="mapel" value="<?= $list->nama_mapel  ?>">
              <?= form_error('mapel','<div style="color: red; font-size: 13px;">',"</div>")  ?>
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