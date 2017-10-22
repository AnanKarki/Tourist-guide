<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Crud extends Model
{
	
    //
    protected $fillable = ['title','post','when_to_visit','first_month','second_month','third_month','fourth_month','fifth_month','sixth_month','seventh_month','eight_month','ninth_month','tenth_month','eleventh_month','twelveth_month','domestic_tourist_livingexpense_lowrate','domestic_tourist_livingexpense_highrate','international_tourist_livingexpense_lowrate',
    'international_tourist_livingexpense_highrate','domestic_tourist_transportationexpense_lowrate','domestic_tourist_transportationexpense_highrate','international_tourist_transportationexpense_lowrate',
    'international_tourist_transportationexpense_highrate',];


   
   public function scopeSearch($query ,$s)
   {
   	# code...
   	return $query->where('title','like','%' .$s. '%' );
   } 
}
