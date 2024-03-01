    <?php if ($type == 'list'): ?>
        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Data Pengumuman <a href="pengumuman/add" class="badge badge-primary badge-sm">Tambah</a></h1> 
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
                        <h3 class="card-title">Daftar Pengumuman</h3>
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
                                <th>Judul Pengumuman</th>
                                <th>Tanggal Dibuat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; foreach ($list as $value): ?>
                            <tr>
                            <td><?= $i++ ?></td>
                            <td><?= $value->judul_pengumuman  ?></td>
                            <td><?= date('d-m-Y', $value->tanggal_pengumuman ) ?></td>
                            <td align="center">
                                <span style="color: white">
                                    <a class="btn btn-sm btn-primary" target="_blank" href="<?= base_url('pengumuman/detail/' . $value->id_pengumuman )  ?>"><i class="fas fa-eye" ></i></a>
                                    <a class="btn btn-sm btn-success" href="<?= base_url('admin/pengumuman/edit/' . $this->mapel->encodeUrl($value->id_pengumuman)) ?>"><i class="fas fa-edit" ></i></a>
                                <a class="btn btn-sm btn-danger hpsModalPengumuman" data-id="<?= $value->id_pengumuman  ?>" data-toggle="modal" data-target="#modal-sm" data-key="<?= $this->mapel->encodeUrl($value->id_pengumuman)  ?>" data-toggle="modal" data-target="#modal-sm"><i class="fas fa-trash" ></i></a>
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
                    <h1 class="m-0 text-dark">Tambah Pengumuman <a href="<?= base_url('admin/pengumuman') ?>" class="badge badge-primary badge-sm">Back To List</a></h1>
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
                            <h3 class="card-title">Tambah Pengumuman </h3>
                            <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                            </div>
                        </div>
                    <?= form_open_multipart('admin/pengumuman/add')  ?>
                    <div class="card-body pad">
                        <div class="row">
                            <div class="col-md">
                                <div class="form-group">
                                    <label>Judul Pengumuman</label>
                                    <input class="form-control" name="judul" placeholder="Judul Pengumuman ... " id="judul" type="text" value="<?= set_value('judul'); ?>">
                                    <?= form_error('judul','<div style="color: red; font-size: 13px;">',"</div>")  ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md">
                                <div class="form-group">
                                    <label>Isi Pengumuman</label>
                                    <div class="mb-3">
                                        <textarea class="textarea" placeholder="Place some text here" name="isi" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md">
                                <div class="form-group">
                                    <label>Tanggal Dibuat</label>
                                    <input class="form-control" type="text" name="tanggal" value="<?= date('d - M - Y')  ?>" readonly>
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
                    <h1 class="m-0 text-dark">Edit Pengumuman <a href="<?= base_url('admin/pengumuman') ?>" class="badge badge-primary badge-sm">Back To List</a></h1>
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
                            <h3 class="card-title">Tambah Pengumuman </h3>
                            <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                            </div>
                        </div>
                    <?= form_open_multipart('admin/pengumuman/edit')  ?>
                    <div class="card-body pad">
                        <div class="row">
                            <div class="col-md">
                                <div class="form-group">
                                    <label>Judul Pengumuman</label>
                                    <input type="hidden" name="ident" value="<?= $this->uri->segment(4)  ?>">
                                    <input class="form-control" name="judul" placeholder="Judul Pengumuman ... " id="judul" type="text" value="<?= $list->judul_pengumuman ?>">
                                    <?= form_error('judul','<div style="color: red; font-size: 13px;">',"</div>")  ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md">
                                <div class="form-group">
                                    <label>Isi Pengumuman</label>
                                    <div class="mb-3">
                                        <textarea class="textarea" placeholder="Place some text here" name="isi" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?= htmlspecialchars_decode($list->isi_pengumuman)  ?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md">
                                <div class="form-group">
                                    <label>Tanggal Dibuat</label>
                                    <input class="form-control" type="text" name="tanggal" value="<?= date('d - M - Y', $list->tanggal_pengumuman)  ?>" readonly>
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