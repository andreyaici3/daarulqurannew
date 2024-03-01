<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Mata Pelajaran <a href="mapel/add" class="badge badge-primary badge-sm">Tambah</a></h1> 
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
                            <h3 class="card-title">Daftar Mata Pelajaran Daarul Qur'an</h3>
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
                                        <th>Kode Mapel</th>
                                        <th>Mata Pelajaran</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; foreach ($list as $value): ?>
                                    <tr>
                                    <td><?= $i++ ?></td>
                                    <td><?= $value->kode_mapel  ?></td>
                                    <td><?= $value->nama_mapel  ?></td>
                                    <td align="center">
                                        <span style="color: white">
                                        <a class="btn btn-sm btn-success" href="<?= base_url('admin/mapel/edit/') . $this->mapel->encodeUrl($value->id)  ?>"><i class="fas fa-edit" ></i></a>
                                        <a class="btn btn-sm btn-danger hpsModalMapel" data-id="<?= $value->id  ?>" data-toggle="modal" data-target="#modal-sm" data-key="<?= $this->mapel->encodeUrl($value->id)  ?>"><i class="fas fa-trash" ></i></a>
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