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
					<h3>Ubah Kata sandi</h3>
					<p>Masukkan Password yang baru</p>
					<form action="<?= base_url('auth/changePassword') ?>" method="post" enctype="multipart/form-data">
						<div class="form-group">
							<?php if (form_error('password')) : ?>
								<input type="password" class="form-control form-control-warning form-txt-warning" placeholder="<?= strip_tags(form_error('password')) ?>" name="password" ?>
								<i class="ik ik-lock"></i>
							<?php else : ?>
								<input type="password" class="form-control" placeholder="Masukkan password" name="password" value="<?= set_value('password') ?>">
								<i class="ik ik-lock"></i>
							<?php endif ?>
						</div>
						<div class="form-group">
							<?php if (form_error('k_password')) : ?>
								<input type="password" class="form-control form-control-warning form-txt-warning" placeholder="<?= strip_tags(form_error('k_password')) ?>" name="k_password" ?>
								<i class="ik ik-lock"></i>
							<?php else : ?>
								<input type="password" class="form-control" placeholder="Masukkan konfirmasi password" name="k_password" value="<?= set_value('k_password') ?>">
								<i class="ik ik-lock"></i>
							<?php endif ?>
						</div>
						<div class="sign-btn text-center">
							<button class="btn btn-theme">Submit</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>