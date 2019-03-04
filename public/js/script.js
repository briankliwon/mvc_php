$(function(){
    $('.tampilTambahData').on('click', function(){
        $('#formModalLabel').html('Tambah Data Mahasiswa');
        $('.modal-footer button[type=submit]').html('Tambah Data');
        $('.modal-body form').attr('action','http:://localhost/mvc/public/home/ubah')
    });
    $('.tampilModalUbah').on('click', function(){
        $('#formModalLabel').html('Ubah Data Mahasiswa');
        $('.modal-footer button[type=submit]').html('Ubah Data');

        const id =$(this).data('id');
        //console.log(id);
        $.ajax({
            url:'http://localhost/mvc/public/home/getubah',
            data: {id : id},
            method: 'post',
            dataType: 'json',
            success: function(data){
              $('#nama').val(data.nama); 
              $('#nip').val(data.nip); 
              $('#email').val(data.email); 
              $('#jurusan').val(data.jurusan); 
              $('#id').val(data.id); 
            }
        });
    });
});