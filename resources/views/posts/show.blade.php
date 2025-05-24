@extends('posts.layout')
@section('content')
<div class="container">
    <h2 class="bg-primary text-center">
        page show Article:
    </h2>
            <div class="row">
                <div class="col-6 pt-3">
                    <span>id <input class="form-control form-control-lg" type="text" placeholder=".form-control-lg" readonly value= "{{$posts->id  }}">
                    </span>
                    title
                    <input class="form-control form-control-lg" type="text" placeholder=".form-control-lg" readonly value="{{$posts->title }}">
                    content<input class="form-control form-control-lg" type="text" placeholder=".form-control-lg" readonly value="{{$posts->content}}">
                </div>
                <div class="col-6">
                    <div class="d-flex justify-content-center ">
                        <img src="{{ asset('/storage/images/'.$posts->picture) }}" width="500px">
                    </div>
                </div>
            </div>
       
    </table>
</div>
@endsection