<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Review;
use App\Crud;
use Image;
use Auth;


class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
   
   **/
    public function index()

     {  
        if(Auth::check()){

        $reviews = Review::all()->toArray();
        
        return view('crud.review', compact('reviews'));
    }
    else{
            return view('auth/login');
    }
}
 public function search(Request $request){
    
        if(Auth::check()){
         $s = $request->input('keyword');
        
        $user = DB::table('reviews')->where('place', $s)->value('place');
        $users = Auth::user()->email;
         $place = DB::table('reviews')->where([
                         ['username', $users],
                         ['place', $s ],
                          ])->value('place');
      if($user !== $s){
        $reviews = new Review;
         $reviews->place =$s ;
          $reviews->comment= '0';
           $reviews->rating = 0;
           $reviews->username = '0';
      
           
        $reviews->save();
         
        
         $reviews = Review::latest()->search($s)->paginate(20);
        return view('crud.newReview', compact('reviews'));
      }
    
  
         elseif($place === $user){
        $reviews = Review::latest()->search($s)->paginate(20);
        return view('crud.review', compact('reviews'));
      }
      else{
         $reviews = Review::latest()->search($s)->paginate(20);
        return view('crud.newReview', compact('reviews'));
      }
    
    }
    else
    {
        return view('auth/login');
    }
      
    

       
       


         
     
} 



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('crud.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {  
        if(Auth::check()){
       
      $p = $request->get('place');
        $username = $request->get('username');
            $place = DB::table('reviews')->where([
                         ['username', $username],
                         ['place', $p ],
                          ])->value('place');
            if($place !== $p){
         $reviews = new Review;
         $reviews->place = $request->get('place');
          $reviews->comment= $request->get('comment');
           $reviews->rating = $request->get('rating');
           $reviews->username = $request->get('username');
        
        
       
        
        $reviews->save();
         $reviews = Review::latest()->search($p)->paginate(20);
        return view('crud.review', compact('reviews'));
     
    }
    else{
      return redirect('crud.newReview')->with('failed','Sorry you are not allowed');
    }
  }
  else
  {
    return view('auth/login');
  }
}



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $crud = Review::find($id);
        
        return view('crud.review', compact('reviews','id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request )

    { 
        if(Auth::check()){
           $id = $request->get('id');
         
          $reviews = Review::find($id);

         $reviews->place = $request->get('place');
          $reviews->comment= $request->get('comment');
           $reviews->rating = $request->get('rating');
           $reviews->username = $request->get('username');


        $reviews->save();
         $s = $request->get('place');
            $reviews = Review::latest()->search($s)->paginate(20);
        return view('crud.review', compact('reviews'));
        
      
    }

else{
    return view('auth/login');
}
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        
      $crud = Review::find($id);
      $crud->delete();

      return redirect('review');
    }
  
}