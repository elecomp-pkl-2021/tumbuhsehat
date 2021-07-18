<div class="row">
    <div class="col">
        <div class="card">
</div>
        </div>
                </div>
                    <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header"><h3>Buat Akun Keluarga</h3></div>
                                    <div class="card-body">
                                        <form class="forms-sample">
                                            <div class="form-group">
                                                <label for="exampleInputUsername1">Nama Depan</label>
                                                <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Username">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputUsername1">Nama Belakang</label>
                                                <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Username">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputUsername1">Tanggal Lahir</label>
                                                <input type="date" class="form-control" rows="3" name="tanggal_lahir" id="tanggal_lahir" required="required" autocomplete="off">
                                            </div>
                                            <div class="form-group">
                                            <label for="exampleInputUsername1">Jenis Kelamin</label>
                                                <select class="form-control" name="jenis_kelamin" id="jenis_kelamin" required="required">
													<option value="" disabled selected style="display: none;">-- Pilih Jenis Kelamin --</option>
													<option value="Laki-Laki" id="Laki-Laki">Laki-Laki</option>
													<option value="Perempuan" id="Perempuan">Perempuan</option>
												</select>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">No Hp</label>
                                                <input type="number" class="form-control" rows="3" name="no_hp" id="no_hp" required="required" autocomplete="off">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Email address</label>
                                                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
                                            </div>
                                            <div class="form-group">
												    <button class="btn salmon col-sm-3" style="height: 50px; width: 100%;background-color: #00C1FF;color:#fff;" type="button" onclick="kirim()">Kirim Kode Verifikasi</button> 
                                            </div>
                                            <div class="form-group">
												<div class="col-lg-3">
													<p>Kami telah mengirimkan kode verifikasi melalui Email anda. Mohon dapat menunggu dalam waktu beberapa menit.</p>
												</div>
                                            </div>
											<div >
												<div class="col-lg-2" style="margin-left:18px; margin-top:20px">
													Kode Verifikasi
												</div>
												<div class="col-lg-4" style="margin-left:-8px; margin-top:20px;margin-right:42%">
													<div class="form-group">
														<input type="text" class="form-control" rows="3" name="kode_verifikasi" id="kode_verifikasi" onchange="cek_kode(this.value)" required="required">
													</div>
												</div>
												<div id="benar" class="col-lg-2" style="margin-left:-460px; margin-top:27px; color:Lime; display: none;">
													Kode telah terverifikasi
												</div>
												<div id="salah" class="col-lg-2" style="margin-left:-460px; margin-top:27px; color:red; display: none;">
													Kode verifikasi salah
												</div>
											</div>
											<div class="col-lg-12">
											<div class="col-lg-2">	 
											
											</div>
											<div class="col-lg-4">	
												<div class="form-group">	
												<p><a href="#" style="color: #f40049">Klik Disini</a> Apabila anda belum menerima kode verifikasi</p>
												</div>
											</div>
                                            <div class="form-group">
                                                <label class="custom-control custom-radio">
                                                    <input type="radio" class="custom-control-input">
                                                    <span class="custom-control-label">&nbsp;Remember me</span>
                                                </label>
                                            </div>
                                            <button type="submit" class="btn btn-primary mr-2">Buat akun Keluarga</button>
                                            <button class="btn btn-light">Cancel</button>
                                          </form>
                                    </div>
                                </div>
                            </div>
</div>