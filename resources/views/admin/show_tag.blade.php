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
            <th>Date</th>
            <th>Update</th>
            @if((Auth::user()->role_id==0))
            <th>Delete</th>
            @endif
        </tr>
        </thead>
        <tbody>
           @foreach ($tags as $tag)
            <tr>
                <td scope="row">{{ $tag->id }}</td>
                <td>{{ $tag->name }}</td>
                <td>{{ $tag->created_at }}</td>
                <td><a href="{{ route('tag.edit',$tag->id) }}" class="btn btn-primary">Update</a></td>
                @if((Auth::user()->role_id==0))
                <td>
                    <form action="{{ route('tag.destroy',$tag->id) }}" method="POST">
                        @csrf
                        @method('DELETE')       
                        <button type="submit" class="btn btn-danger">Delete</button>
                </td>
                @endif
            </tr>
            @endforeach
        </tbody>
</table>
@endsection