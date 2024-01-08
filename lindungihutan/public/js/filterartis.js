$(document).ready(function() {
    // Fungsi untuk memfilter dan memperbarui tabel
    function updateTable(filterValue) {
        // Lakukan AJAX untuk mendapatkan data sesuai dengan filter
        $.ajax({
            type: 'GET',
            url: '/getDataByFilterArtis/' + filterValue, // Sesuaikan dengan rute yang sesuai
            success: function(data) {
                // Hapus isi tabel
                $('#table-posts').empty();

                // Tambahkan data baru ke tabel
                data.forEach(function(item) {
                    var row = '<tr id="index_' + item.id + '">' +
                        '<td>' + item.code + '</td>' +
                        '<td>' + item.name + '</td>' +
                        '<td>' + item.gender + '</td>' +
                        '<td>' + item.salary.toLocaleString('en-US', { style: 'decimal' }) + '</td>' +
                        '<td>' + item.award + '</td>' +
                        '<td>' + item.country + '</td>' +
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