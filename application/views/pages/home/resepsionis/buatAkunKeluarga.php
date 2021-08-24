<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3>Buat Janji Pemeriksaan</h3>
            </div>
            <div class="card-body">
                <?php if ($this->session->flashdata('berhasil') != null) : ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Akun Keluarga Berhasil Ditambahkan!</strong> <br><?= $this->session->flashdata('berhasil') ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="ik ik-x"></i></button>
                    </div>
                <?php elseif ($this->session->flashdata('gagal') != null) : ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Gagal Menambahkan Akun Keluarga!</strong> <?= $this->session->flashdata('gagal') ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="ik ik-x"></i></button>
                    </div>
                <?php endif ?>
                <form action="<?= base_url('klinik/buatAkunKeluarga') ?>" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputUsername1">Nama Depan</label>
                                <?php if (form_error('nama_depan')) : ?>
                                    <input type="text" class="form-control form-control-warning form-txt-warning" placeholder="<?= strip_tags(form_error('nama_depan')) ?>" name="nama_depan">
                                    <!-- <i class="ik ik-user"></i> -->
                                <?php else : ?>
                                    <input type="text" class="form-control" placeholder="Masukkan Nama Depan" name="nama_depan" value="<?= set_value('nama_depan') ?>">
                                    <!-- <i class="ik ik-user"></i> -->
                                <?php endif ?>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">Tanggal Lahir</label>
                                <input type="text" class="form-control" rows="3" name="tanggal_lahir" id="tanggal_lahir" required="required" placeholder="Masukkan Tanggal Lahir" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputUsername1">Nama Belakang</label>
                                <?php if (form_error('nama_belakang')) : ?>
                                    <input type="text" class="form-control form-control-warning form-txt-warning" placeholder="<?= strip_tags(form_error('nama_belakang')) ?>" name="nama_belakang">
                                    <!-- <i class="ik ik-user"></i> -->
                                <?php else : ?>
                                    <input type="text" class="form-control" placeholder="Masukkan Nama Belakang" name="nama_belakang" value="<?= set_value('nama_belakang') ?>">
                                    <!-- <i class="ik ik-user"></i> -->
                                <?php endif ?>
                                <!-- <input type="text" class="form-control" name="nama_belakang" id="nama_belakang" placeholder="Nama Belakang"> -->
                            </div>
                            <div class="form-group">
                                <label for="exampleInputUsername1">Jenis Kelamin</label>
                                <?php if (form_error('jenis_kelamin')) : ?>
                                    <select class="form-control" name="jenis_kelamin" id="jenis_kelamin" required="required" placeholder="<?= strip_tags(form_error('jenis_kelamin')) ?>" name="jenis_kelamin">
                                        <option value="" disabled selected style="display: none;">-- Pilih Jenis Kelamin --</option>
                                        <option value="Laki-Laki" id="Laki-Laki">Laki-Laki</option>
                                        <option value="Perempuan" id="Perempuan">Perempuan</option>
                                    </select>
                                <?php else : ?>
                                    <select class="form-control" name="jenis_kelamin" id="jenis_kelamin" required="required" placeholder="Masukkan jenis Kelamin" name="jenis_kelamin" value="<?= set_value('jenis_kelamin') ?>">
                                        <option value="" disabled selected style="display: none;">-- Pilih Jenis Kelamin --</option>
                                        <option value="Laki-Laki" id="Laki-Laki">Laki-Laki</option>
                                        <option value="Perempuan" id="Perempuan">Perempuan</option>
                                    </select>
                                <?php endif ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">No Hp</label>
                                <?php if (form_error('no_hp')) : ?>
                                    <input type="number" class="form-control form-control-warning form-txt-warning" placeholder="<?= strip_tags(form_error('no_hp')) ?>" name="no_hp">
                                    <!-- <i class="ik ik-user"></i> -->
                                <?php else : ?>
                                    <input type="number" class="form-control" placeholder="Masukkan No Hp" name="no_hp" value="<?= set_value('no_hp') ?>">
                                    <!-- <i class="ik ik-user"></i> -->
                                <?php endif ?>
                                <!-- <input type="number" class="form-control" rows="3" name="no_hp" id="no_hp" required="required" autocomplete="off"> -->
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email</label>
                                <?php if (form_error('email')) : ?>
                                    <input type="email" class="form-control form-control-warning form-txt-warning" placeholder="<?= strip_tags(form_error('email')) ?>" name="email">
                                    <!-- <i class="ik ik-user"></i> -->
                                <?php else : ?>
                                    <input type="email" class="form-control" placeholder="Masukkan Email" name="email" value="<?= set_value('email') ?>">
                                    <!-- <i class="ik ik-user"></i> -->
                                <?php endif ?>
                                <!-- <input type="number" class="form-control" rows="3" name="no_hp" id="no_hp" required="required" autocomplete="off"> -->
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary mr-2" id="btn_save">Buat akun Keluarga</button>
                                <a href="<?= base_url('home') ?>" class="btn btn-light">Batal</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>