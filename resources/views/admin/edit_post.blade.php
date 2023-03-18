@extends('layout.blayout')
@section('title','Edit Post')
@section('page_title','Edit Post')
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
@if(count($errors)>0)
<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
      <span class="sr-only">Close</span>
  </button>   
    @foreach ($errors->all() as $err)
        <li>{{ $err }}</li>
    @endforeach   
</ul>     
</div>
@endif 
<div class="row justify-content-center">
    <div class="col-md-8">
        <form method="POST" enctype="multipart/form-data">
          @csrf
            <div class="form-group">
              <label for="title">Titel</label>
              <input type="text" name="title" id="title" class="form-control" placeholder="Enter Post Title" aria-describedby="helpId" value="{{ $post->title }}">
            </div>
            <div class="form-group">
              <label for="desc">Description</label>
              <textarea class="form-control" name="desc" id="desc" rows="3">{{ $post->description }}</textarea>
            </div>
            <label for=""><b>Old Image</b></label>
            <img src="{{ asset('/postimg/').'/'. $post->image }}" alt="" width="10%">
            <div class="form-group">
              <label for="img">Image</label>
              <input type="file" class="form-control-file" name="img" id="img" placeholder="Upload Image" aria-describedby="fileHelpId">
            </div>
            <div class="form-group">
              <label for="cat_id">Category</label>
              <select class="form-control" name="cat_id" id="cat_id">
                @foreach ($cats as $cat)
                @if($cat->id==$post->category_id)
                  <option value="{{ $cat->id }}" selected>{{ $cat->name }}</option>
                  @else
                  <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                  @endif
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="tag_id">Tag</label>
                <select class="js-example-basic-multiple form-control" name="states[]" multiple="multiple">
                  @foreach ($tags as $tag)
                 
                  <option value="{{ $tag->id }}"  @foreach ($post->tags as $td)@if($tag->id==$td->id)selected @endif @endforeach>{{ $tag->name }}</option>
                 
                @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update Post</button>
         </form>
    </div>
</div>
@endsection
@section('script')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
$(document).ready(function() {
    $('.js-example-basic-multiple').select2();
});
</script>
@endsection