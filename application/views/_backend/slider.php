<div class="content-wrapper">
<?php if ($type == 'list') : ?>
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Data Slider <a href="slider/add" class="badge badge-primary badge-sm">Tambah</a></h1> 
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
                <?= $this->session->flashdata('msgi') ?>
                <div class="row">
                    <div class="col-md">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Daftar Slider</h3>
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
                                            <th>Judul Slider</th>
                                            <th>Deskripsi Slider</th>
                                            <th style="width: 200px;">Image</th>
                                            <th>Status</th>
                                            <th style="width: 100px;">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i=1; foreach ($list as $key) : ?>
                                            <tr>
                                                <td><?= $i++ ?></td>
                                                <td><?= $key->judul_foto ?></td>
                                                <td><?= $key->ket_foto ?></td>
                                                <td style="text-align: center;">
                                                    <img class="img-thumbnail img-responsive" width="50%" src="<?= base_url('assets/images/config/' . $key->foto) ?>" alt="">                                            
                                                </td>
                                                <td style="text-align: center;">
                                                    <?php if ( $key->active == 1 ){ ?>
                                                        <span class="btn btn-primary btn-xs sliderSwitch" data-id="<?= $key->id_slider ?>">Active</span>
                                                    <?php } ?>
                                                </td>
                                                <td align="center">
                                                    <span style="color: white">
                                                        <a class="btn btn-sm btn-danger hpsModalSlider" data-id="<?= $key->id_foto  ?>" data-toggle="modal" data-target="#modal-sm" data-key="<?= $this->mapel->encodeUrl($key->id_foto)  ?>" data-toggle="modal" data-target="#modal-sm"><i class="fas fa-trash" ></i></a>
                                                    </span>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
        <script>
            $('.sliderSwitch').on('click', function(){
                let id = $(this).data('id');
                $.ajax({
                    url: '<?= base_url('admin/switchSLider') ?>',
                    method: 'POST',
                    data: {id: id},
                    type: 'JSON',
                    successP: function(data){
                        alert(data);
                    }
                })
            })
        </script>
<?php endif; ?>

<?php if ($type == 'add') : ?>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Tambah Slider <a href="<?= base_url('admin/slider') ?>" class="badge badge-primary badge-sm">Back To List</a></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/') . $this->uri->segment(2) ?>"><?= $this->uri->segment(2)  ?></a></li>
                        <li class="breadcrumb-item active"><?= $this->uri->segment(3)  ?></li>
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
                        <h3 class="card-title">Tambah Slider</h3>
                        <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                            <i class="fas fa-times"></i>
                        </button>
                        </div>
                    </div>
                <?= form_open_multipart('admin/slider/add')  ?>
                <div class="card-body pad">
                    <div class="row">
                        <div class="col-md">
                            <div class="form-group">
                                <label>Judul Besar</label>
                                <input class="form-control" name="judul" placeholder="Judul Besar... " id="judul" type="text" value="<?= set_value('judul'); ?>">
                                <?= form_error('judul','<div style="color: red; font-size: 13px;">',"</div>")  ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md">
                            <div class="form-group">
                                <label>Deskripsi</label>
                                <input class="form-control" name="desc" placeholder="Deskripsi Foto... " id="desc" type="text" value="<?= set_value('desc'); ?>">
                                <?= form_error('desc','<div style="color: red; font-size: 13px;">',"</div>")  ?>
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
<?php endif; ?>
</div>