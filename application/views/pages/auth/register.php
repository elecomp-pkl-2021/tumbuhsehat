<div class="auth-wrapper">
    <div class="container-fluid h-100">
        <div class="row flex-row h-100 bg-white">
            <div class="col-xl-8 col-lg-6 col-md-5 p-0 d-md-block d-lg-block d-sm-none d-none">
                <div class="lavalite-bg" style="background-image: url('<?= base_url('assets') ?>/img/auth/register_bg.jpg')">
                    <div class="lavalite-overlay"></div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-7 my-auto p-0">
                <div class="authentication-form mx-auto">
                    <div class="logo mb-50">
                        <center>
                            <a href="<?= base_url() ?>"><img src="<?= base_url('assets') ?>/src/img/logo-escalade.png" alt="" style="border-radius: 8px;"></a>
                        </center>
                    </div>
                    <h3>Daftar ke Tumbuh Sehat</h3>
                    <p>Senang bertemu Anda kembali!</p>
                    <form action="<?= base_url('auth/Register') ?>" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <?php if (form_error('nama_depan')) : ?>
                                        <input type="text" name="nama_depan" class="form-control form-control-warning form-txt-warning" placeholder="<?= strip_tags(form_error('nama_depan')) ?>">
                                        <i class="ik ik-user"></i>
                                    <?php else : ?>
                                        <input type="text" name="nama_depan" class="form-control" placeholder="Nama Depan" value="<?= set_value('nama_depan') ?>">
                                        <i class="ik ik-user"></i>
                                    <?php endif ?>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <?php if (form_error('tanggal_lahir')) : ?>
                                            <input type="date" name="tanggal_lahir" id="date" class="form-control form-control-warning form-txt-warning" value="<?= strip_tags(form_error('tanggal_lahir')) ?>">
                                            <i class="ik ik-calendar"></i>
                                        <?php else : ?>
                                            <input type="date" name="tanggal_lahir" id="date" class="form-control" placeholder="Tanggal Lahir" value="<?= set_value('tanggal_lahir') ?>">
                                            <i class="ik ik-calendar"></i>
                                        <?php endif ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <?php if (form_error('alamat')) : ?>
                                        <input type="alamat" name="alamat" class="form-control form-control-warning form-txt-warning" placeholder="<?= strip_tags(form_error('alamat')) ?>">
                                        <i class="ik ik-home"></i>
                                    <?php else : ?>
                                        <input type="alamat" name="alamat" class="form-control" placeholder="Alamat" value="<?= set_value('alamat') ?>">
                                        <i class="ik ik-home"></i>
                                    <?php endif ?>
                                </div>
                                <div class="form-group">
                                    <?php if (form_error('handphone')) : ?>
                                        <input type="handphone" name="handphone" class="form-control form-control-warning form-txt-warning" placeholder="<?= strip_tags(form_error('handphone')) ?>">
                                        <i class="ik ik-phone"></i>
                                    <?php else : ?>
                                        <input type="handphone" name="handphone" class="form-control" placeholder="Handphone" value="<?= set_value('handphone') ?>">
                                        <i class="ik ik-phone"></i>
                                    <?php endif ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <?php if (form_error('nama_belakang')) : ?>
                                        <input type="text" name="nama_belakang" class="form-control form-control-warning form-txt-warning" placeholder="<?= strip_tags(form_error('nama_belakang')) ?>">
                                        <i class="ik ik-user"></i>
                                    <?php else : ?>
                                        <input type="text" name="nama_belakang" class="form-control" placeholder="Nama Belakang" value="<?= set_value('tanggal_lahir') ?>">
                                        <i class="ik ik-user"></i>
                                    <?php endif ?>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <?php if (form_error('jenis_kelamin')) : ?>
                                            <select class="form-control form-control-warning form-txt-warning" name="jenis_kelamin">
                                                <option value="" disabled selected style="display: none;"><?= strip_tags(form_error('jenis_kelamin')) ?></option>
                                                <option value="Laki-Laki" id="Laki-Laki">Laki-Laki</option>
                                                <option value="Perempuan" id="Perempuan">Perempuan</option>
                                            </select>
                                            <i class="ik ik-users"></i>
                                        <?php else : ?>
                                            <select class="form-control" name="jenis_kelamin">
                                                <option value="" disabled selected style="display: none;">Jenis Kelamin</option>
                                                <option value="Laki-Laki" id="Laki-Laki">Laki-Laki</option>
                                                <option value="Perempuan" id="Perempuan">Perempuan</option>
                                            </select>
                                            <i class="ik ik-users"></i>
                                        <?php endif ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <?php if (form_error('email')) : ?>
                                        <input type="email" name="email" class="form-control form-control-warning form-txt-warning" placeholder="<?= strip_tags(form_error('email')) ?>">
                                        <i class="ik ik-mail"></i>
                                    <?php else : ?>
                                        <input type="email" name="email" class="form-control" placeholder="Email" value="<?= set_value('email') ?>">
                                        <i class="ik ik-mail"></i>
                                    <?php endif ?>
                                </div>
                                <div class="form-group">
                                    <?php if (form_error('password')) : ?>
                                        <input type="password" name="password" class="form-control form-control-warning form-txt-warning" placeholder="<?= strip_tags(form_error('password')) ?>">
                                        <i class="ik ik-lock"></i>
                                    <?php else : ?>
                                        <input type="password" name="password" class="form-control" placeholder="Password" value="<?= set_value('password') ?>">
                                        <i class="ik ik-lock"></i>
                                    <?php endif ?>
                                </div>
                            </div>
                        </div>
                        <div class="sign-btn text-center">
                            <button type="submit" class="btn btn-theme">Daftar</button>
                        </div>
                    </form>
                    <div class="register">
                        <p>Sudah punya akun? <a href="<?= base_url('') ?>">Kembali ke Login</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>