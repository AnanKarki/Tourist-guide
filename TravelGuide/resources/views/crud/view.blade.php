
           <!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('TravelGuide','TravelGuide') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('TravelGuide','TravelGuide') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>
                    <!-- Branding div-->
                     <ul class="navbar-brand">
                   
                     
                    <form action="{{route('crud.search')}}" method="get">
                    
                      <input type="text" name="keyword" id="keyword" size="60">
                          <input type="submit" name="submit" value="search" >
                            </form>

                </ul>

                

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('edit-form').submit();">
                                            Myprofile
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>

                                        <form id="edit-form" action="{{ route('myprofile.search') }}" method="get" style="display: none;" value="{{ Auth::user()->id }}">
                                        <input type="" name="" value="{{ Auth::user()->id}}">
                                            {{ csrf_field() }}
                                        </form>
                                           <a href="{{ route('help') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('help-form').submit();
                                                     "> 
                                                     Help
                                                     <form id="help-form" action="{{ route('help')}}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                           
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false&libraries=places"></script>
    
</body>
</html>
     <style>
  #nav {
      background-color: blue;
      position: fixed;
      width: 100%;
      height: 35px;
      top: 45p x;
    }
    #nav-wrapper {
      width: 90%;
      margin: 0px auto;
      text-align: left;
    }
    #nav ul {
      list-style-type: none;
      padding: 0px;
      margin: 0px;
    }
    #nav ul li {
    
      display: inline-block;
    }
   
    #nav ul li a,
    visited {
      display: block;
      padding: 15px;
      color: #CCC;
      text-decoration: none;
    }
 
  </style>

<div id="nav" >
  <div id="nav-wrapper">
    <ul>
      <li style="padding-left:500px"><a href="{{route('view.search')}}">TOP SIGHTS</a>

      </li>
    <li><a href="/">Search</a>
      </li>
    </ul>
  </div>
</div>
   <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet">
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false&libraries=places"></script>
  <link href="css/style.css" rel="stylesheet">
