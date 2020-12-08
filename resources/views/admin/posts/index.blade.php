@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">All Posts</h1>
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
        <div class="card card-outline card-teal">
              <div class="card-header">
                <h3 class="card-title">Posts @if(Request()->page) page : {{ Request()->page}}@endif</h3>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Titre</th>
                      <th>Auteur</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                   
                      @foreach($posts as $post)
                      <tr>
                        <td>{{$post->id}}</td>
                        <td>{{$post->titre}}</td>
                        <td>{{$post->user->name}}</td>
                        <td>
                          <a href="{{route('posts.edit', $post)}}"  class="btn bg-orange btn-xs btn-warning">Edit</a>
                          @can('delete-posts', $post)
                          <form action="{{route('posts.destroy',$post)}}" method="post" class="d-inline-block">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn bg-pink btn-xs">Delete</button>
                          </form>
                          @endcan
                        </td>
                      </tr>
                      @endforeach
        
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            {{ $posts->links() }}
        </div>
    </div>
@stop
