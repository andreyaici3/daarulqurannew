<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title text-center">Halaman Login Calon Siswa DQ</h3>
                    </div>
                    <div class="panel-body">
                        <?= $this->session->flashdata('msgi');  ?>
                        <form role="form" action="<?= base_url('ppdb/login'); ?>" method="POST">
                            <fieldset>
                                <div class="form-group">
                                    <label for="username">Username*</label>
                                    <input type="text" name="username" id="username" class="form-control" placeholder="Username.....">
                                    <?= form_error('username', '<small class="text-danger pl-3 mt-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password*</label>
                                    <input type="password" name="password" id="password" class="form-control" placeholder="password....">
                                    <?= form_error('password', '<small class="text-danger pl-3 mt-3">', '</small>'); ?>
                                </div>
                                
                                
                                
                                
                                <!-- Change this to a button or input when using this as a form -->
                                <button class="btn btn-md btn-primary btn-block">Login</button>
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

    