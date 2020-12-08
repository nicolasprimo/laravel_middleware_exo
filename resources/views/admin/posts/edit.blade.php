@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">Edit Post</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
        @if ($errors->any())
            <div class="alert bg-pink">
                    @foreach ($errors->all() as $error)
                        {{ $error }}
                    @endforeach
            </div>
        @endif
        <div class="card card-teal">
              <div class="card-header">
                <h3 class="card-title">Edit <b>"{{$post->titre}}"</b></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="{{route('posts.update',$post)}}" method="post">
                @method('PUT')
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" placeholder="Title ..." name="title" value="{{$post->titre}}">
                  </div>                 
                  <div class="form-group">
                    <label>Text</label>
                    <textarea class="form-control" rows="3" placeholder="Text ..." name="text">{{$post->texte}}</textarea>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-warning">Update</button>
                </div>
              </form>
            </div>
        </div>
    </div>
@stop
