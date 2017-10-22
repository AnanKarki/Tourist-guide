<!DOCTYPE html>

<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Travel Guide</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="css/app.css" type="text/css">
        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }
            .top-left {
                position: absolute;
                left: 400px;
                top: 18px;
            
            }

            .cont {
                text-align: center;
            }

            .title {
                font-size: 10px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            
        </style>
    </head>
    <body>
            <div class="flex-center position-ref full-height">
                
            @if (Route::has('login'))
        
                <div class="top-right links">

                    @auth
                        
                        <a href="{{ url('/home') }}">Home</a>  
                    @else
                       
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            @endif
                

@if (Session::has('failed'))
   <div class="alert alert-info">{{ Session::get('failed') }}</div>
@endif
            <div class="cont">
                <div class="title m-b-md">
                    <script src="http://maps.googleapis.com/maps/api/js?libraries=places&sensor=false"></script>
                              
                <div class ="top-left">
      

                </div>

            </div>
           
        </div>
       

        <div  id="map_canvas" width="400" height="600">
            
          
        </div> 
    
    
        

                      <form action={{route('crud.search')}} method="get">
                    <label for="keyword">Location:</label>
<input type="text" name="keyword" id="keyword" size="60">
<input type="submit" name="submit" value="search" >
</form> </br>

  <div class="justify-content" >
        <a href="{{route('view.search')}}">TOP SIGHTS</a>
    </div></br>
    <div class="justify-content" style="padding-left: 25px">
        
    </div></br>

<script>
var map_options = {
    center: new google.maps.LatLng(27.700769, 85.300140),
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
    </body>
</html>

