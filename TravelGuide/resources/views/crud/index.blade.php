@extends('layouts.app')

@section('content')

  <div class="container"> 
    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
    <table class="table table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>city</th>
        <th>description</th>
        <th>When to Visit<th>
        <th colspan= 4 >Action</th>
        
      </tr>
    </thead>
    <tbody>
      @foreach($cruds as $post)
      <tr>
        <td>{{$post['id']}}</td>
        <td>{{$post['title']}}</td>
        <td>{{$post['post']}}</td>
        <td>{{$post['when_to_visit']}}</td>

         <td><p style="font-family: sans-serif; font-style: oblique;"> Number of visitor a Year </p> 
          Jan = {{$post['first_month']}},
        Feb = {{$post['second_month']}},
        March = {{$post['third_month']}},
        April = {{$post['fourth_month']}},
        May = {{$post['fifth_month']}},
        June={{$post['sixth_month']}}</br>
         July={{$post['seventh_month']}},
        August ={{$post['eight_month']}},
        Sept ={{$post['ninth_month']}},
        Oct ={{$post['tenth_month']}},
        Nov ={{$post['eleventh_month']}},
        Dec ={{$post['twelveth_month']}} </br> </br>

       <p style="font-family: sans-serif; font-style: oblique;"> Expenses Per Day </p>
       domestic_tourist_livingexpense_lowrate = {{$post['domestic_tourist_livingexpense_lowrate']}} </br>
        domestic_tourist_livingexpense_highrate = {{$post['domestic_tourist_livingexpense_highrate']}} </br>
        international_tourist_livingexpense_lowrate = {{$post['international_tourist_livingexpense_lowrate']}}</br>
          international_tourist_livingexpense_highrate = {{$post['international_tourist_livingexpense_highrate']}}</br>
          domestic_tourist_transportationexpense_lowrate = {{$post['domestic_tourist_transportationexpense_lowrate']}}</br>
           domestic_tourist_transportationexpense_highrate = {{$post['domestic_tourist_transportationexpense_highrate']}}</br>
            international_tourist_transportationexpense_lowrate = {{$post['international_tourist_transportationexpense_lowrate']}}</br>
            international_tourist_transportationexpense_highrate = {{$post['international_tourist_transportationexpense_highrate']}} 

     </td>
        <td><a href="{{action('CRUDController@edit', $post['id'])}}" class="btn btn-warning">Edit</a>
        <form action="{{action('CRUDController@destroy', $post['id'])}}" method="post">
            {{csrf_field()}}
            <input name="_method" type="hidden" value="DELETE">
            <button class="btn btn-danger" type="submit">Delete</button>
          </form>
        </td> 
      </tr>
      @endforeach
    </tbody>
  </table>
  </div>
@endsection
