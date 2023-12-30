$(document).ready(function () {
    
    $('#insertForm').submit(function (e) {
        e.preventDefault();
        
        $.ajax({
            type: 'POST',
            url: '/film',
            data: $('#insertForm').serialize(),
            success: function (response) {
                $('#responseMessage').html('<div class="alert alert-success">' + response.success + '</div>');
                // Bersihkan formulir setelah berhasil menyisipkan data
                $('#insertForm')[0].reset();
                
                //data post
                let post = `
                <tr id="index_${response.data.id}"> 
                <td>${response.data.code}</td>
                <td>${response.data.title}</td>
                <td>${response.data.genre}</td>
                <td>${response.data.artis}</td>
                <td>${response.data.produser}</td>
                <td>${response.data.income}</td>
                <td>${response.data.nomination}</td>
                <td>
                <a href="javascript:void(0)" id="btn-edit-post" data-id="${response.data.id}" class="btn btn-primary btn-sm">EDIT</a>
                <a href="javascript:void(0)" id="btn-delete-post" data-id="${response.data.id}" class="btn btn-danger btn-sm">DELETE</a>
                </td>
                </tr>
                `;
                
                //append to table
                $('#table-posts').prepend(post);
                
                $('.btn-close').trigger('click');
                
                
            },
            error: function (error) {
                $('.btn-close').trigger('click');
                $('#responseMessage').html('<div class="alert alert-danger">' + error.responseJSON.errors.code + '</div>');
            }
        });
    });
    
    
    $('body').on('click', '#btn-edit-post', function () {
        
        let post_id = $(this).data('id');
        let url_link = `/film/${post_id}`;
        
        $.ajax({
            url: url_link,
            type: "GET",
            cache: false,
            success:function(response){ 
                
                $('#post_id').val(response.data.id); 
                $('#edit-title').val(response.data.title); 
                $('#edit-genre').val(response.data.genre); 
                $('#edit-artis').val(response.data.artis); 
                $('#edit-produser').val(response.data.produser); 
                $('#edit-income').val(response.data.income); 
                $('#edit-nomination').val(response.data.nomination); 
                
                //open modal
                $('#modal-edit').modal('show');
            }
        });
    });
    
    
    $('body').on('click', '#btn-delete-post', function () {
        
        let post_id = $(this).data('id');
        
        //fetch detail post with ajax
        $.ajax({
            url: `/film/${post_id}`,
            type: "GET",
            cache: false,
            success:function(response){
                
                $('#idid').val(response.data.id);  
                $('#deleteModal').modal('show');
            }
        });
        
    });
    
    
    $('#updateForm').submit(function (e) {
        e.preventDefault();
        let post_id = $('#post_id').val(); 
        let title = $('#edit-title').val();
        let genre = $('#edit-genre').val();
        let artis = $('#edit-artis').val();
        let produser = $('#edit-produser').val();
        let income = $('#edit-income').val();
        let nomination = $('#edit-nomination').val();
        let token   = $("meta[name='csrf-token']").attr("content");
        $.ajax({
            type: 'PUT',
            url: `/film/${post_id}`,
            data: {
                "id": post_id, 
                "title": title,
                "genre": genre,
                "artis": artis,
                "produser": produser,
                "income": income, 
                "nomination": nomination, 
                "_token": token
            },
            success: function (response) {
                $('#responseMessage').html('<div class="alert alert-success">' + response.success + '</div>');
                $('#updateForm')[0].reset();
                
                let post = `
                <tr id="index_${response.id}"> 
                <td>${response.data.code}</td>
                <td>${response.data.title}</td>
                <td>${response.data.genre}</td>
                <td>${response.data.artis}</td>
                <td>${response.data.produser}</td>
                <td>${response.data.income}</td>
                <td>${response.data.nomination}</td>
                <td>
                <a href="javascript:void(0)" id="btn-edit-post" data-id="${response.id}" class="btn btn-primary btn-sm">EDIT</a>
                <a href="javascript:void(0)" id="btn-delete-post" data-id="${response.id}" class="btn btn-danger btn-sm">DELETE</a>
                </td>
                </tr>
                `;
                
                $(`#index_${response.id}`).replaceWith(post);
                
                $('.btn-close').trigger('click');
                
                
            },
            error: function (error) {
                $('.btn-close').trigger('click');
                $('#responseMessage').html('<div class="alert alert-danger">' + error.responseJSON.errors.code + '</div>');
            }
        });
        
    });
    
    
    $('#deleteForm').submit(function (e) {
        
        e.preventDefault();
        
        var id = $('#idid').val();
        // Lakukan AJAX untuk mengirim data yang telah diubah
        $.ajax({
            type: 'delete',
            url: '/film/' + id, // Ganti dengan rute yang sesuai
            data: $('#deleteForm').serialize(),
            success: function (response) {
                
                $('#responseMessage').html('<div class="alert alert-success">' + response.success + '</div>');
                // Bersihkan formulir setelah berhasil menyisipkan data
                $('#deleteForm')[0].reset();
                $('.btn-close').trigger('click');
                $(`#index_${id}`).remove();
                
                
            },
            error: function (error) {
                $('.btn-close').trigger('click');
                $('#responseMessage').html('<div class="alert alert-danger">' + error.responseJSON.errors.code + '</div>');
            }
        });
    });
    
    
});


