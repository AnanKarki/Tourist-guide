<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;



class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
 
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */

     public function view()

    {
         if(Auth::check()){
        $users = User::all()->toArray();
        
        return view('userinfo.index', compact('users'));
    }
    else
    {
        return view('auth/login');
    }
}
    public function index()

    {
        if(Auth::check()){
        $users = User::all()->toArray();
        
        return view('userinfo.index', compact('users'));
 
    }

     return view('auth/login');
}
    public function search(Request $request){
    
        
         $s =  Auth::user()->id ;
         $users = User::latest()->search($s)->paginate(20);
        return view('userinfo.index', compact('users'));
}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {  


  
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
        $users = User::find($id);
        return $users;
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
        if(Auth::user()){
        $users = User::find($id);
        
        return view('userinfo.edit', compact('users','id'));
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
       protected function update(Request $request,$id)
   {
              $crud = User::find($id);
        $crud->name = $request->get('name');
        $crud->email = $request->get('email');
          $crud->password =bcrypt($request->get('password'));
          $crud->save();
          return view('dashboard');
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
        
      $users = User::find($id);
      $users->delete();

      return redirect('/crud');
    }
  

}
