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
</body>
</html>

@if (Session::has('failed'))
   <div class="alert alert-info">{{ Session::get('failed') }}</div>
@endif

<style>
/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
    position: relative;
    background-color: #fefefe;
    margin: auto;
    padding: 0;
    border: 1px solid #888;
    width: 80%;
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
    -webkit-animation-name: animatetop;
    -webkit-animation-duration: 0.4s;
    animation-name: animatetop;
    animation-duration: 0.4s
}

/* Add Animation */
@-webkit-keyframes animatetop {
    from {top:-300px; opacity:0} 
    to {top:0; opacity:1}
}

@keyframes animatetop {
    from {top:-300px; opacity:0}
    to {top:0; opacity:1}
}

/* The Close Button */
.close {
    color: white;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
}

.modal-header {
    padding: 2px 16px;
    background-color: #5cb85c;
    color: white;
}

.modal-body {padding: 2px 16px;}

.modal-footer {
    padding: 2px 16px;
    background-color: #5cb85c;
    color: white;
}
#cancel{
    float: left ;

}
#post {
    float:left;
}

</style>
<button id="myBtn" name="Write a Comment">Write a Comment</button>
<div id="myModal" class="modal">

  <!-- Modal content -->
  
  <div class="modal-content">
    <div class="modal-header">
      <span class="close">&times;</span>
      <h2>Review</h2>
    </div>
    <div class="modal-body">
        {{Auth::user()->name}}
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet">
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  <div class="container" type="hidden">

      <div class="star-rating" id ="rates">
   <input class ="r" type="radio" id="star-5" name ="rating" value ="5" >
     <label for ="star-5" title ="5star"><i class="fa fa-star" hidden ="true"></i></label>
    <input class="r" type="radio" id="star-4" name ="rating" value ="4" >
    <label for ="star-4" title ="4star" ><i class="fa fa-star" hidden ="true"></i></label>
    <input class ="r" type="radio" id="star-3" name ="rating" value ="3"  >
    <label for= "star-3" title ="3star"><i class="fa fa-star" hidden ="true"></i></label>
    <input class="r" type="radio" id="star-2" name ="rating" value ="2" >
    <label for = "star-2" title ="2star" ><i class="fa fa-star" hidden ="true"></i></label>
    <input class="r" type="radio" id="star-1" name ="rating" value ="1">
    <label for ="star-1" title ="1star"><i class="fa fa-star" hidden ="true"></i></label>
  
       </div>
        
   
  <form method="post" action="{{ url('review') }}" enctype="multipart/form-data"> 
     {{csrf_field()}}
      
         
              <input type="hidden" id="number" name="rating" value="0" required>
     <label >Comment</label>
    <textarea placeholder="Your View" id="area" name="comment" rows="8" cols="80" required></textarea>
    </div> 
   

    @foreach($reviews as $post)
    <input type="hidden" id="place" name="place" value="{{$post['place']}}">
    
     @endforeach
     <input type="text" id="place" name="username" value="{{Auth::user()->email}}">
   <button type="submit" name="Post" id="post" value="Post">Post</button>
    
  
 </form>




         
     
<script>

var logID = 'log',
  log = $('<div id="'+logID+'"></div>');
$('body').append(log);
  $('[type*="radio"]').change(function () {
    var me = $(this);
    log.html(me.attr('value'));
    document.getElementById('number').value = me.attr('value');
  }); 
</script>

 
</div>
</div>



<script>
// Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>

