@extends('template.template')
@section('content')
    
<div class="row justify-content-center mt-5">
    <div class="col-xl-10">

      <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Add Data
      </button>
      
      <div id="responseMessage">
        
      </div>
      
        <table class="table" id="myTable">
            <thead>
              <tr> 
                <th scope="col">Code</th>
                <th scope="col">Name</th> 
                <th scope="col">international</th> 
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody id="table-posts"> 
                @foreach ($datas as $data)
                <tr id="index_{{ $data->id }}"> 
                    <td>{{ $data->code }}</td>
                    <td>{{ $data->name }}</td> 
                    <td>{{ $data->international }}</td> 
                    <td>
                      <a href="javascript:void(0)" id="btn-edit-post" data-id="{{ $data->id }}" class="btn btn-primary btn-sm">EDIT</a>
                      <a href="javascript:void(0)" id="btn-delete-post" data-id="{{ $data->id }}" class="btn btn-danger btn-sm">DELETE</a>                   
                    </td>
                  </tr>

                @endforeach
            </tbody>
          </table>

          @include('produser.components.modal-create')
          @include('produser.components.modal-edit')
          @include('produser.components.modal-delete')

    </div>
</div>

@endsection
@push('script')
<script src="{{ asset('js/produsercrud.js') }}" type="text/javascript"></script> 
@endpush