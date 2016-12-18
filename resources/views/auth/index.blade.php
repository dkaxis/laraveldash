@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        @include('layouts.sidebar')
        <div class="col-md-11 col-sm-10 col-md-offset-1 col-sm-offset-2">
        <h2> @lang('settings.users')     @if(Auth::user()->hasRole('Admin'))<a href="{{url('/register')}}" class="btn btn-sm btn-default pull-right"><i class="glyphicon glyphicon-plus"></i></a>@endif</h2>
     @foreach($users as $user)
        <div class="panel panel-default col-md-5">
               
            <div class="media">
  <div class="media-left">
    <a href="#">
      <img class="media-object" src="uploads/avatars/{{ $user->avatar }}" style="width:150px; height:150px;border-radius:50%;">
    </a>
  </div>
  <div class="media-body">
    <h4 class="media-heading">{{$user->first_name}} {{$user->last_name}}</h4>
         <i class="glyphicon glyphicon-envelope"> </i> {{$user->email}}<br>
                    <i class="glyphicon glyphicon-phone"></i> {{$user->phone}}
  </div>
</div>   
      
            
        </div>
               @endforeach  
        </div>
    </div>
</div>
@endsection
