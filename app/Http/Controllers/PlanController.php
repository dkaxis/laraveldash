<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Role;
use App\Client;
use App\Plan;
use App\User;
use App\Tag;
use Auth;


class PlanController extends Controller
{
	public function index(Client $client){
		return view('plans.index',array('client'=>$client));
	}
	
	public function create(Client $client){
		return view('posts.new',array('client'=>$client));
	}
	
	public function store(Client $client, Request $request){
		
		$this->validate($request,[
		
		'content' =>'required',               
		
		'date' =>'required',       
		
		'time' => 'required'
		
		]);
		$post = new Post();
		$post->content = $request->input('content');
		$post->date = $request->input('date');
		$post->time = $request->input('time');
		$post->client_id = $client->id;
		$post->user_id = Auth::user()->id;
		$post->save();
		$post_tags = explode(',',$request->input('tags'));
		$post->tags()->sync($post_tags);
		\Session::flash('alert_class','info');
		\Session::flash('alert_message','indlægget er gemt!');
		return redirect('/clients/'.$client->id.'/posts/edit/'.$post->id);
	}
	
	public function edit(Client $client,Post $post){
		return view('posts.update',array('client'=>$client,'post'=>$post));
	}
	
	public function update(Client $client, Request $request,Post $post){
		
		$this->validate($request,[
																																																																																																																																																																				        'content' =>'required',               
																																																																																																																																																																				        'date' =>'required',       
																																																																																																																																																																				        'time' => 'required'
																																																																																																																																																																				        ]);
		$post->content = $request->input('content');
		$post->date = $request->input('date');
		$post->time = $request->input('time');
		$post->user_id = Auth::user()->id;
		$post->update();
		$post_tags = explode(',',$request->input('tags'));
		$post->tags()->sync($post_tags);
		\Session::flash('alert_class','info');
		\Session::flash('alert_message','indlægget er gemt!');
		return back();
	}
	
	public function search(Client $client,Request $request){
		$query = new Post;
		
		
		
		$wt[] ='';
		
		if($request->input()){
			$query = $query->where('client_id',$client->id);
			
			if($request->input('content')){
				$query = $query->where('content', 'LIKE', '%'.$request->input('content').'%');
				
			}
			
			if($request->input('date_from') && $request->input('date_to')){
				
				$query = $query->whereBetween('date', [$request->input('date_from'), $request->input('date_to')]);
			}
			
			if($request->input('date_from') && $request->input('date_to') == ''){
				
				$query = $query->where('date',$request->input('date_from'));
			}
			
			if($request->input('tags')){
				
				$string = $request->input('tags');
				
				
				
				$query = $query->whereHas('tags', function($tagQuery)use($string){
					$tagQuery->whereIn('tags.id',[$string]);
					
				}
				);
				
				
			}
			if($request->input('subgoal')){
				
				
			}
			
			
			
			
			
			
			
		}
		
		$posts = $query->get();
		
		return view('posts.search',array('client'=>$client,'posts'=>$posts) );
	}
}
