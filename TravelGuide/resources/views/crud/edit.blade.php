@extends('layouts.app')


@section('content')


<div class="container">
  <form action = "{{route('crud.search')}}" me></form>
  <form method="post" action="{{action('CRUDController@update', $id)}}" enctype="multipart/form-data">
    <div class="form-group row">
      {{csrf_field()}}
       <input name="_method" type="hidden" value="PATCH">
      <label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">{{$cruds->title}}</label>
      <div class="col-sm-10">
        <input type="hidden" class="form-control form-control-lg" id="lgFormGroupInput" placeholder="title" name="title" value="{{$cruds->title}}">
      </div>

    </div>
    <div class="form-group row">
      <label for="smFormGroupInput" class="col-sm-2 col-form-label col-form-label-sm">Description</label>
      <div class="col-sm-10">
        <textarea name="post" rows="8" cols="80">{{$cruds->post}}</textarea>
      </div>
    </div>
     <div class="form-group row">
      <label for="smFormGroupInput" class="col-sm-2 col-form-label col-form-label-sm">Choose image</label>
      
      
      <div class="col-sm-10">
       
        <input type="file" name="image" >
        
        <img src="/images/{{ $cruds->image}}" alt="image" width="300" height="200">  
       
      </div>
    </div>
       <div class="form-group row">
      <label for="imageInput" class="col-sm-2 col-form-label col-form-label-sm">When To Visit</label>
      <div class="col-sm-10">
       <textarea name="when_to_visit" rows="10" cols="80">{{$cruds->when_to_visit}}}</textarea>
      </div>
    </div>
    
    <div class="form-group row">
      <label for="popularity" class="col-sm-2 col-form-label col-form-label-sm">NoOfVisitor</label>
      <div class="col-sm-10">
        

         Jan<input type="Number"  name="first_month"  value="{{$cruds['first_month']}}" min="0" required>
        
         Feb<input type="Number" name="second_month"  value="{{$cruds['second_month']}}" min="0" required>
      
         March<input type="Number" name="third_month"  value="{{$cruds['third_month']}}" min="0" required>
         
         April<input type="Number" name="fourth_month"  value="{{$cruds['fourth_month']}}" min="0" required>
        
       
      

     
         

      </div>
    
  </div>
   <div class="form-group row">
      <label for="popularity" class="col-sm-2 col-form-label col-form-label-sm"> 
      </label>
      <div class="col-sm-10">
        
         May<input type="Number" name="fifth_month"  value="{{$cruds['fifth_month']}}" min="0" required>
       
         June<input type="number" min="0" name="sixth_month"  value="{{$cruds['sixth_month']}}" required>

       
         July<input type="Number" min="0" name="seventh_month" required="Number" value="{{$cruds['seventh_month']}}" required>
         
         Aug<input type="Number" min="0" name="eight_month"  value="{{$cruds['eight_month']}}" required>
         
       
       
       
        
     
         

      </div>
    
  </div>
   <div class="form-group row">
      <label for="popularity" class="col-sm-2 col-form-label col-form-label-sm"> </label>
      <div class="col-sm-10">
          Sept<input type="Number" min="0" name="ninth_month"  value="{{$cruds['ninth_month']}}" required>
        
         Oct<input type="Number" min="0" name="tenth_month"  value="{{$cruds['tenth_month']}}" required>

       
         Nov<input type="Number" name="eleventh_month"  value="{{$cruds['eleventh_month']}}" required>
         
         Dec<input type="Number" name="twelveth_month"  value="{{$cruds['twelveth_month']}}" required>
     
         

      </div>
    
  </div>
    <div class="form-group row">
      <label for="smFormGroupInput" class="col-sm-2 col-form-label col-form-label-sm">Domestic Tourist Living Expense per day</label>
      <div class="col-sm-10">
        Low Range<input type="number" name="domestic_tourist_livingexpense_lowrate" id ="valid" value="{{$cruds->domestic_tourist_livingexpense_lowrate}}" min="0" required>
        High Range<input type="number" name="domestic_tourist_livingexpense_highrate" id ="valid" value="{{$cruds->domestic_tourist_livingexpense_highrate}}" min="0" required>
      </div>
    </div>
      <div class="form-group row">
      <label for="smFormGroupInput" class="col-sm-2 col-form-label col-form-label-sm">Domestic Tourist Transportation Expense per day</label>
      <div class="col-sm-10">
        Low Range<input type="number" name="domestic_tourist_transportationexpense_lowrate" id ="valid"  value="{{$cruds->domestic_tourist_transportationexpense_lowrate}}" min="0" required>
        High Range<input type="number" name="domestic_tourist_transportationexpense_highrate" id ="valid" value="{{$cruds->domestic_tourist_transportationexpense_highrate}}" min="0" required>
      </div>
    </div>
    <div class="form-group row">
      <label for="smFormGroupInput" class="col-sm-2 col-form-label col-form-label-sm">International Tourist Living Expense per day</label>
      <div class="col-sm-10">
        Low Range<input type="number" name="international_tourist_livingexpense_lowrate" id ="valid"  value="{{$cruds->international_tourist_livingexpense_lowrate}}" min="0" required>
        High Range<input type="number" name="international_tourist_livingexpense_highrate" id ="valid" value="{{$cruds->international_tourist_livingexpense_highrate}}" min="0" required>
      </div>
    </div>
    <div class="form-group row">
      <label for="smFormGroupInput" class="col-sm-2 col-form-label col-form-label-sm">International Tourist Transportation Expense per day</label>
      <div class="col-sm-10">
        Low Range<input type="number" name="international_tourist_transportationexpense_lowrate" id ="valid" value="{{$cruds->international_tourist_transportationexpense_lowrate}}" min="0" required>
        High Range<input type="number" name="international_tourist_transportationexpense_highrate" id ="valid" value="{{$cruds->international_tourist_transportationexpense_highrate}}" min="0" required>
      </div>
    </div>
    
    <div class="form-group row">
      <div class="col-md-2"></div>
      <button type="submit" class="btn btn-primary" name="Update" value="Update">Update</button>
    </div>
  </form>

</div>

@endsection