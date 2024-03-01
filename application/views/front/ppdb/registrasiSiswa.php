<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title text-center">Pendaftaran Akun PPDB ONLINE DQ</h3>
                    </div>
                    <div class="panel-body">
                        <?= $this->session->flashdata('msgi');  ?>
                        <form role="form" action="<?= base_url('ppdb/pendaftaran'); ?>" method="POST">
                            <fieldset>
                                <div class="form-group">
                                    <label for="nama">Nama Lengkap*</label>
                                    <input type="text" name="nama_lengkap" id="nama" class="form-control" required>
                                    <?= form_error('nama_lengkap', '<small class="text-danger pl-3 mt-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="wa">No Yang bisa dihubungi*</label>
                                    <input type="number" name="wa" id="wa" class="form-control" placeholder="Whatsapp direkomendasikan" required>
                                    <?= form_error('wa', '<small class="text-danger pl-3 mt-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="tempatLahir">Tempat Lahir</label>
                                    <input type="text" name="tempatLahir" id="tempatLahir" class="form-control" required>
                                    <?= form_error('tempatLahir', '<small class="text-danger pl-3 mt-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Lahir</label>
                                    <input id="datepicker" name="tanggalLahir" class="form-control" autocomplete="off" required>
                                </div>
                                <div class="form-group">
                                    <label for="jenjang">Pendaftaran Untuk</label>
                                    <select class="form-control" name="jenjang" required>
                                        <option>-- Pendaftaran Untuk --</option>
                                        <option value="ponpes">PONPES</option>
                                        <option value="mts">Madrasah Tsanawiyah</option>
                                        <option value="ma">Madrasah Aliyah</option>
                                    </select>
                                </div>
                                
                                
                                <!-- Change this to a button or input when using this as a form -->
                                <button class="btn btn-md btn-primary btn-block">Registrasi</button>
                                <a href="<?= base_url('ppdb'); ?>" class="btn btn-block btn-md btn-danger">Home</a>
                            </fieldset>
                            <!-- <hr> -->
                            <!-- <div class="text-center"><a href="<?= base_url('auth/registration'); ?>">Not Ready Account?, Registered Here!</a></div> -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    