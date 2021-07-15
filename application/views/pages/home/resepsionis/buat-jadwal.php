<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header justify-content-between">
                <h3>Buat Janji Pemeriksaan</h3>
            </div>
            <div class="card-body">
                <form method="POST" action="<?= base_url() ?>Klinik/add_booking">

                    <div class="bs-stepper" id="stepper">
                        <div class="bs-stepper-header" role="tablist">
                            <!-- your steps here -->
                            <div class="step" data-target="#jadwal-part">
                                <button type="button" class="step-trigger" role="tab" aria-controls="jadwa;-part"
                                    id="jadwal-part-trigger">
                                    <span class="bs-stepper-circle">1</span>
                                    <span class="bs-stepper-label">Pilih Jadwal</span>
                                </button>
                            </div>
                            <div class="line"></div>
                            <div class="step" data-target="#data-diri-part">
                                <button type="button" class="step-trigger" role="tab" aria-controls="data-diri-part"
                                    id="data-diri-part-trigger">
                                    <span class="bs-stepper-circle">2</span>
                                    <span class="bs-stepper-label">Data Diri</span>
                                </button>
                            </div>
                            <div class="line"></div>
                            <div class="step" data-target="#keluhan-part">
                                <button type="button" class="step-trigger" role="tab" aria-controls="keluhan-part"
                                    id="keluhan-part-trigger">
                                    <span class="bs-stepper-circle">3</span>
                                    <span class="bs-stepper-label">Keluhan</span>
                                </button>
                            </div>
                            <div class="line"></div>
                            <div class="step" data-target="#pembayaran-part">
                                <button type="button" class="step-trigger" role="tab" aria-controls="pembayaran-part"
                                    id="pembayaran-part-trigger">
                                    <span class="bs-stepper-circle">4</span>
                                    <span class="bs-stepper-label">Pembayaran</span>
                                </button>
                            </div>
                            <div class="line"></div>
                            <div class="step" data-target="#konfirmasi-part">
                                <button type="button" class="step-trigger" role="tab" aria-controls="konfirmasi-part"
                                    id="konfirmasi-part-trigger">
                                    <span class="bs-stepper-circle">5</span>
                                    <span class="bs-stepper-label">Konfirmasi</span>
                                </button>
                            </div>
                        </div>

                        <div class="bs-stepper-content">
                            <!-- your steps content here -->
                            <div id="jadwal-part" class="content" role="tabpanel" aria-labelledby="jadwal-part-trigger">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <label for="tgl_pemeriksaan">Tanggal Pemeriksaan</label>
                                            <input type="text" class="form-control" id="tgl_pemeriksaan"
                                                name="tgl_pemeriksaan" />
                                        </div>
                                        <div class="col-md-6 col-12">

                                            <label for="">Waktu Pemeriksaan</label>
                                            <div class="grid">
                                                <label class="card-input">
                                                    <input name="plan" class="radio" type="radio" checked>
                                                    <span class="plan-details">
                                                        <span class="plan-type">Basic</span>
                                                    </span>
                                                </label>
                                                <label class="card-input">
                                                    <input name="plan" class="radio" type="radio">
                                                    <span class="plan-details" aria-hidden="true">
                                                        <span class="plan-type">Pro</span>
                                                    </span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="my-3">
                                        <button type="button" class="btn btn-primary btn-next-form"
                                            onclick="stepper.next()">Selanjutnya</button>
                                    </div>
                                </div>
                            </div>

                            <div id="data-diri-part" class="content" role="tabpanel"
                                aria-labelledby="data-diri-part-trigger">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="inputEmail4">Email</label>
                                        <input type="email" class="form-control" id="inputEmail4">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputPassword4">Password</label>
                                        <input type="password" class="form-control" id="inputPassword4">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputAddress">Address</label>
                                    <input type="text" class="form-control" id="inputAddress"
                                        placeholder="1234 Main St">
                                </div>
                                <div class="form-group">
                                    <label for="inputAddress2">Address 2</label>
                                    <input type="text" class="form-control" id="inputAddress2"
                                        placeholder="Apartment, studio, or floor">
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="inputCity">City</label>
                                        <input type="text" class="form-control" id="inputCity">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputState">State</label>
                                        <select id="inputState" class="form-control">
                                            <option selected>Choose...</option>
                                            <option>...</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="inputZip">Zip</label>
                                        <input type="text" class="form-control" id="inputZip">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="gridCheck">
                                        <label class="form-check-label" for="gridCheck">
                                            Check me out
                                        </label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                    </div>
                                    <div class="my-3">
                                        <button type="button" class="btn btn-secondary btn-prev-form"
                                            onclick="stepper.previous()">Kembali</button>
                                        <button type="button" class="btn btn-primary btn-next-form"
                                            onclick="stepper.next()">Selanjutnya</button>
                                    </div>
                                </div>

                            </div>

                            <div id="keluhan-part" class="content" role="tabpanel"
                                aria-labelledby="keluhan-part-trigger">
                                <div class="form-group">
                                    <div class="row">
                                    </div>
                                    <div class="my-3">
                                        <button type="button" class="btn btn-secondary btn-prev-form"
                                            onclick="stepper.previous()">Kembali</button>
                                        <button type="button" class="btn btn-primary btn-next-form"
                                            onclick="stepper.next()">Selanjutnya</button>
                                    </div>
                                </div>
                            </div>

                            <div id="pembayaran-part" class="content" role="tabpanel"
                                aria-labelledby="pembayaran-part-trigger">
                                <div class="form-group">
                                    <div class="row">
                                    </div>
                                    <div class="my-3">
                                        <button type="button" class="btn btn-secondary btn-prev-form"
                                            onclick="stepper.previous()">Kembali</button>
                                        <button type="button" class="btn btn-primary btn-next-form"
                                            onclick="stepper.next()">Selanjutnya</button>
                                    </div>
                                </div>
                            </div>
                            <div id="konfirmasi-part" class="content" role="tabpanel"
                                aria-labelledby="konfirmasi-part-trigger">
                                <div class="form-group">
                                    <div class="row">
                                    </div>
                                    <div class="my-3">
                                        <button type="button" class="btn btn-secondary btn-prev-form"
                                            onclick="stepper.previous()">Kembali</button>
                                        <button type="button" class="btn btn-primary btn-next-form"
                                            onclick="stepper.next()">Selanjutnya</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- STEPPER -->
<script src="https://cdn.jsdelivr.net/npm/bs-stepper/dist/js/bs-stepper.min.js"></script>
<!-- DATEPICKER -->
<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/themes/base/jquery-ui.css"
    type="text/css" media="all">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    stepper = new Stepper(document.querySelector('#stepper'), {
        linear: true,
        animation: true
    })
})
// datepicker
var dateToday = new Date();
var dates = $("#tgl_pemeriksaan, #to").datepicker({
    defaultDate: "+1w",
    changeMonth: true,
    numberOfMonths: 1,
    minDate: dateToday,
    onSelect: function(selectedDate) {
        var option = this.id == "tgl_pemeriksaan" ? "minDate" : "maxDate",
            instance = $(this).data("datepicker"),
            date = $.datepicker.parseDate(instance.settings.dateFormat || $.datepicker._defaults.dateFormat,
                selectedDate, instance.settings);
        dates.not(this).datepicker("option", option, date);
    }
});
</script>