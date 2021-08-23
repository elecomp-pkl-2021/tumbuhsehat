<!-- EKSTRA ORAL -->
<div class="card">
    <div class="mx-4">
        <div class="row">
            <div class="col">
                <h4 class="mt-4">Pemeriksaan Klinis Umum</h4>
                <footer class="blockquote-footer">Tanggal Terakhir Pemeriksaan :<cite title="Source Title"><?= 'Belum';?></cite></footer>
            </div>
            <div class="col mt-4">
                <div class="form-group d-flex justify-content-end">
                    <i class="ik ik-search mx-2 mt-1" style="font-size: 25px;"></i>
                </div>
            </div>
        </div>
        
        <div class="line my-3"></div>
        <div class="row">
            <div class="col">
                <h5>Ekstra Oral :</h5>
                <div id="ekstra-oral" class="ml-4">
                    <fieldset class="form-group row">
                        <legend class="col-form-label col-sm-1 px-2 float-sm-right pt-0"><b>Wajah</b>
                        </legend>
                        <div class="col-sm-10">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="wajah1" name="wajah" class="custom-control-input" value="Simetri" >
                                <label class="custom-control-label" for="wajah1">Simetri</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="wajah2" name="wajah" class="custom-control-input" value="Asimetri">
                                <label class="custom-control-label" for="wajah2">Asimetri</label>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset class="form-group row">
                        <legend class="col-form-label col-sm-1 float-sm-right pt-0"><b>Bibir</b>
                        </legend>
                        <div class="col-sm-10">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="bibir1" name="bibir" class="custom-control-input" onchange="disableInput('#bibir-lain')" value="Normal">
                                <label class="custom-control-label" for="bibir1">Normal</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="bibir2" name="bibir" class="custom-control-input" onchange="enableInput('#bibir-lain')" value="">
                                <label class="custom-control-label" for="bibir2">Lainnya</label>
                                <input class="form-control ml-3" type="text" name="bibir-lain" id="bibir-lain" placeholder="Jenis Bibir" autocomplete="off" disabled >
                            </div>
                        </div>
                    </fieldset>
                </div>
            </div>
            <div class="col">
                <h5>Kelenjar Getah Bening :</h5>
                <div id="getah-bening" class="ml-4">
                    <fieldset class="form-group row">
                        <legend class="col-form-label col-sm-3 float-sm-right pt-0">
                            <b>Submandibula Kanan <span class="pl-2 ml-1">1. </span></b>
                        </legend>
                        <div class="col-sm-7">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="subman-kanan1" name="subman-kanan-raba" class="custom-control-input" value="Teraba" >
                                <label class="custom-control-label" for="subman-kanan1">Teraba</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="subman-kanan2" name="subman-kanan-raba" class="custom-control-input" value="Tidak Teraba" >
                                <label class="custom-control-label" for="subman-kanan2">Tidak
                                    Teraba</label>
                            </div>
                        </div>
                        <div class="col-sm-3 text-right mt-1">
                            <span class="mx-2"><b>2. </b></span>
                        </div>
                        <div class="col-sm-9">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="subman-kanan3" name="subman-kanan-sakit" class="custom-control-input" value="Sakit" >
                                <label class="custom-control-label" for="subman-kanan3">Sakit</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="subman-kanan4" name="subman-kanan-sakit" class="custom-control-input" value="Tidak Sakit" >
                                <label class="custom-control-label" for="subman-kanan4">Tidak
                                    Sakit</label>
                            </div>
                        </div>
                        <div class="col-sm-3 mt-1 text-right">
                            <span class="mx-2"><b>3. </b></span>
                        </div>
                        <div class="col-sm-9 mt-1">
                            <select class="form-control" name="subman-kanan-ket" id="subman-kanan-ket">
                                <option value="">Pilih Keterangan</option>
                                <option value="Lunak">
                                    Lunak
                                </option>
                                <option value="Kenyal">
                                    Kenyal
                                </option>
                                <option value="Keras">
                                    Keras
                                </option>
                            </select>
                        </div>
                    </fieldset>
                    <fieldset class="form-group row">
                        <legend class="col-form-label col-sm-3 float-sm-right pt-0">
                            <b>Submandibula Kiri &nbsp;&nbsp;<span class="pl-2 ml-3">1. </span></b>
                        </legend>
                        <div class="col-sm-7">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="subman-kiri1" name="subman-kiri-raba" class="custom-control-input" value="Teraba">
                                <label class="custom-control-label" for="subman-kiri1">
                                    Teraba
                                </label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="subman-kiri2" name="subman-kiri-raba" class="custom-control-input" value="Tidak Teraba" >
                                <label class="custom-control-label" for="subman-kiri2">
                                    Tidak Teraba
                                </label>
                            </div>
                        </div>
                        <div class="col-sm-3 text-right mt-1">
                            <span class="mx-2"><b>2. </b></span>
                        </div>
                        <div class="col-sm-9">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="subman-kiri3" name="subman-kiri-sakit" class="custom-control-input" value="Sakit" >
                                <label class="custom-control-label" for="subman-kiri3">Sakit</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="subman-kiri4" name="subman-kiri-sakit" class="custom-control-input" value="Tidak Sakit" >
                                <label class="custom-control-label" for="subman-kiri4">
                                    Tidak Sakit
                                </label>
                            </div>
                        </div>
                        <div class="col-sm-3 mt-1 text-right">
                            <span class="mx-2"><b>3. </b></span>
                        </div>
                        <div class="col-sm-9 mt-1">
                            <select class="form-control" name="subman-kiri-ket" id="subman-kiri-ket">
                                <option value="">Pilih Keterangan</option>
                                <option value="Lunak">
                                    Lunak
                                </option>
                                <option value="Kenyal">
                                    Kenyal
                                </option>
                                <option value="Keras">
                                    Keras
                                </option>
                            </select>
                        </div>
                    </fieldset>
                    <fieldset class="form-group row">
                        <legend class="col-form-label col-sm-2 float-sm-right pt-0">
                            <b>Lainnya :</b>
                        </legend>
                        <div class="col-sm-10">
                            <input type="text" name="getah-bening-lain" id="getah-lain" class="form-control" placeholder="keterangan getah bening lain" autocomplete="off" value="">
                        </div>
                    </fieldset>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- INTRA ORAL -->
