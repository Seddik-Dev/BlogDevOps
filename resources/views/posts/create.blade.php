@extends('posts.layout')
@section('content')
<div class="container">
    <h2 class="bg-primary text-center">
        inserer un nouveau post
    </h2>
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="card">
        <div class="card-header">Ajouter un post</div>
        <div class="card-body">
            <form action="{{ url('/posts') }}" method="post" enctype="multipart/form-data">
                @csrf
                {{-- <div class="row mb-3">
                    <label class="col-sm2 col-label-form">id</label>
                    <div class="col-sm-10">
                        <input type="text" name="id" class="form-control">
                    </div>
                </div> --}}

                <div class="row mb-3">
                    <label class="col-sm2 col-label-form">title</label>
                    <div class="col-sm-10">
                        <input type="text" name="title" class="form-control">
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm2 col-label-form">picture</label>
                    <div class="col-sm-10">
                        <input type="file" name="picture" class="form-control">
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="col-sm2 col-label-form">content</label>
                    <div class="col-sm-10">
                        <input type="text" name="content" class="form-control">
                    </div>
                </div>
                <div class="text-center">
                    <input type="submit" class="btn btn-outline-primary float-end" value="  Ajouter  ">
                </div>
            </form>
        </div>
    </div>
</div>
@endsection