</div>
</div>






 <div class="container">
    <table class="table table-striped">
    <thead>
      <tr>
        <th>Username</th>
        <th>rate</th>
        <th>comment</th>
        <th>place<th>
      
      </tr>
    </thead>
    <tbody>
      @foreach($reviews as $post)
      <tr>
        
       
        
  
       <td>{{$post['username']}}</td>
        <td>{{$post['rating']}}</td>

        <td>{{$post['comment']}}</td>
         <td>{{$post['place']}}</td> 

         
         @if($post['rating'] === 5)
         <td>
              <div class="star-rating" id ="rates">
    
       <label class="star-5-5" title ="5star"><i class="fa fa-star" hidden ="true"></i></label>

      <label class="star-4-5" title ="4star" ><i class="fa fa-star" hidden ="true"></i></label>
      
      <label class= "star-3-5" title ="3star"><i class="fa fa-star" hidden ="true"></i></label>
    
      <label class= "star-2-5" title ="2star" ><i class="fa fa-star" hidden ="true"></i></label>
    
      <label class="star-1-5" title ="1star"><i class="fa fa-star" hidden ="true"></i></label>
    
       </div>
             </td>
      @elseif($post['rating'] === 4)
      <td>

         <div class="star-rating" id ="rates">
    
       <label class="star-5-4" title ="5star"><i class="fa fa-star" hidden ="true"></i></label>

      <label class="star-4-4" title ="4star" ><i class="fa fa-star" hidden ="true"></i></label>
      
      <label class= "star-3-4" title ="3star"><i class="fa fa-star" hidden ="true"></i></label>
    
      <label class= "star-2-4" title ="2star" ><i class="fa fa-star" hidden ="true"></i></label>
    
      <label class="star-1-4" title ="1star"><i class="fa fa-star" hidden ="true"></i></label>
    
       </div>
        </td>
        @elseif($post['rating'] === 3)
        <td>
            <div class="star-rating" id ="rates">
    
       <label class="star-5-3" title ="5star"><i class="fa fa-star" hidden ="true"></i></label>

      <label class="star-4-3" title ="4star" ><i class="fa fa-star" hidden ="true"></i></label>
      
      <label class= "star-3-3" title ="3star"><i class="fa fa-star" hidden ="true"></i></label>
    
      <label class= "star-2-3" title ="2star" ><i class="fa fa-star" hidden ="true"></i></label>
    
      <label class="star-1-3" title ="1star"><i class="fa fa-star" hidden ="true"></i></label>
    
       </div>
       
        </td>
        
        @elseif($post['rating'] === 2) 
        <td>
             <div class="star-rating" id ="rates">
    
       <label class="star-5-2" title ="5star"><i class="fa fa-star" hidden ="true"></i></label>

      <label class="star-4-2" title ="4star" ><i class="fa fa-star" hidden ="true"></i></label>
      
      <label class= "star-3-2" title ="3star"><i class="fa fa-star" hidden ="true"></i></label>
    
      <label class= "star-2-2" title ="2star" ><i class="fa fa-star" hidden ="true"></i></label>
    
      <label class="star-1-2" title ="1star"><i class="fa fa-star" hidden ="true"></i></label>
    
       </div>
        </td>

        @elseif($post['rating'] === 1)
        <td>
           <div class="star-rating" id ="rates">
    
       <label class="star-5-1" title ="5star"><i class="fa fa-star" hidden ="true"></i></label>

      <label class="star-4-1" title ="4star" ><i class="fa fa-star" hidden ="true"></i></label>
      
      <label class= "star-3-1" title ="3star"><i class="fa fa-star" hidden ="true"></i></label>
    
      <label class= "star-2-1" title ="2star" ><i class="fa fa-star" hidden ="true"></i></label>
    
      <label class="star-1-1" title ="1star"><i class="fa fa-star" hidden ="true"></i></label>
    
       </div>
   </td>
    @elseif($post['rating'] === 0)
        <td>
           <div class="star-rating" id ="rates">
    
       <label class="star-5-0" title ="5star"><i class="fa fa-star" hidden ="true"></i></label>

      <label class="star-4-0" title ="4star" ><i class="fa fa-star" hidden ="true"></i></label>
      
      <label class= "star-3-0" title ="3star"><i class="fa fa-star" hidden ="true"></i></label>
    
      <label class= "star-2-0" title ="2star" ><i class="fa fa-star" hidden ="true"></i></label>
    
      <label class="star-1-0" title ="1star"><i class="fa fa-star" hidden ="true"></i></label>
    
       </div>
   </td>

         @endif
        
 
       
      </tr>
      @endforeach
      
    </tbody>

  </table>
            


</th>



  </div>

  