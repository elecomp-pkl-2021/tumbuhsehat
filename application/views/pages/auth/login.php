<div class="auth-wrapper">
    <div class="container-fluid h-100">
        <div class="row flex-row h-100 bg-white">
            <div class="col-xl-8 col-lg-6 col-md-5 p-0 d-md-block d-lg-block d-sm-none d-none">
                <div class="lavalite-bg" style="background-image: url('<?= base_url('assets') ?>/img/auth/login_bg.jpg')">
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
                    <h3>Masuk ke Tumbuh Sehat</h3>
                    <p>Senang bertemu Anda kembali!</p>
                    <form action="<?= base_url('home') ?>">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Email" required="">
                            <i class="ik ik-user"></i>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="Password" required="">
                            <i class="ik ik-lock"></i>
                        </div>
                        <div class="row">
                            <div class="col text-right">
                                <a href="forgot-password.html">Lupa Password ?</a>
                            </div>
                        </div>
                        <div class="sign-btn text-center">
                            <button class="btn btn-theme">Masuk</button>
                        </div>
                    </form>
                    <div class="register">
                        <p>Belum punya akun? <a href="register.html">Buat akun sekarang</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>