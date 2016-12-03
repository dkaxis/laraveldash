<?php

namespace App\Http\Controllers\auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
  
    public function __construct()
    {
        $this->middleware('auth');
    }

 
    public function index()
    {
        return view('auth.showUsers');
    }
}