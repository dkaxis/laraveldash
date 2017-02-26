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
        return view('Contacts/index',array($contacts))
    }
}
