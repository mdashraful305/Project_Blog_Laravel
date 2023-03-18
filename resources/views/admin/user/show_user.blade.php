@extends('layout.blayout')
@section('title','All Tag')
@section('page_title','All Tag')
@section('content')
@if (session('status'))
<div class="alert alert-primary alert-dismissible fade show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        <span class="sr-only">Close</span>
    </button>
    <strong>{{ session('status') }}</strong>
</div>
    
@endif
<table class="table table-striped">
    <thead class="thead-inverse">
        <tr>
            <th>No.</th>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Date</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody>
           @foreach ($user as $user)
            <tr>
                <td scope="row">{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->role->name }}</td>
                <td>{{ $user->created_at }}</td>
                <td><a href="{{ route('user.edit',$user->id) }}" class="btn btn-primary">Update</a></td>
                <td>
                    <form action="{{ route('user.destroy',$user->id) }}" method="POST">
                        @csrf
                        @method('DELETE')       
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
</table>
@endsection