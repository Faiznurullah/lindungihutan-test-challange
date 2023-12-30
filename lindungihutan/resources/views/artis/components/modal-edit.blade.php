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
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" id="edit-name" placeholder="Alina Ichi Kukushina" required>
                    </div>  
                    <div class="mb-3">
                        <label for="gender" class="form-label">Gender</label>
                        <select class="form-select" aria-label="Default select example" id="edit-gender" name="gender" required> 
                            <option value="Pria">Pria</option>
                            <option value="Wanita">Wanita</option> 
                          </select>    
                    </div> 
                    <div class="mb-3">
                        <label for="salary" class="form-label">Salary</label>
                        <input type="number" name="salary" class="form-control" id="edit-salary" placeholder="7000000" required>
                    </div>           
                    <div class="mb-3">
                        <label for="award" class="form-label">Award</label>
                        <input type="number" name="award" class="form-control" id="edit-award" placeholder="5" required>
                    </div> 
                    <div class="mb-3">
                        <label for="country" class="form-label">Country</label>
                        <select class="form-select mb-3" aria-label="Default select example" id="edit-country" name="country" required>  
                           @foreach ($country as $item)
                           <option value="{{ $item->code }}">{{ $item->name }}</option>
                           @endforeach
                          </select>
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