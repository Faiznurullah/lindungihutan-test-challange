@extends('template.template')
@section('content')

 <div class="row justify-content-center mt-5">
    <div class="col-xl-10">

      <div class="row">
        <div class="col-md-4">

          <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Add Data
          </button>
          
          <div id="responseMessage">
            
          </div>

            <select class="form-select mb-3 mt-2" id="filterOptions" aria-label="Default select example"> 
              <option value="0" selected>Tanpa Filter</option> 
                <option value=1>Artis yang tidak pernah bermain film</option>
                <option value=2>Artis yang paling banyak bermain film</option>
                <option value=3>artis yang bermain film dengan genre drama</option> 
              </select>
        </div>
        </div>

        <table class="table" id="myTable">
            <thead>
              <tr> 
                <th scope="col">Code</th>
                <th scope="col">Name</th>
                <th scope="col">Gender</th>
                <th scope="col">Salary</th>
                <th scope="col">Award</th>
                <th scope="col">Country</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody id="table-posts"> 
                @foreach ($datas as $data)
                <tr id="index_{{ $data->id }}"> 
                    <td>{{ $data->code }}</td>
                    <td>{{ $data->name }}</td>
                    <td>{{ $data->gender }}</td>
                    <td>{{ $data->salary }}</td>
                    <td>{{ $data->award }}</td>
                    <td>{{ $data->country }}</td>
                    <td>
                      <a href="javascript:void(0)" id="btn-edit-post" data-id="{{ $data->id }}" class="btn btn-primary btn-sm">EDIT</a>
                      <a href="javascript:void(0)" id="btn-delete-post" data-id="{{ $data->id }}" class="btn btn-danger btn-sm">DELETE</a>                   
                    </td>
                  </tr>

                @endforeach
            </tbody>
          </table>

          @include('artis.components.modal-create')
          @include('artis.components.modal-edit')
          @include('artis.components.modal-delete')


    </div>
 </div>
    
@endsection
@push('script')
<script src="{{ asset('js/filterartis.js') }}" type="text/javascript"></script> 
<script src="{{ asset('js/artiscrud.js') }}" type="text/javascript"></script> 
@endpush