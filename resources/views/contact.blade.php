@extends('templates.main')


@section('content')
<div class="my-3 p-3 bg-white rounded shadow-sm">
    <h2 class="border-bottom border-gray pb-2 mb-0">Contact</h2>
        <form action="{{route('mails.store')}}" method="POST" class="mt-2">   
            @csrf         
        <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email">
        </div>      
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Text</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="text"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Envoyer</button>
        </form>
  </div>
@endsection