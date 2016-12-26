<?php

namespace App\Http\Controllers\auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Role;
use Auth;
use Image;

class UserController extends Controller
{
  
    public function __construct()
    {
        $this->middleware('auth');
    }

 
    public function index()
    {
        $users = User::all();
        if(Auth::user()->hasRole('Admin')){
            return view('auth.showUsers',compact('users'));
        }else{
            return view('auth.index',compact('users'));
        }
     
         
    }

    public function edit(User $user){
        return view('auth.update',array('user'=>$user));
    }
    public function update(Request $request, User $user){
           $this->validate($request,[
        'first_name' =>'required',               
        'last_name' =>'required',       
        'phone' => 'required|max:8|unique:users,phone,'.$user->id,            
        'email' => 'required|email|max:255|unique:users,email,'.$user->id,
        ]);

        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');

        $user->update();

        $data = explode(',',$request->input('roles'));
      
        $user->roles()->sync($data);



        \Session::flash('alert_class','info');
       \Session::flash('alert_message','Ændringer er gemt!');

        return back();   
    }
    public function delete(User $user){
        $user->delete();
        \Session::flash('alert_class','warning');
       \Session::flash('alert_message','Brugeren er slettet!');
       return back();
    }

    public function profile()
    {
        return view('auth.profile',array('user' => Auth::user()));
    }

    public function update_profile(Request $request, User $user){
    	// Handle the user upload of avatar
        $this->validate($request,[
        'phone' => 'required|max:8|unique:users,phone,'.$user->id,            
        'email' => 'required|email|max:255|unique:users,email,'.$user->id,
        ]);

    	if($request->hasFile('avatar')){
    		$avatar = $request->file('avatar');
    		$filename = time() . '.' . $avatar->getClientOriginalExtension();
    		Image::make($avatar)->orientate()->resize(300, 300)->save( public_path('uploads/avatars/' . $filename ) );
            $user->avatar = $filename;
    	}
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->update();
    	 return back();

    }
}
