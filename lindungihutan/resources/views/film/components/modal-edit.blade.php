<div class="modal fade" id="modal-edit" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="editModalLabel">Add Data</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="yourModalId">           
                <form id="updateForm">
                    @csrf   
                     
                    <input type="hidden" id="post_id">

                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" name="title" class="form-control" id="edit-title" placeholder="Iron Man" required>
                    </div>  
                    <div class="mb-3">
                        <label for="genre" class="form-label">Genre</label>
                        <select class="form-select" aria-label="Default select example" id="edit-genre" name="genre" required> 
                            @foreach ($genres as $genre)
                            <option value="{{ $genre->code }}">{{ $genre->name }}</option> 
                            @endforeach
                          </select>    
                    </div> 
                    <div class="mb-3">
                        <label for="artis" class="form-label">Artis</label>
                        <select class="form-select" aria-label="Default select example" id="edit-artis" name="artis" required> 
                            @foreach ($artis as $item)
                            <option value="{{ $item->code }}">{{ $item->name }}</option> 
                            @endforeach
                          </select> 
                    </div>           
                    <div class="mb-3">
                        <label for="produser" class="form-label">Produser</label>
                        <select class="form-select" aria-label="Default select example" id="edit-produser" name="produser" required> 
                            @foreach ($produser as $itemProduser)
                            <option value="{{ $itemProduser->code }}">{{ $itemProduser->name }}</option> 
                            @endforeach
                          </select> 
                    </div> 
                    <div class="mb-3">
                        <label for="income" class="form-label">Income</label>
                        <input type="number" class="form-control" name="income" placeholder="1000000" id="edit-income" required>
                    </div> 
                    <div class="mb-3">
                        <label for="nomination" class="form-label">Nomination</label>
                        <input type="number" class="form-control" name="nomination" placeholder="1" id="edit-nomination" required>
                    </div>          
                </div>
                    
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </form>
            </div>
        </div>
    </div>
</div>