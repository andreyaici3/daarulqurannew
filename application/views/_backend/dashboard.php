<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Admin Panel Daarulquran.sch.id</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Dashboard v2</li>
                </ol>
            </div>
            </div>
        </div>
        <hr>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box">
                        <span class="info-box-icon bg-info elevation-1"><i class="fas fa-table fa-fw"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Mata Pelajaran</span>
                            <span class="info-box-number">
                            <?= $mapel  ?>
                            <small></small>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-chalkboard-teacher fa-fw"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Guru</span>
                            <span class="info-box-number"><?= $guru  ?></span>
                        </div>
                    </div>
                </div>
                <div class="clearfix hidden-md-up"></div>
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-university"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Kelas</span>
                                <span class="info-box-number"><?= $kelas  ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="info-box mb-3">
                            <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Siswa</span>
                                <span class="info-box-number"><?= $siswa  ?></span>
                            </div>
                        </div>
                    </div>
                </div>
    
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Report Update Daarul Qur'an</h5>

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
                            <h5><b>New Update Important</b></h5>
                            <h6>*14-07-2020*</h6>
                            <div class="row">
                                <div class="col-md-4">
                                    <ul>
                                        <li>Fix Bug<sup><span class="badge badge-sm badge-primary">New</span></sup></li>
                                        <li>New Panel Administrator<sup><span class="badge badge-sm badge-primary">New</span></sup></li>
                                        <li>Clean Footer And Structur Code<sup><span class="badge badge-sm badge-primary">New</span></sup></li>
                                        <li>Delete Field Slider 1-3<sup><span class="badge badge-sm badge-primary">New</span></sup></li>
                                        <li>Foto Kontributor 400px x 400px<sup><span class="badge badge-sm badge-primary">New</span></sup></li>
                                        <li>Logo 400px x 400px<sup><span class="badge badge-sm badge-primary">New</span></sup></li>
                                        <li>Thumbnail Berita 1256px x 843px<sup><span class="badge badge-sm badge-primary">New</span></sup></li>
                                    </ul>
                                </div>
                                <div class="col-md-4">
                                    <ul>
                                        <li>Delete Field Logo, Sub, dan Judul Icon<sup><span class="badge badge-sm badge-primary">New</span></sup></li>
                                        <li>Foto Profile 400px x 400px<sup><span class="badge badge-sm badge-primary">New</span></sup></li>
                                        <li>Ukuran Foto Sampul 753px x 506px<sup><span class="badge badge-sm badge-primary">New</span></sup> 
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <h6>*24-07-2021*</h6>
                            <div class="row">
                                <div class="col-md-4">
                                    <ul>
                                        <li>Clean Code<sup><span class="badge badge-sm badge-primary">New</span></sup></li>
                                        <li>Create Database Akun<sup><span class="badge badge-sm badge-primary">New</span></sup></li>
                                    </ul>
                                </div>
                                <div class="col-md-4">
                                    <ul>
                                        
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>  
</div>




