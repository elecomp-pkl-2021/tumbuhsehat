    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Buat Profil Pasien Baru</h3>
                </div>
                <div class="card-body">
                    <form action="<?= base_url('pasien/add_profil_pasien/') ?>" method="post" enctype="multipart/form-data">
                        <?php foreach ($user->result() as $result3) : ?>
                            <input type="hidden" name="id_user" value="<?php echo $result3->id_user; ?>">
                        <?php endforeach; ?>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputUsername1">Nama Depan</label>
                                    <?php if (form_error('nama_depan')) : ?>
                                        <input type="text" class="form-control form-control-warning form-txt-warning" name="nama_depan" id="nama_depan" required="required" placeholder="<?= strip_tags(form_error('nama_depan')) ?>">
                                        <!-- <i class="ik ik-user"></i> -->
                                    <?php else : ?>
                                        <input type="text" class="form-control" name="nama_depan" id="nama_depan" required="required" placeholder="Masukkan Nama Depan" value="<?= set_value('nama_depan') ?>">
                                        <!-- <i class="ik ik-user"></i> -->
                                    <?php endif ?>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputUsername1">Tanggal Lahir</label>
                                    <?php if (form_error('tanggal_lahir')) : ?>
                                        <input type="date" class="form-control form-control-warning form-txt-warning" required="required" placeholder="<?= strip_tags(form_error('tanggal_lahir')) ?>" name="tanggal_lahir">
                                        <!-- <i class="ik ik-user"></i> -->
                                    <?php else : ?>
                                        <input type="date" class="form-control" placeholder="Masukkan Tanggal Lahir" name="tanggal_lahir" required="required" value="<?= set_value('tanggal_lahir') ?>">
                                        <!-- <i class="ik ik-user"></i> -->
                                    <?php endif ?>
                                    <!-- <input type="date" class="form-control" rows="3" name="tanggal_lahir" id="tanggal_lahir" required="required" autocomplete="off"> -->
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputUsername1">Nama Belakang</label>
                                    <?php if (form_error('nama_belakang')) : ?>
                                        <input type="text" class="form-control form-control-warning form-txt-warning" required="required" placeholder="<?= strip_tags(form_error('nama_belakang')) ?>" name="nama_belakang">
                                        <!-- <i class="ik ik-user"></i> -->
                                    <?php else : ?>
                                        <input type="text" class="form-control" placeholder="Masukkan Nama Belakang" name="nama_belakang" required="required" value="<?= set_value('nama_belakang') ?>">
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
                                    <label for="exampleInputUsername1">Hubungan pasien dengan anda</label>
                                    <?php if (form_error('hubungan')) : ?>
                                        <select class="form-control" name="hubungan" id="hubungan" required="required" placeholder="<?= strip_tags(form_error('hubungan')) ?>" name="hubungan">
                                            <option value="" disabled selected style="display: none;">-- Pilih Hubungan --</option>
                                            <option value="Istri" id="Istri">Istri</option>
                                            <option value="Suami" id="Suami">Suami</option>
                                            <option value="Anak" id="Anak">Anak</option>
                                            <option value="Ayah" id="Ayah">Ayah</option>
                                            <option value="Ibu" id="Ibu">Ibu</option>
                                            <option value="Saudara" id="Saudara">Saudara</option>
                                        </select>
                                    <?php else : ?>
                                        <select class="form-control" name="hubungan" id="hubungan" required="required" placeholder="Masukkan jenis Kelamin" name="hubungan" value="<?= set_value('hubungan') ?>">
                                            <option value="" disabled selected style="display: none;">-- Pilih Hubungan --</option>
                                            <option value="Istri" id="Istri">Istri</option>
                                            <option value="Suami" id="Suami">Suami</option>
                                            <option value="Anak" id="Anak">Anak</option>
                                            <option value="Ayah" id="Ayah">Ayah</option>
                                            <option value="Ibu" id="Ibu">Ibu</option>
                                            <option value="Saudara" id="Saudara">Saudara</option>
                                        </select>
                                    <?php endif ?>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <b>
                                    <h6>Kontak yang dapat dihubungi</h6>
                                </b>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email</label>
                                    <?php if (form_error('email')) : ?>
                                        <input type="email" class="form-control form-control-warning form-txt-warning" required="required" placeholder="<?= strip_tags(form_error('email')) ?>" name="email">
                                        <!-- <i class="ik ik-user"></i> -->
                                    <?php else : ?>
                                        <input type="email" class="form-control" placeholder="Masukkan Email" name="email" required="required" value="<?= set_value('email') ?>">
                                        <!-- <i class="ik ik-user"></i> -->
                                    <?php endif ?>
                                    <!-- <input type="number" class="form-control" rows="3" name="no_hp" id="no_hp" required="required" autocomplete="off"> -->
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">No Hp</label>
                                    <?php if (form_error('no_hp')) : ?>
                                        <input type="number" class="form-control form-control-warning form-txt-warning" required="required" placeholder="<?= strip_tags(form_error('no_hp')) ?>" name="no_hp">
                                        <!-- <i class="ik ik-user"></i> -->
                                    <?php else : ?>
                                        <input type="number" class="form-control" placeholder="Masukkan No Hp" name="no_hp" required="required" value="<?= set_value('no_hp') ?>">
                                        <!-- <i class="ik ik-user"></i> -->
                                    <?php endif ?>
                                    <!-- <input type="number" class="form-control" rows="3" name="no_hp" id="no_hp" required="required" autocomplete="off"> -->
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary mr-2" id="btn_save">Tambah Pasien Baru</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>