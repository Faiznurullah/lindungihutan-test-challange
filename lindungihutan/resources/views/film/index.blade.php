@extends('template.template')
@section('content')

<div class="row justify-content-center mt-5">
  <div class="col-xl-10">
    
    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
      Add Data
    </button>
    <P>Rata-rata pendapatan film: {{ number_format( $meanIncome) }}</P>
    <div id="responseMessage">
      
    </div>

    <select class="form-select mb-3 mt-2"  id="filterOptions" aria-label="Default select example"> 
      <option value="0" selected>Tanpa Filter</option>  
        <option value=1>film yang paling banyak mendapatkan nominasi</option>
        <option value=2>nama film yang huruf terakhir 'n'</option> 
        <option value=3>nama film dengan pendapatan terbesar mengandung huruf 's'</option> 
      </select>

    
    <table class="table mt-3" id="myTable">
      <thead>
        <tr>
          <th scope="col">Code</th>
          <th scope="col">Title</th>
          <th scope="col">Genre</th>
          <th scope="col">Artis</th>
          <th scope="col">Poduser</th>
          <th scope="col">Income</th>
          <th scope="col">Nomination</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody id="table-posts"> 
        @foreach ($datas as $data)
        <tr id="index_{{ $data->id }}"> 
          <td>{{ $data->code }}</td>
          <td>{{ $data->title }}</td>
          <td>{{ $data->getGenre->name }}</td>
          <td>{{ $data->getArtis->name }}</td>
          <td>{{ $data->getProduser->name }}</td>
          <td>{{ number_format($data->income) }}</td>
          <td>{{ $data->nomination }}</td>
          <td>
            <a href="javascript:void(0)" id="btn-edit-post" data-id="{{ $data->id }}" class="btn btn-primary btn-sm">EDIT</a>
            <a href="javascript:void(0)" id="btn-delete-post" data-id="{{ $data->id }}" class="btn btn-danger btn-sm">DELETE</a>                   
          </td>
        </tr>
        
        @endforeach
      </tbody>
    </table>
    
    @include('film.components.modal-create')
    @include('film.components.modal-edit')
    @include('film.components.modal-delete')
    
  </div>
</div>


@endsection
@push('script')
<script src="{{ asset('js/filterfilm.js') }}" type="text/javascript"></script> 
<script src="{{ asset('js/filmcrud.js') }}" type="text/javascript"></script> 
@endpush