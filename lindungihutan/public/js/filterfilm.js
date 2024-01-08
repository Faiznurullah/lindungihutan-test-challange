$(document).ready(function() {
    // Fungsi untuk memfilter dan memperbarui tabel
    function updateTable(filterValue) {
        // Lakukan AJAX untuk mendapatkan data sesuai dengan filter
        $.ajax({
            type: 'GET',
            url: '/getDataByFilterFilm/' + filterValue, // Sesuaikan dengan rute yang sesuai
            // success: function(data){
            //     console.log(data)
            // },
            success: function(data) {
                // Hapus isi tabel
                $('#table-posts').empty();

                // Tambahkan data baru ke tabel
                data.forEach(function(item) {
                    var row = '<tr id="index_' + item.id + '">' +
                        '<td>' + item.code + '</td>' +
                        '<td>' + item.title + '</td>' +
                        '<td>' + item.get_genre.name + '</td>' +
                        '<td>' + item.get_artis.name + '</td>' +
                        '<td>' + item.get_produser.name + '</td>' +
                        '<td>' + item.income + '</td>' +
                        '<td>' + item.nomination + '</td>' +
                        '<td>' +
                        '<a href="javascript:void(0)" id="btn-edit-post" data-id="' + item.id + '" class="btn btn-primary btn-sm ml-1">EDIT</a>' +
                        '<a href="javascript:void(0)" id="btn-delete-post" data-id="' + item.id + '" class="btn btn-danger btn-sm">DELETE</a>' +
                        '</td>' +
                        '</tr>';

                    $('#table-posts').append(row);
                });
            },
            error: function (error) {
                $('.btn-close').trigger('click');
                $('#responseMessage').html('<div class="alert alert-danger">' + error.responseJSON.errors.code + '</div>');
            }
        });
    }

    // Mendengarkan perubahan pada elemen select
    $('#filterOptions').change(function() {
        var filterValue = $(this).val();
        updateTable(filterValue);
    });

    // Memanggil fungsi untuk menampilkan tabel dengan filter default
    updateTable(0);
});