<div class="card">
    <div class="mx-4">
        <h4 class="mt-4">Pemeriksaan Klinis Umum</h4>
        <div class="line my-3"></div>
        <h5>Pemeriksaan Intra Oral :</h5>
        <div class="row ml-4 mb-1">
            <div class="col">
                <!-- STAIN -->
                <fieldset class="form-group row">
                    <legend class="col-form-label col-sm-2 float-sm-right pt-0"><b>Stain</b>
                    </legend>
                    <div class="col-sm-8">
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="stain" name="stain" class="custom-control-input" value="Ada" >
                            <label class="custom-control-label" for="stain">Ada</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="stain2" name="stain" class="custom-control-input" value="Tidak Ada">
                            <label class="custom-control-label" for="stain2">Normal</label>
                        </div>
                    </div>
                </fieldset>
                <!-- KALKULUS -->
                <fieldset class="form-group row">
                    <legend class="col-form-label col-sm-2 float-sm-right pt-0"><b>Kalkulus</b>
                    </legend>
                    <div class="col-sm-7">
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="kalkulus" name="kalkulus" class="custom-control-input" value="Normal" <>
                            <label class="custom-control-label" for="kalkulus">Normal</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="kalkulus2" name="kalkulus" class="custom-control-input" value="Subgingiva" >
                            <label class="custom-control-label" for="kalkulus2">Subgingiva</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="kalkulus3" name="kalkulus" class="custom-control-input" value="Supragingiva" >
                            <label class="custom-control-label" for="kalkulus3">Supragingiva</label>
                        </div>
                    </div>
                </fieldset>
                <!-- HUB. RAHANG -->
                <fieldset class="form-group row">
                    <legend class="col-form-label col-sm-2 float-sm-right pt-0">
                        <b>Hubungan Rahang</b>
                    </legend>
                    <div class="col-sm-10">
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="hub-rahang" name="hub-rahang" class="custom-control-input" value="Ortognati" >
                            <label class="custom-control-label" for="hub-rahang">Ortognati</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="hub-rahang2" name="hub-rahang" class="custom-control-input" value="Retrognati" >
                            <label class="custom-control-label" for="hub-rahang2">Retrognati</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="hub-rahang3" name="hub-rahang" class="custom-control-input" value="Prognati" >
                            <label class="custom-control-label" for="hub-rahang3">Prognati</label>
                        </div>
                    </div>
                </fieldset>
                <!-- GINGIVA -->
                <fieldset class="form-group row">
                    <legend class="col-form-label col-sm-2 float-sm-right pt-0"><b>Gingiva</b></legend>
                    <div class="col-sm-10">
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="gingiva1" name="gingiva" class="custom-control-input" value="Normal" onclick="disableInput('#gingiva-lain')" >
                            <label class="custom-control-label" for="gingiva1">Normal</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <div class="row">
                                <div class="col-5">
                                    <input type="radio" id="gingiva2" name="gingiva" class="custom-control-input" onclick="enableInput('#gingiva-lain')" value="" >
                                    <label class="custom-control-label" for="gingiva2">Ada
                                        Kelainan</label>
                                </div>
                                <div class="col">
                                    <input class="form-control " type="text" name="gingiva-lain" id="gingiva-lain" placeholder="Kelainan Gingiva" autocomplete="off" disabled>
                                </div>
                            </div>
                        </div>
                    </div>
                </fieldset>
                <!-- DEBRIS -->
                <fieldset class="form-group row">
                    <legend class="col-form-label col-sm-2 float-sm-right pt-0"><b>Debris</b></legend>
                    <div class="col-sm-10">
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="debris" name="debris" class="custom-control-input" value="Normal" onclick="disableInput('#debris-lain')" >
                            <label class="custom-control-label" for="debris">Normal</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <div class="row">
                                <div class="col-5">
                                    <input type="radio" id="debris2" name="debris" class="custom-control-input" onclick="enableInput('#debris-lain')" value="">
                                    <label class="custom-control-label" for="debris2">
                                        Ada Kelainan
                                    </label>
                                </div>
                                <div class="col">
                                    <input class="form-control " type="text" name="debris-lain" id="debris-lain" placeholder="Kelainan Debris" autocomplete="off" disabled>
                                </div>
                            </div>
                        </div>
                    </div>
                </fieldset>
            </div>
            <div class="col">
                <!-- MUKOSA -->
                <fieldset class="form-group row">
                    <legend class="col-form-label col-sm-2 float-sm-right pt-0"><b>Mukosa</b></legend>
                    <div class="col-sm-10">
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="mukosa" name="mukosa" class="custom-control-input" value="Normal" onclick="disableInput('#mukosa-lain')" >
                            <label class="custom-control-label" for="mukosa">Normal</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <div class="row">
                                <div class="col-5">
                                    <input type="radio" id="mukosa2" name="mukosa" class="custom-control-input" onclick="enableInput('#mukosa-lain')" value="" >
                                    <label class="custom-control-label" for="mukosa2">Ada
                                        Kelainan</label>
                                </div>
                                <div class="col">
                                    <input class="form-control " type="text" name="mukosa-lain" id="mukosa-lain" placeholder="Kelainan Mukosa" autocomplete="off" disabled>
                                </div>
                            </div>
                        </div>
                    </div>
                </fieldset>
                <!-- PALATUM -->
                <fieldset class="form-group row">
                    <legend class="col-form-label col-sm-2 float-sm-right pt-0"><b>Palatum</b></legend>
                    <div class="col-sm-10">
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="palatum" name="palatum" class="custom-control-input" value="Normal" onclick="disableInput('#palatum-lain')" >
                            <label class="custom-control-label" for="palatum">Normal</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <div class="row">
                                <div class="col-5">
                                    <input type="radio" id="palatum2" name="palatum" class="custom-control-input" onclick="enableInput('#palatum-lain')" value="" >
                                    <label class="custom-control-label" for="palatum2">Ada
                                        Kelainan</label>
                                </div>
                                <div class="col">
                                    <input class="form-control " type="text" name="palatum-lain" id="palatum-lain" placeholder="Kelainan Palatum" autocomplete="off" >
                                </div>
                            </div>
                        </div>
                    </div>
                </fieldset>
                <!-- LIDAH -->
                <fieldset class="form-group row">
                    <legend class="col-form-label col-sm-2 float-sm-right pt-0"><b>Lidah</b></legend>
                    <div class="col-sm-10">
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="lidah" name="lidah" class="custom-control-input" value="Normal" onclick="disableInput('#lidah-lain')" >
                            <label class="custom-control-label" for="lidah">Normal</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <div class="row">
                                <div class="col-5">
                                    <input type="radio" id="lidah2" name="lidah" class="custom-control-input" onclick="enableInput('#lidah-lain')" value="" >
                                    <label class="custom-control-label" for="lidah2">Ada
                                        Kelainan</label>
                                </div>
                                <div class="col">
                                    <input class="form-control " type="text" name="lidah-lain" id="lidah-lain" placeholder="Kelainan Lidah" autocomplete="off" disabled>
                                </div>
                            </div>
                        </div>
                    </div>
                </fieldset>
                <!-- DASAR MULUT -->
                <fieldset class="form-group row">
                    <legend class="col-form-label col-sm-2 float-sm-right pt-0"><b>Dasar Mulut</b>
                    </legend>
                    <div class="col-sm-10">
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="dsr-mulut" name="dsr-mulut" class="custom-control-input" value="Normal" onclick="disableInput('#dsr-mulut-lain')" >
                            <label class="custom-control-label" for="dsr-mulut">Normal</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <div class="row">
                                <div class="col-5">
                                    <input type="radio" id="dsr-mulut2" name="dsr-mulut" class="custom-control-input" onclick="enableInput('#dsr-mulut-lain')" value="" >
                                    <label class="custom-control-label" for="dsr-mulut2">Ada Kelainan</label>
                                </div>
                                <div class="col">
                                    <input class="form-control " type="text" name="dsr-mulut-lain" id="dsr-mulut-lain" placeholder="Kelainan Dasar Mulut" autocomplete="off" disabled>
                                </div>
                            </div>
                        </div>
                    </div>
                </fieldset>
                <!-- GIGI geligi -->
                <fieldset class="form-group row">
                    <legend class="col-form-label col-sm-2 float-sm-right pt-0"><b>Gigi Geligi</b>
                    </legend>
                    <div class="col-sm-10">
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="geligi" name="geligi" class="custom-control-input" value="Normal" onclick="disableInput('#geligi-lain')" >
                            <label class="custom-control-label" for="geligi">Normal</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <div class="row">
                                <div class="col-5">
                                    <input type="radio" id="geligi2" name="geligi" class="custom-control-input" onclick="enableInput('#geligi-lain')" value="" >
                                    <label class="custom-control-label" for="geligi2">Ada
                                        Kelainan</label>
                                </div>
                                <div class="col">
                                    <input class="form-control " type="text" name="geligi-lain" id="geligi-lain" placeholder="Kelainan Gigi geligi" autocomplete="off" disabled>
                                </div>
                            </div>
                        </div>
                    </div>
                </fieldset>
            </div>
        </div>
    </div>
