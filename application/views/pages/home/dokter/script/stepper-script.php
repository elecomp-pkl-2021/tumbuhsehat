<!-- STEPPER -->
<script src="https://cdn.jsdelivr.net/npm/bs-stepper/dist/js/bs-stepper.min.js"></script>
<script>
    (function() {
        'use strict'
        window.stepper = new Stepper(document.querySelector('#stepper'),{
            animation : true,
            linear : false
        })
    })()
</script>

<script>
    // anamnesa
    let kondKesehatan = $("input[name*='kondisi-kesehatan']");
    let anamnesa = $('#anamnesa');
    $('#btn-anamnesa').prop('disabled',true);
    $('.a-p').on('change', () => {
        if (kondKesehatan.is(':checked') && anamnesa.val() !== "" ) {
            $('#btn-anamnesa').prop('disabled',false);
        }
    })
    
    // diagnosa
    $('#btn-diagnosa').prop('disabled',true);
    $('#diagnosa').on('change', () => {
        if($('#diagnosa').val()!== ""){
            $('#btn-diagnosa').prop('disabled',false);
        }
    });

</script>