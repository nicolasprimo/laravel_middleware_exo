@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">Create User</h1>
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
                <h3 class="card-title">New User</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="{{route('users.store')}}" method="POST">
                  @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" placeholder="Name ..." name="name">
                  </div>    
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" placeholder="Email ..." name="email">
                  </div>   
                  <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" placeholder="Password ..." name="password">
                  </div>          
                  <div class="form-group">
                    <label>Role</label>
                    <select class="form-control" name="role_id">
                      @foreach($roles as $role)
                      <option value="{{$role->id}}">{{$role->name}}</option>
                      @endforeach                
                    </select>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn bg-teal">Create</button>
                </div>
              </form>
            </div>
        </div>
    </div>
@stop
