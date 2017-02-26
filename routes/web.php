<?php

/*
---------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Auth::routes();
Route::group(['middleware' => 'auth'], function () {
	Route::get('/', 'HomeController@index');
	
	// 	user Routes
	
	Route::get('/users', 'Auth\UserController@index');
	Route::get('/users/edit/{user}', 'Auth\UserController@edit');
	Route::patch('/users/edit/{user}', 'Auth\UserController@update');
	Route::get('/users/delete/{user}', 'Auth\UserController@delete')->middleware('roles:Admin');
	//a	jax requests
	
	Route::get('/listusers', function (){
		if(Request::ajax()){
			return App\User::all();
		}
	}
	);
	Route::get('/roles', function (){
		if(Request::ajax()){
			return App\Role::all();
		}
		
	}
	);
	
	Route::get('/tags', function (){
		if(Request::ajax()){
			return App\Tag::all();
		}
		
	}
	);
	Route::get('/getuser/{user}', function ($user){
		return App\User::find($user);
	}
	)->middleware('roles:Admin');
	
	
	Route::get('/profile', 'Auth\UserController@profile');
	Route::patch('profile/{user}', 'Auth\UserController@update_profile');
	
	// 	Client Routes
	
	Route::get('/clients', 'ClientController@index');
	Route::get('/clients/show/{client}', 'ClientController@show');
	
	Route::get('/clients/new', 'ClientController@create');
	Route::post('/clients', 'ClientController@store');
	
	Route::get('/clients/edit/{client}','ClientController@edit');
	Route::patch('/clients/edit/{client}', 'ClientController@update');
	
	Route::get('/clients/delete/{client}','ClientController@delete');
	
	// 	Client Logbook
	
	Route::get('/clients/{client}/posts','PostController@index');
	Route::get('/clients/{client}/posts/new', 'PostController@create');
	Route::post('/clients/{client}/posts', 'PostController@store');
	Route::get('/clients/{client}/posts/edit/{post}','PostController@edit');
	Route::patch('/clients/{client}/posts/edit/{post}', 'PostController@update');
	Route::post('/clients/{client}/posts/search', 'PostController@search');
	
	
	Route::get('/clients/{client}/plans','PlanController@index');
	Route::get('/clients/{client}/plans/new', 'PlanController@create');
	Route::post('/clients/{client}/plans', 'PlanController@store');
	
	Route::get('/clients/{client}/contracts','ContractController@index');
	Route::get('/clients/{client}/contracts/new','ContractController@create');
	Route::post('/clients/{client}/contracts', 'ContractController@store');
	Route::get('/clients/{client}/contracts/edit','ContractController@edit');
	Route::patch('/clients/{client}/contracts/edit}', 'ContractController@update');
	Route::get('/clients/{client}/contracts/delete','ContractController@delete');
	Route::get('/clients/{client}/contracts/restore/{contract}','ContractController@restore');
	
	Route::get('/clients/{client}/contracts/show/{id}',function($client,$id){
		$contract = App\Contract::onlyTrashed()->where('id',$id)->first();
		return' <div class="pull-right">
                Fra: '
				.date('d/m Y', strtotime($contract->date_from)).
				'<br>
                Til: '
				.date('d/m Y', strtotime($contract->date_to)).
				'</div>
                <h4>Formål</h4>'
				.nl2br($contract->goal).
				'<hr>
                <h4>Beskrivelse</h4>'
				.nl2br($contract->description).
				'<hr>
                <h4>Klientens Ønske</h4>'
				.nl2br($contract->client_goal);
	});
	
	// 	Client Mål
	Route::resource('/clients/{client}/goals', 'GoalController');
	// 	Client Delmål
	Route::resource('/clients/{client}/subgoals', 'SubgoalController');
	//s	ettings
	
	Route::get('/settings', 'SettingsController@index');
	Route::get('/settings/tags', 'SettingsController@tags');
	Route::post('/settings/tags', 'SettingsController@storetag');
	Route::get('/settings/tags/edit/{tag}', 'SettingsController@edittag');
	Route::patch('/settings/tags/edit/{tag}', 'SettingsController@updatetag');
	Route::get('/settings/tags/delete/{tag}', 'SettingsController@deletetag');
	
}
);
