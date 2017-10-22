<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Crud;
use Image;
use DB;
use Session;
use Auth;
class CRUDController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
   
   **/
    

    /**
     * Create a new controller instance.
     *
     * @return void
     */
  



        public function view()

    {

        $cruds = Crud::all()->toArray();
        
        return view('crud.view', compact('cruds'));
    }
    public function index()

    {
    
      if(Auth::check()){

        $cruds = Crud::all()->toArray();
        
        return view('crud.index', compact('cruds'));
      }
      else
      {
        return view('auth/login');
      }
    }
    public function search(Request $request){

        $s = $request->input('keyword');
      
          $u = DB::table('cruds')->where('title', $s)->first();
        if($u === "" ){
            Session::flash('failed', "No Result Found");
return Redirect('/');
     
         //  return redirect('crud/create')->with('failed','city already exist');
    }
else { 
        
     
   
        $s = $request->input('keyword');
         $cruds = Crud::latest()->search($s)->paginate(20);
         
         
         return view('crud.viewPlace',compact('cruds'));
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
         $title = $request->get('title');
         $place = DB::table('cruds')->where(
                         'title', $title)
                          ->value('title');
        if($place !== $title){

        $crud = new Crud;
         $crud->title = $request->get('title');
          $crud->post = $request->get('post');
           $crud->when_to_visit = $request->get('when_to_visit');
          $crud->first_month = $request->get('first_month');
           $crud->second_month = $request->get('second_month');
          $crud->third_month = $request->get('third_month');
           $crud->fourth_month = $request->get('fourth_month');
          $crud->fifth_month = $request->get('fifth_month');
           $crud->sixth_month = $request->get('sixth_month');
          $crud->seventh_month = $request->get('seventh_month');
           $crud->eight_month = $request->get('eight_month');
          $crud->ninth_month = $request->get('ninth_month');
           $crud->tenth_month = $request->get('tenth_month');
          $crud->eleventh_month = $request->get('eleventh_month');
           $crud->twelveth_month = $request->get('twelveth_month');
            $crud->domestic_tourist_livingexpense_lowrate = $request->get('domestic_tourist_livingexpense_lowrate');
             $crud->domestic_tourist_livingexpense_highrate = $request->get('domestic_tourist_livingexpense_highrate');
            $crud->international_tourist_livingexpense_lowrate = $request->get('international_tourist_livingexpense_lowrate');
            $crud->international_tourist_livingexpense_highrate = $request->get('international_tourist_livingexpense_highrate');
              $crud->domestic_tourist_transportationexpense_lowrate = $request->get('domestic_tourist_transportationexpense_lowrate');
             $crud->domestic_tourist_transportationexpense_highrate = $request->get('domestic_tourist_transportationexpense_highrate');
              $crud->international_tourist_transportationexpense_lowrate = $request->get('international_tourist_transportationexpense_lowrate');
               $crud->international_tourist_transportationexpense_highrate = $request->get('international_tourist_transportationexpense_highrate');
        
          if($request->hasfile('image')){
            $image =$request->file('image');
            $filename = time(). '.' . $request->file('image')->getClientOriginalExtension();
            $location = public_path('/images/' . $filename);
            image::make($image)->resize(800,600)->save($location);
            $crud->image = $filename ; 
          }
    

        $crud->save();
        return redirect('/crud');
    
}
else{
    return redirect('crud/create')->with('failed','city already exist');

}
}
else{
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
      $crud = Crud::find($id);
      return $crud;
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
      if(Auth::check()){
        $cruds = Crud::find($id);
        
        return view('crud.edit', compact('cruds','id'));
    }
    else{
      return view('auth/login');
    }
  }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
      if(Auth::check()){
          $crud = Crud::find($id);
        $crud->title = $request->get('title');
        $crud->post = $request->get('post');

          $crud->when_to_visit = $request->get('when_to_visit');
          $crud->first_month = $request->get('first_month');
           $crud->second_month = $request->get('second_month');
          $crud->third_month = $request->get('third_month');
           $crud->fourth_month = $request->get('fourth_month');
          $crud->fifth_month = $request->get('fifth_month');
           $crud->sixth_month = $request->get('sixth_month');
          $crud->seventh_month = $request->get('seventh_month');
           $crud->eight_month = $request->get('eight_month');
          $crud->ninth_month = $request->get('ninth_month');
           $crud->tenth_month = $request->get('tenth_month');
          $crud->eleventh_month = $request->get('eleventh_month');
           $crud->twelveth_month = $request->get('twelveth_month');
            $crud->domestic_tourist_livingexpense_lowrate = $request->get('domestic_tourist_livingexpense_lowrate');
             $crud->domestic_tourist_livingexpense_highrate = $request->get('domestic_tourist_livingexpense_highrate');
            $crud->international_tourist_livingexpense_lowrate = $request->get('international_tourist_livingexpense_lowrate');
            $crud->international_tourist_livingexpense_highrate = $request->get('international_tourist_livingexpense_highrate');
              $crud->domestic_tourist_transportationexpense_lowrate = $request->get('domestic_tourist_transportationexpense_lowrate');
             $crud->domestic_tourist_transportationexpense_highrate = $request->get('domestic_tourist_transportationexpense_highrate');
              $crud->international_tourist_transportationexpense_lowrate = $request->get('international_tourist_transportationexpense_lowrate');
               $crud->international_tourist_transportationexpense_highrate = $request->get('international_tourist_transportationexpense_highrate');
        if($request->hasfile('image')){
            $image =$request->file('image');
            $filename = time(). '.' . $request->file('image')->getClientOriginalExtension();
            $location = public_path('/images/' . $filename);
            image::make($image)->resize(800,600)->save($location);
            $crud->image = $filename ; 
          }
        $crud->save();
        return redirect('/crud');
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
        
      $crud = Crud::find($id);
      $crud->delete();

      return redirect('/crud');
    }

   

}