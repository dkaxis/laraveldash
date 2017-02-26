<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Role;
use App\Client;
use App\Post;
use App\Goal;
use App\User;
use App\Tag;
use Auth;


class GoalController extends Controller
{
    public function index(Client $client){
        $goals = Goal::where('client_id',$client->id)->get();
        return view('goals.index',array('goals'=>$goals,'client'=>$client));
    }

    public function create(Client $client)
    {
        	return view('goals.new',array('client'=>$client));
    }

    public function store(Client $client, Request $request){
		
			$this->validate($request,[
		'goal' =>'required',               
		'description' =>'required',    
		]);
		$goal = new goal();
		$goal->goal = $request->input('goal');
		$goal->description = $request->input('description');
		$goal->client_id = $client->id;
		$goal->save();
		\Session::flash('alert_class','info');
		\Session::flash('alert_message','målet er gemt!');
		return redirect('/clients/'.$client->id.'/goals');
	}
      public function edit(Client $client,Goal $goal)
    {
            return view('goals.edit',array('client'=>$client,'goal'=>$goal));
    }

       public function update(Client $client,Goal $goal, Request $request){
		
			$this->validate($request,[
		'goal' =>'required',               
		'description' =>'required',    
		]);
		
		$goal->goal = $request->input('goal');
		$goal->description = $request->input('description');
		$goal->update();
		\Session::flash('alert_class','info');
		\Session::flash('alert_message','målet er opdateret!');
		return redirect('/clients/'.$client->id.'/goals');
	}
}
