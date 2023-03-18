@extends('layout.blayout')
@section('title','Add Category')
@section('page_title','Add Category')
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
            @if (session('status'))
            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                <strong>{{ session('status') }}</strong>
            </div>
                        
        @endif
        @if(session('status'))
        {{ session('ststus') }}
        @endif
        <form action="" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label for="cname">Category Name</label>
              <input type="text" name="cname" id="cname" class="form-control" placeholder="Enter Category Name" aria-describedby="helpId">
            </div>
            <div class="form-group">
                <label for="img">Image</label>
                <input type="file" class="form-control-file" name="img" id="img" placeholder="Upload Image" aria-describedby="fileHelpId">
              </div>
            <button type="submit" class="btn btn-primary">Add</button>
         </form>
    </div>
</div>
@endsection