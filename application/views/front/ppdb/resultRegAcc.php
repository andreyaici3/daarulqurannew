<body>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="login-panel panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title text-center">Pendaftaran Akun PPDB berhasil</h3>
                    </div>
                    <div class="panel-body">
                        <?= $this->session->flashdata('msgi');  ?>
                        <form role="form" action="<?= base_url('ppdb/login'); ?>" method="POST">
                           <div class="form-group text-center">
                               <h4>Selamat Akun Anda Berhasil di daftarkan</h4>
                               <h6>Silahkan Login dengan akun dibawah ini untuk melengkapi data administrasi <br><br><b>Mohon simpan baik baik</b></h6>
                           </div>
                           <table style="font-size: 14px;" class="table table-responsive">
                                <tr>
                                    <td align="center">Nama Lengkap</td>
                                    <td align="center">:</td>
                                    <td align="center"><?= $this->session->userdata('nama_lengkap'); ?></td>
                                </tr>
                                <tr>
                                    <td align="center">Username</td>
                                    <td align="center">:</td>
                                    <td align="center"><?= $this->session->userdata('username'); ?></td>
                                </tr>
                                <tr>
                                    <td align="center">Password</td>
                                    <td align="center">:</td>
                                    <td align="center"><?= $this->session->userdata('pass'); ?></td>
                                </tr>
                            </table> 
                            <button type="submit" class="btn btn-md btn-block btn-primary">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    