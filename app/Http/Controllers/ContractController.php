<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Role;
use App\Client;
use App\Post;
use App\Contract;
use App\User;
use App\Tag;
use Auth;


class ContractController extends Controller
{
	public function index(Client $client){
		$contract = Contract::where('client_id',$client->id)->first();
		$old_contracts = Contract::onlyTrashed()->where('client_id',$client->id)->get();
		return view('contracts.index',array('client'=>$client,'contract'=>$contract,'oldcontracts'=>$old_contracts));
	}

	public function create(Client $client){
		return view('contracts.new',array('client'=>$client));
	}
	
	public function store(Client $client, Request $request){
		
			$this->validate($request,[
		'goal' =>'required',               
		'description' =>'required',
		'date_from' => 'required', 
		'date_to' => 'required',       
		]);
		$contract = new contract();
		$contract->goal = $request->input('goal');
		$contract->description = $request->input('description');
		$contract->client_goal = $request->input('client_goal');
		$contract->date_from = $request->input('date_from');
		$contract->date_to = $request->input('date_to');
		$contract->client_id = $client->id;
		$contract->save();
		\Session::flash('alert_class','info');
		\Session::flash('alert_message','indlægget er gemt!');
		return redirect('/clients/'.$client->id.'/contracts');
	}
	
	public function edit(Client $client){
		$contract = Contract::where('client_id',$client->id)->first();
		return view('contracts.edit',array('client'=>$client,'contract'=>$contract));
	}
	
	public function update(Client $client, Request $request){
		$contract = Contract::where('client_id',$client->id)->first();
		$this->validate($request,[
		'goal' =>'required',               
		'description' =>'required',
		'date_from' => 'required', 
		'date_to' => 'required',       
		]);
		
		$contract->goal = $request->input('goal');
		$contract->description = $request->input('description');
		$contract->client_goal = $request->input('client_goal');
		$contract->date_from = $request->input('date_from');
		$contract->date_to = $request->input('date_to');
		$contract->client_id = $client->id;
		$contract->update();
		
		\Session::flash('alert_class','info');
		\Session::flash('alert_message','Handleplan er gemt!');
		return redirect('/clients/'.$client->id.'/contracts');
	}
	
	public function delete(Client $client){
		$contract = Contract::where('client_id',$client->id)->first();
		$contract->delete();
		\Session::flash('alert_class','warning');
		\Session::flash('alert_message','Handleplan er arkiveret!');
		return back();	
	}

	public function restore(Client $client, $id){
		Contract::withTrashed()->where('id', $id)->restore();
		\Session::flash('alert_class','info');
		\Session::flash('alert_message','Handleplan er gendannet!');
		return redirect('/clients/'.$client->id.'/contracts');
	}
}
