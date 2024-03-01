<style>
    .former {
        margin-top: -10px;
    }
</style>
<div class="login-box">
    <div class="login-logo">
        <a href="<?= base_url('auth') ?>"><b>Daarul</b> Qur'an</a>
    </div>
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">Silahkan Login Untuk Mengelola Website</p>
            <?= $this->session->flashdata('msgi')  ?>
            <?= form_open('auth')  ?>
            <div class="input-group mb-3">
                <input type="email" class="form-control" placeholder="Email" name="email" value="<?= set_value('email') ?>">
                <div class="input-group-append">
                    <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                    </div>
                </div>
            </div>
            <?= form_error('email','<div style="color: red; font-size: 8px;" class="former mb-4">','</div>'); ?>
            <div class="input-group mb-3">
                <input type="password" class="form-control" placeholder="Password" name="password">
                <div class="input-group-append">
                    <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                    </div>
                </div>
            </div>
            <?= form_error('password','<div style="color: red; font-size: 8px;" class="former">','</div>'); ?>
            <div class="row">
                <div class="col-4 offset-8">
                    <button type="submit" class="btn btn-primary btn-block">Masuk</button>
                </div>
            </div>
        <?= form_close() ?>
        </div>
    </div>
</div>
