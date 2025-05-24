@extends('posts.layout')
@section('content')
  
<div class="card" style="margin:20px;">
  <div class="card-header">Edit article</div>
  @if ($errors->any())
  <div class="alert alert-danger">
      <ul>
          @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
          @endforeach
      </ul>
  </div>
@endif
  <div class="card-body">
       
      <form action="{{ url('posts/'.$posts->id) }}" method="post">
        {!! csrf_field() !!}
        @method("PATCH")
        <input type="hidden" name="id" id="id" value="{{$posts->id}}" id="id" />
        {{-- <label>id</label></br>
        <input type="text" name="id" id="id" value="{{$posts->id}}" class="form-control"></br> --}}

        <label>Title</label></br>
        <input type="text" name="title" id="title" value="{{$posts->title}}" class="form-control"></br>

        <label>picture</label></br>
        <input type="file" name="picture" id="picture" value="{{$posts->picture}}" class="form-control" required></br>
        <center><img src='/storage/images/{{$posts->picture}}' width="80" height="100"><br><br></center>

        <label>content</label></br>
        <input type="text" name="content" id="content" value="{{$posts->content}}" class="form-control" required></br>
        <input type="submit" value="Update" class="btn btn-success"></br>
    </form>
    
  </div>
</div>
  
@stop