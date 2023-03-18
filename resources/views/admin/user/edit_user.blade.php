@extends('layout.blayout')
@section('title','Edit Tag')
@section('page_title','Edit Tag')
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
        <form action="{{ route('user.update',$data->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="tag_id">Enter Name</label>
                <input type="text" class="form-control form-control-user" id="mame" name="name"
                        placeholder="Enter YourName" value="{{ $data->name }}">

            </div>
            <div class="form-group">
                <label for="tag_id">Enter Email</label>
                <input type="email" class="form-control form-control-user" id="email" name="email"
                    placeholder="Email Address" value="{{ $data->email }}">
            </div>
            <div class="form-group">
                <label for="tag_id">Enter Password</label>
                    <input type="password" class="form-control form-control-user"
                        id="pass" name="pass" placeholder="Password">
            </div>
            <div class="form-group">
                <label for="tag_id">Select Role</label>
                  <select class="form-control" name="role">
                    @foreach ($roles as $role)
                    <option value="{{ $role->id }}" @if($data->role->id==$role->id)  selected @endif>{{ $role->name }}</option>
                  @endforeach
                  </select>
              </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@endsection