<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use App\Client;
use Auth;
use Image;

class ClientController extends Controller
{
      public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $clients = client::all();
        return view('client.index',compact('clients'));
    }

    public function create(){
      return view('client.new');  
    }
    public function store(Request $request){

           $this->validate($request,[
        'first_name' =>'required',               
        'last_name' =>'required',       
        'phone' => 'required|max:8|unique:clients,phone',            
        'cpr' => 'required',
        'address' => 'required'
        ]);
        $client = new Client();
        $client->first_name = $request->input('first_name');
        $client->last_name = $request->input('last_name');
        $client->cpr = $request->input('cpr');
        $client->phone = $request->input('phone');
        $client->address = $request->input('address');
        	if($request->hasFile('avatar')){
    		$avatar = $request->file('avatar');
    		$filename = time() . '.' . $avatar->getClientOriginalExtension();
    		Image::make($avatar)->orientate()->resize(300, 300)->save( public_path('uploads/avatars/' . $filename ) );
            $client->avatar = $filename;
    	}
        $client->save();
        $pdata = explode(',',$request->input('pkp'));
        $sdata = explode(',',$request->input('skp'));
        foreach($pdata as $d){
          $pd[$d] = ['primary' => 1];   
        }
        foreach($sdata as $d){
          $pd[$d] = ['primary' => 0];   
        }
        
        $client->users()->sync($pd);
        \Session::flash('alert_class','info');
       \Session::flash('alert_message','Klienten er gemt!');
        return redirect('/clients');
    }

    public function edit(Client $client)
    {   
        return view('client.edit',array('client'=>$client));
    }

    public function update(Request $request, Client $client)
    {
        // Handle the user upload of avatar
        $this->validate($request,[
          'first_name' =>'required',               
        'last_name' =>'required',         
        'phone' => 'required|max:8|unique:clients,phone,'.$client->id,            
             'cpr' => 'required',
        'address' => 'required'
        ]);

    	if($request->hasFile('avatar')){
    		$avatar = $request->file('avatar');
    		$filename = time() . '.' . $avatar->getClientOriginalExtension();
    		Image::make($avatar)->orientate()->resize(300, 300)->save( public_path('uploads/avatars/' . $filename ) );
            $client->avatar = $filename;
    	}
        $client->first_name = $request->input('first_name');
        $client->last_name = $request->input('last_name');
        $client->cpr = $request->input('cpr');
        $client->phone = $request->input('phone');
        $client->address = $request->input('address');
        $client->update();
        $pdata = explode(',',$request->input('pkp'));
        $sdata = explode(',',$request->input('skp'));
        foreach($pdata as $d){
          $pd[$d] = ['primary' => 1];   
        }
        foreach($sdata as $d){
          $pd[$d] = ['primary' => 0];   
        }
        
        $client->users()->sync($pd);
        return back();   
    }
}
