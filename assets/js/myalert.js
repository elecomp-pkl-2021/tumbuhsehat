(function ($) {

    const berhasil = $('.berhasil').data('flashdata');
    const gagal = $('.gagal').data('flashdata');
    const gagalLogin = $('.gagal-login').data('flashdata');
    const nama = $('.nama').data('flashdata');
    const resetPasswordSuccess = $('.reset_password').data('flashdata');


    if (berhasil) {
        Swal.fire(
            'Data ' + nama,
            'Berhasil ' + berhasil,
            'success'
        )
    } else if (gagal) {
        Swal.fire(
            'Data ' + nama,
            'Gagal ' + gagal,
            'error'
        )
    } else if (gagalLogin) {
        Swal.fire(
            'Login Gagal',
            gagalLogin,
            'error'
        )
    } else if (resetPasswordSuccess) {
        Swal.fire(
            'Login Gagal',
            gagalLogin,
            'error'
        )
    }

    $('.btn-hapus').on('click', function (e) {
        e.preventDefault();
        const href = $(this).attr('href');

        Swal.fire({
            title: 'Apakah anda yakin?',
            text: "Data " + nama + " akan dihapus.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus data!',
            cancelButtonText: 'Tidak, batalkan!'
        }).then((result) => {
            if (result.value) {
                document.location.href = href;
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                Swal.fire(
                    'Dibatalkan',
                    'Data ' + nama + ' tidak dihapus!',
                    'success'
                )
            }
        })

    });

})(jQuery);
