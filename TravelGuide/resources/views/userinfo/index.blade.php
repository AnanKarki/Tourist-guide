@extends('layouts.app')
@section('content')
  <div class="container">
    <table class="table table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Username</th>
        <th>Email</th>
        <th colspan="2">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach($users as $post)
      <tr>
        <td>{{$post['id']}}</td>
        <td>{{$post['name']}}</td>
        <td>{{$post['email']}}</td>
        

       
        
     
        <td><a href="{{action('UserController@edit', $post['id'])}}" class="btn btn-warning">Edit</a></td>
        
         
          
      </tr>
      @endforeach
    </tbody>
  </table>
  </div>
  @endsection

