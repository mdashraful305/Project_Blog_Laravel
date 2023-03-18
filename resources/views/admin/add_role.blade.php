@extends('layout.blayout')
@section('title','Add Role')
@section('page_title','Add Role')
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
        <form action="{{ route('role.store') }}" method="POST">
            @csrf
            @method('POST')
            <div class="form-group">
              <label for="rolename">Role Name</label>
              <input type="text" name="rolename" id="rolename" class="form-control" placeholder="Enter Role Name" aria-describedby="helpId" value="{{ old('name') }}"">
            </div>         
            <button type="submit" class="btn btn-primary">Add</button>
         </form>
    </div>
</div>
@endsection