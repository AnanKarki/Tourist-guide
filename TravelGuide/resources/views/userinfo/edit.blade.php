@extends('layouts.app')

@section('content')


<div class="container">
  <form action = "{{route('myprofile.search')}}" me></form>
  <form method="post" action="{{action('UserController@update', $id)}}" enctype="multipart/form-data">
    <div class="form-group row">
      {{csrf_field()}}
       <input name="_method" type="hidden" value="PATCH">
      <label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">Name</label>
      <div class="col-sm-10">
        <input type="text" class="form-control form-control-lg" id="email" placeholder="title" name="name" value="{{$users->name}}" required>
        
      </div>
    </div>
    <div class="form-group row">  <label for="smFormGroupInput" class="col-sm-2 col-form-label col-form-label-sm">email</label>
      <div class="col-sm-10">
         <input type="text" class="form-control form-control-lg" id="email" placeholder="title" name="email" value="{{$users->email}}" required>
      </div>
    </div>
    <div class="form-group row">  <label for="smFormGroupInput" class="col-sm-2 col-form-label col-form-label-sm">Password</label>
      <div class="col-sm-10">
         <input type="password" class="form-control form-control-lg" id="password" placeholder="title" name="password" required>
      </div>
    </div>
      
      
    
    <div class="form-group row">
      <div class="col-md-2"></div>
      <button type="submit" class="btn btn-primary">Update</button>
    </div>
  </form>
</div> 
@endsection
