@extends('layout.blayout')
@section('title','Edit Category')
@section('page_title','Edit Category')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        @if(count($errors)>0)
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              <span class="sr-only">Close</span>
          </button>   
            <ul>    
            @foreach ($errors->all() as $err)
                <li>{{ $err }}</li>
            @endforeach   
        </ul>     
        </div>
        @endif 
        @if(session('status'))
        {{ session('ststus') }}
        @endif
        <form action="" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label for="cname">Category Name</label>
              <input type="text" name="cname" id="cname" class="form-control" placeholder="Enter Category Name" aria-describedby="helpId" value="{{ $data->name }}">
            </div>
            <label ><b>Old Image</b></label>
            <img src="{{ asset('/catimg/').'/'.$data->image }}" alt="" width="30%">
            <div class="form-group">
                <label for="img">Image</label>
                <input type="file" class="form-control-file" name="img" id="img" placeholder="Upload Image" aria-describedby="fileHelpId">
              </div>
            <button type="submit" class="btn btn-primary">Update</button>
         </form>
    </div>
</div>
@endsection