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
							<a href="<?= base_url() ?>"><img src="<?= base_url('assets') ?>/src/img/logo-escalade.png"
									alt="" style="border-radius: 8px;"></a>
						</center>
					    </div>
                            <h3>Forgot Password</h3>
                            <p>We will send you a link to reset password.</p>
                            <?php if($this->session->flashdata('berhasil_reset') != null) : ?>
						        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>Reset Password Berhasil!</strong> <br><?= $this->session->flashdata('berhasil_reset')?>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="ik ik-x"></i></button>
                                </div>
					        <?php elseif($this->session->flashdata('gagal_reset') != null) : ?>
						        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <strong>Gagal Reset Password!</strong> <?= $this->session->flashdata('gagal_reset')?>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="ik ik-x"></i></button>
                                </div>		
					        <?php endif?>
                            <form action="<?= base_url('auth/forgotPassword') ?>" method="post" enctype="multipart/form-data">
                            <div class="form-group">
							<?php if (form_error('email')) : ?>
							<input type="email" class="form-control form-control-warning form-txt-warning"
								placeholder="<?= strip_tags(form_error('email')) ?>" name="email" ?>
							<i class="ik ik-mail"></i>
							<?php else : ?>
							<input type="email" class="form-control" placeholder="Masukkan email"
								name="email" value="<?= set_value('email')?>">
							<i class="ik ik-mail"></i>
							<?php endif ?>
						</div>
                                <div class="sign-btn text-center">
                                    <button class="btn btn-theme">Kirim</button>
                                </div>
                                </form>
                            <div class="register">
                                <p>Kembali ke <a href="<?= base_url('')?>">halaman login</a></p>
                            </div>
                        </div>
                    </div>
                
                    
            </div>
            </div>
        </div>