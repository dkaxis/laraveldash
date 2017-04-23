<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use App\Client;
use Auth;
use Image;

class ContactController extends Controller
{
    public function index(Client $client){
        $contacts = Contact::where('client_id',$client->id)->get();
        return view('Contacts/index',array('client'=>$client,'contacts' => $contacts));
    }

    public function create(Client $client){

    }
     public function store(Client $client,Request $request){
        
    }
     public function edit(Client $client,Contact $contact){
        
    }
     public function update(Client $client,Contact $contact,Request $request){
        
    }

     public function destroy(Client $client,Contact $contact){
        
    }

     public function show(Client $client,Contact $contact){
        
    }
}