</div>
<!-- KLINIA KHUSUS -->
<div class="card">
    <div class="mx-4">
        <div class="row">
            <div class="col">
                <h4 class="mt-4">Pemeriksaan Klinis Khusus</h4>
            </div>
            <div class="col mt-4">
                <div class="form-group d-flex justify-content-end">
                </div>
            </div>
        </div>
        
        <div class="line my-3"></div>
        <div class="form-group">
            <h5>Deskripsi Klinis :</h5>
            <div id="klinis-khusus" class="ml-4">
                <textarea class="form-control" id="desk-klinis" name="klinis-khusus" rows="3" placeholder="46 Only, vitalitas(+), palpasi(-), perkusi(+)"></textarea>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <!-- PEMERIKSAAN PENUNJANG -->
    <div class="col mx-2">
        <div class="card">
            <div class="mx-4">
                <div class="row">
                    <div class="col">
                        <h4 class="mt-4">Pemeriksaan Penunjang</h4>
                    </div>
                    <div class="col">
                        <div class="col mt-4">
                        </div>
                    </div>
                </div>
                
                <div class="line my-3"></div>
                <div class="form-group">
                    <!-- RADIOLOGI -->
                    <h5>Radiologi :</h5>
                    <div id="radiologi" class="ml-4">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="radiologi[]" id="panoramik" value="Panoramik">
                            <label class="form-check-label" for="panoramik">Panoramik</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="radiologi[]" id="Sefalometri" value="Sefalometri">
                            <label class="form-check-label" for="Sefalometri">Sefalometri</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="radiologi[]" id="Transcranial" value="Transcranial">
                            <label class="form-check-label" for="Transcranial">Transcranial</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <div class="row justify-content-between">
                                <div class="col">
                                    <input class="form-check-input" type="checkbox" name="radiologi[]" id="Dental-Regio" value="Dental Regio">
                            <label class="form-check-label py-1" for="Dental-Regio">Dental Regio</label>
                                </div>
                                <div class="col">
                                    <input type="text" name="radiologi-46" id="" class="form-control mx-3" placeholder="46">
                                </div>
                            </div>

                        </div>
                        <div class="form-group">
                            <label for="">
                                <b>Deskripsi Radiologi</b>
                            </label>
                            <textarea class="form-control" id="desk-radiologi" name="radiologi-desk" rows="3" col="10" placeholder="Tampak gambaran radiopak ada oklusal gigi 46 hingga dentin dalam. Tampak gambaran radiolusensi berbatas diffuse pada apical seluas kurang lebih 4 mm."></textarea>
                        </div>
                        <div class="form-group row">
                            <div class="col">
                                <div class="row">
                                    <div class="col">
                                        <label for="">
                                            <b>Foto Radiologi Terakhir</b>
                                        </label>
                                        <?php $img_r = 'default.jpg';?>
                                        <a href="<?= base_url('/uploads/foto_radiologi/'.$img_r); ?>" class="btn btn-primary ml-3 <?= $img_r == 'default.jpg' ? 'd-none' : '';?>" target="_blank" id="btn-img-radiologi"> 
                                            Download Foto
                                        </a>
                                    </div>
                                </div>
                                <img src="<?= base_url('/uploads/foto_radiologi/'.$img_r); ?>" class="rounded img-fluid" id="img-radiologi" alt="Foto radiologi terupdate" style="height: 200px;">
                                <input type="hidden" name="old-foto-radiologi" value="<?= $img_r;?>">
                            </div>
                            <div class="col">
                                <label for="">
                                    <b>Foto Radiologi</b>
                                </label>
                                <input type="file" id="input-file-now" class="dropify" 
                                name="radiologi-img"
                                data-allowed-file-extensions="jpg jpeg png raw" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- LABORATORIUM -->
    <div class="col">
        <div class="card">
            <div class="mx-4">
                <div class="" style="padding-top: 60px;"></div>
                <div class="line my-3"></div>
                <div class="form-group">
                    <h5>Pemeriksaan Lab :</h5>
                    <div id="laboratorium" class="ml-4">
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="lab" name="lab[]" class="custom-control-input" value="Darah Rutin" onclick="disableInput('#lab-lain')" >
                            <label class="custom-control-label" for="lab">Darah Rutin</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="lab2" name="lab[]" class="custom-control-input" onclick="enableInput('#lab-lain')" value="" >
                            <label class="custom-control-label" for="lab2">Lainnya</label>
                            <input type="text" name="lab[]" id="lab-lain" class="form-control mx-3" placeholder="" disabled>
                        </div>
                        <div class="form-group">
                            <label for="">
                                <b>Deskripsi Laboratorium</b>
                            </label>
                            <textarea class="form-control" name="lab-desk" id="desk-lab" rows="3" col="10" placeholder="Deskripsi Keterangan Laboratorium"></textarea>
                        </div>
                        <div class="form-group row">
                            <div class="col">
                                <div class="row">
                                    <div class="col">
                                        <label for="">
                                            <b>Foto Laboratorium Terakhir</b>
                                        </label>
                                        <?php $img_l = 'default.jpg';?>
                                        <a href="<?= base_url('/uploads/foto_laboratorium/'.$img_l); ?>" class="btn btn-primary ml-3 <?= $img_l == 'default.jpg' ? 'd-none' : '';?>" target="_blank" id="btn-img-laboratorium"> Download Foto</a>
                                    </div>
                                </div>
                                <img src="<?= base_url('/uploads/foto_laboratorium/'.$img_l); ?>" class="rounded img-fluid" id="img-laboratorium" alt="Foto laboratorium terupdate" style="height: 200px;">
                                <input type="hidden" name="old-foto-laboratorium" value="<?= $img_l;?>">
                                
                            </div>
                            <div class="col">
                                <label for="">
                                    <b>Upload Foto Laboratorium</b>
                                </label>
                                <input type="file" id="input-file-now" class="dropify-lab" 
                                name="laboratorium-img" data-allowed-file-extensions="jpg jpeg png raw" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>