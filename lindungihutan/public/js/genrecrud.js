$(document).ready(function () {
        
    $('#insertForm').submit(function (e) {
        e.preventDefault();
        
        $.ajax({
            type: 'POST',
            url: '/genre',
            data: $('#insertForm').serialize(),
            success: function (response) {
                $('#responseMessage').html('<div class="alert alert-success">' + response.success + '</div>');
                // Bersihkan formulir setelah berhasil menyisipkan data
                $('#insertForm')[0].reset();
                
                //data post
                let post = `
                <tr id="index_${response.data.id}"> 
                    <td>${response.data.code}</td>
                    <td>${response.data.name}</td>
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
        
        //fetch detail post with ajax
        $.ajax({
            url: `/genre/${post_id}`,
            type: "GET",
            cache: false,
            success:function(response){
                
                $('#post_id').val(response.data.id);
                $('#edit-code').val(response.data.code);
                $('#edit-name').val(response.data.name);
                
                //open modal
                $('#modal-edit').modal('show');
            }
        });
    });
    
    
    $('body').on('click', '#btn-delete-post', function () {
    
        let post_id = $(this).data('id');
        
        //fetch detail post with ajax
        $.ajax({
            url: `/genre/${post_id}`,
            type: "GET",
            cache: false,
            success:function(response){
                
                $('#idid').val(response.data.id); 
                
                //open modal
                $('#deleteModal').modal('show');
            }
        });
        
    });
    
    
    $('#updateForm').submit(function (e) {
        e.preventDefault();
        let post_id = $('#post_id').val();
        let code   = $('#edit-code').val();
        let name = $('#edit-name').val();
        let token   = $("meta[name='csrf-token']").attr("content");
        $.ajax({
            type: 'PUT',
            url: `/genre/${post_id}`,
            data: {
                "id": post_id,
                "code": code,
                "name": name,
                "_token": token
            },
            success: function (response) {
                $('#responseMessage').html('<div class="alert alert-success">' + response.success + '</div>');
                // Bersihkan formulir setelah berhasil menyisipkan data
                $('#updateForm')[0].reset();
                
                //data post
                let post = `
                <tr id="index_${response.id}"> 
                    <td>${response.data.code}</td>
                    <td>${response.data.name}</td>
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
            url: '/genre/' + id, // Ganti dengan rute yang sesuai
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


