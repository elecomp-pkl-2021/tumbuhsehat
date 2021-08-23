<script>
    const tgl_umum = $('#filter-klinis-umum');
    const tgl_khusus = $('#filter-klinis-khusus');
    const tgl_penunjang = $('#filter-klinis-penunjang');

    $(tgl_umum).on('change', () => {
        console.log();
        console.log(id_pasien);
        $.ajax({
            url : '<?= base_url("Dokter/ajaxFilterPemeriksaanUmumByDate") ?>' + '/' + id_pasien + '/' + tgl_umum.val(),
            dataType: 'json',
            method: 'post',
            success: (response) => {
                console.log(response);
                this.radioNormal('#wajah1','#wajah2',response.wajah);
                this.radioNormal('#stain','#stain2',response.stain);

                const subman_kanan = response.submandibula_kanan.split(',');
                this.radioNormal('#subman-kanan1','#subman-kanan2',subman_kanan[0]);
                this.radioNormal('#subman-kanan3','#subman-kanan4',subman_kanan[1]);
                
                const subman_kiri = response.submandibula_kiri.split(',');
                this.radioNormal('#subman-kiri1','#subman-kiri2',subman_kiri[0]);
                this.radioNormal('#subman-kiri3','#subman-kiri4',subman_kiri[1]);

                this.radioNormalThreeInput('#kalkulus','#kalkulus2','#kalkulus3', response.kalkulus)
                this.radioNormalThreeInput('#hub-rahang','#hub-rahang2','#hub-rahang3', response.hubungan_rahang)

                this.selectOption('#subman-kanan-ket',response.subkanan_kondisi)
                this.selectOption('#subman-kiri-ket',response.subkiri_kondisi)

                $('#getah-lain').val(response.lainnya);

                this.radioWithInput('#bibir1', '#bibir2', '#bibir-lain', response.bibir);
                this.radioWithInput('#gingiva1', '#gingiva2', '#gingiva-lain', response.gingiva);
                this.radioWithInput('#debris', '#debris2', '#debris-lain', response.debris);
                this.radioWithInput('#mukosa', '#mukosa2', '#mukosa-lain', response.mukosa);
                this.radioWithInput('#palatum', '#palatum2', '#palatum-lain', response.palatum);
                this.radioWithInput('#lidah', '#lidah2', '#lidah-lain', response.lidah);
                this.radioWithInput('#dsr-mulut', '#dsr-mulut2', '#dsr-mulut-lain', response.dasar_mulut);
                this.radioWithInput('#geligi', '#geligi2', '#geligi-lain', response.kelainan_gigi_geligi);
                
            }
        })
    });
    
    $(tgl_khusus).on('change', () => {
        $.ajax({
            url : '<?= base_url("Dokter/ajaxFilterPemeriksaanKhususByDate") ?>' + '/' + id_pasien + '/' + tgl_khusus.val(),
            dataType: 'json',
            method: 'post',
            success: (response) => {
                console.log(response);
                $('#desk-klinis').html(response.keterangan);
            }
        })
    });
    
    $(tgl_penunjang).on('change', () => {
        $.ajax({
            url : '<?= base_url("Dokter/ajaxFilterPemeriksaanPenunjangByDate") ?>' + '/' + id_pasien + '/' + tgl_penunjang.val(),
            dataType: 'json',
            method: 'post',
            success: (response) => {
                // radio
                $('#desk-radiologi').html(response.keterangan_radiologi);
                $('#desk-lab').html(response.keterangan_laboratorium);
                this.radioWithInput('#lab', '#lab2', '#lab-lain', response.laboratorium);
                
                // checkbox
                const radiologi = response.radiologi.split(',');
                $('#panoramik').prop('checked',false);
                $('#Sefalometri').prop('checked',false);
                $('#Transcranial').prop('checked',false);
                $('#Dental-Regio').prop('checked',false);

                for (let i = 0; i < radiologi.length; i++) {
                    const element = radiologi[i];
                    if (radiologi[i] == $('#panoramik').val()) {
                        $('#panoramik').prop('checked',true);
                    }
                    if(radiologi[i] == $('#Sefalometri').val()){
                        $('#Sefalometri').prop('checked',true);
                    }
                    if(radiologi[i] == $('#Transcranial').val()){
                        $('#Transcranial').prop('checked',true);
                    }
                    if(radiologi[i] == $('#Dental-Regio').val()){
                        $('#Dental-Regio').prop('checked',true);
                    }
                }

                // images
                $('#btn-img-radiologi').addClass('d-none');
                if(response.foto_radiologi == 'default.jpg'){
                    $('#btn-img-radiologi').addClass('d-none');
                    $('#img-radiologi').attr('src', "<?= base_url('/uploads/foto_radiologi/')?>"+response.foto_radiologi);
                }else{
                    $('#btn-img-radiologi').removeClass('d-none');
                    $('#img-radiologi').attr('src', "<?= base_url('/uploads/foto_radiologi/')?>"+response.foto_radiologi);
                    $('#btn-img-radiologi').attr('href', "<?= base_url('/uploads/foto_radiologi/')?>"+response.foto_radiologi);
                }
                
                $('#btn-img-laboratorium').addClass('d-none');
                if(response.foto_laboratorium == 'default.jpg'){
                    $('#btn-img-laboratorium').addClass('d-none');
                    $('#img-laboratorium').attr('src', "<?= base_url('/uploads/foto_laboratorium/')?>"+response.foto_laboratorium);
                }else{
                    $('#btn-img-laboratorium').removeClass('d-none');
                    $('#img-laboratorium').attr('src', "<?= base_url('/uploads/foto_laboratorium/')?>"+response.foto_laboratorium);
                    $('#btn-img-laboratorium').attr('href', "<?= base_url('/uploads/foto_laboratorium/')?>"+response.foto_laboratorium);
                }
            }
        })
    });

    function radioNormal(id,id2,data){
        if (data == $(id).val()) {
            $(id).prop('checked',true)
        }else{
            $(id2).prop('checked',true)
        }
    }
    
    function radioNormalThreeInput(id,id2,id3,data){
        if (data == $(id).val()) {
            $(id).prop('checked',true)
        }else if(data == $(id2).val()){
            $(id2).prop('checked',true)
        }else if(data == $(id3).val()) {
            $(id3).prop('checked',true)
        }else{
            $(id).prop('checked',false)
            $(id2).prop('checked',false)
            $(id3).prop('checked',false)
        }
    }

    function selectOption(id,data){
        if (data != '') {
            $(id).val(data).prop('selected',true);
        }else{
            $(id).val('').prop('selected',true)
        }
    }

    function radioWithInput(idRadio1,idRadio2,idInput,data){
        if (data == $(idRadio1).val()) {
            $(idRadio1).prop('checked',true);
            $(idInput).prop('disabled', true); 
            $(idInput).val(''); 
        }else{
            $(idRadio2).prop('checked',true);
            $(idInput).prop('disabled', false); 
            $(idInput).val(data); 
        }
    }
</script>