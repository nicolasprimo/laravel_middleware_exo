@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">All Users</h1>
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
                <h3 class="card-title">Users @if(Request()->page) page : {{ Request()->page}}@endif</h3>

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
                      <th>Name</th>
                      <th>Email</th>
                      <th>Role</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($users as $user)
                    <tr>
                      <td>{{$user->id}}</td>
                      <td>{{$user->name}}</td>
                      <td>{{$user->email}}</td>
                      <td>{{$user->role->name}}</td>
                      <td>
                        <form action="{{route('users.destroy',$user->id)}}" method="POST">
                          @method('DELETE')
                          @csrf
                          <button type="submit" class="btn bg-pink btn-xs">Delete</button>
                        </form>
                       
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            {{ $users->links() }}
        </div>
    </div>
@stop
