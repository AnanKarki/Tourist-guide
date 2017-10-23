


<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('TouristGuide','TouristGuide') }}</title>

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
                        {{ config('TouristGuide','TouristGuide') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>
                <ul class="navbar-brand">
                   
                      
                    <form action="{{route('crud.search')}}" method="get">
                    
                      <input type="text" name="keyword" id="keyword" size="60" height="10">
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
        <nav>


        @yield('content')
 

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
   </div>
        <style>
  #nav {
      background-color: blue;
      position: fixed;
      width: 100%;
      height: 35px;
      top: 42px;
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
<!-- Session -->
@if (Session::has('failed'))
   <div class="alert alert-info">{{ Session::get('failed') }}</div>
@endif
<div class="container">
    <div class="row">
        
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
<!-- Fetching data as user request to --> 
                 @foreach($cruds as $post)
                 <div class="image" style="padding-left: 200 ">
     <img src="/images/{{ $post->image}}" alt="image" width="750" height="400">
              
                 
                 <div class="conte" style=" padding-left:200px ;  font-size: : 30px; font-style: bold; text-overflow: ellipsis;">{{$post['title']}}

                 </div>
               </div>
<!-- link google search engine to search hotels 
     through use of button on local site
     javascript-->
                 <div class="icon" style="padding-left: 600px "> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">  
      <button type="submit" onclick="myfuntion()"><i class="fa fa-bed" ></i></button>
  <input type ="hidden" id ="the_search_box" value="hotels in + {{$post['title']}}">    
  <script>
        function myfuntion(){
          var box=document.getElementById('the_search_box');
        window.location='http://www.google.com/search?q='+escape(box.value);
         }
</script>
</div> 
<div class=icon style="padding-left: 600px ">
<button onclick="GetRoute()" name="Distance"><i class="fa fa-car"></i></button>
<p id="demo"></p>
</div>
      <div class="cont" style="font: 15px">{{$post['post']}}</div>

        

 
  
</div>
</div>
<div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
              <p style="font-size: 30px; font-style: bold;">Expenses</p>
  @foreach($cruds as $post)
  <p>international_tourist_livingexpense_lowrate = {{$post['international_tourist_livingexpense_lowrate']}}</p>
            <p>international_tourist_livingexpense_highrate = {{$post['international_tourist_livingexpense_highrate']}}</p>
           
              <p>international_tourist_transportationexpense_lowrate= {{$post['international_tourist_transportationexpense_lowrate']}}</p>
               <p>international_tourist_transportationexpense_highrate = {{$post['international_tourist_transportationexpense_highrate']}}</p>
                 <p>domestic_tourist_livingexpense_lowrate = {{$post['domestic_tourist_livingexpense_lowrate']}}</p>
         <p>domestic_tourist_livingexpense_highrate = {{$post['domestic_tourist_livingexpense_highrate']}}</p>
         
             <p>domestic_tourist_transportationexpense_lowrate = {{$post['domestic_tourist_transportationexpense_lowrate']}}</p>
             <p>domestic_tourist_transportationexpense_highrate = {{$post['domestic_tourist_transportationexpense_highrate']}} </p>
    

  @endforeach
  
 </div> 
</div>
<div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
             <p style="font-size: 30px; font-style: bold;"> When To Visit</p>
  @foreach($cruds as $post)
     <p>{{$post['when_to_visit']}}</p>

  @endforeach
  <div>
    <input type="submit" name="ViewGraph" value="View Graph" onclick="init()">
  </div>
 </div> 
</div>
     
         
         

         <div class="cont">
             <input type="hidden" name="Jan" id="Jan" value="{{$post['first_month']}}">
             <input type="hidden" name="Feb" id="Feb" value="{{$post['second_month']}}">
             <input type="hidden" name="March" id="March" value="{{$post['third_month']}}">
             <input type="hidden" name="April" id="April" value="{{$post['fourth_month']}}">
             <input type="hidden" name="May" id="May" value="{{$post['fifth_month']}}">
             <input type="hidden" name="June" id="June" value="{{$post['sixth_month']}}">
             <input type="hidden" name="July" id="July" value="{{$post['seventh_month']}}">
             <input type="hidden" name="August" id="August" value="{{$post['eight_month']}}">
             <input type="hidden" name="Sept" id="Sept" value="{{$post['ninth_month']}}">
             <input type="hidden" name="Oct" id="Oct" value="{{$post['tenth_month']}}">
             <input type="hidden" name="Nov" id="Nov" value="{{$post['eleventh_month']}}">
             <input type="hidden" name="Dec" id="Dec" value="{{$post['twelveth_month']}}">

         
     
   
          
    
     
  </div>
 
<script type="text/javascript"></script>
<script>
  
  /* scripts for generation of bargraph 
     About no of tourist in every month of a year 
     Data is to be updated every fiscal year*/

  var jan = Number(document.getElementById('Jan').value);
        var feb = Number(document.getElementById('Feb').value);
        var march = Number(document.getElementById('March').value);
        var april = Number(document.getElementById('April').value);
        var may = Number(document.getElementById('May').value);
        var june = Number(document.getElementById('June').value);
        var july = Number(document.getElementById('July').value);
        var august = Number(document.getElementById('August').value);
        var sept = Number(document.getElementById('Sept').value);
        var oct = Number(document.getElementById('Oct').value);
        var nov = Number(document.getElementById('Nov').value);
        var dec = Number(document.getElementById('Dec').value);
        var t = jan + feb +march+april+may+june+july+august+sept+oct+nov+dec ;

            var jan1 = (Number(document.getElementById('Jan').value))*100/t;
        var feb1 = (Number(document.getElementById('Feb').value))*100/t;
        var march1 = (Number(document.getElementById('March').value))*100/t;
        var april1 = (Number(document.getElementById('April').value))*100/t;
        var may1 = (Number(document.getElementById('May').value))*100/t;
        var june1 = (Number(document.getElementById('June').value))*100/t;
        var july1 = (Number(document.getElementById('July').value))*100/t;
        var august1 = (Number(document.getElementById('August').value))*100/t;
        var sept1 = (Number(document.getElementById('Sept').value))*100/t;
        var oct1 = (oct*100/t);
        var nov1 = (Number(document.getElementById('Nov').value))*100/t;
        var dec1 = (dec*100/t);



        
        var can, ctx,

            minVal, maxVal,

            xScalar, yScalar,

            numSamples, y;

        // data sets -- set literally or obtain from an ajax call

        var dataName = [ "Jan", "Feb", "March", "Apri" ,"May" ,"June" ,"July" ,"August" ,"Sep" ,
        "Oct","Nov","Dec"];

        var dataValue = [ jan1, feb1, march1, april1, may1,june1,july1 ,august1 ,sept1, oct1,nov1 ,dec1];

 

        function init() {

            // set these values for your data

            numSamples = 12;

            maxVal = 100;

            var stepSize = 10;

            var colHead = 20;

            var rowHead = 30;

            var margin = 8;

            var header = "Percentage of visitor in a place ";

            can = document.getElementById("can");

            ctx = can.getContext("2d");

            ctx.fillStyle = "black"

            yScalar = (can.height - colHead - margin) / (maxVal);

            xScalar = (can.width - rowHead) / (numSamples + 1);

            ctx.strokeStyle = "rgba(128,128,255, 0.5)"; // light blue line

            ctx.beginPath();

            // print  column header

            ctx.font = "14pt Helvetica"

            ctx.fillText(header, 0, colHead - margin);

            // print row header and draw horizontal grid lines

            ctx.font = "12pt Helvetica"

            var count =  0;

            for (scale = maxVal; scale >= 0; scale -= stepSize) {

                y = colHead + (yScalar * count * stepSize);

                ctx.fillText(scale, margin,y + margin);

                ctx.moveTo(rowHead, y)

                ctx.lineTo(can.width, y)

                count++;

            }

            ctx.stroke();

            // label samples

            ctx.font = "14pt Helvetica";

            ctx.textBaseline = "bottom";

            for (i = 0; i < 12; i++) {

                calcY(dataValue[i]);

                ctx.fillText(dataName[i], xScalar * (i + 1), y - margin);

            }

            // set a color and a shadow

            ctx.fillStyle = "green";

            ctx.shadowColor = 'rgba(128,128,128, 0.5)';

            ctx.shadowOffsetX = 10;

            ctx.shadowOffsetY = 1;

            // translate to bottom of graph and scale x,y to match data

            ctx.translate(0, can.height - margin);

            ctx.scale(xScalar, -1 * yScalar);

            // draw bars

            for (i = 0; i < 12; i++) {

                ctx.fillRect(i + 1, 0, 0.1, dataValue[i]);

            }


        }

 

        function calcY(value) {

            y = can.height - value * yScalar;
         
        }
     
</script>



    <div  style =" padding-left: 100px" >

        <h2></h2>

        <canvas id="can" height="400" width="1000">

        </canvas>
        

    </div>


<!-- fetchind data from data-->   
@endforeach


<!--To calculate the distance between user location and search location 
    javascript -->   
<div class=icon style="padding-left: 600px ">


<input type="hidden" id="place" name="from">

@foreach($cruds as $post)
<input type ="hidden" id="to" name="to" value="{{$post['title']}}">
@endforeach

<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
<script>
var x = document.getElementById("demo");
var y =document.getElementById("place").value;

function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.watchPosition(showPosition);
    } else { 
        x.innerHTML = "Geolocation is not supported by this browser.";}
    }
    
