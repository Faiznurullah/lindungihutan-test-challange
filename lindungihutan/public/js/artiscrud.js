$(document).ready(function () {
        
    $('#insertForm').submit(function (e) {
        e.preventDefault();
        
        $.ajax({
            type: 'POST',
            url: '/artis',
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
                    <td>${response.data.gender}</td>
                    <td>${response.data.salary}</td>
                    <td>${response.data.award}</td>
                    <td>${response.data.country}</td>
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
        let url_link = `/artis/${post_id}`;
        
        $.ajax({
            url: url_link,
            type: "GET",
            cache: false,
            success:function(response){ 

                $('#post_id').val(response.data.id); 
                $('#edit-name').val(response.data.name); 
                $('#edit-gender').val(response.data.gender); 
                $('#edit-salary').val(response.data.salary); 
                $('#edit-award').val(response.data.award); 
                $('#edit-country').val(response.data.country); 
                
                //open modal
                $('#modal-edit').modal('show');
            }
        });
    });
    
    
    $('body').on('click', '#btn-delete-post', function () {
    
        let post_id = $(this).data('id');
        
        //fetch detail post with ajax
        $.ajax({
            url: `/artis/${post_id}`,
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
        let name = $('#edit-name').val();
        let gender = $('#edit-gender').val();
        let salary = $('#edit-salary').val();
        let award = $('#edit-award').val();
        let country = $('#edit-country').val();
        let token   = $("meta[name='csrf-token']").attr("content");
        $.ajax({
            type: 'PUT',
            url: `/artis/${post_id}`,
            data: {
                "id": post_id, 
                "name": name,
                "gender": gender,
                "salary": salary,
                "award": award,
                "country": country, 
                "_token": token
            },
            success: function (response) {
                $('#responseMessage').html('<div class="alert alert-success">' + response.success + '</div>');
                $('#updateForm')[0].reset();
                
                let post = `
                <tr id="index_${response.id}"> 
                    <td>${response.data.code}</td>
                    <td>${response.data.name}</td>
                    <td>${response.data.gender}</td>
                    <td>${response.data.salary}</td>
                    <td>${response.data.award}</td>
                    <td>${response.data.country}</td>
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
            url: '/artis/' + id, // Ganti dengan rute yang sesuai
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


