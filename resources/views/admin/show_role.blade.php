@extends('layout.blayout')
@section('title','All Role')
@section('page_title','All Role')
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
            <th>Date</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody>
           @foreach ($role as $role)
            <tr>
                <td scope="row">{{ $role->id }}</td>
                <td>{{ $role->name }}</td>
                <td>{{ $role->created_at }}</td>
                @if(!$role->id==0)
                <td><a href="{{ route('role.edit',$role->id) }}" class="btn btn-primary">Update</a></td>
                <td>
                    <form action="{{ route('role.destroy',$role->id) }}" method="POST">
                        @csrf
                        @method('DELETE')       
                        <button type="submit" class="btn btn-danger">Delete</button>
                </td>
                @else
                <td></td>
                <td></td>
                @endif
            </tr>
            @endforeach
        </tbody>
</table>
@endsection