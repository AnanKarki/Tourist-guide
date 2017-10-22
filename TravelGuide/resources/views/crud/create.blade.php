@extends('layouts.app')
@section('content')

@if (Session::has('failed'))
   <div class="alert alert-info">{{ Session::get('failed') }}</div>
@endif
<div class="container">
  <form method="post" action="{{url('crud')}}" enctype="multipart/form-data">
    <div class="form-group row">
      {{csrf_field()}}
      <label for="lgFormGroupInput" class="col-sm-2 col-form-label col-form-label-lg">City</label>
      <div class="col-sm-10">
        <input type="hidden" class="form-control form-control-lg" id="lgFormGroupInput" placeholder="title" name="title" required>
        <select name="title">
          
        <option >Kathmandu, Central Development Region, Nepal</option>
        <option>Pokhara, Mid-Western Development Region, Nepal</option>
        <option>Chitwan, Central Development Region, Nepal</option>
             <option>Bhaktapur, Central Development Region, Nepal</option>
              <option>Lalitpur, Central Development Region, Nepal</option>
               <option>Bandipur, Mid-Western Development Region, Nepal</option>
                  <option>Mustang, Mid-Western Development Region, Nepal</option>
                  <option>Manang, Mid-Western Development Region, Nepal</option>
                  <option>Dolakha, Central Development Region, Nepal</option>
                  <option>Solukhumbu, Eastern Region, Nepal</option>
                </select>
    </div>
  </div>
  
    <div class="form-group row">
      <label for="smFormGroupInput" class="col-sm-2 col-form-label col-form-label-sm">description</label>
      <div class="col-sm-10">
        <textarea name="post" rows="8" cols="80" required></textarea>
      </div>

    </div>
    
     <div class="form-group row">
      <label for="imageInput" class="col-sm-2 col-form-label col-form-label-sm">choose Image</label>
      <div class="col-sm-10">
        <input type="file" name="image" >
      </div>
    </div>
   
     <div class="form-group row">
      <label for="imageInput" class="col-sm-2 col-form-label col-form-label-sm">When To Visit</label>
      <div class="col-sm-10">
       <textarea name="when_to_visit" rows="10" cols="80" required></textarea>
      </div>
    </div>
  
     <div class="form-group row">
      <label for="popularity" class="col-sm-2 col-form-label col-form-label-sm">NoOfVisitor</label>
      <div class="col-sm-10">
        

         Jan<input type="Number" min="0"  name="first_month" required>
        
         Feb<input type="Number" min="0" name="second_month" required>
      
         March<input type="Number" min="0" name="third_month" required>
         
         April<input type="Number" min="0" name="fourth_month" required>
        
        
      

     
         

      </div>
    
  </div>
   <div class="form-group row">
      <label for="popularity" class="col-sm-2 col-form-label col-form-label-sm"> 
      </label>
      <div class="col-sm-10">
        
   May<input type="Number" min="0" name="fifth_month" required>
       
         June <input type="Number" min="0" name="sixth_month" required>

       
         July<input type="Number" min="0" name="seventh_month" required>
         
         Aug<input type="Number" min="0" name="eight_month" required>
         
        
       
       
        
     
         

      </div>
    
  </div>
   <div class="form-group row">
      <label for="popularity" class="col-sm-2 col-form-label col-form-label-sm"> </label>
      <div class="col-sm-10">
        
         Sept<input type="Number" min="0" name="ninth_month" required>
        
         Oct<input type="Number" min="0" name="tenth_month" required>

       
         Nov<input type="Number" name="eleventh_month" min="0" required>
         
         Dec<input type="Number" name="twelveth_month" min="0" required>
     
         

      </div>
    
  </div>
    

     <div class="form-group row">
      <div class="col-md-2"></div>
      {{ Auth::user()->name }}
    </div>

     <div class="form-group row">
      <label for="smFormGroupInput" class="col-sm-2 col-form-label col-form-label-sm">Domestic Tourist Living Expense per day</label>
      <div class="col-sm-10">
        Low Range<input type="number" name="domestic_tourist_livingexpense_lowrate" id ="valid"  required min="0">
        High Range<input type="number" name="domestic_tourist_livingexpense_highrate" id ="valid" required min="0">
      </div>
    </div>
      <div class="form-group row">
      <label for="smFormGroupInput" class="col-sm-2 col-form-label col-form-label-sm">Domestic Tourist Transportation Expense per day</label>
      <div class="col-sm-10">
        Low Range<input type="number" name="domestic_tourist_transportationexpense_lowrate" id ="valid"   required  min="0">
        High Range<input type="number" name="domestic_tourist_transportationexpense_highrate" id ="valid" required min="0">
      </div>
    </div>
    <div class="form-group row">
      <label for="smFormGroupInput" class="col-sm-2 col-form-label col-form-label-sm">International Tourist Living Expense per day</label>
      <div class="col-sm-10">
        Low Range<input type="number" name="international_tourist_livingexpense_lowrate" id ="valid" min="0" required>
        High Range<input type="number" name="international_tourist_livingexpense_highrate" id ="valid" min="0" required>
      </div>
    </div>
    <div class="form-group row">
      <label for="smFormGroupInput" class="col-sm-2 col-form-label col-form-label-sm">International Tourist Transportation Expense per day</label>
      <div class="col-sm-10">
        Low Range<input type="number" name="international_tourist_transportationexpense_lowrate" id ="valid" min="0" required>
        High Range<input type="number" name="international_tourist_transportationexpense_highrate" id ="valid" min="0" required>
      </div>
    </div> 
  
    <div class="form-group row">
      <div class="col-md-2"></div>
      <input  onclick="check_number()" type="submit" class="btn btn-primary" name="Create" value="Create">
    </div>
  </form>
</div>
@endsection
