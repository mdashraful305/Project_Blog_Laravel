@extends('layout.blayout')
@section('title','All Category')
@section('page_title','All Category')
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
            <th>Title</th>
            <th>Image</th>
            <th>Date</th>
            <th>Update</th>
            @if((Auth::user()->role_id==0))
            <th>Delete</th>
            @endif
        </tr>
        </thead>
        <tbody>
            @foreach ($data as $cat)
            <tr>
                <td scope="row">{{ $cat->id }}</td>
                <td>{{ $cat->name }}</td>
                <td width="40%"><img src="{{ asset('/category').'/'.$cat->image }}" alt="" width="10%"></td>
                <td>{{ $cat->created_at }}</td>
                <td><a href="{{ route('edit_cat',$cat->id) }}" class="btn btn-primary">Update</a></td>
                @if((Auth::user()->role_id==0))
                <td><a href="{{ route('del_cat',$cat->id) }}" class="btn btn-danger">Delete</a></td>
                @endif
            </tr>
            @endforeach
        </tbody>
</table>
@endsection