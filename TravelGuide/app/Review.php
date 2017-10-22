<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    
    //

    protected $fillable=['place','comment','rating','username'];
 
     public function scopeSearch($query ,$s)
   {
   	# code...
   	return $query->where('place','like','%' .$s. '%' );
   } 

}