<div class="container">
    <table class="table table-striped">
  
  
    <tbody>
   
      @foreach($cruds as $post)
      <tr>
    
               
                 <form action="{{route('review.search')}}" method="get">
                 
           <input type="hidden" name="keyword" id="keyword" size="80" value="{{$post['title']}}">
       
            
          <BUTTON type="submit" name="POST" id="POST" > <img src="/images/{{ $post['image']}}" alt="image" width="300" height="200" name="Image" value="Image"></BUTTON> 
                </form>

    
            <?php $var = ((Integer)DB::table('reviews')
                ->where('place', $post['title'])
                ->avg('rating')); ?>
       
              


        @if($var === 5)
        {{$var }}
                
         
              <div class="star-rating" id ="rates">
    
       <label class="star-5-5" title ="5star"><i class="fa fa-star" hidden ="true"></i></label>

      <label class="star-4-5" title ="4star" ><i class="fa fa-star" hidden ="true"></i></label>
      
      <label class= "star-3-5" title ="3star"><i class="fa fa-star" hidden ="true"></i></label>
    
      <label class= "star-2-5" title ="2star" ><i class="fa fa-star" hidden ="true"></i></label>
    
      <label class="star-1-5" title ="1star"><i class="fa fa-star" hidden ="true"></i></label>
              </div>
              <!-- count number of rating-->

               <?php $count = (DB::table('reviews')
                              ->where('place', $post['title'])
                              ->count('rating')); ?>
                  
                    ({{$count}})

             
             @elseif($var === 4)
    
      

         <div class="star-rating" id ="rates">
    
       <label class="star-5-4" title ="5star"><i class="fa fa-star" hidden ="true"></i></label>

      <label class="star-4-4" title ="4star" ><i class="fa fa-star" hidden ="true"></i></label>
      
      <label class= "star-3-4" title ="3star"><i class="fa fa-star" hidden ="true"></i></label>
    
      <label class= "star-2-4" title ="2star" ><i class="fa fa-star" hidden ="true"></i></label>
    
      <label class="star-1-4" title ="1star"><i class="fa fa-star" hidden ="true"></i></label>
    
         
       </div>
              <!-- count number of rating-->
              

       <?php $count = (DB::table('reviews')
                ->where('place', $post['title'])
                ->count('rating')); ?>
    
      ({{$count}})
        
           @elseif($var === 3)
        
            <div class="star-rating" id ="rates">
    
       <label class="star-5-3" title ="5star"><i class="fa fa-star" hidden ="true"></i></label>

      <label class="star-4-3" title ="4star" ><i class="fa fa-star" hidden ="true"></i></label>
      
      <label class= "star-3-3" title ="3star"><i class="fa fa-star" hidden ="true"></i></label>
    
      <label class= "star-2-3" title ="2star" ><i class="fa fa-star" hidden ="true"></i></label>
    
      <label class="star-1-3" title ="1star"><i class="fa fa-star" hidden ="true"></i></label>
               </div> 
              <!-- count number of rating-->
              

               <?php $count = (DB::table('reviews')
                ->where('place', $post['title'])
                ->count('rating')); ?>
    
      ({{$count}})

       
        
        
           @elseif($var === 2)
      
             <div class="star-rating" id ="rates">
    
       <label class="star-5-2" title ="5star"><i class="fa fa-star" hidden ="true"></i></label>

      <label class="star-4-2" title ="4star" ><i class="fa fa-star" hidden ="true"></i></label>
      
      <label class= "star-3-2" title ="3star"><i class="fa fa-star" hidden ="true"></i></label>
    
      <label class= "star-2-2" title ="2star" ><i class="fa fa-star" hidden ="true"></i></label>
    
      <label class="star-1-2" title ="1star"><i class="fa fa-star" hidden ="true"></i></label>
         
       </div> 
              <!-- count number of rating-->

        <?php $count = (DB::table('reviews')
                ->where('place', $post['title'])
                ->count('rating')); ?>
    
      ({{$count}})
        

         @elseif($var === 1)
        
           <div class="star-rating" id ="rates">
    
       <label class="star-5-1" title ="5star"><i class="fa fa-star" hidden ="true"></i></label>

      <label class="star-4-1" title ="4star" ><i class="fa fa-star" hidden ="true"></i></label>
      
      <label class= "star-3-1" title ="3star"><i class="fa fa-star" hidden ="true"></i></label>
    
      <label class= "star-2-1" title ="2star" ><i class="fa fa-star" hidden ="true"></i></label>
    
      <label class="star-1-1" title ="1star"><i class="fa fa-star" hidden ="true"></i></label>
          
       </div> 
              <!-- count number of rating-->

       <?php $count = (DB::table('reviews')
                ->where('place', $post['title'])
                ->count('rating')); ?>
    
      ({{$count}})
  
       @elseif($var === 0)
        
           <div class="star-rating" id ="rates">
    
       <label class="star-5-0" title ="5star"><i class="fa fa-star" hidden ="true"></i></label>

      <label class="star-4-0" title ="4star" ><i class="fa fa-star" hidden ="true"></i></label>
      
      <label class= "star-3-0" title ="3star"><i class="fa fa-star" hidden ="true"></i></label>
    
      <label class= "star-2-0" title ="2star" ><i class="fa fa-star" hidden ="true"></i></label>
    
      <label class="star-1-0" title ="1star"><i class="fa fa-star" hidden ="true"></i></label>
          
       </div>
              <!-- count number of rating-->

        <?php $count = (DB::table('reviews')
                ->where('place', $post['title'])
                ->count('rating')); ?>
    
      ({{$count}})
   

         @endif
        
 


           <label class="name" style="font: 15px">{{$post['title']}}</label>

      
      @endforeach
    </tbody>
  </table>
  </div>
    <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false&libraries=places"></script>
    
<div id="map_canvas" style="width:0px; height:0px"></div>

                      <script>
                      var map_options = {
                          center: new google.maps.LatLng(-2.548926, 118.0148634),
                          zoom: 4,
                          mapTypeId: google.maps.MapTypeId.RoadMap
                      };

                      var map = new google.maps.Map(document.getElementById("map_canvas"), map_options);

                      var input = document.getElementById("keyword");
                      var autocomplete = new google.maps.places.Autocomplete(input);
                      autocomplete.bindTo("bounds", map);

                      var marker = new google.maps.Marker({
                          map: map,
                          zoom: 14,
                          animation: google.maps.Animation.BOUNCE
                      });

                      google.maps.event.addListener(autocomplete, "place_changed", function () {
                          var place = autocomplete.getPlace();

                          if (place.geometry.viewport) {
                              map.fitBounds(place.geometry.viewport);
                          } else {
                              map.setCenter(place.geometry.location);
                              map.setZoom(15);
                          }

                          marker.setPosition(place.geometry.location);
                      });

                      google.maps.event.addListener(map, "click", function (event) {
                          marker.setPosition(event.latLng);
                      });
                      </script>
