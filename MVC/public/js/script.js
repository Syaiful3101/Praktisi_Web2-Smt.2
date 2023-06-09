$(function () {

    $('.tombolTambahData').on('click', function () {
        $('#formModalLabel').html('Tambah Data Sparepart');
        $('.modal-footer button[type=submit]').html('Tambah Data');
        $('#nama').val('');
        $('#nopart').val('');
        $('#tipe').val('');
        $('#jumlah').val('');
        $('#harga').val('');
        $('#id').val('');
    });


    $('.tampilModalUbah').on('click', function () {

        $('#formModalLabel').html('Ubah Data Sparepart');
        $('.modal-footer button[type=submit]').html('Ubah Data');
        $('.modal-body form').attr('action', 'http://localhost/pencatatan/public/home/ubah');

        const id = $(this).data('id');

        $.ajax({
            url: 'http://localhost/pencatatan/public/home/getubah',
            data: { id: id },
            method: 'post',
            dataType: 'json',
            success: function (data) {
                $('#nama').val(data.nama);
                $('#nopart').val(data.nopart);
                $('#tipe').val(data.tipe);
                $('#jumlah').val(data.jumlah);
                $('#harga').val(data.harga);
                $('#id').val(data.id);
            }
        });

    });

});