function showPosition(position) {
    x="Latitude: " + position.coords.latitude + 
    "<br>Longitude: " + position.coords.longitude;
    
            var lat = position.coords.latitude;
            var lng = position.coords.longitude;
            var latlng = new google.maps.LatLng(lat, lng);
            var geocoder = geocoder = new google.maps.Geocoder();
            geocoder.geocode({ 'latLng': latlng }, function (results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    if (results[1]) {
                        x="Location: " + results[1].formatted_address;
            y = results[1].formatted_address;
            document.getElementById('place').value = y ;
                    }
                }
            });
        }
    window.onload = getLocation ;
   
    
</script> 

  
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false&libraries=places"></script>
<script type="text/javascript">
var source, destination;
var directionsDisplay;
var directionsService = new google.maps.DirectionsService();
google.maps.event.addDomListener(window, 'load', function () {
    new google.maps.places.SearchBox(document.getElementById('place'));
    new google.maps.places.SearchBox(document.getElementById('to'));
    directionsDisplay = new google.maps.DirectionsRenderer({ 'draggable': true });
});
 
function GetRoute() {
   source = document.getElementById("place").value;
    destination = document.getElementById("to").value; 
    //*********DISTANCE AND DURATION**********************//
    var service = new google.maps.DistanceMatrixService();
    service.getDistanceMatrix({
        origins: [source],
        destinations: [destination],
        travelMode: google.maps.TravelMode.DRIVING,
        unitSystem: google.maps.UnitSystem.METRIC,
        avoidHighways: false,
        avoidTolls: false
    }, function (response, status) {
        if (status == google.maps.DistanceMatrixStatus.OK && response.rows[0].elements[0].status != "ZERO_RESULTS") {
            var distance = response.rows[0].elements[0].distance.text;
            var duration = response.rows[0].elements[0].duration.text;
            var dvDistance = document.getElementById("demo");
           dvDistance.innerHTML = "";
            dvDistance.innerHTML += "Distance: " + distance + "<br />";
            dvDistance.innerHTML += "Duration:" + duration;
           

 
        } else {
            alert("Unable to find the distance via road.");
        }
    });
}
 
</script>
                    
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

                              