<?php $this->load->helper('global');?>
<div class="bs-stepper" id="stepper">
    <div class="card">
        <div class="bs-stepper-header" role="tablist">
            <!-- your steps here -->
            <div class="step" data-target="#anamnesa-part">
                <button type="button" class="step-trigger" role="tab" aria-controls="anamnesa-part" id="anamnesa-part-trigger">
                    <span class="bs-stepper-circle">1</span>
                    <span class="bs-stepper-label">Anamnesa</span>
                </button>
            </div>
            <div class="line"></div>
            <div class="step" data-target="#odontogram-part">
                <button type="button" class="step-trigger" role="tab" aria-controls="odontogram-part" id="odontogram-part-trigger">
                    <span class="bs-stepper-circle">2</span>
                    <span class="bs-stepper-label">Odontogram (Before)</span>
                </button>
            </div>
            <div class="line"></div>
            <div class="step" data-target="#klinis-part">
                <button type="button" class="step-trigger" role="tab" aria-controls="klinis-part" id="klinis-part-trigger">
                    <span class="bs-stepper-circle">3</span>
                    <span class="bs-stepper-label">Pemeriksaan Klinis</span>
                </button>
            </div>
            <div class="line"></div>
            <div class="step" data-target="#diagnosa-part">
                <button type="button" class="step-trigger" role="tab" aria-controls="diagnosa-part" id="diagnosa-part-trigger">
                    <span class="bs-stepper-circle">4</span>
                    <span class="bs-stepper-label">Diagnosa</span>
                </button>
            </div>
            <div class="line"></div>
            <div class="step" data-target="#perawatan-part">
                <button type="button" class="step-trigger" role="tab" aria-controls="perawatan-part" id="perawatan-part-trigger">
                    <span class="bs-stepper-circle">5</span>
                    <span class="bs-stepper-label">Perawatan</span>
                </button>
            </div>
            <div class="line"></div>
            <div class="step" data-target="#odontogram-after-part">
                <button type="button" class="step-trigger" role="tab" aria-controls="odontogram-after-part" id="odontogram-after-part-trigger" >
                    <span class="bs-stepper-circle">6</span>
                    <span class="bs-stepper-label">Odontogram (after)</span>
                </button>
            </div>
        </div>
    </div>
    <form action="<?= base_url('Dokter/addPemeriksaan');?>" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id_rm" id="id_rm" value="<?= $pasien['id_rekam_medis']; ?>">
        <input type="hidden" name="id_pasien" id="id_pasien" value="<?= $pasien['id_pasien']; ?>">
        <input type="hidden" name="id_booking" id="id_booking" value="<?= $pasien['id_booking']; ?>">
        <input type="hidden" name="id_user" value="<?= $pasien['id_user']; ?>">
        <div class="bs-stepper-content">
            <!-- ANAMNESA PART -->
            <div id="anamnesa-part" class="content" role=" tabpanel" aria-labelledby="anamnesa-part-trigger" style="margin: 0 -1%;">
                <?php $this->load->view('/pages/home/dokter/stepper/anamnesa');?>
            </div>

            <!-- ODONTOGRAM BEFORE PART -->
            <div id="odontogram-part" class="content" role="tabpanel" aria-labelledby="odontogram-part-trigger" style="margin: 0 -1%;">
                <div class="card">
                    <div class="mx-4">
                        <h4 class="mt-4">Odontogram Before</h4>
                        <div class="line my-3"></div>
                        <?php $this->load->view('pages/home/dokter/stepper/odontogram'); ?>
                    </div>
                </div>
                <button type="button" class="btn btn-secondary" onclick="stepper.previous()">Back</button>
                <button type="button" class="btn btn-primary" onclick="stepper.next(); save_temp();">Next</button>
            </div>

            <!-- KLINIS PART -->
            <div id="klinis-part" class="content" role="tabpanel" aria-labelledby="klinis-part-trigger" style="margin: 0 -1%;">
                <?php if($pem_umum != null && $pem_khusus != null && $pem_penunjang != null):?>
                    <?php $this->load->view('/pages/home/dokter/stepper/pemeriksaan/pemeriksaan-lama');?>
                <?php else:?>
                        <?php $this->load->view('/pages/home/dokter/stepper/pemeriksaan/pemeriksaan-baru');?>
                <?php endif;?>
                
                <button type="button" class="btn btn-secondary" onclick="stepper.previous()">Back</button>
                <button type="button" class="btn btn-primary" onclick="stepper.next()">Next</button>
            </div>

            <!-- DIAGNOSA PART -->
            <div id="diagnosa-part" class="content" role="tabpanel" aria-labelledby="diagnosa-part-trigger" style="margin: 0 -1%;">
                <div class="card">
                    <div class="mx-4">
                        <h4 class="mt-4">Diagnosa</h4>
                        <div class="line my-3"></div>
                        <div class="form-group">
                            <label for="diagnosa">Diagnosa Pasien</label>
                            <textarea class="form-control" name="diagnosa" id="diagnosa" cols="20" rows="5"></textarea>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn btn-secondary" onclick="stepper.previous()">Back</button>
                <button type="button" class="btn btn-primary" id="btn-diagnosa" onclick="stepper.next()">Next</button>
            </div>

            <!-- PERAWATAN PART -->
            <div id="perawatan-part" class="content" role="tabpanel" aria-labelledby="perawatan-part-trigger" style="margin: 0 -1%;">
                <?php $this->load->view('/pages/home/dokter/stepper/perawatan');?>
            </div>

            <!-- ODONTOGRAM AFTER PART (LAST) -->
            <div id="odontogram-after-part" class="content" role="tabpanel" aria-labelledby="odontogram-after-part-trigger" style="margin: 0 -1%;">
                <div class="card">
                    <div class="mx-4">
                        <h4 class="mt-4">Odontogram After</h4>
                        <div class="line my-3"></div>
                        <?php $this->load->view('pages/home/dokter/stepper/odontogram-after'); ?>
                    </div>
                </div>
                <button type="button" class="btn btn-secondary" onclick="stepper.previous()">Back</button>
                <button type="submit" class="btn btn-primary" onclick="save_temp()">Submit</button>
            </div>
        </div>
    </form>
</div>

<?php $this->load->view('/pages/home/dokter/script/stepper-script');?>
<?php $this->load->view('/pages/home/dokter/script/pemeriksaan-script');?>
<?php $this->load->view('/pages/home/dokter/script/filter-tanggal-pemeriksaan-script');?>