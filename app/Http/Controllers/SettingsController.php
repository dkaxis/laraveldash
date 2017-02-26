<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use App\Role;
use App\Tag;
use Auth;
use Image;

class SettingsController extends Controller
{
      public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('settings/index');
    }

    public function tags(){
          $tags = tag::all();
        return view('settings.tags.index',compact('tags'));
    }

    public function storetag(Request $request){
            $this->validate($request,[
        'name' =>'required'
        ]);
        $tag = new Tag();
        $tag->name = $request->input('name');
        $tag->save();
        return back();
    }
    
      public function edittag(Tag $tag){
          $tags = tag::all();
      
        return view('settings.tags.edit', array('tags'=>$tags,'tt'=>$tag ) );
    }

      public function updatetag(Request $request,Tag $tag){
            $this->validate($request,[
        'name' =>'required'
        ]);
      
        $tag->name = $request->input('name');
        $tag->update();
          \Session::flash('alert_class','info');
       \Session::flash('alert_message','Tag er opdateret!');
        return redirect('/settings/tags');
    
    }

    public function deletetag(Tag $tag)
    {
          $tag->delete();
        \Session::flash('alert_class','warning');
       \Session::flash('alert_message','Tag er slettet!');
       return back();
    }
}

//TODO: show roles
//TODO: edit roles
//TODO: delete roles
//TODO: create roles