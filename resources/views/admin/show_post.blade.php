@extends('layout.blayout')
@section('title','All Post')
@section('page_title','All Post')
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
            <th>Description</th>
            <th>Category</th>
            <th width="15%">Tags</th>
            <th width="15%">Image</th>
            <th>User</th>
            <th>Date</th>
            <th>Update</th>
            @if((Auth::user()->role_id==0))
            <th>Delete</th>
            @endif
        </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
            <tr>
                <td scope="row">{{ $post->id }}</td>
                <td>{{ $post->title }}</td>
                <td>{{ Str::substr($post->description,0,45).'...' }}</td>
                <td>{{ $post->category['name'] }}</td>
                <td>
                @foreach ( $post->tags as $tag)
                <span class="badge bg-primary text-white">{{ $tag->name }}</span>
                @endforeach
                </td>
                <td><img src="{{ asset('/postimg/').'/'. $post->image}}" alt="" width="40%"></td>
                <td>{{ $post->user->name }}</td>
                <td>{{ $post->created_at }}</td>
                <td><a href="{{ route('edit_post',$post->id) }}" class="btn btn-primary">Update</a></td>
                @if((Auth::user()->role_id==0))
                <td><a href="{{ route('del_post',$post->id) }}" class="btn btn-danger">Delete</a></td>
                @endif
            </tr>
            @endforeach
        </tbody>
</table>
      <div class="text-center">
{{$posts->links()}}
      

    </div>
@endsection